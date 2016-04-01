<?php
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

        <title>Reception</title>

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
                                <a href="javascript:;" data-toggle="collapse" data-target="#demo"> Rooms<i class="fa fa-fw fa-caret-down"></i></a>
                                <ul id="demo" class="collapse">
                                    <li>
                                        <a href="checkroom.php"> Availability</a>
                                    </li>
                                    <li>
                                        <a href="roomdetail.php"> Room Details</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:;" data-toggle="collapse" data-target="#demo2"> Bookings<i class="fa fa-fw fa-caret-down"></i></a>
                                <ul id="demo2" class="collapse">
                                    <li>
                                        <a href="newbooking.php"> New Booking</a>
                                    </li>
                                    <li>
                                        <a href="checkbooking.php"> Check Booking</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="active">
                                <a href="javascript:;" data-toggle="collapse" data-target="#demo3"> Payment<i class="fa fa-fw fa-caret-down"></i></a>
                                <ul id="demo3">
                                    <li>
                                        <a href="guestpay.php"> Guest Payment</a>
                                    </li>
                                    <li>
                                        <a href="checkgusetpay.php">Check Payment</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="guestsearch.php"> Guests</a>
                            </li>
                        </ul>
                    </div>
                    
                </nav>    
                
                <div id="page-wrapper">
                    <div class="container-fluid">
                        <!-- heading-->
                        <div class="row">
                            <div class="col-lg-12">
                                <h1 class="page-header">Guest Payments</h1>
                            </div>
                        </div>
                        
                                <?php
                                    $payID = $_POST['payID'];
                                    $bookinID = $_POST['bookinID'];
                                    $payType  = $_POST['payType'];
                                    
                                    if(isset($_POST['geTbill'])){
                                        $pri1 = mysql_query("select c.price from Booking as a inner join Room as b on a.roomNo=b.roomNo inner join RoomType as c on b.roomTin=c.roomIndex  where a.bookingID='$bookinID'",$server);
                                        $pri = mysql_fetch_array($pri1)["price"];
                                        
                                    }
                                ?>
                        
                        <div class="row">
                            <div class="col-lg-6">
                                <form role="form" action="" method="post">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <label>Payment ID</label>
                                            </div>
                                            <div class="col-lg-6">
                                                <input class="form-control" name="payID">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-2">
                                                <label>Guest ID</label>
                                            </div>
                                            <div class="col-lg-2">
                                                <input class="form-control" name="gID">
                                            </div>
                                        </div>
                                    </div> -->
                                     <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <label>Booking ID</label>
                                            </div>
                                            <div class="col-lg-6">
                                                <input class="form-control" name="bookinID">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <label>Pay Method</label>  
                                            </div>
                                            <div class="col-lg-6">
                                                <select class="form-control" name="payType">
                                                    <option value="cash">Cash</option>
                                                    <option value="cheq">Cheque</option>
                                                    <option value="wire">Wire Transfer</option>
                                                    <option value="card">Credit Card</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <label>Amount</label>
                                            </div>
                                            <div class="col-lg-4">
                                                <label><?php echo $pri; ?></label>
                                            </div>
                                            <div class="col-lg-2">
                                                <input type="submit" class="btn btn-default" value="Get Amount" name="geTbill"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-4"></div>
                                            <div class="col-lg-6 pull-right">
                                                <button type="reset" class="btn btn-default">Reset</button>
                                                <input type="submit" class="btn btn-default" value="Submit" name="pay" />
                                            </div>
                                        </div>
                                    </div>
                                </form>


                                <?php
                                    $payID = $_POST['payID'];
                                    $bookinID = $_POST['bookinID'];
                                    $payType  = $_POST['payType'];
                                    
                                    if(isset($_POST['pay'])){
                                        $pay1 = mysql_query("insert into Gpayment values
('$payID','$bookinID','$payType',now(),(select c.price 
from 
Booking as a 
inner join Room as b on a.roomNo=b.roomNo 
inner join RoomType as c on b.roomTin=c.roomIndex  
where a.bookingID='$bookinID'));",$server);
                                    }
                                ?>
                            </div>

                            <?php
                                $alert = mysql_query("select count(a.bookingID) from Booking as a where a.bookingID not in (select bookingID from Booking where bookingID<now())");
                                $alert1 = mysql_fetch_array($alert);
                                  
                            ?>
                            <div class="col-lg-4 pull-right">
                                    
                                    <div class="panel panel-red">
                                        <div class="panel-heading">
                                            <div class="row">
                                                <div class="col-xs-3">
                                                    <i class="fa fa-support fa-5x"></i>
                                                </div>
                                                <div class="col-xs-9 text-right">
                                                    <div class="huge"><?php echo $alert1[0]; ?></div>
                                                    <div>Awaits to Pay!</div>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="checkgusetpay.php">
                                            <div class="panel-footer">
                                                <span class="pull-left">View Details</span>
                                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                                <div class="clearfix"></div>
                                            </div>
                                        </a>
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