<?php
    session_start();
    if(!isset($_SESSION["login_user"])){
      header('Location: logout.php'); // Redirecting To Home Page
    }

    $server = mysql_connect("localhost", "root", "1361"); 
    $db = mysql_select_db("HOTEL", $server); 
    $query = mysql_query("select concat_ws(' ',gFname,gLname) as Name,gIndex,country,passport from Guest");

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
                        <a href="login.html" class=""><i class="fa fa-user"></i> Logout </a>
                        
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
                            <li class="active">
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
                                <h1 class="page-header">Guest Search</h1>
                            </div>
                        </div>
                        
                        <!--get data to form-->
                        <div class="row">
                            <div class="col-lg-4">
                                <form role="form" action="" method="post">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-6">First Name</div>
                                            <div class="col-lg-6">
                                                <input class="form-control" name="fname">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-6">Last Name</div>
                                            <div class="col-lg-6">
                                                <input class="form-control" name="lname">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-6">Country</div>
                                            <div class="col-lg-6">
                                                <input class="form-control" name="country">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-6">Passport</div>
                                            <div class="col-lg-6">
                                                <input class="form-control" name="pass">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-6">Guest ID</div>
                                            <div class="col-lg-6">
                                                <input class="form-control" name="gID">
                                            </div>
                                        </div>
                                    </div>
                                    

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-3"></div>
                                            <div class="col-lg-3">
                                                <button type="submit" class="btn btn-default" name="search">Search</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                                <?php
                                    $fname = $_POST['fname'];
                                    $lname = $_POST['lname'];
                                    $country = $_POST['country'];
                                    $pass  = $_POST['pass'];
                                    $gID   = $_POST['gID'];

                                    if (isset($_POST['search'])) {
                                        # code...
    
                                        if(!empty($gID)){
                                             $query = mysql_query("select concat_ws(' ',gFname,gLname) as Name,gIndex,country,passport from Guest where gIndex='$gID'");
                                        }
                                        elseif ((!empty($pass)) and (!empty($country))) {
                                             $query = mysql_query("select concat_ws(' ',gFname,gLname) as Name,gIndex,country,passport from Guest where country='$country' and passport='$pass'");
                                            # code...
                                        }
                                        elseif (!empty($fname) and !empty($country) and !empty($lname)) {
                                            # code...
                                             $query = mysql_query("select concat_ws(' ',gFname,gLname) as Name,gIndex,country,passport from Guest where gFname='$fname' and gLname='$lname' and country='$country'");
                                        }
                                        elseif (!empty($fname) and !empty($country)) {
                                            # code...
                                            $query = mysql_query("select concat_ws(' ',gFname,gLname) as Name,gIndex,country,passport from Guest where gFname='$fname' and country='$country'");
                                        }
                                        elseif (!empty($lname) and !empty($country)) {
                                            # code...
                                            $query = mysql_query("select concat_ws(' ',gFname,gLname) as Name,gIndex,country,passport from Guest where gLname='$lname' and country='$country'");
                                        }
                                        elseif (!empty($fname) and !empty($lname)) {
                                            # code...
                                            $query = mysql_query("select concat_ws(' ',gFname,gLname) as Name,gIndex,country,passport from Guest where gFname='$fname' and gLname='$lname'");
                                        }
                                        elseif (!empty($fname) ) {
                                            # code...
                                            $query = mysql_query("select concat_ws(' ',gFname,gLname) as Name,gIndex,country,passport from Guest where gFname='$fname'");
                                        }
                                        elseif (!empty($lname) ) {
                                            # code...
                                            $query = mysql_query("select concat_ws(' ',gFname,gLname) as Name,gIndex,country,passport from Guest where gLname='$lname'");
                                        }
                                        elseif (!empty($country) ) {
                                            # code...
                                            $query = mysql_query("select concat_ws(' ',gFname,gLname) as Name,gIndex,country,passport from Guest where country='$country'");
                                        }
                                    }

                                ?>
                            </div>
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <!--get data from database-->
                                        <table class="table table-bordered table-hover table-stripped">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Guest ID</th>
                                                    <th>Country</th>
                                                    <th>Passport</th>   
                                                </tr>
                                            </thead>
                                            <tbody>
                                                  </tr>

                                                    <?php
                                                       while ($row = mysql_fetch_array($query)) {
                                                           echo "<tr>";
                                                           echo "<td>".$row[Name]."</td>";
                                                           echo "<td>".$row[gIndex]."</td>";
                                                           echo "<td>".$row[country]."</td>";
                                                           echo "<td>".$row[passport]."</td>";
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