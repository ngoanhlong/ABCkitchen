<?php

session_start();

$dishNumber = $_GET["dishNumber"];
$menuForDate = $_GET["menuForDate"];
$host = "localhost";
$user = "root";
$password = "";

$imageName = "";
$dishName = "";
$price = "";
$mysql = "SELECT * FROM dish WHERE dishNumber = $dishNumber ";
$link = mysql_connect($host, $user, $password);
if ($link) {
    $result = mysql_db_query("abckitchen", $mysql);
    while ($row = mysql_fetch_array($result)) {
        $imageName = $row["imageName"];
        $dishName = $row["dishName"];
        $price = $row["price"];
        $description = $row["description"];
    }
}


$html = '<html>
    <head>
        <title>Multicusine  Website Template | Gallery :: W3layouts</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link href="css/style.css" rel="stylesheet" type="text/css"  media="all" />
        <link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">
        <!-- Latest compiled and minified CSS -->
        <!--<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">-->
        <link rel="stylesheet" href="bootstrap-3.3.4-dist/bootstrap-3.3.4-dist/css/bootstrap.min.css" />
        <!-- jQuery library -->
        <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>-->
        <script src="jquery-2.1.3.min.js"></script>
        <!-- Latest compiled JavaScript -->
        <!--<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>-->
        <script src="bootstrap-3.3.4-dist/bootstrap-3.3.4-dist/js/bootstrap.min.js"></script>
        <script src="angular.min.js">
        </script>
        <script src=js/FoodSelector.js></script>
        
    </head>
    <body>
        <div class="container">
            <div class="gallery-grids">
                <div class="gallery-grid">
                    <a href="#"><img src="uploads/'.$imageName.'.jpg" alt=""><span>'.$price.' VNĐ</span></a>
                    <h4>'.$dishName.'</h4>
                    <p>'.$description.'</p>
                    <button type="button" class="btn btn-warning"  onclick="dishCancel('.$dishNumber.', '.$menuForDate.')">Hủy món này</button>
                    
                </div>

            </div>
        </div>
    </body>
</html>';
echo $html;
?>