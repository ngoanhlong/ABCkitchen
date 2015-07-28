<?php

session_start();
$menuForDate = $_GET['menuForDate'];
$userName = $_SESSION['userName'];
$dishNumber = $_GET['dishNumber'];
$getID = '';

$userName = "'$userName'";
$host = "localhost";
$user = "root";
$password = "";
$link = mysql_connect($host, $user, $password);


$mysqlGetID = "SELECT ID FROM menu WHERE dishNumber=$dishNumber AND menuForDate = $menuForDate";


if ($link) {
    $result = mysql_db_query("abckitchen", $mysqlGetID);
    
    $row = mysql_fetch_array($result);
    $getID = $row["ID"];
    if($result)
    {
        echo "yes,Get ID ok it's $getID";
    }
    
    
    $mysql = "INSERT INTO dishOrder VALUES($userName, $getID)";
    $result = mysql_db_query("abckitchen", $mysql);
    if($result)
    {
        echo "yes,Query ok it's ";
    }
    else
    {
        echo $mysql;
    }
}

?>