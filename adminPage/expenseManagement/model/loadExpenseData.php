<?php

$host = "localhost";
$user = "root";
$password = "";

$page = $_GET["page"];
$recordNumber = $_GET["recordNumber"];
$c = $_GET["c"];
$year = $_GET["year"];
$month = $_GET["month"];

$tongthuAnUong = '';
$tongthuDichVu = '';
$tongChi = '';

$mysqlTongThuAnUong = "select sum(price) AS total FROM dishOrderDetail WHERE month(menuForDate) = $month AND year(menuForDate) = $year";
$mysqlTongThuDichVu = "select sum(fee) AS total FROM expense WHERE month(createdDate) = $month AND year(createdDate) = $year AND expenseType = 1";
$mysqlTongChi = "select sum(fee) AS total FROM expense WHERE month(createdDate) = $month AND year(createdDate) = $year AND expenseType = 0";
$mysql = '';
$mysqlexpenseCount = '';

$mysql = "SELECT * FROM expense WHERE month(createdDate) = $month AND year(createdDate) = $year  AND (expenseName LIKE $c || userName LIKE $c)";
$mysqlexpenseCount = "SELECT count(expenseNumber) as count FROM expense WHERE month(createdDate) = $month AND year(createdDate) = $year AND (expenseName LIKE $c || userName LIKE $c)";

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
    
    $result = mysql_db_query("abckitchen", $mysqlTongThuAnUong);
    $row = mysql_fetch_array($result);
    $tongthuAnUong = $row["total"];
    
    $result = mysql_db_query("abckitchen", $mysqlTongThuDichVu);
    $row = mysql_fetch_array($result);
    $tongthuDichVu = $row["total"];
    
    $result = mysql_db_query("abckitchen", $mysqlTongChi);
    $row = mysql_fetch_array($result);
    $tongChi = $row["total"];
}

$tongThu = $tongthuAnUong + $tongthuDichVu;
$loiNhuan = $tongThu - $tongChi;

if ($link) {
    
    $htmlResult = "<h3>Tổng kết lợi nhuận tháng $month năm $year </h3><br> <h4>Tổng thu dịch vụ ăn uống: $tongthuAnUong</h4> <h4>Tổng thu các dịch vụ: $tongthuDichVu</h4> <h4>Tổng thu chung: $tongThu</h4><br> <h4>Tổng chi chung: $tongChi</h4><br> <h3>Lợi nhuận: $loiNhuan</h3> <br><br> <h2>Chi tiết các khoản</h2>";
    $htmlResult .= '<table class="table table-striped table-bordered table-hover" id="dataTables-example" >
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Mã khoản chi</th>
                                            <th>Tên khoản chi</th>
                                            <th>Ghi chép </th>
                                            <th>Phí đã trả</th>
                                            <th>Loại chi phí</th>
                                            <th>Ngày chi trả</th>
                                            <th>Người thanh toán</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody >';
    $i = 1;
    $oddEven = 'even';
    $result = mysql_db_query("abckitchen", $mysql);
    while ($row = mysql_fetch_array($result)) {
        
        if($row["expenseType"])
        {
            $expenseType = 'Khoản thu';
        }
        else
        {
            $expenseType = 'Khoản chi';
        }
        
        if ($i % 2 == 1) {
            $oddEven = 'odd';
        } else {
            $oddEven = 'even';
        }
        if ($i >= ($page - 1) * $recordNumber + 1 && $i <= $page * $recordNumber) {
            $htmlResult .= ' <tr class="' . $oddEven . '" >
                                            <td class="center">' . $i . '</td>
                                            <td class="center">' . $row["expenseNumber"] . '</td> 
                                            <td >' . $row["expenseName"] . '</td>
                                            <td >' . $row["note"] . '</td>
                                            <td class="center">' . $row["fee"] . '</td>  
                                            <td class="center">' . $expenseType . '</td>     
                                            <td >' . $row["createdDate"] . '</td>    
                                            <td >' . $row["userName"] . '</td>
                                            <td><button type="button" class="btn btn-success" onclick="updateInfo(' . $row["expenseNumber"] . ')"><span class="glyphicon glyphicon-pencil"> </span>&nbsp;&nbsp;Sửa</button></td>
                                            <td><button type="button" class="btn btn-warning" onclick="deleteAnExpense(' . $row["expenseNumber"] . ')"><span class="glyphicon glyphicon-trash"> </span>&nbsp;&nbsp;Xóa</button></td>        
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