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
                            <li class="active">
                                <a href="javascript:;" data-toggle="collapse" data-target="#demo2"> Bookings<i class="fa fa-fw fa-caret-down"></i></a>
                                <ul id="demo2">
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
                                <h1 class="page-header">Booking Details</h1>
                            </div>
                        </div>
                            
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="paenl-title">Search by Date and Room Type</h4>
                                </div>
                                <div class="panel-body">
                                     <form role="form" id="chekbookindate" action="" method="post">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-1"><label>   From</label></div>
                                                <div class="col-lg-3"><input class="form-control" name="start"></div>
                                                <div class="col-lg-1"><label>   To</label></div>
                                                <div class="col-lg-3"><input class="form-control" name="end"></div>
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <div class="row">

                                                <div class="col-lg-1">
                                                    <label>Room Number</label>
                                                </div>
                                                <div class="col-lg-3">  
                                                    <select class="form-control" name="roomNo">
                                                        <option value="all">All</option>>
                                                        <?php
                                                            $alltype = mysql_query("select a.roomNo,b.roomType from Room as a inner join RoomType as b on a.roomTin=b.roomIndex",$server);
                                                            //$sql = mysql_query("SELECT username FROM users");
                                                            while ($row = mysql_fetch_array($alltype)){
                                                                echo '<option value="'.$row['roomIndex'].'">'.$row['roomNo'].' '.$row['roomType'].'</option>';
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                             </div>
                                         </div>
                                         <div class="row">
                                            <div class="col-lg-6"></div>
                                            <div class="col-lg-5">
                                                <button type="reset" class="btn btn-default">Reset</button>
                                                <input type="submit" class="btn btn-default" value="Search" name="searchRoom" />
                                            </div>
                                         </div>

                                    </form>

                                    <?php
                                        if(isset($_POST['searchRoom'])){
                                            $start = $_POST['start'];
                                            $end   = $_POST['end'];
                                            $roomNo = $_POST['roomNo'];
                                            if($roomNo='All'){
                                               $query = mysql_query("select a.bookingID,a.gIndex,a.roomNo,c.price,a.bookDate, 
                                                (select date_add(a.bookDate,interval a.bookNights day)) as endDate 
                                                from Booking as a inner join Room as b on a.roomNo=b.roomNo
                                                inner join RoomType as c on b.roomTin=c.roomIndex 
                                                where a.bookDate>='$start1' and a.bookDate<='$end'",$server);
                                            }
                                            else{
                                                $query = mysql_query("select a.bookingID,a.gIndex,a.roomNo,c.price,a.bookDate, 
                                                (select date_add(a.bookDate,interval a.bookNights day)) as endDate 
                                                from Booking as a inner join Room as b on a.roomNo=b.roomNo
                                                inner join RoomType as c on b.roomTin=c.roomIndex 
                                                where a.bookDate>='$start1' and a.bookDate<='$end' and a.roomNo='$roomNo'",$server);
                                            }


                                        }
                                    ?>
                                </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">Search by Guest ID</h4>
                            </div>
                            <div class="panel-body">
                                <form role="form" id="booksguestid" action="" method="post">
                                    <div class="row">
                                        <div class="col-lg-1">
                                            <label>GustID</label>
                                        </div>
                                        <div class="col-lg-3">
                                            <input class="form-control" name="gID">
                                        </div>
                                        <div class="col-lg-2">
                                            <input type="submit" class="btn btn-default" value="Search" name="searchG"/>
                                        </div>
                                    </div>
                                </form>
                                <?php
                                    if(isset($_POST['searchG'])){
                                        $gID = $_POST['gID'];

                                        $query = mysql_query("select a.bookingID,a.gIndex,a.roomNo,c.price,a.bookDate, 
                                                (select date_add(a.bookDate,interval a.bookNights day)) as endDate 
                                                from Booking as a inner join Room as b on a.roomNo=b.roomNo
                                                inner join RoomType as c on b.roomTin=c.roomIndex 
                                                where a.gIndex='$gID'",$server);
                                    }
                                ?>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-lg-1"></div>
                            <div class="col-lg-10">
                                <!--get data from database-->
                                <table class="table table-bordered table-hover table-stripped">
                                    <thead>
                                        <tr>
                                            <th>Booking ID</th>
                                            <th>Guest ID</th>
                                            <th>Room Number</th>
                                            <th>Current Bill</th>
                                            <th>Check in</th>
                                            <th>Check out</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                     <?php
                                           while ($row = mysql_fetch_array($query)) {
                                               echo "<tr>";
                                               echo "<td>".$row[bookingID]."</td>";
                                               echo "<td>".$row[gIndex]."</td>";
                                               echo "<td>".$row[roomNo]."</td>";
                                               echo "<td>".$row[price]."</td>";
                                               echo "<td>".$row[bookDate]."</td>";
                                               echo "<td>".$row[endDate]."</td>";
                                               echo "</tr>";
                                           }
                                        //echo $query;
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