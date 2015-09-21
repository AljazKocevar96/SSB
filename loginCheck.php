<?php
include_once "session.php";

$mail=safeString($_POST["mail"]);
$pass=safeString( $_POST["pass"]);

$query= "SELECT * FROM uporabniki WHERE mail= :mail";
$arr= array(
    "mail"=>$mail
);

$resultRows=Db::countRows($query, $arr);
$resultQuery=Db::getRows($query, $arr);

if($resultRows == 1){

    if(password_verify($pass, $resultQuery['pass'])==true){

    $_SESSION['user_id']=$resultQuery['id'];
    $_SESSION['user_name']=$resultQuery['ime'];
    $_SESSION['user_surename']=$resultQuery['priimek'];
    $_SESSION['picture']=$resultQuery['slika'];
    $_SESSION['admin']=$resultQuery['admin'];
        echo "Access_approved";
    }

    else{
        echo "Password_denied";
    }
}

else{
    echo "User_doesnt_exsist";
}





?>