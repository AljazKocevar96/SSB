<?php
class Db {

    public static $connection;
    public static $config = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_EMULATE_PREPARES => false,
    );

    public static function connect($db_host,$db_name,$username,$password){

        if(!isset(self::$connection)){

            self::$connection = new PDO('mysql:host='.$db_host.';dbname='.$db_name, $username, $password, self::$config);
        }
    }

    public static function getRows($query, array $array){
        $stmt=self::execute($query,$array);
        $row= $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    public static function countRows($query, array $array){

        $stmt = self::execute($query, $array);
        $stmt->execute();
        $count= $stmt->rowCount();
        return $count;
    }

    public static function execute($query, array $array){

        $stmt= self::$connection->prepare($query);
        self::ArrayBinder($stmt,$array);
        $stmt->execute();
        return $stmt;

    }

   public static function ArrayBinder(&$query, &$array){
        foreach($array as $k=>$v){
            $query->bindValue(':'.$k,$v);
        }
    }

    public static function executeNoParamsCountRow($query){

        $stmt = self::$connection->prepare($query);
        $stmt->execute();
        $count=$stmt->rowCount();
        return $count;

    }

    public static function executeNoParams($query){

        $stmt=self::$connection->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public static function executeNoParamsRows($query){

        $stmt = self::$connection->prepare($query);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

   public static function errorHandle(Exception $e){
    echo "Server Error: ".$e->getCode()." Fix it! ";
    $trace= $e->getTrace();
    if($trace[0]['class']!=""){
        $class=$trace[0]['class'];
    }

    $method=$trace[0]['function'];
    $file= $trace[0]['file'];
    $line= $trace[0]['line'];

    $ExceptionOutput= $e->getMessage()." | Class in Metoda: ".$class."->".$method." | File: ".$file." | Line: ".$line;
    echo $ExceptionOutput;
}

}
?>