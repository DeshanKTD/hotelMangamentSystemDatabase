 <?php
include('login.php'); // Includes Login Script

if(isset($_SESSION['login_user'])){
    if($_SESSION['pos']=="Admin"){
        header("location: veiwemp.php");
    }
    if($_SESSION['pos']=="Rec"){
       header("location: checkroom.php");
   }
}

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
		<link href="css/various.css" rel="stylesheet">
        <link href="css/sb-admin.css" rel="stylesheet">


        <!-- Morris Charts CSS -->
        <link href="css/plugins/morris.css" rel="stylesheet">

        <!-- Custom Fonts -->
         <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    </head>

        <body>
			<div class="vertical-center">
            <div class="container">
                <div class="row">
                    <div class="col-lg-1"></div>
                    <div class="col-lg-5">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">Receptinalist Login</h3>
                            </div>
                            
                            <div class="panel-body">

                                <form action="" method="POST">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Username" name="recUsrname" id="name">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="Password" name="recPass" id="recPass">
                                    </div>
                                   <!--  <div class="form-group">
                                        <input type="password" class="form-control" placeholder="Confirm Password" name="recCpwd" id="recCpwd">
                                    </div> -->
                                    <div class="form-group">
                                        <input class="btn btn-default btn-block" type="submit" value="Sign In" name="submit"/>
                                    </div>
                                </form>



                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-5">
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <h3 class="panel-title">Adinistrator Login</h3>
                            </div>
                            
                            <div class="panel-body">

                                <form action="" method="POST">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Username" name="empUsrname">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="Password" name="empPass">
                                    </div>
                                   <!--  <div class="form-group">
                                        <input type="password" class="form-control" placeholder="Confirm Password" name="empCpwd">
                                    </div> -->
                                    <div class="form-group">
                                        <input class="btn btn-default btn-block" type="submit" value="Sign In" name="submit2" />
                                    </div>
                                </form>
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
