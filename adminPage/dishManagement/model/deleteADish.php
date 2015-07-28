<?php

session_start();

$dishNumber = $_GET["dishNumber"];
$host = "localhost";
$user = "root";
$password = "";

$dishNumber = "'$dishNumber'";
$mysql = "DELETE FROM dish WHERE dishNumber = $dishNumber ";
$link = mysql_connect($host, $user, $password);
if ($link) {
    $result = mysql_db_query("abckitchen", $mysql);
    }


?>