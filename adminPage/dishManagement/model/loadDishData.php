<?php

$host = "localhost";
$user = "root";
$password = "";

$page = $_GET["page"];
$recordNumber = $_GET["recordNumber"];
$c = $_GET["c"];

$mysql = '';
$mysqlDishCount = '';

if ($c == "") {
    $mysql = "SELECT * FROM dish";
    $mysqlDishCount = "SELECT count(dishNumber) as count FROM dish";
    
} else {
    $mysql = "SELECT * FROM dish WHERE dishName LIKE $c";
    $mysqlDishCount = "SELECT count(dishNumber) as count FROM dish WHERE dishName LIKE $c ";
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
                                            <th>Giá</th>
                                            <th></th>
                                            <th></th>
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
                                            <td class="center" onclick="openSecondPage(' . $row["dishNumber"] . ')">' . $i . '</td>
                                            <td class="center" onclick="openSecondPage(' . $row["dishNumber"] . ')">' . $row["imageName"] . '</td> 
                                            <td  onclick="openSecondPage(' . $row["dishNumber"] . ')">' . $row["dishName"] . '</td>
                                            <td onclick="openSecondPage(' . $row["dishNumber"] . ')">' . $row["description"] . '</td>
                                            <td class="center" onclick="openSecondPage(' . $row["dishNumber"] . ')">' . $row["price"] . '</td>
                                            <td><button type="button" class="btn btn-warning" onclick="updateInfo(' . $row["dishNumber"] . ')"><span class="glyphicon glyphicon-pencil"> </span>&nbsp;&nbsp;Sửa</button></td>
                                            <td><button type="button" class="btn btn-danger" onclick="deleteADish(' . $row["dishNumber"] . ')"><span class="glyphicon glyphicon-trash"> </span>&nbsp;&nbsp;Xóa</button></td>
</tr> ';
        }
        $i++;
    }

    for ($i = 1; $i <= ($dishCount / $recordNumber) + 1; $i++) {
        $htmlSon .= '<button type="button" class="btn btn-default" id="' . $i . '" value="' . $i . '" onclick="loadDishData(' . $i . ',' . $recordNumber . ', '.$c.')" >' . $i . '</button>';
    }

    $htmlResult .= '</tbody>
                                </table> <div style="float:right">' . $htmlSon . '</div> <br><br>';
    echo $htmlResult;
}
?>