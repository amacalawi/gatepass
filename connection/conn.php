<?php
$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db = "sample_db";

$conn = mysqli_connect($db_host, $db_user, $db_password);
mysqli_select_db($conn, $db) or die(error_reporting(E_ALL));
?>