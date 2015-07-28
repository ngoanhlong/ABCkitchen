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

        $employeeNumber = $_GET["employeeNumber"];
        $oldemployeeName = '';
        $oldemployeeType = '';
        $oldGender = '';

        $host = "localhost";
        $user = "root";
        $password = "";
        $table = "employee";
//            $now = "NOW()";

        $mysql = 'SELECT * FROM ' . $table . ' WHERE employeeNumber = ' . $employeeNumber;
        $link = mysql_connect($host, $user, $password);
        if ($link) {
            $result = mysql_db_query("abckitchen", $mysql);
            $row = mysql_fetch_array($result);
            
            $oldemployeeName = $row["employeeName"];
            $oldemployeeType = $row["employeeType"];
            $oldGender = $row["gender"];
            
        }


//        function test_input($data) {
//            $data = trim($data);
//            $data = stripslashes($data);
//            $data = htmlspecialchars($data);
//            return $data;
//        }
        ?>
        <div class="container">
            <h2 style="color: green;">Sửa thông tin nhân viên</h2>
            <form class="form-horizontal" role="form" method="POST" data-ng-app="">
                <div class="form-group">
                    <label class="control-label col-sm-2" for="employeeNumber">Mã nhân viên:</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="employeeNumber" placeholder="Nhập vào mã nhân viên" maxlength="8" 
                               id="employeeNumber" value="<?php echo $employeeNumber; ?>" data-ng-disabled="true;">
                    </div>
                    
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="fullName">Tên đầy đủ của nhân viên:</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="employeeName" name="fullName" placeholder="Nhập vào tên đầy đủ của nhân viên" maxlength="32" value="<?php echo $oldemployeeName;?>" >
                    </div>
                    
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="employeeNumber">Vị trí trong công ty:</label>
                    <div class="col-sm-4">          
                        <input type="text" class="form-control" name="employeeType" id="employeeType" placeholder="vị trí trong công ty" maxlength="32" 
                               value="<?php echo $oldemployeeType;?>">
                    </div>
                    

                </div>



                <div class="form-group">      
                    <label class="control-label col-sm-2" for="gioitinh">Giới tính: </label>
                    <div class="col-sm-offset-2 col-sm-10">

                        <div class="radio" >
                            <label><input type="radio" name="gender" id="gender" value="1" checked="">Nam</label>
                            
                        </div>
                        <div class="radio">
                            <label><input type="radio" name="gender" id="gender" value="0" >Nữ</label>
                        </div>

                    </div>
                </div>
                <div class="form-group">        
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-success" onclick="sendRequest(<?php echo $employeeNumber?>)"><span class="glyphicon glyphicon-pencil"></span>&nbsp;&nbsp;Lưu lại các thay đổi</button>
                    </div>
                </div>
            </form>
        </div>
    </body>

</html>

