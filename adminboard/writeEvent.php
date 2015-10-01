<?php
include_once "./core/session.php";

$ime=safeString($_POST['ime']);
$lokacija=safeString($_POST['lokacija']);
$start=safeString($_POST['start']);
$end=safeString('end');

$arr=array(
    "ime"=>$ime,
    "lokacija"=>$lokacija,
    "start_date"=>$start,
    "end_date"=>$end
);

$query= "INSERT INTO events (ime, lokacija, start_date, end_date) VALUES(:ime, :lokacija, :start_date, :end_date)";

if($result=Db::execute($query,$arr)){
    echo "Success";
}
else{
    echo "Fail";
}

?>