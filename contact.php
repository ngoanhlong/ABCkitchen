<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
    <head>
        <title>Multicusine  Website Template | Contact  :: W3layouts</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link href="css/style.css" rel="stylesheet" type="text/css"  media="all" />
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    </head>
    <body>
        <?php 
      session_start();
      $greeting = $newLink ='';
      
      if($_SESSION['isAdmin'])
      {
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
                        <h5 style="color: whitesmoke">Xin chào <span style="color: red;"><?php echo $greeting.' '.$_SESSION['userName']; ?>,</span> </h5>
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
                            <?php echo $newLink?>
                            <li><a href="about.php">Thông tin</a></li>
                            <li><a href="services.php">Dịch vụ</a></li>
                            <li><a href="gallery.php">Đăng kí ăn</a></li>
                            <li><a href="RegisterResult.php">Kết quả đăng kí</a></li>
                            <li><a href="UserEatingStatistical.php">Thống kê</a></li>
                            <li class="active"><a href="contact.php">Liên hệ</a></li>
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
            <!---start-contact---->
            <div class="contact">
                <div class="wrap">
                    <div class="section group">				
                        <div class="col span_1_of_3">
                            <div class="contact_info">
                                <h3>Tìm chúng tôi ở đây</h3>
                                <div class="map">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.898247401135!2d105.782737!3d21.036757000000005!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab4aab877325%3A0x67be25466d345b75!2zxJDhuqFpIGjhu41jIFF14buRYyBHaWEgSMOgIE7hu5lpIC0gWHXDom4gVGjhu6d5!5e0!3m2!1sen!2s!4v1432957122615" width="400" height="300" frameborder="0" style="border:0"></iframe>
                                    <br>
                                    <small>
                                        <a href="https://maps.google.co.in/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=Lighthouse+Point,+FL,+United+States&amp;aq=4&amp;oq=light&amp;sll=26.275636,-80.087265&amp;sspn=0.04941,0.104628&amp;ie=UTF8&amp;hq=&amp;hnear=Lighthouse+Point,+Broward,+Florida,+United+States&amp;t=m&amp;z=14&amp;ll=26.275636,-80.087265" style="color:#666;text-align:left;font-size:0.85em">View Larger Map</a>
                                    </small>
                                </div>
                            </div>
                            <div class="company_address">
                                <h3>Thông tin: </h3>
                                <p>Đại học Công Nghệ, ĐHQGHN</p>
                                <p>144 Xuân Thủy Cầu Giấy,</p>
                                <p>Việt Nam</p>
                                <p>Phone:0166 366 9281</p>
                                <p>Fax: (000) 000 00 00 0</p>
                                <p>Email: <span><a href="#">ngoanhlong@gmail.com</span></a></p>
                                <p>Follow on: <span><a href="#">Facebook</a></span>, <span><a href="#">Twitter</a></span></p>
                            </div>
                        </div>				
                        <div class="col span_2_of_3">
                            <div class="contact-form">
                                <h3>Liên hệ chúng tôi</h3>
                                <form method="post" action="contact-post.html">
                                    <div>
                                        <span><label>TÊN</label></span>
                                        <span><input name="userName" type="text" class="textbox"></span>
                                    </div>
                                    <div>
                                        <span><label>E-MAIL</label></span>
                                        <span><input name="userEmail" type="text" class="textbox"></span>
                                    </div>
                                    <div>
                                        <span><label>SỐ ĐIỆN THOẠI</label></span>
                                        <span><input name="userPhone" type="text" class="textbox"></span>
                                    </div>
                                    <div>
                                        <span><label>TIÊU ĐỀ</label></span>
                                        <span><textarea name="userMsg"> </textarea></span>
                                    </div>
                                    <div>
                                        <span><input type="submit" class="mybutton" value="Gửi yêu cầu"></span>
                                    </div>
                                </form>

                            </div>
                        </div>				
                    </div>
                </div>
            </div>
            <!---End-contact---->
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

