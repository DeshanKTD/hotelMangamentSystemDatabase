<?php
include('login.php'); // Includes Login Script

if(isset($_SESSION['login_user'])){
header("location: checkroom.php");
}

?>