<!DOCTYPE html>
<html>
<head>

    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #F8F8F5;
        }


        form {
            border: 3px solid #f1f1f1;
        }

        input[type=text], input[type=password] {
            width: 50%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        button {
            background-color: darkorange;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 50%;
        }

        button:hover {
            opacity: 0.8;
        }


        .container {
            display: flex;
            width: 100%;
        }

        .children {
            flex: 1;
            background-color: #F8F8F5;
            padding: 1rem;
        }

        h2 {
            text-align: center;
        }

        img {
            width: 500px;
            height: 500px;
        }

    </style>
</head>
<body>

<h2>Login Form</h2>

<form name=" f1" action="authentication.php" method="POST">

    <div class="container">
        <div class="children">
            <img src="qa.png">
        </div>
        <div class="children">
            <label for="uname"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" id="user" name="user" required>
            <br>
            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" id="pass" name="pass" required>
            <br>
            <button type="submit" class="submit">Login</button>
        </div>

    </div>

</form>


</body>
</html>


