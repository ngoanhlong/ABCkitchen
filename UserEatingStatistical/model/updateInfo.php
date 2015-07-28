<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
    <head>
        <title>Multicusine  Website Template | Services  :: W3layouts</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link href="../../../css/style.css" rel="stylesheet" type="text/css"  media="all" />
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
        <!--        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">-->
        <link rel="stylesheet" href="../../../bootstrap-3.3.4-dist/bootstrap-3.3.4-dist/css/bootstrap.min.css">
        <!--         jQuery library 
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>-->
        <script src="../../../jquery-2.1.3.min.js"></script>
        <!--         Latest compiled JavaScript 
                <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>-->
        <script src="../../../bootstrap-3.3.4-dist/bootstrap-3.3.4-dist/js/bootstrap.min.js"></script>
        <script src="../../../angular.min.js">
        </script>
        <script src="../control/sendRequestUpdate.js"></script>

    </head>
    <body>

        <?php
        session_start();

        $dishNumber = $_GET["expenseNumber"];
        $oldDishName = '';
        $oldDescription = '';
        $oldPrice = '';

        $host = "localhost";
        $user = "root";
        $password = "";
        $table = "expense";
//            $now = "NOW()";

        $mysql = 'SELECT * FROM ' . $table . ' WHERE expenseNumber = ' . $dishNumber;
        $link = mysql_connect($host, $user, $password);
        if ($link) {
            $result = mysql_db_query("abckitchen", $mysql);
            $row = mysql_fetch_array($result);
            $imageName = $row["expenseName"];
            $oldDishName = $row["expenseName"];
            $oldDescription = $row["note"];
            $oldPrice = $row["fee"];
        }

        //        function test_input($data) {
//            $data = trim($data);
//            $data = stripslashes($data);
//            $data = htmlspecialchars($data);
//            return $data;
//        }
        ?>
        <div class="container">




            <h1 style="color:green;">Sửa thông tin khoản chi</h1>
            <br>
            <br>
            <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" 
                  data-ng-app="">

                <div class="form-group">
                    <label class="control-label col-sm-2" for="imageName">Mã khoản chi:</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="imageName" id="imageName" placeholder="Nhập vào mã món ăn" maxlength="16" value="<?php echo $dishNumber ?>"
                               data-ng-disabled="true;">
                    </div>

                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="dishName">Tên khoản chi:</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="dishName" id="dishName" placeholder="Nhập vào tên món ăn" maxlength="32" value="<?php echo $oldDishName; ?>"
                               >
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2" for="description">Mô tả về món ăn: </label>
                    <div class="col-sm-4">          
                        <textarea class="form-control" name="description" id="description" placeholder="Viết mô tả về món ăn" rows="7"
                                  required><?php echo $oldDescription; ?></textarea>
                    </div>

                </div>

                <div class="form-group">      
                    <label class="control-label col-sm-2" for="price" >Giá cho món ăn: </label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="price" id="price" placeholder="Nhập vào giá của món ăn" maxlength="12" value="<?php echo $oldPrice; ?>"
                               required>
                    </div>

                </div>

                <div class="form-group">      
                    <label class="control-label col-sm-2" for="gioitinh">Loại chi phí: </label>
                    <div class="col-sm-offset-2 col-sm-10">

                        <div class="radio" >
                            <label><input type="radio" name="expenseType" value="1" id="expenseType" checked="">Khoản Thu</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" name="expenseType" id="expenseType" value="0" >Khoản Chi</label>
                        </div>

                    </div>
                </div>



                <div class="form-group">        
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-success" onclick="sendRequest(<?php echo $dishNumber ?>)"><span class="glyphicon glyphicon-pencil"></span>&nbsp;&nbsp;Lưu lại thay đổi</button>
                    </div>
                </div>
            </form>
        </div>
    </body>

</html>

