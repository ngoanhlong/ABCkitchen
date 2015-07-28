<?php

session_start();

$employeeNumber = $_GET["employeeNumber"];
$host = "localhost";
$user = "root";
$password = "";

$employeeNumber = "'$employeeNumber'";
$mysql = "DELETE FROM employee WHERE employeeNumber = $employeeNumber ";
$link = mysql_connect($host, $user, $password);
if ($link) {
    $result = mysql_db_query("abckitchen", $mysql);
    }


?>