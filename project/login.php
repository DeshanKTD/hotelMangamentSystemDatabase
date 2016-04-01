<?php
session_start(); // Starting Session
$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
	if (empty($_POST['recUsrname']) || empty($_POST['recPass'])) {
		$error = "Username or Password is invalid";
	}
	else
	{
	// Define $username and $password
		$username=$_POST['recUsrname'];
		$password=$_POST['recPass'];
		//$cPassword=$_POST['recCpwd'];

			// Establishing Connection with Server by passing server_name, user_id and password as a parameter
			$connection = mysql_connect("localhost", "root", "1361");
			// To protect MySQL injection for Security purpose
			$username = stripslashes($username);
			$password = stripslashes($password);
			$username = mysql_real_escape_string($username);
			$password = mysql_real_escape_string($password);
			// Selecting Database
			$db = mysql_select_db("HOTEL", $connection);
			// SQL query to fetch information of registerd users and finds user match.
			$query = mysql_query("select * from Recept where recPwd='$password' AND recID='$username'", $connection);
			//get the name of the login user
			$rows = mysql_num_rows($query);
			if ($rows == 1) {
				//session_start();
				$ses_sql=mysql_query("select eFname from Employee inner join Recept on Employee.hotelID=Recept.hotelID where recID='$username'", $connection);
				$row = mysql_fetch_assoc($ses_sql);
				$_SESSION["current_user"] =$row["eFname"];
				$_SESSION["login_user"]=$username; // Initializing Session
				$_SESSION["pos"]="Rec";

				header("location: checkroom.php"); // Redirecting To Other Page
			} else {
				$error = "Username or Password is invalid";
			}
			mysql_close($connection); // Closing Connection

	}
}

else if (isset($_POST['submit2'])){
	if (empty($_POST['empUsrname']) || empty($_POST['empPass'])) {
		$error = "Username or Password is invalid";
	}
	else
	{
	// Define $username and $password
		
			$username=$_POST['empUsrname'];
			$password=$_POST['empPass'];

		//cheeck whre two passwords are same
		
			// Establishing Connection with Server by passing server_name, user_id and password as a parameter
			$connection = mysql_connect("localhost", "root", "1361");
			// To protect MySQL injection for Security purpose
			$username = stripslashes($username);
			$password = stripslashes($password);
			$username = mysql_real_escape_string($username);
			$password = mysql_real_escape_string($password);
			// Selecting Database
			$db = mysql_select_db("HOTEL", $connection);
			// SQL query to fetch information of registerd users and finds user match.
			$query = mysql_query("select * from Admin where adPwd='$password' AND adminID='$username'", $connection);
			
			//get the name of the login user
			$rows = mysql_num_rows($query);
			if ($rows == 1) {
				//session_start();
				$ses_sql=mysql_query("select adFName from Admin where adminID='$username'", $connection);
				$row = mysql_fetch_assoc($ses_sql);
				$_SESSION["current_user"] =$row["adFName"];
				$_SESSION["login_user"]=$username; // Initializing Session
				$_SESSION["pos"]="Admin";

				header("location: veiwemp.php"); // Redirecting To Other Page
			} else {
				$error = "Username or Password is invalid";
			}
			mysql_close($connection); // Closing Connection
		
	}
}
?>