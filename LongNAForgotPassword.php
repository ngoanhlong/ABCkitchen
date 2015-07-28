<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>ABCkitchen Website</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link href="css/style.css" rel="stylesheet" type="text/css"  media="all" />
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
        <link href="css/slider.css" rel="stylesheet" type="text/css"  media="all" />
        <script type="text/javascript" src="js/jquery.min.js"></script> 
        <script type="text/javascript" src="js/jquery.easing.1.3.js"></script> 
        <script type="text/javascript" src="js/camera.min.js"></script>
        <script type="text/javascript" src="js/jquery.lightbox.js"></script> 
        <link rel="stylesheet" type="text/css" href="css/lightbox.css" media="screen" />
        <meta name="description" content="Expand, contract, animate forms with jQuery wihtout leaving the page" />
        <meta name="keywords" content="expand, form, css3, jquery, animate, width, height, adapt, unobtrusive javascript"/>
        <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon"/>
        <link rel="stylesheet" type="text/css" href="css/LoginStyle.css" />
        <script src="js/cufon-yui.js" type="text/javascript"></script>
        <script src="js/ChunkFive_400.font.js" type="text/javascript"></script>
        <script type="text/javascript">
            Cufon.replace('h1', {textShadow: '1px 1px #fff'});
            Cufon.replace('h2', {textShadow: '1px 1px #fff'});
            Cufon.replace('h3', {textShadow: '1px 1px #000'});
            Cufon.replace('.back');
        </script>
        <script type="text/javascript">
            $(function () {
                $('.gallery a').lightBox();
            });
        </script>
        <script type="text/javascript">
            jQuery(function () {
                jQuery('#camera_wrap_1').camera({
                    pagination: false,
                });
            });
        </script>
    </head>
    <body>

        <?php
        $passwordLv2 = $passwordLv2Err = "";
        $employeeNumber = $employeeNumberErr = "";
        $resultCheck = "";

        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["passwordLv2"])) {
                $passwordLv2Err = "Bạn phải nhập vào mật khẩu cấp 2 của bạn";
            } else {
                $passwordLv2 = test_input($_POST["passwordLv2"]);
            }
            
            if (empty($_POST["employeeNumber"])) {
                $employeeNumberErr = "Bạn phải nhập vào mã nhân viên của bạn";
            } else {
                $employeeNumber = test_input($_POST["employeeNumber"]);
            }
            
        }

        function checkInfor($staff_idcheck, $staffCodecheck) {

            $host = "localhost";
            $user = "root";
            $passworddb = "";
            $table = "account";

            $mysql = "SELECT * FROM " . $table;
            $link = mysql_connect($host, $user, $passworddb);
            if ($link) {
                $result = mysql_db_query("abckitchen", $mysql);
                while ($row = mysql_fetch_array($result)) 
                {
                    
                    if ($staff_idcheck === $row["employeeNumber"] && $staffCodecheck === $row["passwordLv2"])
                    {
                        return true;
                    }
                }

                return false;
            }
            else {
                echo "NO failed";
            }
        }
        
        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
            if (checkInfor($employeeNumber, $passwordLv2)) {
            
            $host = "localhost";
            $user = "root";
            $passworddb = "";
            $table = "account";

            $mysql = "SELECT * FROM " . $table;
            $link = mysql_connect($host, $user, $passworddb);
            if ($link) {
                $result = mysql_db_query("abckitchen", $mysql);
                while ($row = mysql_fetch_array($result)) 
                {
                    
                    if ($employeeNumber === $row["employeeNumber"])
                    {
                        $resultCheck =  "Password của bạn tìm thấy là: ".$row["password"];
                    }
                }
            }
            else {
                echo "NO failed";
            }
            
        } 
        else {
            $resultCheck = "Thông tin cua ban cung cấp không đúng !";
        }
        }

        ?>

        <!----start-header----->
        <div class="header">
            <div class="wrap">
                <div class="top-header">
                    <div class="logo">
                        <a href="#"><img src="images/ABC Kitchen.png" title="logo" /></a>
                    </div>
                    <div class="social-icons">

                        <h3 style="color: whitesmoke"> Xin chào Khách </h3>


                        <ul>
                            <li><a href="https://facebook.com"><img src="images/facebook.png" title="facebook" /></a></li>
                            <li><a href="#"><img src="images/twitter.png" title="twitter" /></a></li>
                            <li><a href="#"><img src="images/google.png" title="google pluse" /></a></li>

                        </ul>

                    </div>
                    <div class="clear"> </div>
                </div>
                <!---start-top-nav---->

                <!---End-top-nav---->
            </div>
        </div>
        <!----End-header----->

        <div class="wrapper">
            <h1 style="color: green;">ABC Kitchen hân hạnh phục vụ bạn</h1>
            <br></br>
            <h2 > Lấy lại <span>MẬT KHẨU</span> thật dễ dàng, sử dụng mật mã nhân viên của bạn</h2>
            <div class="content">
                <div id="form_wrapper" class="form_wrapper">
                    <form class="forgot_password active" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                        <h3>Quên mật khẩu</h3>
                        
                        <span style="color:red;	font-size:23px;	font-style:italic;display:block;margin:4px 30px;"> <?php echo $resultCheck; ?></span>
                        
                        <div>
                            <label>Mã nhân viên: </label>
                            <input type="text" name="employeeNumber" value=<?php echo $employeeNumber; ?>>
                            <span style="color:red;	font-size:11px;	font-style:italic;display:block;margin:4px 30px;"> <?php echo $employeeNumberErr; ?></span>
                        </div>
                        <div>
                            <label>Mật khẩu cấp 2: </label>
                            <input type="password" name="passwordLv2" value=<?php echo $passwordLv2; ?>>
                            <span style="color:red;	font-size:11px;	font-style:italic;display:block;margin:4px 30px;"> <?php echo $passwordLv2Err; ?></span>
                        </div>
                        <div class="bottom">
                            <input type="submit" value="Lấy lại mật khẩu"></input>
                            <a href="LongNALoginPage.php" rel="login" class="linkform">Tôi đã đăng kí tài khoản, ĐĂNG NHẬP ngay!</a>
                            <a href="LongNARegisterPage.php" rel="account" class="linkform">Tôi chưa có tài khoản nào, ĐĂNG KÍ !</a>
                            <div class="clear"></div>
                        </div>
                    </form>
                </div>
                <div class="clear"></div>
            </div>
            <a class="back" href="LongNALoginPage.php">Quay lại trang đăng nhập</a>
        </div>


        <div class="copy-right">
            <div class="top-to-page">
                <a href="#top" class="scroll"> </a>
                <div class="clear"> </div>
            </div>
            <p>Design by <a href="http://w3layouts.com/"> W3layouts</a></p>
        </div>
        <!---End-footer---->
    </body>
</html>
