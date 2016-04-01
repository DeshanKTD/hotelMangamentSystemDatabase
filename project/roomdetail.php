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
                            <li class="active">
                                <a href="javascript:;" data-toggle="collapse" data-target="#demo"> Rooms<i class="fa fa-fw fa-caret-down"></i></a>
                                <ul id="demo">
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
                            <li>
                                <a href="javascript:;" data-toggle="collapse" data-target="#demo3"> Payment<i class="fa fa-fw fa-caret-down"></i></a>
                                <ul id="demo3" class="collapse">
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
                                <h1 class="page-header">Check Room Detail</h1>
                            </div>
                        </div>
                         <?php

                            $roomNo = $_POST['roomNo'];
                            $start  = $_POST['start'];
                            $end    = $_POST['end'];
                            $search = $_POST['search'];

                            if(isset($_POST['search'])){
                                $query = mysql_query("select a.dates,c.price
from YDate as a 
inner join Room as b on a.roomNo=b.roomNo 
inner join RoomType as c on b.roomTin=c.roomIndex  
where a.roomNo='$roomNo' and a.dates>=$start and a.dates<=$end");
                                
                            }

                        ?>
                        <!--room availability buttons-->
                        <form role="form" id="roomavialble" action="" method="post">    
                               
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-2">Room Number</div>
                                        <div class="col-lg-3">
                                            <!--add rooms from database-->
                                            <select class="form-control" name="roomNo">
                                                 <?php
                                                    $alltype = mysql_query("select a.roomNo,b.roomType from Room as a inner join RoomType as b on a.roomTin=b.roomIndex",$server);
                                                            //$sql = mysql_query("SELECT username FROM users");
                                                        while ($row = mysql_fetch_array($alltype)){
                                                            echo '<option value="'.$row['roomNo'].'">'.$row['roomType'].' '.$row['roomNo'].'</option>';
                                                        }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-2">Date From</div>
                                        <div class="col-lg-3"><input class="form-control" name="start"></div>
                                        <div class="col-lg-1">To</div>
                                        <div class="col-lg-3"><input class="form-control" name="end"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-2"></div>
                                        <div class="col-lg-3"><input type="submit" class="btn btn-default" value="Search" name="search" /></div>
                                    </div>    
                                </div>

                        </form>

                       
                        <!--table to display data-->
                        <div class="col-lg-12">
                            <div class="col-lg-2"></div>
                            <div class="col-lg-8">
                                <!--get data from database-->
                                <table class="table table-bordered table-hover table-stripped">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Rate</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                     <?php
                                           while ($row = mysql_fetch_array($query)) {
                                               echo "<tr>";
                                               echo "<td>".$row[dates]."</td>";
                                               echo "<td>".$row[price]."</td>";
                                               echo "</tr>";
                                           }

                                    ?>
                                        
                                    </tbody>
                                </table>
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