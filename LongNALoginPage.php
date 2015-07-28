<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
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
        session_start();

        $userName = $password = "";
        $userNameErr = $passwordErr = "";
        $notificaiton = "";

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
        }

        function checkLogin($userNameLogin, $passwordLogin) {

            $host = "localhost";
            $user = "root";
            $password = "";

            $mysql = "SELECT * FROM account";
            $link = mysql_connect($host, $user, $password);
            if ($link) {
                $result = mysql_db_query("abckitchen", $mysql);
                while ($row = mysql_fetch_array($result)) {
                    if ($userNameLogin === $row["userName"] && $passwordLogin === $row["password"])
                        return true;
                }

                return false;
            }
            else {
                echo "NO failed";
            }
        }

        function checkAdminLogin($userNameParam) {

            $host = "localhost";
            $user = "root";
            $password = "";
            $userNameParam = "'$userNameParam'";
            $_SESSION['isAdmin'] = false;
            $mysql = "SELECT accountType FROM account a WHERE a.userName = $userNameParam";
            echo "<br>" . $mysql;
            $link = mysql_connect($host, $user, $password);
            if ($link) {
                $result = mysql_db_query("abckitchen", $mysql);
                while ($row = mysql_fetch_array($result)) {
                    echo "<br>" . $row["accountType"];
                    if ($row["accountType"] == 'admin') {
                        $_SESSION['isAdmin'] = true;
                        return true;
                    } 
                }

                return false;
            } else {
                echo "NO failed";
            }
        }

        function getemployeeNumberByUsername($userNameParam) {
            $host = "localhost";
            $user = "root";
            $password = "";
            $userNameParam = "'$userNameParam'";
            $mysql = "SELECT employeeNumber FROM account WHERE userName = $userNameParam ";
            echo "<br>" . $mysql;
            $link = mysql_connect($host, $user, $password);
            if ($link) {
                $result = mysql_db_query("abckitchen", $mysql);
                while ($row = mysql_fetch_array($result)) {
                    echo $row["employeeNumber"];
                    return $row["employeeNumber"];
                }

                return 0;
            } else {
                echo "NO failed";
                return 0;
            }
        }
        
        function getemployeeNameByUsername($userNameParam) {
            $host = "localhost";
            $user = "root";
            $password = "";
            $userNameParam = "'$userNameParam'";
            $mysql = "SELECT e.employeeName FROM account a, employee e WHERE a.userName = $userNameParam AND e.employeeNumber = a.employeeNumber";
            echo "<br>" . $mysql;
            $link = mysql_connect($host, $user, $password);
            if ($link) {
                $result = mysql_db_query("abckitchen", $mysql);
                while ($row = mysql_fetch_array($result)) {
                    echo $row["employeeName"];
                    return $row["employeeName"];
                }

                return 0;
            } else {
                echo "NO failed";
                return 0;
            }
        }
        

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            echo checkAdminLogin($userName);
            if (checkLogin($userName, $password)) {

                $_SESSION['userName'] = $userName;
                $_SESSION['employeeNumber'] = getemployeeNumberByUsername($userName);
                $_SESSION['employeeName'] = getemployeeNameByUsername($userName);
                header("Location: index.php");
            } else {
                $notificaiton = "Đăng nhập không thành công, xin hãy thử lại!";
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

                        <h2 style="color: whitesmoke"> Xin chào Khách </h2>


                        <ul> <h3>Follow us on <h3> 
                                    <li><a href="https://facebook.com"><img src="images/facebook.png" title="facebook" /></a></li>
                                    <li><a href="#"><img src="images/twitter.png" title="twitter" /></a></li>
                                    <li><a href="#"><img src="images/google.png" title="google plus" /></a></li>

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
                                        <h2 > Vui lòng <a href="#">ĐĂNG NHẬP</a> để sử dụng các dịch vụ của nhà hàng</h2>
                                        <div class="content">
                                            <div id="form_wrapper" class="form_wrapper">

                                                <form class="login active" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                                                    <h3>Đăng nhập</h3>
                                                    <span style="color:red;	font-size:20px;	font-style:italic;display:block;margin:4px 30px;"> <?php echo $notificaiton; ?></span>
                                                    <div>
                                                        <label>Tên đăng nhập:</label>
                                                        <input type="text" name="userName" maxlength="16" value=<?php echo $userName ?>>
                                                        <span style="color:red;	font-size:11px;	font-style:italic;display:block;margin:4px 30px;"> <?php echo $userNameErr; ?></span>
                                                    </div>
                                                    <div>
                                                        <label>Mật khẩu: <a href="LongNAForgotPassword.php" rel="forgot_password" class="forgot linkform">Quên mật khẩu ???</a></label>
                                                        <input type="password" name="password" value=<?php echo $password ?>>
                                                        <span style="color:red;	font-size:11px;	font-style:italic;display:block;margin:4px 30px;"> <?php echo $passwordErr; ?></span>
                                                    </div>
                                                    <div class="bottom">

                                                        <input type="submit" value="Đăng nhập" ></input>
                                                        <a href="LongNARegisterPage.php" rel="account" class="linkform">Bạn chưa có tài khoản để đăng nhập??? ĐĂNG KÍ</a>
                                                        <div class="clear"></div>
                                                    </div>
                                                </form>

                                            </div>
                                            <div class="clear"></div>
                                        </div>
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

