
<?php

session_start();
$menuForDate = $_GET['menuForDate'];
$pageNumber = $_GET["page"];
echo '<h1 style="color:green;"> THỰC ĐƠN NGÀY ' . $menuForDate . '</h1>';
$host = "localhost";
$user = "root";
$password = "";
$htmlheader = '<br>
                    <br>
                    <br>
                    <br>';
$link = mysql_connect($host, $user, $password);

$htmlSon1 = '';
$htmlSon2 = '';
$i = 0;
$dishCount = 0;
$mysql = "SELECT * FROM dishMenuDetail WHERE menuForDate=" . $menuForDate;
$mysqlDishCount = "SELECT count(dishNumber) as count FROM dishMenuDetail WHERE menuForDate = " . $menuForDate;

if ($link) {
    $result = mysql_db_query("abckitchen", $mysqlDishCount);
    $row = mysql_fetch_array($result);
    $dishCount = $row["count"];
}

if ($link) {
    $result = mysql_db_query("abckitchen", $mysql);
    while ($row = mysql_fetch_array($result)) {

        // Compare date to disable button order

        $date = new DateTime();
        $date1 = $date->format('Y-m-d');
        $date2 = substr($menuForDate, 1, 10);
        $typeButton = 'warning';
        $buttonName = 'Xóa khỏi menu';
        $event = 'onclick="deleteADishFromMenu(' . $row["ID"] . ', ' . $menuForDate . ')"';

        $dateTimestamp1 = strtotime($date1);
        $dateTimestamp2 = strtotime($date2);

        if ($dateTimestamp1 > $dateTimestamp2 || $dateTimestamp1 == $dateTimestamp2) {
            $typeButton = 'danger';
            $buttonName = 'Đã quá hạn xóa';
            $event = '';
        }
        //

        if ($i > $pageNumber * 6 - 1) {
            break;
        }
        if ($i <= $pageNumber * 6 - 4 && $i >= ($pageNumber - 1) * 6) {
            $htmlSon = '<div class="gallery-grid">
							<a href="#"><img height="307" width="500" src="../../uploads/' . $row["imageName"] . '.jpg" alt=""><span>' . $row["price"] . ' VNĐ</span></a>
							<h4>' . $row["dishName"] . '</h4>
							<p>' . $row["description"] . '</p>
                                                        
						</div>';
            $htmlSon1 .= $htmlSon;
        }
        if ($i >= $pageNumber * 6 - 3 && $i < $pageNumber * 6) {
            $htmlSon = '<div class="gallery-grid">
							<a href="#"><img height="307" width="500" src="../../uploads/' . $row["imageName"] . '.jpg" alt=""><span>' . $row["price"] . ' VNĐ</span></a>
							<h4>' . $row["dishName"] . '</h4>
							<p>' . $row["description"] . '</p>
                                                        
						</div>';
            $htmlSon2 .= $htmlSon;
        }
        $i++;
    }
}

$htmlComplete1 = '<div class="gallery-grids">' . $htmlSon1 . '<div class="clear"> </div>
					</div>';

$htmlComplete2 = '<div class="gallery-grids">' . $htmlSon2 . '<div class="clear"> </div>
					</div>';

$htmlfooterSon = "";
for ($i = 1; $i <= ($dishCount / 6) + 1; $i++) {
    $htmlfooterSon .= '<li><button type="button" class="btn btn-default" id="' . $i . '" value="' . $i . '" onclick="loadMenuData(this.value, ' . $menuForDate . ')">' . $i . '</button></li>';
}

$htmlfooter = '<div class="projects-bottom-paination">
						<ul>
							' . $htmlfooterSon . '
							
						</ul>
					</div>
				';

$html = $htmlheader . $htmlComplete1 . $htmlComplete2 . $htmlfooter;
echo $html;
?>



