<?php
    session_start();
    if(!isset($_SESSION["login_user"])){
      header('Location: logout.php'); // Redirecting To Home Page
    }

    $server = mysql_connect("localhost", "root", "1361"); 
    $db = mysql_select_db("HOTEL", $server); 
    $query = mysql_query("SELECT concat_ws(' ',eFname,eLname) as 'name',hotelID,NIC,position,concat_ws(',',eAddNo,eAdd1,eAdd2,eCity) as 'add',salary,eBacnt FROM Employee"); 

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
                        <a class="navbar-brand" href=#><?php echo $_SESSION["current_user"];?></a>
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
                                <a href="javascript:;" data-toggle="collapse" data-target="#demo"> Employee<i class="fa fa-fw fa-caret-down"></i></a>
                                <ul id="demo">
                                    <li>
                                        <a href="veiwemp.php"> View</a>
                                    </li>
                                    <li>
                                        <a href="editemp.php"> Edit</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:;" data-toggle="collapse" data-target="#demo2">Payment<i class="fa fa-fw fa-caret-down"></i></a>
                                <ul id="demo2" class="collapse">
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
                                <h1 class="page-header">Employee Details</h1>
                            </div>
                        </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">Filter by</h4>
                                </div>
                                    <div class="panel-body">
                                    <form role="form" action="" method="post">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-2">Employee ID</div>
                                                <div class="col-lg-2">
                                                    <input class="form-control" name="emID">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-2">Position</div>
                                                <div class="col-lg-2">
                                                    <select class="form-control" name="sel_position">
                                                        <option value="1">position 1</option>
                                                        <option value="2">position 2</option>
                                                        <option value="3">position 3</option>
                                                        <option value="4">position 4</option>
                                                        <option value="5">position 5</option>
                                                        <option value="6">position 6</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-2"></div>
                                                <div class="col-lg-2">
                                                    <input class="btn btn-default" type="submit" name="search"value="Search"/>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                    <?php
                                        $option = $_POST['sel_position'];
                                        $eID = $_POST['emID'];


                                        if(!empty($_POST['emID'])){
                                            $query2 = mysql_query("SELECT concat_ws(' ',eFname,eLname) as 'name',hotelID,NIC,position,concat_ws(',',eAddNo,eAdd1,eAdd2,eCity) as 'add',
                                                salary,eBacnt FROM Employee where hotelID='$eID'"); 
                                        }
                                        else{
                                            $query2 = mysql_query("SELECT concat_ws(' ',eFname,eLname) as 'name',hotelID,NIC,position,concat_ws(',',eAddNo,eAdd1,eAdd2,eCity) as 'add',
                                                salary,eBacnt FROM Employee where position='$option'"); 
                                        }

                                    ?>

                                </div>

                            </div>
                        </div>
                    </div>
                    
                     <!--table to display data-->
                        <div class="row">
                            <div class="col-lg-12">
                                <!--get data from database-->
                                <table class="table table-bordered table-hover table-stripped">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Employee ID</th>
                                            <th>NIC</th>
                                            <th>Position</th>
                                            <th>Address</th>
                                            <th>Salary</th>
                                            <th>Bank Account</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            <tr>
                                            <?php

                                                if(!isset($_POST[emID])){
                                                   while ($row = mysql_fetch_array($query)) {
                                                       echo "<tr>";
                                                       echo "<td>".$row[name]."</td>";
                                                       echo "<td>".$row[hotelID]."</td>";
                                                       echo "<td>".$row[NIC]."</td>";
                                                       echo "<td>".$row[position]."</td>";
                                                       echo "<td>".$row[add]."</td>";
                                                       echo "<td>".$row[salary]."</td>";
                                                       echo "<td>".$row[eBacnt]."</td>";
                                                       echo "</tr>";
                                                   }
                                                }
                                                else{
                                                     while ($row = mysql_fetch_array($query2)) {
                                                       echo "<tr>";
                                                       echo "<td>".$row[name]."</td>";
                                                       echo "<td>".$row[hotelID]."</td>";
                                                       echo "<td>".$row[NIC]."</td>";
                                                       echo "<td>".$row[position]."</td>";
                                                       echo "<td>".$row[add]."</td>";
                                                       echo "<td>".$row[salary]."</td>";
                                                       echo "<td>".$row[eBacnt]."</td>";
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