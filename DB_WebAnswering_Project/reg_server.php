<?php

include('connection.php');
// initializing variables
$username = "";
$email = "";
$errors = array();


// REGISTER USER
if (isset($_POST['reg_user'])) {
    // receive all input values from the form
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $country = $_POST['country'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password_1 = $_POST['password_1'];
    $password_2 = $_POST['password_2'];

    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($password_1)) {
        array_push($errors, "Password is required");
    }
    if ($password_1 != $password_2) {
        array_push($errors, "The two passwords do not match");
    }

    // first check the database to make sure
    // a user does not already exist with the same username and/or email
    $user_check_query = "SELECT * FROM WebAnsweringSystem.Users WHERE Username='$username' OR Email='$email' LIMIT 1";
    $result = $con->query($user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) { // if user exists
        if ($user['Username'] === $username) {
            array_push($errors, "Username already exists");
        }

        if ($user['Email'] === $email) {
            array_push($errors, "email already exists");
        }
    }

    // Finally, register user if there are no errors in the form
    if (count($errors) == 0) {
        $password = $password_1;//encrypt the password before saving in the database

        $query = "INSERT INTO WebAnsweringSystem.Users(Fname, Lname, Username, Email, Password, City, State, Country, RankId)
  			  VALUES('$fname','$lname','$username', '$email', '$password','$city','$state','$country',1)";
        $con->query($query);

        header('location: login.php');
    } else {
        echo "Already exists";
    }
}