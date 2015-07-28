<?php

$dishNumber = $_GET["dishNumber"];
$dishName = $_GET["dishName"];
$description = $_GET["description"];
$price = $_GET["price"];
$expenseType = $_GET["expenseType"];

echo $dishNumber . ' , ' . $dishName . ' , ' . $description . ' , ' . $price . ' , '.$expenseType;

updateADish($dishNumber, $dishName, $description, $price, $expenseType);

function updateADish($dishNumberParam, $dishNameParam, $descriptionParam, $priceParam, $expenseType) {
    $host = "localhost";
    $user = "root";
    $password = "";
    $table = "expense";
//            $now = "NOW()";

    $link = mysql_connect($host, $user, $password);

//            $dishNumber = $_SESSION["userName"];
//            $dishNumber = "'$dishNumber'";

    $mysql = "UPDATE $table SET expenseName=$dishNameParam, note=$descriptionParam, fee=$priceParam, expenseType = $expenseType WHERE expenseNumber=$dishNumberParam";
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