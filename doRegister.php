<?php
include_once "core/connect.php";
include_once "core/functions.php";
include_once "session.php";
include_once "safetyFunctions.php";

$ime= safeString($_POST['ime']);
$surname = safeString($_POST['surname']);
$mail= safeString($_POST['mail']);
$pass = safeString($_POST['pass']);
$passCheck = safeString($_POST['passCheck']);
$date= date("Y-m-d");
$slika="./photos/defaultProfile.png";
$admin=0;

if(!empty($ime) && !empty($surname) && !empty($mail) && !empty($pass) && !empty($passCheck)){

    if($pass == $passCheck){


        $passHash= password_hash($pass, PASSWORD_DEFAULT);


            $query= $db->prepare("INSERT INTO uporabniki (ime, priimek, pass, slika, reg_date) VALUES(:ime, :priimek, :pass, :slika, :dat)");
            $query-> bindParam(":ime",$ime);
            $query-> bindParam(":priimek",$surname);
            $query-> bindParam(":pass",$passHash);
            $query-> bindParam(":slika",$slika);
            $query-> bindParam(":dat", $date);
            $query->execute();
            echo "Success";


    }
    else{
        echo "Fail";
    }

}





?>