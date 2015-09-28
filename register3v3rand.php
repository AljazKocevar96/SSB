<?php
include_once "session.php";

$ime=safeString($_POST['ime']);
$priimek=safeString($_POST['priimek']);
$datetime=date("Y-m-d H-i-s");
$ip=$_SERVER['REMOTE_ADDR'];

$queryCheck= "SELECT * FROM 3v3random WHERE ime=:ime AND priimek=:priimek AND IP= :ip";
$query="INSERT INTO 3v3random (ime, priimek, dat_prijave, IP) VALUES (:ime, :priimek, :dat_prijave, :ip)";
$arr= array(
    'ime'=>$ime,
    'priimek'=>$priimek,
    'dat_prijave'=>$datetime,
    'ip'=>$ip
);
$arrCheck=array(
    "ime"=>$ime,
    "priimek"=>$priimek,
    "ip"=>$ip
);

$redultRows=Db::countRows($queryCheck,$arrCheck);

if($redultRows==1){

    echo "RegisteredAlready";
}

else{
    if($result=Db::execute($query, $arr)){

        echo "Success";
    }
    else{
        echo "Fail";
    }
}



?>