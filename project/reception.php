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
                            <li class="active">
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
                                <h1 class="page-header">Receptionalists</h1>
                            </div>
                        </div>
                    
                        <div class="row">
                            <div class="col-lg-4">
                                
                                <div class="panel panel-success">
                                    <div class="panel-heading">
                                          <a href="javascript:;" data-toggle="collapse" data-target="#addrec">
                                              <h4 class="panel-title">Add a Receptionalist</h4></a>
                                    </div>
                                    
                                    <div class="panel-body collapse" id="addrec">
                                        <form role="form" action="" method="post">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-lg-4">Employee ID</div>
                                                    <div class="col-lg-8">
                                                        <input class="form-control" name="aEmpID">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-lg-4">Username</div>
                                                    <div class="col-lg-8">
                                                        <input class="form-control" name="aUsrname">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                           
                                            
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-lg-4">Password</div>
                                                    <div class="col-lg-8">
                                                        <input type="password" class="form-control" name="aPass">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row">
                                                <div class="col-lg-4"></div>
                                                <div class="col-lg-8">
                                                    <button type="reset" class="btn btn-default">Reset</button>
                                                    <input type="submit" class="btn btn-success" value="Add" name="add"/>
                                                </div>
                                            </div>
                                            
                                        </form>
                                        <?php
                                            if(isset($_POST['add'])){
                                                $aEmpID = $_POST['aEmpID'];
                                                $aUsrname = $_POST['aUsrname'];
                                                $aPass = $_POST['aPass'];

                                                $addrec = mysql_query("insert into Recept values ('$aEmpID','$aUsrname','$aPass')",$server);
                                            }
                                        ?>

                                    </div>
                                </div>  
                                
                                <div class="panel panel-warning">
                                    <div class="panel-heading">
                                          <a href="javascript:;" data-toggle="collapse" data-target="#editrec">
                                              <h4 class="panel-title">Edit a Receptionalist</h4></a>
                                    </div>
                                    
                                    <div class="panel-body collapse" id="editrec">
                                        <form role="form" action="" method="post">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-lg-4">Username</div>
                                                    <div class="col-lg-8">
                                                        <input class="form-control" name="eUsrname">
                                                    </div>
                                                </div>
                                            </div>  
                                            
                                            
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-lg-4">Password</div>
                                                    <div class="col-lg-8">
                                                        <input type="password" class="form-control" name="epass">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row">
                                                <div class="col-lg-2"></div>
                                                <div class="col-lg-10">
                                                    <button type="reset" class="btn btn-default">Reset</button>
                                                    <input type="submit" class="btn btn-success" value="Change" name="change">
                                                    <input type="submit" class="btn btn-danger" value="Remove" name="remove">
                                                </div>
                                            </div>
                                            
                                        </form>

                                         <?php
                                            if(isset($_POST['change'])){
                                                $eUsrname = $_POST['eUsrname'];
                                                $ePass = $_POST['epass'];
                                                $addrec = mysql_query("update Recept set recPwd='$ePass' where recID='$eUsrname'",$server);
                                            }
                                            elseif(isset($_POST['remove'])){
                                                $eUsrname = $_POST['eUsrname'];
                                                $addrec = mysql_query("delete from Recept where recID='$eUsrname'",$server);
                                            }
                                        ?>
                                    </div>
                                </div>
                                
                            </div>
                            
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col-lg-2"></div>
                                    <div class="col-lg-8">
                                        <table class="table table-bordered table-hover table-stripped">
                                            <thead>
                                                <tr>
                                                    <th>Username</th>
                                                    <th>Name</th>
                                                    <th>Employee ID</th>
                                                </tr>
                                            </thead>
                                                <?php
                                                    $query = mysql_query("select a.recID,concat_ws(' ',b.eFname,b.eLname) as Name,a.hotelID from Recept as a 
                                                                        inner join Employee as b on a.hotelID=b.hotelID",$server);

                                                    while ($row = mysql_fetch_array($query)) {
                                                       echo "<tr>";
                                                       echo "<td>".$row[recID]."</td>";
                                                       echo "<td>".$row[Name]."</td>";
                                                       echo "<td>".$row[hotelID]."</td>";
                                                       echo "</tr>";
                                                   }   
                                                ?>
                                            <tbody>

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