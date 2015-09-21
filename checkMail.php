<?php
include_once "session.php";

$mail= safeString($_POST["mail"]);

$query=Db::$connection->prepare("SELECT mail FROM uporabniki WHERE mail=:mail");
$arr= array('mail'=>$mail);

Db::ArrayBinder($query,$arr);
$query->execute();


if($query->rowCount()==1){

    echo "mailErr";

}
else{
    echo "mailFree";

}



?>