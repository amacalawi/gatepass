<?php
include '../connection/conn.php';
session_start();

if(isset($_POST['username'])){
	$username = $_POST['username'];
	$password = $_POST['password'];

	$query_login = mysqli_query($conn, "SELECT * FROM gp_users WHERE username = '$username' AND password = '$password' AND active = 1");
	$row = mysqli_fetch_assoc($query_login);

	if($row >= 1){
		$_SESSION['username'] = $username;
		header('location: ../dashboard.php');
	}else{
		header('location: ../login.php?error=error');
	}
}
?>