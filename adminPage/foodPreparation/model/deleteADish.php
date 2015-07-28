<?php

session_start();

$ID = $_GET["ID"];
$host = "localhost";
$user = "root";
$password = "";

$dishNumber = "'$dishNumber'";
echo $dishNumber;
$mysql = "DELETE FROM menu WHERE ID = $ID";
echo $mysql;
$link = mysql_connect($host, $user, $password);
if ($link) {
    $result = mysql_db_query("abckitchen", $mysql);
    if($result)
    {
        echo "Ok you done";
    }
    else
    {
        echo "Please check again!";
    }
    }


?>