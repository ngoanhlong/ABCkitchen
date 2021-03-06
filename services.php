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
                            <li><a href="about.php">Thông tin</a></li>
                            <li class="active"><a href="services.php">Dịch vụ</a></li>
                            <li><a href="gallery.php">Đăng kí ăn</a></li>
                            <li><a href="RegisterResult.php">Kết quả đăng kí</a></li>
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
        <div class="content">
            <!---start-services---->
            <div class="services">
                <div class="wrap">
                    <div class="services-header">
                        <h3>Các dịch vụ của nhà hàng</h3>
                        <div class="clear"> </div>
                    </div>
                    <div class="services-grids">
                        <div class="services-grid">
                            <a href="#">Tiệc cưới</a>
                            <p>Một danh sách thực đơn hết sức phong phú, các đôi uyên ương có thể thỏa sức chọn cho đám cưới của mình những món ăn mà bạn cho rằng sẽ hợp khẩu vị với mình cũng như với khách mời, hoặc có thể nghe tư vấn từ chăm sóc khách hàng để có thể tổ chức được một mâm cỗ đầy đặn và ngon miệng nhất mà giá thành lại hết sức hợp lý</p>
                        </div>
                        <div class="services-grid">
                            <a href="#">Tổ chức sinh nhật</a>
                            <p>Khi đến với nhà hàng  bạn có thể chọn được rất nhiều kiểu tổ chức tiệc sinh nhật hay, độc đáo và ý nghĩa phù hợp với nhiều đối tượng, độ tuổi khác nhau. Bạn cũng không cần mất nhiều thời gian vì chúng tôi sẽ đứng ra lo trọn gói từ việc giúp bạn lên ý tưởng chương trình và thiết kế, trang trí, chụp hình</p>
                        </div>
                        <div class="services-grid">
                            <a href="#">Tổ chức sự kiện</a>
                            <p>Một danh sách thực đơn hết sức phong phú, các đôi uyên ương có thể thỏa sức chọn cho đám cưới của mình những món ăn mà bạn cho rằng sẽ hợp khẩu vị với mình cũng như với khách mời, hoặc có thể nghe tư vấn từ chăm sóc khách hàng để có thể tổ chức được một mâm cỗ đầy đặn và ngon miệng nhất mà giá thành lại hết sức hợp lý</p>
                        </div>
                        <div class="services-grid">
                            <a href="#">Tiệc kỉ niệm ngày cưới</a>
                            <p>Tổ chức kỉ niệm một trong những sự kiện nhất trong đời sẽ làm người bạn đời của bạn cảm thấy mình được hạnh phúc nhất trên đời, cùng với sự chuẩn bị chu đáo, thái độ phục vụ nhiệt tình mang đến cảm giác lãn mạn cho ngày kỉ niệm này. Hãy liên lạc với chúng tôi, để tận hưởng những dịch vụ "đỉnh" nhất, cùng với nhiều ưu đãi lớn</p>
                        </div>
                        <div class="services-grid">
                            <a href="#">Tổ chức sự kiện</a>
                            <p>Khi tổ chức sự kiện tại nhà hàng bạn sẽ được đến với một không gian chuyên nghiệp cho việc tổ chức tiệc, hội nghị và sự kiện hàng đầu tại Hà Nội, với trang thiết bị, cơ sở hạ tầng hiện đại.</p>
                        </div>
                        <div class="services-grid">
                            <a href="#">Tổ chức sự kiện</a>
                            <p>Khi tổ chức sự kiện tại nhà hàng bạn sẽ được đến với một không gian chuyên nghiệp cho việc tổ chức tiệc, hội nghị và sự kiện hàng đầu tại Hà Nội, với trang thiết bị, cơ sở hạ tầng hiện đại.</p>
                        </div><div class="services-grid">
                            <a href="#">Tổ chức sự kiện</a>
                            <p>Khi tổ chức sự kiện tại nhà hàng bạn sẽ được đến với một không gian chuyên nghiệp cho việc tổ chức tiệc, hội nghị và sự kiện hàng đầu tại Hà Nội, với trang thiết bị, cơ sở hạ tầng hiện đại.</p>
                        </div><div class="services-grid">
                            <a href="#">Tổ chức sự kiện</a>
                            <p>Khi tổ chức sự kiện tại nhà hàng bạn sẽ được đến với một không gian chuyên nghiệp cho việc tổ chức tiệc, hội nghị và sự kiện hàng đầu tại Hà Nội, với trang thiết bị, cơ sở hạ tầng hiện đại.</p>
                        </div>
                        <div class="clear"> </div>
                    </div>

                    <div class="specials">
                        <div class="specials-heading">
                            <h3>Các món đặc biệt</h3>
                            <div class="clear"> </div>
                        </div>
                        <div class="clear"> </div>
                        <div class="specials-grids">
                            <div class="special-grid">
                                <img src="images/slider2.jpg" title="image-name">
                                <a href="#">Xào hải sản</a>
                                <p>Những đồ hải sản tươi ngon được chọn lựa cẩn thân, sẽ là món ngon không thể quên khi đến nhà hàng</p>
                            </div>
                            <div class="special-grid">
                                <img src="images/slider1.jpg" title="image-name">
                                <a href="#">Thịt nướng Texas</a>
                                <p>Những đồ hải sản tươi ngon được chọn lựa cẩn thân, sẽ là món ngon không thể quên khi đến nhà hàng</p>
                            </div>
                            <div class="special-grid spe-grid">
                                <img src="images/slider4.jpg" title="image-name">
                                <a href="#">Pizza Italia</a>
                                <p>Những đồ hải sản tươi ngon được chọn lựa cẩn thân, sẽ là món ngon không thể quên khi đến nhà hàng</p>
                            </div>
                            <div class="clear"> </div>
                        </div>
                        <div class="clear"> </div>
                    </div>
                </div>
            </div>

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
            </div>
    </body>
</html>

