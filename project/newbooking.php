 <?php
    session_start();
    if(!isset($_SESSION["login_user"])){
      header('Location: logout.php'); // Redirecting To Home Page
    }

    $server = mysql_connect("localhost", "root", "1361"); 
    $db = mysql_select_db("HOTEL", $server); 
    $maxBookget = mysql_query("select max(gIndex) as current from Guest",$server);
    $maxBookID = mysql_fetch_array($maxBookget);
    $rec = $_SESSION["login_user"];
    $book=mysql_fetch_array(mysql_query("select bookingID from Booking where gIndex=(select max(gIndex) from Booking)",$server));
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
                                <h1 class="page-header">New Booking</h1>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-lg-6">
                                 <!--creating body-->
                                <form role="form" action="" method="post">

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-4"><label>Guest ID</label></div>
                                        <div class="col-lg-6"><input type="text" class="form-control" name="guestID" placeholder="Latest GuestID: <?php echo $maxBookID['current']?>"/></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-4"></div>
                                        <div class="col-lg-6"><button type="button" class="btn btn-default pull-right" data-toggle="modal" data-target="#myModal">Add Guest</button></div>
                                    </div>
                                </div>

                                 <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-4"><label>Booking ID</label></div>
                                        <div class="col-lg-6">
                                           <!--  <?php echo $maxBookID?>; -->
                                            <input class="form-control" type="text" name="bookID" placeholder="Current BookID: <?php echo $book['bookingID'];?>"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-4"><label>Room Number</label></div>
                                        <div class="col-lg-6">
                                            <select class="form-control" name="sRoom"/>
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
                                        <div class="col-lg-4"><label>Date</label></div>
                                        <div class="col-lg-6"><input class="form-control" name="date"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-4"><label>Nights</label></div>
                                        <div class="col-lg-6"><input class="form-control" name="night"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-4"></div>
                                        <div class="col-lg-4"><input type="submit" class="btn btn-default" value="Confirm" name="make"/>
                                        <button type="reset" class="btn btn-danger">Reset</button></div>
                                    </div>
                                </div>
                                </form>

                            </div>

                            <?php
                                
                                if(isset($_POST['make'])){
                                        $guestID = $_POST['guestID'];
                                        $bookID  = $_POST['bookID'];
                                        $sRoom  =  $_POST['sRoom'];
                                        $bookDate = $_POST['date'];
                                        $night  = $_POST['night'];

                                        //echo $sRoom;
                                        //roomNo should get from roomIndex
                                      $make = mysql_query("insert into Booking values ('$bookID','$guestID',$bookDate,now(),'$sRoom','$rec',$night)",$server);
                                        
                                      for ($x = 0; $x <= $night; $x++) {
                                          mysql_query("insert into YDate values ((date_add('$bookDate',interval $x day)),'$sRoom')",$server);
                                      } 
                                }
                            ?>
                             <?php
                                        $bookings = mysql_query("select count(bookingID) as Count from Booking where bookDate>now()",$server);
                                        $bookingC = mysql_fetch_array($bookings);

                            ?>
                            <div class="col-lg-6">
                                    
                                    <div class="panel panel-green">
                                        <div class="panel-heading">
                                            <div class="row">
                                                <div class="col-xs-3">
                                                    <i class="fa fa-tasks fa-5x"></i>
                                                </div>
                                                <div class="col-xs-9 text-right">
                                                    <div class="huge"><?php echo $bookingC[0]; ?></div>
                                                    <div>Total Bookings Ahead!</div>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="#">
                                            <a href="checkbooking.php">
                                            <div class="panel-footer">
                                                <span class="pull-left">View Details</span>
                                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                                <div class="clearfix"></div>
                                            </div>
                                            </a>
                                        </a>
                                    </div>
                                   
                    
                                  
                            </div>
                        </div>
                        
                        <!--pop up model-->
                        <div class="modal fade  bs-example-modal-md" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myModalLabel">Enter Guest Detail</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form role="form" action="" method="post">
                                            <div class="row">
                                                <div class="col-lg-8">
                                                    <div class="form-group">
                                                        <label>First Name</label>
                                                        <input class="form-control" name="gFname">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Last Name</label>
                                                        <input class="form-control" name="gLname">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Address 1</label>
                                                        <input class="form-control" name="gAdd1">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Address 2</label>
                                                        <input class="form-control" name="gAdd2">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>City</label>
                                                        <input class="form-control" name="gCity">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Country</label>
                                                        <input class="form-control" name="gCountry">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>email</label>
                                                        <!-- <span class="input-group-addon">@</span> -->
                                                        <input class="form-control" name="gEmail">
                                                        
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Gender</label>
                                                        <div class="radio">
                                                            <label>
                                                                <input type="radio" name="gender" value="male" checked>Male
                                                            </label>
                                                        </div>
                                                        
                                                        <div class="radio">
                                                            <label>
                                                                <input type="radio" name="gender" value="female">Female
                                                            </label>
                                                        </div>
                                                        
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label>Passport Number</label>
                                                        <input class="form-control" name="gPassport">
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                <button type="reset" class="btn btn-default">Reset</button> 
                                                <input type="submit" class="btn btn-primary" value="Confirm" name="addGuest" />
                                            </div>
                                        </form>

                                        <?php 
                                            if(isset($_POST['addGuest'])){
                                                $gFname = $_POST['gFname'];
                                                $gLname = $_POST['gLname'];
                                                $gAdd1  = $_POST['gAdd1'];
                                                $gAdd2  = $_POST['gAdd2'];
                                                $gCity  = $_POST['gCity'];
                                                $gCountry = $_POST['gCountry'];
                                                $gEmail = $_POST['gEmail'];
                                                $gender = $_POST['gender'];
                                                $gPassport = $_POST['gPassport'];

                                                $addG = mysql_query("insert into Guest (gFname,gLname,gGender,country,email,passport,gAdd1,gAdd2,gCity) 
                                                                    values ('$gFname','$gLname','$gender','$gCountry','$gEmail','$gPassport','$gAdd1','$gAdd2','$gCity')",$server);
                                            }
                                        ?>
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