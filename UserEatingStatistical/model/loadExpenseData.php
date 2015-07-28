<?php

session_start();
$host = "localhost";
$user = "root";
$password = "";

$userName = $_SESSION["userName"];
$userName = "'$userName'";
$page = $_GET["page"];
$recordNumber = $_GET["recordNumber"];
$c = $_GET["c"];
$year = $_GET["year"];
$month = $_GET["month"];

$tongthuAnUong = '';
$tongthuDichVu = '';
$tongChi = '';

$mysqlTongChi = "SELECT sum(price) AS total FROM dishOrderDetail WHERE month(menuForDate) = $month AND year(menuForDate) = $year AND userName = $userName";
$mysql = '';
$mysqlexpenseCount = '';

$mysql = "SELECT * FROM dishOrderDetail WHERE month(menuForDate) = $month AND year(menuForDate) = $year  AND userName = $userName";
$mysqlexpenseCount = "SELECT count(dishNumber) as count FROM dishOrderDetail WHERE month(menuForDate) = $month AND year(menuForDate) = $year AND userName = $userName";

//if ($c == "") {
//    $mysql = "SELECT * FROM expense";
//    $mysqlexpenseCount = "SELECT count(expenseNumber) as count FROM expense";
//    
//} else {
//    
//}


$htmlSon = '';
$link = mysql_connect($host, $user, $password);

if ($link) {
    $result = mysql_db_query("abckitchen", $mysqlexpenseCount);
    $row = mysql_fetch_array($result);
    $expenseCount = $row["count"];
    
    $result = mysql_db_query("abckitchen", $mysqlTongChi);
    $row = mysql_fetch_array($result);
    $tongChi = $row["total"];
}


if ($link) {
    
    $htmlResult = '<h3>Tổng kết thanh toán tiền ăn tháng '.$month.' năm '.$year.' </h3><br><h1>Nhân viên: <span style="color: red;">'.$_SESSION["employeeName"].'</span></h1> <h3>Tổng tiền: <span style="color:red;">'.$tongChi.' VNĐ </span></h3> <br><br> <h2>Chi tiết các khoản</h2>';
    $htmlResult .= '<table class="table table-striped table-bordered table-hover" id="dataTables-example" >
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Ngày đăng kí ăn</th>
                                            <th>Mã món ăn</th>
                                            <th>Tên món ăn</th>
                                            <th>Mô tả món ăn</th>
                                            <th>Giá</th>                                            

                                            
                                        </tr>
                                    </thead>
                                    <tbody >';
    $i = 1;
    $oddEven = 'even';
    $result = mysql_db_query("abckitchen", $mysql);
    while ($row = mysql_fetch_array($result)) {
        
        
        if ($i % 2 == 1) {
            $oddEven = 'odd';
        } else {
            $oddEven = 'even';
        }
        if ($i >= ($page - 1) * $recordNumber + 1 && $i <= $page * $recordNumber) {
            $htmlResult .= ' <tr class="' . $oddEven . '" >
                                            <td class="center">' . $i . '</td>
                                            <td class="center">' . $row["menuForDate"] . '</td> 
                                            <td >' . $row["dishNumber"] . '</td>
                                            <td >' . $row["dishName"] . '</td>
                                            <td >' . $row["description"] . '</td>    
                                   <td class="center">' . $row["price"] . '</td>
                                       </tr> '; 
        }
        $i++;
    }

    for ($i = 1; $i <= ($expenseCount / $recordNumber) + 1; $i++) {
        $htmlSon .= '<button type="button" class="btn btn-default" id="' . $i . '" value="' . $i . '" onclick="loadExpenseData(' . $i . ',' . $recordNumber . ', '.$c.')" >' . $i . '</button>';
    }

    $htmlResult .= '</tbody>
                                </table> <div style="float:right">' . $htmlSon . '</div> <br><br>';
    echo $htmlResult;
}
?>