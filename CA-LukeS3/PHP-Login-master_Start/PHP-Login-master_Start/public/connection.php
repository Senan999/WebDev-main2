<?php

$db_host = "localhost";
$db_user = "root";
$db_password = "@rm1tagE";
$db_name = "test";

try{
    $db = new PDO("mysql:host{$db_host};dbname={$db_name}",$db_user,$db_password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
    echo $e->getMessage();
}
