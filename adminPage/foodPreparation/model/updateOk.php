<?php

$dishNumber = $_GET["dishNumber"];
$dishName = $_GET["dishName"];
$description = $_GET["description"];
$price = $_GET["price"];

echo $dishNumber . ' , ' . $dishName . ' , ' . $description . ' , ' . $price;

updateADish($dishNumber, $dishName, $description, $price);

function updateADish($dishNumberParam, $dishNameParam, $descriptionParam, $priceParam) {
    $host = "localhost";
    $user = "root";
    $password = "";
    $table = "dish";
//            $now = "NOW()";

    $link = mysql_connect($host, $user, $password);

//            $dishNumber = $_SESSION["userName"];
//            $dishNumber = "'$dishNumber'";

    $mysql = "UPDATE $table SET dishName=$dishNameParam, description=$descriptionParam, price=$priceParam WHERE dishNumber=$dishNumberParam";
    echo '\n '.$mysql;
    if ($link) {
        $result = mysql_db_query("abckitchen", $mysql);
        if ($result) {

            echo "Cập nhật thành công";
        } else {
            echo "Kiểm tra lại database";
        }
    }
}

?>