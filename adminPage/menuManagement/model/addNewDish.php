<?php

session_start();

$dishNumber = $_GET["dishNumber"];
$menuForDate = $_GET["menuForDate"];
$userName = $_SESSION["userName"];

$host = "localhost";
$user = "root";
$password = "";

$dishNumber = "'$dishNumber'";
$menuForDate = "$menuForDate";
$userName = "'$userName'";
$now = "now()";

$mysql = "INSERT INTO menu VALUES('', $menuForDate, $dishNumber, $now, $userName)";

$link = mysql_connect($host, $user, $password);
if ($link) {
    $result = mysql_db_query("abckitchen", $mysql);
    
    }


?>