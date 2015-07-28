<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>ABC kitchen LongNA</title>

        <!-- Bootstrap Core CSS -->
        <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->  
        <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

        <!-- DataTables CSS -->
        <link href="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

        <!-- DataTables Responsive CSS -->
        <link href="../bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <script src="../js/angular.min.js">
        </script>


    </head>

    <body  onload="loadEmployeeData(1, 10, '')">

        <?php
        session_start();

        $employeeNumber = $employeeName = $employeeType = $gender = $notification = "";
        $employeeNumberErr = $employeeNameErr = $employeeTypeErr = $genderErr = "";
        $checkNumberic = false;

        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {


            if (empty($_POST["employeeNumber"])) {
                $employeeNumberErr = "Bạn quên nhập vào mã nhân viên";
            } else {
                if (!is_numeric($_POST["employeeNumber"])) {
                    $employeeNumberErr = "Mã nhân viên chỉ được là số";
                    $checkNumberic = false;
                } else {
                    $employeeNumber = test_input($_POST["employeeNumber"]);
                    $checkNumberic = true;
                }
            }

            if (empty($_POST["employeeName"])) {
                $employeeNameErr = "Bạn quên nhập tên đầy đủ cho nhân viên";
            } else {
                $employeeName = test_input($_POST["employeeName"]);
            }

            if (empty($_POST["employeeType"])) {
                $employeeTypeErr = "Bạn cần phải nhập vào vị trí của nhân viên trong công ty";
            } else {
                $employeeType = test_input($_POST["employeeType"]);
            }

            if (is_null($_POST["gender"])) {
                $genderErr = "Bạn cần phải nhập vào giới tính của nhân viên";
            } else {
                $gender = test_input($_POST["gender"]);
            }
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (checkEmployeeNumberExists($employeeNumber)) {
                $employeeNumberErr = "Mã nhân viên này đã được đăng kí, Xin hãy thử một mã khác";
            } else {
                if (!$checkNumberic) {
                    $employeeNumberErr = "Mã nhân viên phải là số";
                } else {
                    newAccount($employeeNumber, $employeeName, $employeeType, $gender);
                }
            }
        }

        function checkEmployeeNumberExists($employeeNumberparam) {
            $host = "localhost";
            $user = "root";
            $password = "";

            $mysql = "SELECT employeeNumber FROM account";
            $link = mysql_connect($host, $user, $password);
            if ($link) {
                $result = mysql_db_query("abckitchen", $mysql);
                while ($row = mysql_fetch_array($result)) {
                    if ($employeeNumberparam === $row["employeeNumber"])
                        return true;
                }

                return false;
            }
            else {
                echo "NO failed";
            }
        }

        function newAccount($employeeNumberParam, $employeeNameParam, $employeeTypeParam, $genderParam) {
            $host = "localhost";
            $user = "root";
            $password = "";
            $table = "employee";
            $check = 0;
            $now = "NOW()";
            $employeeNumber = "'$employeeNumberParam'";
            $employeeName = "'$employeeNameParam'";
            $employeeType = "'$employeeTypeParam'";
            $gender = "'$genderParam'";

            $mysql = "INSERT INTO " . $table . " VALUES($employeeNumber, $employeeName, $gender, $employeeType, $now);";
            $link = mysql_connect($host, $user, $password);
            if ($link) {
                $result = mysql_db_query("abckitchen", $mysql);
                if ($result) {

                    $GLOBALS["notification"] = "Đăng kí thành công, $employeeName đã là nhân viên của công ty";
                }
            }
        }
        ?>

        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="foodPreparation.php">TRANG QUẢN LÍ</a>
                </div>
                <!-- /.navbar-header -->

                <ul class="nav navbar-top-links navbar-right">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-envelope fa-fw"></i>  <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-messages">
                            <li>
                                <a href="#">
                                    <div>
                                        <strong>John Smith</strong>
                                        <span class="pull-right text-muted">
                                            <em>Yesterday</em>
                                        </span>
                                    </div>
                                    <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#">
                                    <div>
                                        <strong>John Smith</strong>
                                        <span class="pull-right text-muted">
                                            <em>Yesterday</em>
                                        </span>
                                    </div>
                                    <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#">
                                    <div>
                                        <strong>John Smith</strong>
                                        <span class="pull-right text-muted">
                                            <em>Yesterday</em>
                                        </span>
                                    </div>
                                    <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a class="text-center" href="#">
                                    <strong>Read All Messages</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </li>
                        </ul>
                        <!-- /.dropdown-messages -->
                    </li>
                    <!-- /.dropdown -->
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-tasks fa-fw"></i>  <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-tasks">
                            <li>
                                <a href="#">
                                    <div>
                                        <p>
                                            <strong>Task 1</strong>
                                            <span class="pull-right text-muted">40% Complete</span>
                                        </p>
                                        <div class="progress progress-striped active">
                                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                                <span class="sr-only">40% Complete (success)</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#">
                                    <div>
                                        <p>
                                            <strong>Task 2</strong>
                                            <span class="pull-right text-muted">20% Complete</span>
                                        </p>
                                        <div class="progress progress-striped active">
                                            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                                <span class="sr-only">20% Complete</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#">
                                    <div>
                                        <p>
                                            <strong>Task 3</strong>
                                            <span class="pull-right text-muted">60% Complete</span>
                                        </p>
                                        <div class="progress progress-striped active">
                                            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                                <span class="sr-only">60% Complete (warning)</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#">
                                    <div>
                                        <p>
                                            <strong>Task 4</strong>
                                            <span class="pull-right text-muted">80% Complete</span>
                                        </p>
                                        <div class="progress progress-striped active">
                                            <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                                <span class="sr-only">80% Complete (danger)</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a class="text-center" href="#">
                                    <strong>See All Tasks</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </li>
                        </ul>
                        <!-- /.dropdown-tasks -->
                    </li>
                    <!-- /.dropdown -->
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-bell fa-fw"></i>  <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-alerts">
                            <li>
                                <a href="#">
                                    <div>
                                        <i class="fa fa-comment fa-fw"></i> New Comment
                                        <span class="pull-right text-muted small">4 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#">
                                    <div>
                                        <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                        <span class="pull-right text-muted small">12 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#">
                                    <div>
                                        <i class="fa fa-envelope fa-fw"></i> Message Sent
                                        <span class="pull-right text-muted small">4 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#">
                                    <div>
                                        <i class="fa fa-tasks fa-fw"></i> New Task
                                        <span class="pull-right text-muted small">4 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#">
                                    <div>
                                        <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                        <span class="pull-right text-muted small">4 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a class="text-center" href="#">
                                    <strong>See All Alerts</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </li>
                        </ul>
                        <!-- /.dropdown-alerts -->
                    </li>
                    <!-- /.dropdown -->
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                            </li>
                            <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                            </li>
                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                    <!-- /.dropdown -->
                </ul>
                <!-- /.navbar-top-links -->

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">

                            <li>
                                <a href="../../index.php"><i class="fa fa-dashboard fa-fw"></i> Trang chủ</a>
                            </li>
                            <li>
                                <a href="foodPreparation.php"><i class="fa fa-table fa-fw"></i> Chuẩn bị thực phẩm</a>
                            </li>

                            <li>
                                <a href="dishManagement.php"><i class="fa fa-table fa-fw"></i> Quản lí món ăn</a>
                            </li>
                            <li>
                                <a href="employeeManagement.php"><i class="fa fa-table fa-fw"></i> Quản lí nhân viên</a>
                            </li>
                            <li>
                                <a href="menuManagement.php"><i class="fa fa-table fa-fw"></i> Quản lí Thực đơn</a>
                            </li>

                            <li>
                                <a href="expenseManagement.php"><i class="fa fa-table fa-fw"></i> Thống kê doanh thu</a>
                            </li>



                        </ul>
                    </div>
                    <!-- /.sidebar-collapse -->
                </div>
                <!-- /.navbar-static-side -->
            </nav>

            <div id="page-wrapper" >
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Quản lí nhân viên</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <br>
                                <div class="form-group">
                                    <label for="sel1">Chọn số bản ghi hiển thị: &nbsp;&nbsp;&nbsp;</label>
                                    <select class="" id="sel1" onchange="loadEmployeeData(1, this.value, '')">
                                        <option>5</option>
                                        <option selected>10</option>
                                        <option>15</option>
                                        <option>20</option>
                                        <option>50</option>
                                        <option>100</option>

                                    </select>
                                    <div class="col-md-4" style="float:right;">
                                        <input class="form-control" type="text" id="searchemployee" onkeyup="loadEmployeeData(1, 10, this.value)"/>
                                        <span class="glyphicon glyphicon-search"></span>
                                    </div>



                                </div>


                            </div>

                            <!-- /.panel-heading -->
                            <div class="panel-body">

                                <div class="dataTable_wrapper" id="loadEmployeeData">

                                </div>



                                <!-- /.table-responsive -->
                                <div class="well" id="createNewOrUpdate">
                                    <div class="container">
                                        <h2 style="color: green;">Tạo một nhân viên mới</h2>

                                        <span style="color: green;"> <?php echo $notification ?></span>
                                        <form class="form-horizontal" role="form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
                                              data-ng-app="myApp" data-ng-controller="myController" name="myForm">

                                            <div class="form-group">
                                                <label class="control-label col-sm-2" for="employeeNumber">Mã nhân viên:</label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" name="employeeNumber" placeholder="Nhập vào mã nhân viên" maxlength="8" 
                                                           data-ng-model="employeeNumber"  id="employeeNumber" value="<?php echo $employeeNumber; ?>" required>
                                                </div>
                                                <div class="col-sm-4">
                                                    <span style="color:red" data-ng-show="myForm.employeeNumber.$dirty && myForm.employeeNumber.$invalid"><span> Bạn quên chưa nhập vào mã nhân viên</span></span>
                                                    <span style="color: red;"> <?php echo $employeeNumberErr ?></span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-sm-2" for="employeeName">Tên đầy đủ của nhân viên:</label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" name="employeeName" id="employeeName" placeholder="Nhập vào tên đầy đủ của nhân viên" maxlength="32" 
                                                           data-ng-model="employeeName" required>
                                                </div>
                                                <div class="col-sm-4">
                                                    <span style="color:red;" data-ng-show="myForm.employeeName.$dirty && myForm.employeeName.$invalid"><span>Bạn quên nhập vào tên đầy đủ của nhân viên</span></span>
                                                    <span style="color: red;"> <?php echo $employeeNameErr ?></span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-2" for="employeeNumber">Vị trí trong công ty:</label>
                                                <div class="col-sm-4">          
                                                    <input type="text" class="form-control" name="employeeType" id="employeeType" placeholder="vị trí trong công ty" maxlength="32" 
                                                           data-ng-model="employeeType" required>
                                                </div>
                                                <div class="col-sm-4">
                                                    <span style="color:red" data-ng-show="myForm.employeeType.$dirty && myForm.employeeType.$invalid"><span>Bạn quên nhập vào vị trí của nhân viên trong công ty</span></span>
                                                    <span style="color: red;"> <?php echo $employeeTypeErr ?></span>
                                                </div>

                                            </div>



                                            <div class="form-group">      
                                                <label class="control-label col-sm-2" for="gioitinh">Giới tính: </label>
                                                <div class="col-sm-offset-2 col-sm-10">

                                                    <div class="radio" >
                                                        <label><input type="radio" name="gender" value="1" id="gender" checked="">Nam</label>
                                                    </div>
                                                    <div class="radio">
                                                        <label><input type="radio" name="gender" id="gender" value="0" >Nữ</label>
                                                    </div>

                                                    <div class="col-sm-4">
                                                        <span style="color: red;"> <?php echo $genderErr ?></span>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="form-group">        
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <button type="submit" class="btn btn-success" data-ng-disabled="checkInput"><span class="glyphicon glyphicon-pencil"></span>&nbsp;&nbsp;Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->

            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

        <!-- jQuery -->
        <script src="../bower_components/jquery/dist/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

        <!-- DataTables JavaScript -->
        <script src="../bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
        <script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="../dist/js/sb-admin-2.js"></script>


        <!-- Page-Level Demo Scripts - Tables - Use for reference -->
        <!--Create ajax to load employee data-->
        <script src="../employeeManagement/control/loadData.js"></script>
        <script src="../employeeManagement/control/JSInputValidation.js">
        </script>
        <script src="../employeeManagement/control/JsMadeByLongNA.js"></script>
        <script>
                                                        $(document).ready(function () {
                                                            $('#dataTables-example').DataTable({
                                                                responsive: true
                                                            });
                                                        });
        </script>

    </body>

</html>
