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
                                <h1 class="page-header">Employee Payment Detail</h1>
                            </div>
                        </div>

        <!--                        pay all panel-->
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="paenl-title">Search by Date</h4>
                                        </div>
                                        <div class="panel-body">
                                             <form role="form" id="chekbookindate" action="" method="post">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-lg-4"><label>   From</label></div>
                                                        <div class="col-lg-6"><input class="form-control" name="start"></div>
                                                    </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-lg-4"><label>   To</label></div>
                                                        <div class="col-lg-6"><input class="form-control" name="end"></div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-lg-8"></div>
                                                        <div class="col-lg-2">
                                                            <input type="submit" class="btn btn-default" value="Search" name="searchDate" />
                                                        </div>
                                                    </div>    
                                                </div>
                                            </form>

                                            <?php
                                                
                                                    $start = $_POST['start'];
                                                    $end   = $_POST['end'];

                                                    $queryD = mysql_query("select hotelID,ePayAmount,ePayDate from Epayment where ePayDate>=$start and ePayDate<=$end",$server);
                                                
                                            ?>

                                        </div>
                                    </div>
                                </div>

                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">Search by Employee ID</h4>
                                        </div>

                                        <div class="panel-body">
                                             <form role="form" action="" method="post">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-lg-4"><label>   Employee ID</label></div>
                                                        <div class="col-lg-5"><input class="form-control" name="empID"></div>
                                                        <div class="col-lg-2">
                                                            <input type="submit" class="btn btn-default" value="Search" name="searchID"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>

                                            <?php
                                                $empID = $_POST['empID'];
                                                $queryID = mysql_query("select hotelID,ePayAmount,ePayDate from Epayment where hotelID='$empID'",$server);
                                            ?>

                                        </div>
                                </div>
                            </div>
                        
                        <!--table creation  -->
                            <div class="col-lg-7">
                                <div class="row">
                                    
                                    <div class="col-lg-12">
                                        <!--get data from database-->
                                        <table class="table table-bordered table-hover table-stripped">
                                            <thead>
                                                <tr>
                                                    <th>Employee ID</th>
                                                    <th>Amount</th>
                                                    <th>Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                <?php
                                                if(isset($_POST['searchDate'])){
                                                   while ($row = mysql_fetch_array($queryD)) {
                                                       echo "<tr>";
                                                       echo "<td>".$row[hotelID]."</td>";
                                                       echo "<td>".$row[ePayAmount]."</td>";
                                                       echo "<td>".$row[ePayDate]."</td>";
                                                       echo "</tr>";
                                                   }
                                                }
                                                else{
                                                     while ($row = mysql_fetch_array($queryID)) {
                                                       echo "<tr>";
                                                       echo "<td>".$row[hotelID]."</td>";
                                                       echo "<td>".$row[ePayAmount]."</td>";
                                                       echo "<td>".$row[ePayDate]."</td>";
                                                       echo "</tr>";
                                                   }
                                                }

                                            ?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
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