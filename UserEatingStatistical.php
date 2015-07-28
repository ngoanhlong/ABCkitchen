<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Thống kê thanh toán</title>

        <!-- Bootstrap Core CSS -->
        <link href="adminPage/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->  
        <link href="adminPage/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

        <!-- DataTables CSS -->
        <link href="adminPage/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

        <!-- DataTables Responsive CSS -->
        <link href="adminPage/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="adminPage/dist/css/sb-admin-2.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="adminPage/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <script src="adminPage/js/angular.min.js">
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
            
        ?>

        <div id="wrapper">

            <div class="container" >
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Thống kê thanh toán</h1>
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
                                        
                                        <input class="form-control" type="text" id="searchDish" onkeyup="loadExpenseData(1, this.value, '')"/>
                                        <span class="glyphicon glyphicon-search"></span>
                                        
                                    </div>



                                </div>


                            </div>
                            
                            <!-- /.panel-heading -->
                            <div class="panel-body">

                                <div class="dataTable_wrapper" id="loadExpenseData">

                            </div>



                                <!-- /.table-responsive -->
                                <div class="well">
                                    
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
        <script src="adminPage/bower_components/jquery/dist/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="adminPage/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="adminPage/bower_components/metisMenu/dist/metisMenu.min.js"></script>

        <!-- DataTables JavaScript -->
        <script src="adminPage/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
        <script src="adminPage/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="adminPage/dist/js/sb-admin-2.js"></script>


        <!-- Page-Level Demo Scripts - Tables - Use for reference -->
        <!--Create ajax to load dish data-->
        <script src="UserEatingStatistical/control/loadData.js"></script>
        <script src="UserEatingStatistical/control/JSInputValidation.js">
        </script>
        <script src="UserEatingStatistical/control/JsMadeByLongNA.js"></script>
        <script>
                                                        $(document).ready(function () {
                                                            $('#dataTables-example').DataTable({
                                                                responsive: true
                                                            });
                                                        });
        </script>

    </body>

</html>
