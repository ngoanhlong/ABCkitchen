<?php

$host = "localhost";
$user = "root";
$password = "";

$page = $_GET["page"];
$recordNumber = $_GET["recordNumber"];
$c = $_GET["c"];
$menuForDate = $_GET["menuForDate"];

$mysql = '';
$mysqlDishCount = '';

if ($c == "") {
    $mysql = "SELECT * FROM dish  WHERE dishNumber NOT IN (SELECT dishNumber FROM menu WHERE menuForDate=$menuForDate)";
    $mysqlDishCount = "SELECT count(dishNumber) as count FROM dish  WHERE dishNumber NOT IN (SELECT dishNumber FROM menu WHERE menuForDate=$menuForDate)";
    
} else {
    $mysql = "SELECT * FROM dish WHERE dishName LIKE $c AND dishNumber NOT IN (SELECT dishNumber FROM menu WHERE menuForDate=$menuForDate)";
    $mysqlDishCount = "SELECT count(dishNumber) as count FROM dish WHERE dishName LIKE $c AND dishNumber NOT IN (SELECT dishNumber FROM menu WHERE menuForDate=$menuForDate)";
}


$htmlSon = '';
$link = mysql_connect($host, $user, $password);

if ($link) {
    $result = mysql_db_query("abckitchen", $mysqlDishCount);
    $row = mysql_fetch_array($result);
    $dishCount = $row["count"];
}

if ($link) {
    $htmlResult = '<table class="table table-striped table-bordered table-hover" id="dataTables-example" >
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Mã món ăn</th>
                                            <th>Tên món ăn</th>
                                            <th>Mô tả chi tiết</th>
                                            <th>Đơn giá</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody >';
    $i = 1;
    $oddEven = 'even';
    $result = mysql_db_query("abckitchen", $mysql);
    while ($row = mysql_fetch_array($result)) {
        
        // Compare date to disable button order

        $date = new DateTime();
        $date1 = $date->format('Y-m-d');
        $date2 = substr($menuForDate, 1, 10);
        $typeButton = 'success';
        $buttonName = '&nbsp;&nbsp;Thêm vào thực đơn';
        $event = 'onclick="addNewDishIntoMenu(' . $row["dishNumber"] . ', '.$menuForDate.')"';

        $dateTimestamp1 = strtotime($date1);
        $dateTimestamp2 = strtotime($date2);

        if ($dateTimestamp1 > $dateTimestamp2 || $dateTimestamp1 == $dateTimestamp2) {
            $typeButton = 'danger';
            $buttonName = 'Đã quá hạn thêm';
            $event = '';
        }
        //
        
        if ($i % 2 == 1) {
            $oddEven = 'odd';
        } else {
            $oddEven = 'even';
        }
        if ($i >= ($page - 1) * $recordNumber + 1 && $i <= $page * $recordNumber) {
            $htmlResult .= ' <tr class="' . $oddEven . '" >
                                            <td class="center" onclick="openSecondPage(' . $row["dishNumber"] . ')">' . $i . '</td>
                                            <td class="center" onclick="openSecondPage(' . $row["dishNumber"] . ')">' . $row["imageName"] . '</td> 
                                            <td  onclick="openSecondPage(' . $row["dishNumber"] . ')">' . $row["dishName"] . '</td>
                                            <td onclick="openSecondPage(' . $row["dishNumber"] . ')">' . $row["description"] . '</td>
                                            <td class="center" onclick="openSecondPage(' . $row["dishNumber"] . ')">' . $row["price"] . '</td>
                                            <td><button type="button" class="btn btn-'.$typeButton.'" '.$event.' ><span class="glyphicon glyphicon-hand-up"> </span>'.$buttonName.'</button></td>
                                                
                                            
</tr> ';
        }
        $i++;
    }

    for ($i = 1; $i <= ($dishCount / $recordNumber) + 1; $i++) {
        $htmlSon .= '<button type="button" class="btn btn-default" id="' . $i . '" value="' . $i . '" onclick="loadDishMenuData(' . $i . ',' . $recordNumber . ', '.$c.')" >' . $i . '</button>';
    }

    $htmlResult .= '</tbody>
                                </table> <div style="float:right">' . $htmlSon . '</div> <br><br>';
    echo $htmlResult;
}
?>