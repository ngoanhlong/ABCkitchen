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
        <link type="text/css" rel="stylesheet" href="testSearch.css"/>
        <script src="../js/angular.min.js">
        </script>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body  onload="loadExpenseData(1, 10, '')">

        <?php
        session_start();
        
        $expenseType = '';
        $imageName = $dishName = $description = $price = "";
        $imageNameErr = $dishNameErr = $priceErr = "";
        $notification = "";
        $descriptionErr = "";
        $uploadErr = "File tải lên phải là file ảnh có đuôi mở rộng là png, jpeg, gif, jpg !";
        $fileName = '';


        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            if (empty($_POST["imageName"])) {
                $imageNameErr = "Bạn quên nhập vào tên hình ảnh";
            } else {
                $imageName = test_input($_POST["imageName"]);
            }

            if (empty($_POST["dishName"])) {
                $dishNameErr = "Bạn quên nhập vào tên khoản chi! ";
            } else {
                $dishName = test_input($_POST["dishName"]);
            }

            if (empty($_POST["description"])) {

                $descriptionErr = "Bạn cần phải nhập vào ghi chép khoản chi! ";
            } else {
                $description = test_input($_POST["description"]);
            }
            
            $expenseType = $_POST["expenseType"];

            if (empty($_POST["price"])) {
                $priceErr = "Bạn quên nhập vào phí đã trả! ";
            } else {
                if (!is_numeric($_POST["price"])) {
                    $priceErr = "Giá món ăn chỉ được là số !";
                } else {
                    $price = test_input($_POST["price"]);
                }
            }
        }

//        function checkimageNameExists($imageNameParam) {
//            $host = "localhost";
//            $user = "root";
//            $password = "";
//
//            $mysql = "SELECT expenseNumber FROM expense";
//            $link = mysql_connect($host, $user, $password);
//            if ($link) {
//                $result = mysql_db_query("abckitchen", $mysql);
//                while ($row = mysql_fetch_array($result)) {
//                    if ($imageNameParam === $row["expenseNumber"])
//                        return true;
//                }
//
//                return false;
//            }
//            else {
//                echo "NO failed";
//            }
//        }

        function addNewDish($imageNameParam, $dishNameParam, $descriptionParam, $priceParam, $expenseType) {
            $host = "localhost";
            $user = "root";
            $password = "";
            $table = "expense";
            $now = "NOW()";
            $imageNameParam = "'$imageNameParam'";
            $dishNameParam = "'$dishNameParam'";
            $descriptionParam = "'$descriptionParam'";
            $employeeNumber = $_SESSION["userName"];
            $employeeNumber = "'$employeeNumber'";

            $mysql = "INSERT INTO " . $table . " VALUES('', $dishNameParam, $now, $priceParam, $descriptionParam, $employeeNumber, $expenseType);";
            $link = mysql_connect($host, $user, $password);
            if ($link) {
                $result = mysql_db_query("abckitchen", $mysql);
                if ($result) {

                    $GLOBALS["notification"] = "Thêm khoản chi thành công";
                } else {
                    $GLOBALS["notification"] = "Kiem tra lai database";
                }
            }
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            addNewDish($imageName, $dishName, $description, $price, $expenseType);
        }

        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
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
                        <h1 class="page-header">Quản lí thu chi</h1>
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
                                    
                                    <lable for="year">Thống kê theo năm</lable>
                                    <input type="text" id="year" value="2015" onchange="loadExpenseData(1, this.value,'')"/>
                                    <label for="sel1">Theo tháng: &nbsp;&nbsp;&nbsp;</label>
                                    <select class="" id="month" onchange="loadExpenseData(1, this.value,'')">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        <option selected>6</option>
                                        <option>7</option>
                                        <option>8</option>
                                        <option>9</option>
                                        <option>10</option>
                                        <option>11</option>
                                        <option>12</option>

                                    </select>
                                    
                                    <br>
                                    <br>
                                    
                                    <label for="sel1">Chọn số bản ghi hiển thị: &nbsp;&nbsp;&nbsp;</label>
                                    <select class="" id="sel1" onchange="loadExpenseData(1, this.value,'')">
                                        <option>5</option>
                                        <option selected>10</option>
                                        <option>15</option>
                                        <option>20</option>
                                        <option>50</option>
                                        <option>100</option>

                                    </select>
                                    
                                    <div class="col-md-4" style="float:right;">
                                        
                                        <input class="form-control" type="text" id="searchDish" onkeyup="loadExpenseData(1, 10, this.value)"/>
                                        <span class="glyphicon glyphicon-search"></span>
                                        
                                    </div>



                                </div>


                            </div>
                            
                            <!-- /.panel-heading -->
                            <div class="panel-body">

                                <div class="dataTable_wrapper" id="loadExpenseData">

                            </div>



                                <!-- /.table-responsive -->
                                <div class="well" id="createNewOrUpdate">
                                    <div class="container">

                                        <form class="form-horizontal" role="form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data" 
                                              name="myForm" data-ng-app="myApp" data-ng-controller="myController">
                                            <h1 style="color: green;" data-ng-hide="checkUpdate">Khai một khoản chi phí mới</h1>
                                            <h3 style="color: red;"> <?php echo $notification; ?></h3>
                                            
                                            <div class="form-group">
                                                <label class="control-label col-sm-2" for="dishName">Tên chi phí:</label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" name="dishName" placeholder="Nhập vào tên món ăn" maxlength="32" value="<?php echo $dishName; ?>"
                                                           data-ng-model="dishName" required>
                                                </div>
                                                <div class="col-sm-4">
                                                    <span style="color:red;" data-ng-show="myForm.dishName.$dirty && myForm.dishName.$invalid"><span>Bạn quên nhập vào tên món ăn</span></span>
                                                    <span style="color: red;"><?php echo $dishNameErr; ?></span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-2" for="description">Ghi chép về chi phí: </label>
                                                <div class="col-sm-4">          
                                                    <textarea class="form-control" name="description" placeholder="Viết mô tả về món ăn" rows="7"
                                                              data-ng-model="description" required><?php echo $description; ?></textarea>
                                                </div>
                                                <div class="col-sm-4">
                                                    <span data-ng-show="myForm.description.$dirty && myForm.description.$invalid" style="color:red;"> <span>Bạn quên nhập vào mô tả món ăn</span></span>
                                                    <span style="color: red;"> <?php echo $descriptionErr; ?></span>
                                                </div>
                                            </div>

                                            <div class="form-group">      
                                                <label class="control-label col-sm-2" for="price" >Phí đã trả: </label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" name="price" placeholder="Nhập vào giá của món ăn" maxlength="12" value="<?php echo $price; ?>"
                                                           data-ng-model="price" required>
                                                </div>
                                                <div class="col-sm-4">
                                                    <span style="color:red" data-ng-show="myForm.price.$dirty && myForm.price.$invalid"> <span>Bạn quên nhập vào giá của món ăn</span></span>
                                                    <span style="color: red;"><?php echo $priceErr; ?></span>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">      
                                                <label class="control-label col-sm-2" for="gioitinh">Loại chi phí: </label>
                                                <div class="col-sm-offset-2 col-sm-10">

                                                    <div class="radio" >
                                                        <label><input type="radio" name="expenseType" value="1" id="expenseType" checked="">Khoản Thu</label>
                                                    </div>
                                                    <div class="radio">
                                                        <label><input type="radio" name="expenseType" id="expenseType" value="0" >Khoản Chi</label>
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
        <!--Create ajax to load dish data-->
        <script src="../expenseManagement/control/loadData.js"></script>
        <script src="../expenseManagement/control/JSInputValidation.js">
        </script>
        <script src="../expenseManagement/control/JsMadeByLongNA.js"></script>
        <script>
                                                        $(document).ready(function () {
                                                            $('#dataTables-example').DataTable({
                                                                responsive: true
                                                            });
                                                        });
        </script>

    </body>

</html>
