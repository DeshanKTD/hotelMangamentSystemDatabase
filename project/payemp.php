<?php
    mysql_close();
    session_start();
    if(!isset($_SESSION["login_user"])){
      header('Location: logout.php'); // Redirecting To Home Page
    }

    $server = mysql_connect("localhost", "root", "1361"); 
    $db = mysql_select_db("HOTEL", $server); 
?>


    <!DOCTYPE html>

    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Admin</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/sb-admin.css" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="css/plugins/morris.css" rel="stylesheet">

        <!-- Custom Fonts -->
         <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    </head>




    <body>
            <div id="wrapper">
                <!--top navigation bar-->
                <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                    
                    <!-- get group for headers-->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle"  data-toggle="collapse" data-target=".navbar-ex1-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button> 
                        <a class="navbar-brand" href=#><?php echo $_SESSION["current_user"]; ?></a>
                    </div>

                    <ul class="nav navbar-right top-nav">
                        <li>
                        <a href="logout.php" class=""><i class="fa fa-user"></i> Logout </a>
                        
                        </li>
                    </ul>
                    
                <!-- side navigation bar-->
                    
                    <div class="collapse navbar-collapse navbar-ex1-collapse">
                        <ul class="nav navbar-nav side-nav">
                            <li>
                                <a href="javascript:;" data-toggle="collapse" data-target="#demo"> Employee<i class="fa fa-fw fa-caret-down"></i></a>
                                <ul id="demo" class="collapse">
                                    <li>
                                        <a href="veiwemp.php"> View</a>
                                    </li>
                                    <li>
                                        <a href="editemp.php"> Edit</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="active">
                                <a href="javascript:;" data-toggle="collapse" data-target="#demo2">Payment<i class="fa fa-fw fa-caret-down"></i></a>
                                <ul id="demo2">
                                    <li>
                                        <a href="payemp.php">Pay</a>
                                    </li>
                                    <li>
                                        <a href="emppaydetail.php"> Pay Details</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:;" data-toggle="collapse" data-target="#demo3"> Rooms<i class="fa fa-fw fa-caret-down"></i></a>
                                <ul id="demo3" class="collapse">
                                    <li>
                                        <a href="viewrooms.php"> View</a>
                                    </li>
                                    <li>
                                        <a href="editrooms.php">Edit</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="admin.php"> Admin</a>
                            </li>
                            <li>
                                <a href="reception.php">Reception</a>
                            </li>
                        </ul>
                    </div>
                    
                </nav>    
                
                <div id="page-wrapper">
                    <div class="container-fluid">
                        <!-- heading-->
                        <div class="row">
                            <div class="col-lg-12">
                                <h1 class="page-header">Pay Employee</h1>
                            </div>
                        </div>
<!--                        pay all panel-->
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <h4 class="panel-title">Pay All Salary</h4>
                            </div>
                            
                            <div class="panel-body">
                                <form role="form" action="" method="post">
                                    <div class="row">
                                        <div class="col-lg-2">Select Group</div>
                                        <div class="col-lg-2">
                                            <select class="form-control" name="pay_sel">
                                                <option value="all">All</option>
                                                <option value="1">position 1</option>
                                                <option value="2">position 2</option>
                                                <option value="3">position 3</option>
                                                <option value="4">position 4</option>
                                                <option value="5">position 5</option>
                                                <option value="6">position 6</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-2">
                                            <input type="submit"  class="btn btn-success" value="Pay Salary" name="pay"/>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <?php
                             if(isset($_POST['pay'])){   
                                $option = $_POST['pay_sel'];
                                if($option=="all"){
                                    $query = mysql_query("select hotelID,salary from Employee",$server);
                                }
                                else{
                                    $query = mysql_query("select hotelID,salary from Employee where position='$option'",$server);
                                }
                                //echo $query;

                                while ($row = mysql_fetch_array($query)) {
                                    $hid = $row[hotelID];
                                    $sal = $row[salary];
                                    $payQ = mysql_query("insert into Epayment (hotelID,ePayDate,ePayAmount) values ('$hid',now(),$sal)",$server);
                                    
                               }
                            }

                        ?>
                        
<!--                        special pay-->
                        <div class="panel panel-warning">
                            <div class="panel-heading">
                                <h4 class="panel-title">Pay Special</h4>
                            </div>
                            
                            <div class="panel-body">
                                <form role="form" action="" method="post">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-2">Employee ID</div>
                                            <div class="col-lg-2">
                                                <input class="form-control" name="empID">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-2">Amount</div>
                                            <div class="col-lg-2">
                                                <input class="form-control" name="amount">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-lg-2"></div>
                                        <div class="col-lg-2">
                                            <button type="reset" class="btn btn-default">Reset</button>
                                            <input type="submit" class="btn btn-warning" value="Pay" name="sPay"/>
                                            
                                        </div>
                                    </div>
                                </form>

                                <?php
                                    if(isset($_POST['sPay'])){
                                        $empID = $_POST['empID'];
                                        $amount = $_POST['amount'];
                                        $pays = mysql_query("insert into Epayment (hotelID,ePayDate,ePayAmount) values ('$empID',now(),$amount)",$server);
                                    }

                                ?>
                                    

                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>

            <!-- jQuery -->
        <script src="js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>

        <!-- Morris Charts JavaScript -->
        <script src="js/plugins/morris/raphael.min.js"></script>
        <script src="js/plugins/morris/morris.min.js"></script>
        <script src="js/plugins/morris/morris-data.js"></script>

    </body>


    </html>