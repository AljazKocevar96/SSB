<?php
class Db {

   public function ArrayBinder(&$query, &$array){
        foreach($array as $k=>$v){
            $query->bindValue(':'.$k,$v);
        }
    }

   public function errorHandle(Exception $e){
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