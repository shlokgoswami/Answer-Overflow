<?php
include('connection.php');
$username = $_POST['user'];
$password = $_POST['pass'];

//to prevent from mysqli injection
$username = stripcslashes($username);
$password = stripcslashes($password);
$username = mysqli_real_escape_string($con, $username);
$password = mysqli_real_escape_string($con, $password);

$sql = "select Uid from WebAnsweringSystem.Users where Username = '$username' and Password = '$password'";
$result = mysqli_query($con, $sql);
$row = mysqli_num_rows($result);
if ($row == 0) {
    echo "Incorrect Username or Password";
} else {
    while ($row1 = mysqli_fetch_array($result)) {
        if ($_POST['user']) {
            $_SESSION["id"] = $row1['Uid'];
            header("Location: main.php?id=" . $row1['Uid']);
        }
    }
}
?>