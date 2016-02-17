<?php

include_once "./core/session.php";
include_once "./core/safetyFunctions.php";

$id = safeString($_POST['id']);
$status = safeString($_POST['status']);

$query = "UPDATE events SET status= :status WHERE id = :id";
$arr = array(
    "status" => $status,
    "id" => $id
);

$result = Db::execute($query, $arr);


?>

