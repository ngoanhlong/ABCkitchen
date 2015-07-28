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
        $employeeNumber = $userName = $password = $passwordLv2 = "";
        $employeeNumberErr = $userNameErr = $passwordErr = "";
        $passwordLv2Err = "Mật khẩu cấp 2 dùng cho trường hợp quên mật khẩu";
        $notification = "";

        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["userName"])) {
                $userNameErr = "Bạn phải nhập vào tên đăng nhập";
            } else {
                $userName = test_input($_POST["userName"]);
                // check if name only contains letters and whitespace
                if (!preg_match("/^[a-zA-Z0-9]*$/", $userName)) {
                    $nameErr = "Tên đăng nhập chỉ gồm số và chữ";
                }
            }

            if (empty($_POST["password"])) {
                $passwordErr = "Bạn cần phải nhập mật khẩu !";
            } else {
                $password = test_input($_POST["password"]);
            }

            if (empty($_POST["employeeNumber"])) {
                $employeeNumberErr = "Bạn cần phải nhập vào mã nhân viên !";
            } else {
                $employeeNumber = test_input($_POST["employeeNumber"]);
            }

            if (empty($_POST["passwordLv2"])) {
                $passwordLv2Err = "Bạn cần phải nhập đủ mật khẩu cấp 2 !";
            } else {
                $passwordLv2 = test_input($_POST["passwordLv2"]);
                $passwordLv2Err = "";
            }
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (checkEmployeeNumberExists($employeeNumber)) {
                $employeeNumberErr = "Mã nhân viên này đã được đăng kí, <a href='LongNAForgotPassword.php'>Quên mật khẩu ???</a>";
            } 
                if (checkUserNameExisted($userName)) {
                    $userNameErr = "Tên đăng nhập này đã được sử dụng bởi người khác, xin thử lại!";
                } 
                
                if(!checkUserNameExisted($userName) && !checkEmployeeNumberExists($employeeNumber)){
                    echo "Dang ki";
                    newAccount($employeeNumber, $userName, $password, $passwordLv2);
            }
        }
        

        function newAccount($employeeNumberparam, $userNameParam, $passwordParam, $passwordLv2Param) {
            $host = "localhost";
            $user = "root";
            $password = "";
            $table = "account";
            $check = 0;
            $now = "NOW()";
            $userNameParam = "'$userNameParam'";
            $passwordParam = "'$passwordParam'";
            $passwordLv2Param = "'$passwordLv2Param'";
            $normalUser = "'normal User'";
            
            $mysql = "INSERT INTO " . $table . " VALUES($employeeNumberparam, $userNameParam, $passwordParam, $passwordLv2Param, $now, $normalUser);";
            echo "<br>".$mysql;
            $link = mysql_connect($host, $user, $password);
            if ($link) {
                $result = mysql_db_query("abckitchen", $mysql);
                if($result)
                {
                    
                    $GLOBALS["notification"] = "Đăng kí thành công, <a href='LongNaLoginPage.php'>ĐĂNG NHẬP NGAY !!! </a>";
                }
            }
        }
        
        function checkEmployeeNumberExists($employeeNumberparam) {
            $host = "localhost";
            $user = "root";
            $password = "";

            $mysql = "SELECT employeeNumber FROM account";
            $link = mysql_connect($host, $user, $password);
            if ($link) {
                $result = mysql_db_query("abckitchen", $mysql);
                while ($row = mysql_fetch_array($result)) {
                    if ($employeeNumberparam === $row["employeeNumber"])
                        return true;
                }

                return false;
            }
            else {
                echo "NO failed";
            }
        }

        function checkUserNameExisted($userNameParam) {
            $host = "localhost";
            $user = "root";
            $password = "";

            $mysql = "SELECT userName FROM account";
            $link = mysql_connect($host, $user, $password);
            if ($link) {
                $result = mysql_db_query("abckitchen", $mysql);
                while ($row = mysql_fetch_array($result)) {
                    if ($userNameParam === $row["userName"])
                        return true;
                }

                return false;
            }
            else {
                echo "NO connect db failed :(";
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
            <h1 style="color: green;">Đăng kí thật dễ dàng </h1> <h1 style="color: green;">và thật nhanh chóng</h1>
            <br></br>
            <h2 > Vui lòng <span style="fontStyle: bold;">Điền đầy đủ thông tin</span> để đăng kí sử dụng dịch vụ</h2>
            <div class="content">
                <div id="form_wrapper" class="form_wrapper">
                    <span style="color:red;font-size:25px;font-style:italic;display:block;margin:4px 30px;"><?php echo $notification; ?></span>
                    <form class="account active" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                        <h3>account</h3>
                        <div class="column">
                            <div>
                                <label>Mã nhân viên:</label>
                                <input type="text" name="employeeNumber" value= <?php echo $employeeNumber; ?> >
                                <span class="error"><?php echo $employeeNumberErr; ?></span>
                            </div>
                            <div>
                                <label>Mật khẩu:</label>
                                <input type="password" name="password" value= <?php echo $password; ?> >
                                <span class="error"><?php echo $passwordErr; ?></span>
                            </div>

                        </div>
                        <div class="column">
                            <div>
                                <label>User name:</label>
                                <input type="text" name="userName" value= <?php echo $userName; ?> >
                                <span class="error"><?php echo $userNameErr; ?></span>
                            </div>
                            <div>
                                <label>Mật khẩu cấp 2:</label>
                                <input type="password" name="passwordLv2" value= <?php echo $passwordLv2; ?> >
                                <span class="error"><?php echo $passwordLv2Err; ?></span>
                            </div>

                        </div>
                        <div class="bottom">

                            <input type="submit" value="ĐĂNG KÍ" />
                            <a href="LongNALoginPage.php" rel="login" class="linkform">Tôi đã có tài khoản, ĐĂNG NHẬP ngay!</a>
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
