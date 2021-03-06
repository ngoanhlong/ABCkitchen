<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
    <head>
        <title>Multicusine  Website Template | About  :: W3layouts</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link href="css/style.css" rel="stylesheet" type="text/css"  media="all" />
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    </head>
    <body>

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
                        <h4 style="color: white;"> Bạn muốn <a href="index.html" style="color: orange;"> ĐĂNG XUẤT </a> ?</h4>
                        <br>
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
                            <li class="active"><a href="about.php">Thông tin</a></li>
                            <li><a href="services.php">Dịch vụ</a></li>
                            <li><a href="gallery.php">Đăng kí ăn</a></li>
                            <li><a href="RegisterResult.php">Kết quả đăng kí</a></li>
                            <li><a href="UserEatingStatistical.php">Thống kê</a></li>
                            <li><a href="contact.php">Liên hệ</a></li>
                            <!--<li><a href="contact.php">Thống kê</a></li>-->
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
            <!---start-about---->
            <div class="about-us">
                <div class="wrap">
                    <div class="about-header">
                        <h3>Giới thiệu</h3>
                        <div class="clear"> </div>
                    </div>
                    <div class="about-info">
                        <a href="#">Xin chào nhóm chúng tôi gôm 3 thành viên, 1 nam 2 nữ, chúng tôi rất vui được giới thiệu mình với mọi người</a>
                        <p>Được thành lập muộn hơn các nhóm khác, chúng tôi quen biết nhau thông qua một lời giới thiệu, nhóm chúng tôi gồm 3 thành viên cùng phát triển dự án,trải qua những khó khăn khi xây dựng dự án từ việc các thành viên đều chưa quen biêt nhau, thời gian học tập khác nhau, và việc bắt đầu muộn hơn khiến chúng tôi phải thực sự tập trung, thực sự nỗ lực để có hoàn thành dự án.</p>
                    </div>
                    <div class="specials">
                        <div class="specials-heading">
                            <h3>Nhóm chúng tôi</h3>
                            <div class="clear"> </div>
                        </div>
                        <div class="clear"> </div>
                        <div class="specials-grids">
                            <div class="special-grid">
                                <img src="admin/1620479_1490155877871006_670992588789224632_n.jpg" title="Admin Trang" width="400" height="400">
                                <a href="https://www.facebook.com/trang.boouet">Admin Trang Boo UET</a>
                                <p>K57CC - Đại học Công Nghệ - ĐHQGHN</p>
                            </div>
                            <div class="special-grid">
                                <img src="admin/longna.jpg" title="Admin Long" width="400" height="400">
                                <a href="https://www.facebook.com/anhlong.ngo.50">Admin Ngô Anh Long</a>
                                <p>K57CC - Đại học Công Nghệ - ĐHQGHN</p>
                            </div>
                            <div class="special-grid spe-grid">
                                <img src="admin/hapanda.jpg" title="Admin Hà" width="400" height="400">
                                <a href="https://www.facebook.com/hapanda5994">Admin Hà Panda</a>
                                <p>K57CB - Đại học Công Nghệ - ĐHQGHN</p>
                            </div>
                            <div class="clear"> </div>
                        </div>
                        <div class="clear"> </div>
                    </div>
                </div>
                <div class="testmonials">
                    <div class="wrap">
                        <div class="testmonial-grid">
                            <h3>Phương châm:</h3>
                            <p>“Chúng tôi đã đang và sẽ đem đến cho người lao động những món ăn hấp dẫn và những lựa chọn tuyệt vời. Hãy đến với ABCKitchen, chúng tôi luôn sẵn lòng phục vụ các bạn.”</p>
                            <a href="#"> ABC Kitchen</a>
                        </div>
                    </div>
                </div>
                <!---End-about---->
            </div>
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

