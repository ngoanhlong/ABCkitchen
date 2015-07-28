<?php

$employeeNumber = $_GET["employeeNumber"];
$employeeName = $_GET["employeeName"];
$employeeType = $_GET["employeeType"];
$gender = $_GET["gender"];

updateAnEmployee($employeeNumber, $employeeName, $employeeType, $gender);

function updateAnEmployee($employeeNumberParam, $employeeNameParam, $employeeTypeParam, $genderParam) {
    $host = "localhost";
    $user = "root";
    $password = "";
    $table = "employee";
//            $now = "NOW()";

    $link = mysql_connect($host, $user, $password);

//            $employeeNumber = $_SESSION["userName"];
//            $employeeNumber = "'$employeeNumber'";

    $mysql = "UPDATE $table SET employeeName=$employeeNameParam, employeeType=$employeeTypeParam, gender=$genderParam WHERE employeeNumber=$employeeNumberParam";
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