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
                                <h1 class="page-header">Edit Employee</h1>
                            </div>
                        </div>
                    
                        <div class="row">
                            <div class="col-lg-12">
                                <button type="button" class="btn btn-primary"  data-toggle="collapse" data-target="#panel1">Add Employee</button>
                                <button type="button" class="btn btn-warning"  data-toggle="collapse" data-target="#panel2">Edit Employee</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a href="javascript:;" data-toggle="collapse" data-target="#panel1">
                                                Add an Employee</a>
                                        </h4>
                                    </div>
                                    <div class="panel-body collapse" id="panel1">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <form role="form" action="" method="post">
                                                     <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-lg-2">Employee ID*</div>
                                                            <div class="col-lg-3">
                                                                <input class="form-control" name="empID">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-lg-2">First Name*</div>
                                                            <div class="col-lg-3">
                                                                <input class="form-control" name="fName">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-lg-2">Middle Name</div>
                                                            <div class="col-lg-3">
                                                                <input class="form-control" name="midName">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-lg-2">Last Name*</div>
                                                            <div class="col-lg-3">
                                                                <input class="form-control" name="lName">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-lg-2">NIC*</div>
                                                            <div class="col-lg-3">
                                                                <input class="form-control" name="nic">
                                                            </div>
                                                        </div>
                                                    </div>
                                                     <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-lg-2">Birthday*</div>
                                                            <div class="col-lg-3">
                                                                <input class="form-control" name="bday">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-lg-2">Street No</div>
                                                            <div class="col-lg-3">
                                                                <input class="form-control" name="StNo">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-lg-2">Address 1</div>
                                                            <div class="col-lg-3">
                                                                <input class="form-control" name="add1">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-lg-2">Address 2</div>
                                                            <div class="col-lg-3">
                                                                <input class="form-control" name="add2">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-lg-2">City*</div>
                                                            <div class="col-lg-3">
                                                                <input class="form-control" name="city">
                                                            </div>
                                                        </div>
                                                    </div>
                                                     <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-lg-2">Postal Code</div>
                                                            <div class="col-lg-3">
                                                                <input class="form-control" name="zip">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-lg-2">Bank Account*</div>
                                                            <div class="col-lg-3">
                                                                <input class="form-control" name="bank">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-lg-2">Position</div>
                                                            <div class="col-lg-3">
                                                                <select class="form-control" name="posi">
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
                                                            <div class="col-lg-2">Gender</div>
                                                            <div class="col-lg-3">
                                                                <label>
                                                                    <input type="radio" name="gender" value="male" checked>Male
                                                                </label>
                                                                <label>
                                                                    <input type="radio" name="gender" value="female">Female 
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-lg-2">Salary</div>
                                                            <div class="col-lg-3">
                                                                <input class="form-control" name="salary">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-lg-3"></div>
                                                            <div class="col-lg-3">
                                                                <button type="reset" class="btn btn-default">Reset</button>
                                                                <input type="submit" class="btn btn-default" name="add" value="Add" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <?php
                            $hotID  =$_POST['empID'];
                            $fName  =$_POST['fName'];
                            $mName  =$_POST['midName'];
                            $lName  =$_POST['lName'];
                            $NIC    = $_POST['nic'];
                            $strNo  =$_POST['StNo'];
                            $add1   =$_POST['add1'];
                            $add2   =$_POST['add2'];
                            $city   =$_POST['city'];
                            $bank   =$_POST['bank'];
                            $position=$_POST['posi'];
                            $gen    =$_POST['gender'];
                            $salary =$_POST['salary'];
                            $bDay   =$_POST['bday'];
                            $zip    =$_POST['zip'];

                            if(empty($_POST['empID'])||empty($_POST['fName'])||empty($_POST['lName'])||empty($_POST['nic'])
                                ||empty($_POST['StNo'])||empty($_POST['city'])||empty($_POST['bank'])||empty($_POST['posi'])
                                ||empty($_POST['gender'])||empty($_POST['salary'])||empty($_POST['bday'])){
                                echo "Fill important fields";
                            }
                            else{

                            if(isset($_POST['add'])){
                                $sql = "insert into Employee values ('$hotID','$fName','$mName','$lName','$NIC','$bDay','$gen','$strNo','$add1','$add2','$city','$zip','$bank',$salary,'$position')";
                                //$sql = "insert into Employee values ('h3002','Amasha','Priyanthi','Perera','905687456V','1990515','female','No 8/2','Digana Road',null,'Pallekele','65721','586987423987',5,30000)";
                                mysql_query($sql,$server);

                            }
                            }
                        

                        ?>
                        <div class="panel panel-warning">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a href="javascript:;" data-toggle="collapse" data-target="#panel2">
                                        Edit an Employee</a>
                                </h4>
                            </div>
                            
                            <div class="panel-body collapse" id="panel2">
                                <form role="form" action="" method="post">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-2">Employee ID</div>
                                            <div class="col-lg-3">
                                                <input class="form-control" value="<?php echo $cempID ?>" placeholder="Enter ID again to confirm" name="cEmpID" type="text"/>
                                            </div>
                                            <div class="col-lg-2">

                                            </div>
                                            <div class="col-lg-2">
                                                <input class="btn btn-default" type="submit" name="search" value="Search"/ >
                                            </div>
                                        </div>
                                    </div>
                                                
                                    <?php
                                      
                                        

                                    if(isset($_POST['search'])){
                                        $chotID  =$_POST['cEmpID'];

                                        //$cempID  ="";

                                        $cufName  =mysql_fetch_assoc(mysql_query("select eFname from Employee where hotelID='$chotID'",$server))["eFname"];
                                        $cumName  =mysql_fetch_assoc(mysql_query("select eMname from Employee where hotelID='$chotID'",$server))["eMname"];                                        $culName  =$_POST['cLname'];
                                        $culName  =mysql_fetch_assoc(mysql_query("select eLname from Employee where hotelID='$chotID'",$server))["eLname"];
                                        $cuNIC    =mysql_fetch_assoc(mysql_query("select NIC from Employee where hotelID='$chotID'",$server))["NIC"];
                                        $custrNo  =mysql_fetch_assoc(mysql_query("select eAddNo from Employee where hotelID='$chotID'",$server))["eAddNo"];
                                        $cuadd1   =mysql_fetch_assoc(mysql_query("select eAdd1 from Employee where hotelID='$chotID'",$server))["eAdd1"];
                                        $cuadd2   =mysql_fetch_assoc(mysql_query("select eAdd2 from Employee where hotelID='$chotID'",$server))["eAdd2"];
                                        $cucity   =mysql_fetch_assoc(mysql_query("select eCity from Employee where hotelID='$chotID'",$server))["eCity"];
                                        $cubank   =mysql_fetch_assoc(mysql_query("select eBacnt from Employee where hotelID='$chotID'",$server))["eBacnt"];
                                        $cuposition=mysql_fetch_assoc(mysql_query("select position from Employee where hotelID='$chotID'",$server))["position"];
                                        $cusalary =mysql_fetch_assoc(mysql_query("select salary from Employee where hotelID='$chotID'",$server))["salary"];
                                        $cubDay   =mysql_fetch_assoc(mysql_query("select eBday from Employee where hotelID='$chotID'",$server))["eBday"];
                                        $cuzip    =mysql_fetch_assoc(mysql_query("select eZip from Employee where hotelID='$chotID'",$server))["eZip"];
                                        $cempID  =$chotID;
                                    }

                                   

                                    if(isset($_POST['change'])){
                                        
                                        $cfName  =$_POST['cFname'];
                                        $cmName  =$_POST['cMname'];
                                        $clName  =$_POST['cLname'];
                                        $cNIC    =$_POST['cNIC'];
                                        $cstrNo  =$_POST['cAddNo'];
                                        $cadd1   =$_POST['cAdd1'];
                                        $cadd2   =$_POST['cAdd2'];
                                        $ccity   =$_POST['cCity'];
                                        $cbank   =$_POST['cBank'];
                                        $cposition=$_POST['cPos'];
                                        $csalary =$_POST['cSalary'];
                                        $cbDay   =$_POST['cBday'];
                                        $czip    =$_POST['zip'];

                                        $chotID  =$_POST['cEmpID'];

                                        if(!empty($_POST['cFname'])){
                                            //$update1 = "update Employee set eFname='$cfName' where hotelID='$cempID'";
                                            $update1 = "update Employee set eFname='$cfName' where hotelID='$chotID'";
                                            mysql_query($update1,$server);
                                        }
                                        if(!empty($_POST['cMname'])){
                                            $update2 = "update Employee set eMname='$cmName' where hotelID='$chotID'";
                                            //$update2 = "update Employee set eMname='Menaka' where hotelID='h1001'";
                                            mysql_query($update2,$server);
                                        }
                                        if(!empty($_POST['cLname'])){
                                            $update3 = "update Employee set eLname='$clName' where hotelID='$chotID'";
                                            mysql_query($update3,$server);
                                        }
                                        if(!empty($_POST['cNIC'])){
                                            $update4 = "update Employee set NIC='$cNIC' where hotelID='$chotID'";
                                            mysql_query($update4,$server);
                                        }
                                        if(!empty($_POST['cAddNo'])){
                                            $update5 = "update Employee set eAddNo='$cstrNo' where hotelID='$chotID'";
                                            mysql_query($update5,$server);
                                        }
                                        if(!empty($_POST['cAdd1'])){
                                            $update6 = "update Employee set eAdd1='$cadd1' where hotelID='$chotID'";
                                            mysql_query($update6,$server);
                                        }
                                        if(!empty($_POST['cAdd2'])){
                                            $update7 = "update Employee set eAdd2='$cadd2' where hotelID='$chotID'";
                                            mysql_query($update7,$server);
                                        }
                                        if(!empty($_POST['cCity'])){
                                            $update8 = "update Employee set eCity='$ccity' where hotelID='$chotID'";
                                            mysql_query($update8,$server);
                                        }
                                        if(!empty($_POST['cBank'])){
                                            $update9 = "update Employee set eBacnt='$cbank' where hotelID='$chotID'";
                                            mysql_query($update9,$server);
                                        }
                                        if(!empty($_POST['cPos'])){
                                            $update10 = "update Employee set position='$cposition' where hotelID='$chotID'";
                                            mysql_query($update10,$server);
                                        }
                                        if(!empty($_POST['cSalary'])){
                                            $update11 = "update Employee set salary='$csalary' where hotelID='$chotID'";
                                            mysql_query($update11,$server);
                                        }
                                        if(!empty($_POST['cBday'])){
                                            $update12 = "update Employee set eBday='$cbDay' where hotelID='$chotID'";
                                            mysql_query($update12,$server);
                                        }
                                        if(!empty($_POST['zip'])){
                                            $update13 = "update Employee set eZip='$czip' where hotelID='$chotID'";
                                            mysql_query($update13,$server);
                                        }

                                    }


                                        
                                    ?>
         
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-2">Current First Name</div>
                                                <div class="col-lg-2">
                                                    <label><?php echo  $cufName; ?></label>
                                                </div>
                                                <div class="col-lg-1">Change to</div>
                                                <div class="col-lg-3">
                                                    <input class="form-control" name="cFname">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-2">Current Middle Name</div>
                                                <div class="col-lg-2">
                                                    <label><?php echo  $cumName; ?></label>
                                                </div>
                                                <div class="col-lg-1">Change to</div>
                                                <div class="col-lg-3">
                                                    <input class="form-control" name="cMname">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-2">Current Last Name</div>
                                                <div class="col-lg-2">
                                                    <label><?php echo  $culName; ?></label>
                                                </div>
                                                <div class="col-lg-1">Change to</div>
                                                <div class="col-lg-3">
                                                    <input class="form-control" name="cLname">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-2">Current NIC</div>
                                                <div class="col-lg-2">
                                                    <label><?php echo  $cuNIC; ?></label>
                                                </div>
                                                <div class="col-lg-1">Change to</div>
                                                <div class="col-lg-3">
                                                    <input class="form-control" name="cNIC">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-2">Current Birthday</div>
                                                <div class="col-lg-2">
                                                    <label><?php echo  $cubDay; ?></label>
                                                </div>
                                                <div class="col-lg-1">Change to</div>
                                                <div class="col-lg-3">
                                                    <input class="form-control" name="cBday">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-2">Street No</div>
                                                <div class="col-lg-2">
                                                    <label><?php echo  $custrNo; ?></label>
                                                </div>
                                                <div class="col-lg-1">Change to</div>
                                                <div class="col-lg-4">
                                                    <input class="form-control" name="cAddNo">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-2">Current Address1</div>
                                                <div class="col-lg-2">
                                                    <label><?php echo  $cuadd1; ?></label>
                                                </div>
                                                <div class="col-lg-1">Change to</div>
                                                <div class="col-lg-4">
                                                    <input class="form-control" name="cAdd1">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-2">Current Address2</div>
                                                <div class="col-lg-2">
                                                    <label><?php echo  $cuadd2; ?></label>
                                                </div>
                                                <div class="col-lg-1">Change to</div>
                                                <div class="col-lg-4">
                                                    <input class="form-control" name="cAdd2">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-2">City</div>
                                                <div class="col-lg-2">
                                                    <label><?php echo  $cucity; ?></label>
                                                </div>
                                                <div class="col-lg-1">Change to</div>
                                                <div class="col-lg-4">
                                                    <input class="form-control" name="cCity">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-2">Current Bank Account</div>
                                                <div class="col-lg-2">
                                                    <label><?php echo  $cubank; ?></label>
                                                </div>
                                                <div class="col-lg-1">Change to</div>
                                                <div class="col-lg-3">
                                                    <input class="form-control" name="cBank">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-2">Current Position</div>
                                                <div class="col-lg-2">
                                                    <label><?php echo  $cuposition; ?></label>
                                                </div>
                                                <div class="col-lg-1">Change to</div>
                                                <div class="col-lg-3">
                                                    <select class="form-control" name="cPos">
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
                                                <div class="col-lg-2">Current Salary</div>
                                                <div class="col-lg-2">
                                                    <label><?php echo  $cusalary; ?></label>
                                                </div>
                                                <div class="col-lg-1">Change to</div>
                                                <div class="col-lg-3">
                                                    <input class="form-control" name="cSalary">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <button type="reset" class="btn btn-default">Reset</button>
                                                    <input type="submit" name="change" class="btn btn-default" value="Confirm"/>
                                                </div>
                                            </div>
                                        </div>
                                    
                                    
                                </form>

                                <?php


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