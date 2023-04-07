<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;

        }

        form {
            border: 3px solid #f1f1f1;
        }


        /* Add padding to containers */
        .container {
            padding-left: 400px;
            padding-right: 400px;
            background-color: white;
        }

        /* Full-width input fields */
        input[type=password], .email {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            display: inline-block;
            border: none;
            background: #f1f1f1;
        }

        .fname, .lname, .country {

            width: 30%;
            padding: 15px;
            margin: 5px 0 22px 0;
            display: inline-block;
            border: none;
            background: #f1f1f1;
        }

        .state {
            width: 37%;
            padding: 15px;
            margin: 5px 0 22px 0;
            display: inline-block;
            border: none;
            background: #f1f1f1;
        }

        input[type=text]:focus, input[type=password]:focus {
            background-color: #ddd;
            outline: none;
        }

        /* Overwrite default styles of hr */
        hr {
            border: 1px solid #f1f1f1;
            margin-bottom: 25px;
        }

        /* Set a style for the submit button */
        .registerbtn {
            background-color: cornflowerblue;
            color: white;
            padding: 16px 20px;
            border: none;
            margin-left: 200px;
            cursor: pointer;
            width: 30%;
            opacity: 0.9;
        }

        .registerbtn:hover {
            opacity: 2;
        }

        /* Add a blue text color to links */
        a {
            color: dodgerblue;
        }

        .signin {
            text-align: center;
        }

        h1, p {
            text-align: center;
        }
    </style>
</head>
<body>

<form action="reg_server.php" method="POST">
    <div class="container">
        <h1>Register</h1>
        <p>Please fill in this form to create an account.</p>
        <hr>
        <label for="fname"><b>First Name</b></label>
        <input type="text" placeholder="Enter First Name" name="fname" class="fname" required>
        <label for="lname"><b>Last Name</b></label>
        <input type="text" placeholder="Enter Last Name" name="lname" class="lname" required>
        <br>
        <label for="city"><b>City</b></label>
        <input type="text" placeholder="Enter City Name" name="city" class="state">
        <label for="state"><b>State</b></label>
        <input type="text" placeholder="Enter State Name" name="state" class="state">

        <label for="country"><b>Country</b></label>
        <input type="text" placeholder="Enter Country Name" name="country" class="country">
        <br>
        <label for="username"><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="username" class="email" required>
        <label for="email"><b>Email</b></label>
        <input type="email" placeholder="Enter Email" name="email" class="email" required>
        <br>
        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="password_1" id="psw" required>

        <label for="psw-repeat"><b>Repeat Password</b></label>
        <input type="password" placeholder="Repeat Password" name="password_2" id="psw-repeat" required>
        <hr>

        <button type="submit" class="registerbtn" name="reg_user">Register</button>
    </div>

    <div class="container signin">
        <p>Already have an account? <a href="login.php">Sign in</a>.</p>
    </div>
</form>

</body>
</html>