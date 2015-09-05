<?php
$db_host="localhost";
$username="root";
$password="";
$db_name="sbspage";
    $db = new PDO('mysql:host=' . $db_host . ';dbname=' . $db_name, $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



?>