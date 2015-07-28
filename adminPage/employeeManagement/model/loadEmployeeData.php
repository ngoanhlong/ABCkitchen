<?php

$host = "localhost";
$user = "root";
$password = "";

$page = $_GET["page"];
$recordNumber = $_GET["recordNumber"];
$c = $_GET["c"];

$mysql = '';
$mysqlEmployeeCount = '';

if ($c == "") {
    $mysql = "SELECT * FROM employee";
    $mysqlEmployeeCount = "SELECT count(employeeNumber) as count FROM employee";
    
} else {
    $mysql = "SELECT * FROM employee WHERE employeeName LIKE $c || gender LIKE $c";
    $mysqlEmployeeCount = "SELECT count(employeeNumber) as count FROM employee WHERE employeeName LIKE $c || gender LIKE $c ";
}


$htmlSon = '';
$link = mysql_connect($host, $user, $password);

if ($link) {
    $result = mysql_db_query("abckitchen", $mysqlEmployeeCount);
    $row = mysql_fetch_array($result);
    $employeeCount = $row["count"];
}

if ($link) {
    $htmlResult = '<table class="table table-striped table-bordered table-hover" id="dataTables-example" >
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Mã nhân viên</th>
                                            <th>Tên nhân viên</th>
                                            <th>Giới tính</th>
                                            <th>Chức vụ</th>
                                            <th>Ngày bắt đầu</th>
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
        if($row["gender"])
        {
            $gender = 'Nam';
        }
        else
        {
            $gender = 'Nữ';
        }
        if ($i >= ($page - 1) * $recordNumber + 1 && $i <= $page * $recordNumber) {
            $htmlResult .= ' <tr class="' . $oddEven . '" >
                                            <td class="center">' . $i . '</td>
                                            <td class="center">' . $row["employeeNumber"] . '</td> 
                                            <td>' . $row["employeeName"] . '</td>
                                            <td>' . $gender . '</td>
                                            <td class="center">' . $row["employeeType"] . '</td>
                                            <td class="center">' . $row["startedDate"] . '</td>
                                            <td><button type="button" class="btn btn-warning center" onclick="updateInfo(' . $row["employeeNumber"] . ')"><span class="glyphicon glyphicon-pencil"> </span>&nbsp;&nbsp;Sửa</button></td>
                                            <td><button type="button" class="btn btn-danger center" onclick="deleteAnEmployee(' . $row["employeeNumber"] . ')"><span class="glyphicon glyphicon-trash"> </span>&nbsp;&nbsp;Xóa</button></td>
</tr> ';
        }
        $i++;
    }

    for ($i = 1; $i <= ($employeeCount / $recordNumber) + 1; $i++) {
        $htmlSon .= '<button type="button" class="btn btn-default" id="' . $i . '" value="' . $i . '" onclick="loadEmployeeData(' . $i . ',' . $recordNumber . ', '.$c.')" >' . $i . '</button>';
    }

    $htmlResult .= '</tbody>
                                </table> <div style="float:right">' . $htmlSon . '</div> <br><br>';
    echo $htmlResult;
}
?>