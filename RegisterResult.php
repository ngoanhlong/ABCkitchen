<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
    <head>
        <title>Multicusine  Website Template | Gallery :: W3layouts</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link href="css/style.css" rel="stylesheet" type="text/css"  media="all" />
        <link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">
        <script type="text/javascript" src="js/JsMadeByLongNARegisterResult.js"></script>
        <!-- Latest compiled and minified CSS -->
        <!--<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">-->
        <link rel="stylesheet" href="bootstrap-3.3.4-dist/bootstrap-3.3.4-dist/css/bootstrap.min.css" />
        <!-- jQuery library -->
        <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>-->
        <script src="jquery-2.1.3.min.js"></script>
        <!-- Latest compiled JavaScript -->
        <!--<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>-->
        <script src="bootstrap-3.3.4-dist/bootstrap-3.3.4-dist/js/bootstrap.min.js"></script>
        <script src="js/CreateMenuLoadAjaxRegisterResult.js"></script>

    </head>
    <body onload="showPage(1)">

        <?php
        session_start();
        $greeting = $newLink = '';

        if ($_SESSION['isAdmin']) {
            $greeting = 'ADMIN';
            $newLink = '<li><a href="adminPage/pages/foodPreparation.php">Trang Quản lí</a></li>';
        }
        ?>


        <!----start-header----->
        <div class="header">
            <div class="wrap">
                <div class="top-header">
                    <div class="logo">
                        <a href="index.php"><img src="images/ABC Kitchen.png" title="logo" /></a>
                    </div>
                    <div class="social-icons">
                        <h5 style="color: whitesmoke">Xin chào <span style="color: red;"><?php echo $greeting . ' ' . $_SESSION['userName']; ?>,</span> </h5>
                        <h4 style="color: white;"> Bạn muốn <a href="LongNALoginPage.php" style="color: orange;"> Đăng xuất </a> ?</h4>
                        <ul>
                            <li><a href="#"><img src="images/facebook.png" title="facebook" /></a></li>
                            <li><a href="#"><img src="images/twitter.png" title="twitter" /></a></li>
                            <li><a href="#"><img src="images/google.png" title="google pluse" /></a></li>
                        </ul>
                    </div>
                    <div class="clear"> </div>
                </div>
                <!---start-top-nav---->
                <div class="top-nav">
                    <div class="top-nav-left">
                        <ul>
                            <li><a href="index.php">Trang chủ</a></li>
<?php echo $newLink ?>
                            <li><a href="about.php">Thông tin</a></li>
                            <li><a href="services.php">Dịch vụ</a></li>
                            <li><a href="gallery.php">Đăng kí ăn</a></li>
                            <li class="active"><a href="RegisterResult.php">Kết quả đăng kí</a></li>
                            <li><a href="UserEatingStatistical.php">Thống kê</a></li>
                            <li><a href="contact.php">Liên hệ</a></li>
                            <div class="clear"> </div>
                        </ul>
                    </div>
                    <div class="clear"> </div>
                </div>
                <!---End-top-nav---->
            </div>
        </div>
        <!----End-header----->
        <!---start-content---->
        <div class="content">

            <!---start-gallery----->
            <div class="gallerys">

                <div class="wrap">
                    <h3 >Chọn ngày muốn xem đăng kí ăn:</h3> <h4>Đây là những món bạn đã chọn cho ngày </h4><span><input type="date" id="myTime" value="<?php date_default_timezone_set("Asia/Ho_Chi_Minh");
echo date("Y-m-d"); ?>" onchange="showPage(1)"/></span>
                    <div id="loadAllDish" >

                    </div>
                </div>

            </div>
            <!---End-gallery----->
            <!---End-content---->
            <!---start-footer---->
            <div class="footer">
                <div class="wrap">
                    <div class="footer-grid">
                        <h3>Về chúng tôi</h3>
                        <p>Được thành lập muộn hơn các nhóm khác, chúng tôi quen biết nhau thông qua một lời giới thiệu, nhóm chúng tôi gồm 3 thành viên cùng phát triển dự án,trải qua những khó khăn khi xây dựng dự án từ việc các thành viên đều chưa quen biêt nhau, thời gian học tập khác nhau, và việc bắt đầu muộn hơn khiến chúng tôi ... </p>
                        <a href="#">Đọc thêm</a>
                    </div>
                    <div class="footer-grid center-grid">
                        <h3>Trang truy cập</h3>
                        <ul>
                            <li><a href="#">Trang chủ</a></li>
                            <li><a href="#">Thông tin</a></li>
                            <li><a href="#">Các dịch vụ</a></li>
                            <li><a href="#">liên hệ</a></li>
                            <li><a href="#">Góp ý</a></li>
                        </ul>
                    </div>
                    <div class="footer-grid twitts">
                        <h3>Những dòng facebook mới nhất</h3>
                        <p><label>@Angela Phương Trinh</label>@Có một số món tôi rất thích như: gà rán, sườn chua ngọt….</p>
                        <span>10 phút trước</span>
                        <p><label>@Ngọc Trinh</label>@Các món ăn được chế biến rất ngon và hợp vệ sinh, sau những giờ lao động mệt nhọc thì những bữa ăn ngon thế này giúp tôi lấy lại tinh thần làm việc rất nhanh. Cảm ơn công ty!</p>
                        <span>15 phút trước</span>
                    </div>
                    <div class="footer-grid">
                        <h3>Bạn có biết?</h3>
                        <p>ABCKitchen là bếp ăn đầu tiên được triển khai bởi công ty ABC. ABCKitchen đem đến cho bạn những giây phút tuyệt vời với những món ăn ngon sau giờ lao động mệt nhọc.</p>
                        <a href="#">Đọc thêm</a>
                    </div>
                    <div class="clear"> </div>
                </div>
                <div class="clear"> </div>
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

