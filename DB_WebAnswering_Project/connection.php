<?php
$host = "127.0.0.1";
$user = "root";
$password = 'rootroot';
$db_name = "WebAnsweringSystem";

$con = mysqli_connect($host, $user, $password, $db_name);
if(mysqli_connect_errno()) {
    die("Failed to connect with MySQL: ". mysqli_connect_error());
}
?>