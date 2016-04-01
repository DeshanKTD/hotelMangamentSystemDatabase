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
                            <li class="active">
                                <a href="javascript:;" data-toggle="collapse" data-target="#demo3"> Rooms<i class="fa fa-fw fa-caret-down"></i></a>
                                <ul id="demo3">
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
                                <h1 class="page-header">Add or Edit Rooms</h1>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-lg-6">
                                
                                 <div class="panel panel-success">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">Add a Room Type</h4>
                                    </div>
                                     
                                    <div class="panel-body">
                                        <form role="form" action="" method="post">
                                             <div class="form-group">
                                                <div class="row">
                                                    <div class="col-lg-4">New Room Type</div>
                                                    <div class="col-lg-6">
                                                        <input class="form-control" name="type">
                                                    </div>
                                                </div>
                                            </div>
<!-- 
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-lg-4">No of Rooms</div>
                                                    <div class="col-lg-6">
                                                        <input class="form-control" name="amount">
                                                    </div>
                                                </div>
                                            </div> -->
                                            
                                            
                                             <div class="form-group">
                                                <div class="row">
                                                    <div class="col-lg-4">Rate</div>
                                                    <div class="col-lg-4">
                                                        <input class="form-control" name="rate">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row">
                                                <div class="col-lg-4"></div>
                                                <div class="col-lg-5">
                                                    <button type="reset" class="btn btn-default">Reset</button>
                                                    <input type="Submit" class="btn btn-default" value="Add" name="makeType"/>
                                                </div>
                                            </div>
                                            
                                        </form> 

                                        <?php
                                            if(isset($_POST['makeType'])){
                                                $type = $_POST['type'];
                                                $rate = $_POST['rate'];
                                                //$amount =$_POST['amount'];

                                                $qtype = mysql_query("insert into RoomType (roomType,price) values ('$type',$rate)",$server);
                                              
                                            }    

                                        ?>
                                    </div>
                                </div>
                                
                                <div class="panel panel-success">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">Add a Room</h4>
                                    </div>
                                    
                                    <div class="panel-body" id="paneladd">
                                        <form role="form" action="" method="post">    
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-lg-4">Room Type</div>
                                                    <div class="col-lg-4">
                                                         <select class="form-control" name="typeSelect">
                                                        <?php
                                                            $alltype = mysql_query("select roomType,roomIndex from RoomType",$server);
                                                            //$sql = mysql_query("SELECT username FROM users");
                                                            while ($row = mysql_fetch_array($alltype)){
                                                                echo '<option value="'.$row['roomIndex'].'">'.$row['roomType'].'</option>';
                                                            }
                                                        ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-lg-4">Room Number</div>
                                                    <div class="col-lg-4">
                                                        <input class="form-control" name="roomNo">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-lg-4">Room Name</div>
                                                    <div class="col-lg-4">
                                                        <input class="form-control" name="rName">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row">
                                                <div class="col-lg-4"></div>
                                                <div class="col-lg-5">
                                                    <button type="reset" class="btn btn-default">Reset</button>
                                                    <input type="Submit" class="btn btn-default" value="Add" name="addroom">
                                                </div>
                                            </div>
                                        </form>

                                        <?php
                                             if(isset($_POST['addroom'])){   
                                                $roomT = $_POST['typeSelect'];
                                                $roomNo = $_POST['roomNo'];
                                                $rName  = $_POST['rName'];

                                                $adDroom = mysql_query("insert into Room values ('$roomNo','$roomT','$rName')",$server);
                                                $countroom = mysql_query("select count(roomTin) as ct from Room where roomTin=$roomT",$server);
                                                $row1 = mysql_fetch_array($countroom);
                                                $countR = $row1['ct'];
                                                $udpdatec = mysql_query("update RoomType set rAmount=$countR where roomIndex=$roomT",$server);
                                            }

                                        ?>

                                    </div>
                                </div>
                            </div>
                            
                            
                            <div class="col-lg-6">
                                <div class="panel panel-warning">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">Edit Room Type</h4>
                                    </div>
                                    
                                    <div class="panel-body">
                                        <form role="form" action="" method="post">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-lg-4">Room Type</div>
                                                    <div class="col-lg-4">
                                                        <select class="form-control" name="typeSelect2">
                                                        <?php
                                                            $alltype = mysql_query("select roomType,roomIndex from RoomType",$server);
                                                            //$sql = mysql_query("SELECT username FROM users");
                                                            while ($row = mysql_fetch_array($alltype)){
                                                                echo '<option value="'.$row['roomIndex'].'">'.$row['roomType'].'</option>';
                                                            }
                                                        ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-lg-4">Change Name</div>
                                                    <div class="col-lg-4">
                                                        <input class="form-control" name="cnameT">
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- <div class="form-group">
                                                <div class="row">
                                                    <div class="col-lg-4">Change No of rooms</div>
                                                    <div class="col-lg-4">
                                                        <input class="form-control" name="cRamount">
                                                    </div>
                                                </div>
                                            </div> -->
                                            
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-lg-4">Change Rate</div>
                                                    <div class="col-lg-4">
                                                        <input class="form-control" name="cRate">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                             <div class="row">
                                                <div class="col-lg-3"></div>
                                                <div class="col-lg-7">
                                                    <button type="reset" class="btn btn-default">Reset</button>
                                                    <input type="Submit" class="btn btn-warning" value="Change" name="changeType"/>
                                                    <input type="Submit" class="btn btn-danger" value="Remove" name="removeT"/>
                                                </div>
                                            </div>
                                            
                                        </form>

                                        <?php
                                            if(isset($_POST['changeType'])){
                                                $crType = $_POST['typeSelect2'];
                                                $cRate  = $_POST['cRate'];
                                               // $cAmount = $_POST['cRamount'];
                                                $cNameT  = $_POST['cnameT'];



                                                if(!empty($cRate)){
                                                    $updateT2 = mysql_query("update RoomType set price='$cRate' where roomIndex='$crType'",$server);
                                                }
                                                // if(!empty($cAmount)){
                                                //     $updateT3 = mysql_query("update RoomType set rAmount='$cAmount' where roomIndex='$crType'",$server);
                                                // }
                                                if(!empty($cNameT)){
                                                    $updateT1 = mysql_query("update RoomType set roomType='$cNameT' where roomIndex='$crType'",$server);
                                                    //not updating primary key
                                                }
                                               
                                            }

                                            else if(isset($_POST['removeT'])){
                                                $crType = $_POST['typeSelect2'];
                                                $del = mysql_query("delete from RoomType where roomIndex='$crType'",$server);
                                            }
                                        ?>

                                    </div>
                                </div>   
                                
                                <div class="panel panel-warning">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">Edit Room</h4>
                                    </div>
                                    
                                    <div class="panel-body">
                                        <form role="form" action="" method="post">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-lg-4">Room Number</div>
                                                    <div class="col-lg-4">
                                                       <input class="form-control" name="eRoomNo">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-lg-4">Room Type</div>
                                                    <div class="col-lg-4">
                                                       <select class="form-control" name="selectType3">
                                                            <?php
                                                               $alltype = mysql_query("select roomType,roomIndex from RoomType",$server);
                                                                //$sql = mysql_query("SELECT username FROM users");
                                                                while ($row = mysql_fetch_array($alltype)){
                                                                    echo '<option value="'.$row['roomIndex'].'">'.$row['roomType'].'</option>';
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-lg-4">Room Name</div>
                                                    <div class="col-lg-4">
                                                       <input class="form-control" name="eRname">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row">
                                                <div class="col-lg-3"></div>
                                                <div class="col-lg-7">
                                                    <button type="reset" class="btn btn-default">Reset</button>
                                                    <input type="Submit" class="btn btn-warning" value="Change" name="editroom"/>
                                                    <input type="Submit" class="btn btn-danger" value="Remove" name="removeRoom"/>
                                                </div>
                                            </div>
                                            
                                        </form>

                                        <?php
                                            if(isset($_POST['editroom'])){
                                               // $//make changes latere
                                                $eRoomNo = $_POST['eRoomNo'];
                                                $eRtype  = $_POST['selectType3'];
                                                $eRname  = $_POST['eRname'];

                                                if(!empty(eRname)){
                                                    $uproom = mysql_query("update Room set roomName='$eRname' where roomNo='$eRoomNo'",$server);
                                                }
                                                $up = mysql_query("update Room set roomTin='$eRtype' where roomNo='$eRoomNo'",$server);

                                            }

                                            elseif (isset($_POST['removeRoom'])) {
                                                # code...
                                                $eRoomNo = $_POST['eRoomNo'];
                                                $del = mysql_query("delete from Room where roomNo='$eRoomNo'",$server);
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