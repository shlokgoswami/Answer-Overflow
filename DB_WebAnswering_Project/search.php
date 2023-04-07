<!DOCTYPE html>
<html>
<head>

    <style>
        body {
            font-family: Arial;
        }

        /* Style the tab */
        .tab {
            overflow: hidden;
            border: 1px solid #ccc;
            background-color: #f1f1f1;
        }

        /* Style the buttons inside the tab */
        .tab button {
            background-color: inherit;
            float: left;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 14px 16px;
            transition: 0.3s;
            font-size: 17px;
        }

        /* Change background color of buttons on hover */
        .tab button:hover {
            background-color: #ddd;

        }

        /* Create an active/current tablink class */
        .tab button.active {
            background-color: #ccc;
        }

        /* Style the tab content */
        .tabcontent {
            display: none;
            padding: 6px 12px;
            border: 1px solid #ccc;
            border-top: none;
        }

        .box {
            display: flex;
            background-color: RGB(252, 185, 104);
            flex-wrap: wrap;
            align-content: space-between;
            border-radius: 20px;
        }

        .box1 {
            display: flex;
            background-color: #97e1f7;
            flex-wrap: wrap;
            border-radius: 20px;
            flex-direction: column;
            margin-top: 20px;
        }

        .box3 {
            display: flex;
            flex-wrap: wrap;
            border-radius: 20px;
            flex-direction: column;
            margin-top: 20px;
            background-color: lightgrey;
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            color: black;
            display: inline-block;
            margin-left: 450px;
            cursor: pointer;
            border-radius: 10px;

        }

        .box3 input[type="submit"] {
            width: 100px;
        }

        .v {
            margin-left: auto;
        }

        .search {
            margin-left: 550px;
            margin-top: 30px;
            border-radius: 10px;
        }

        input[type="text"] {
            width: 200px;
            height: 30px;
            border: 3px solid orange;
        }

        .tablinks {
            margin-left: 200px;
        }

        .sb {
            background-color: orange;
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin-top: 0px;
            margin-bottom: 20px;
            cursor: pointer;
            border-radius: 10px;
        }

        hr {
            border: 1px solid white;
        }

        .question textarea {
            margin-top: 30px;
            margin-left: 300px;
        }


        .bstyle {
            background-color: orange;
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            margin-left: 650px;
            cursor: pointer;
            border-radius: 10px;
        }

        .qt {
            margin-bottom: 20px;
            margin-left: 600px;
            font-size: 30px;
        }

        .vote {
            background-color: white;
            border-color: black;
            color: white;
            padding: 10px 20px;
            text-align: center;
            color: black;
            cursor: pointer;
            border-radius: 30px;
            margin: 10px;
        }

        .profilecon {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

    </style>
</head>
<body>

<!--TABS-->

<?php
session_start();
include('connection.php');
$id = (int)$_GET['id'];
?>

<div class="tab">
    <button class="tablinks" onclick="myfunction('My Questions')">My Questions</button>
    <button class="tablinks" onclick="myfunction('My Answers')">My Answers</button>
    <button class="tablinks" onclick="myfunction('Profile')">Profile</button>
</div>


<!--Searching-->
<form method="post" action="search.php" style="display: block">
    <input type="text" name="search" class="search_box"/>
    <input type="submit" name="id" value="Search" class="sb"/>
</form>

<?php
include('connection.php');

$id = $_POST["id"];
$sql = "SELECT * FROM WebAnsweringSystem.Questions 
              join WebAnsweringSystem.Answer on Answer.Qid=Questions.Qid
             WHERE Title like '%$id%'";
$result = mysqli_query($con, $sql);
$str = "";
while ($row = mysqli_fetch_array($result)) {
    $str = $str . '</h1>
            <h2>Title:' . $row['Title'] . '</h2>
            <h2>Body:' . $row['question_body'] . '</h2>
            <h2>Answer:' . $row['Answer'] . '</h2>';
}
echo $str;


?>
<!--Home Tab-->

<div id="Home" class="tabcontent">


    <!--Ask Question-->
    <?php
    $str = "";
    $str = $str . '<form method="post" action="insert_questions.php" >
    <label class="qt">Ask Question</label>
    <div class="question">
    <textarea name="id1" rows="1" cols="100"placeholder="Title" required></textarea>
    <textarea name="id2" rows="5" cols="100"  placeholder="Body" ></textarea>
    <input style="display:none;" type="number" name="id3" value="' . $id . '"/>
    </div>
    <br>
    <input type="submit" name="submit" class="bstyle" value="Ask">
</form>';
    echo $str;
    ?>


    <!--Query-->


    <?php

    $str = "";
    $my_question = "select *
                  from WebAnsweringSystem.Questions";
    $my_question = mysqli_query($con, $my_question);
    while ($row1 = mysqli_fetch_array($my_question)) {


        $str = $str . '<div class="box1"><h2>&nbsp;&nbsp;Title:' . $row1["Title"] . '</h2>
                    <h2>&nbsp;&nbsp;Body:' . $row1["question_body"] . '</h2></div>';


        $my_answer = "select * from WebAnsweringSystem.Answer where Answer.Qid=" . $row1['Qid'];

        $my_answer = mysqli_query($con, $my_answer);
        while ($row2 = mysqli_fetch_array($my_answer)) {

            $str = $str . '<hr><div class="box"> <div>'
                . '  <h3>&nbsp;&nbsp;Answer:' . $row2["Answer"] . '</h3> </div><div class="v">';

            $votes = $con->query('select * from WebAnsweringSystem.Vote where Aid=' . $row2['Aid']);
            $str = $str . '<h3>' . mysqli_num_rows($votes) . '</h3></div>';

            $str = $str . '<form method="post" action="counter.php">';
            $str = $str . '<input style="display: none;" type="number" name="aid" value="' . $row2['Aid'] . '"/>';
            $str = $str . '<input style="display: none;" type="number" name="uid" value="' . $id . '"/>';
            $str = $str . '<button type="submit" class="vote">Vote</button> </form>';
            $str = $str . '</div>';

            $str = $str . '<hr>';

        }
        $str = $str . '<form method="post" action="insert_answer.php" ><div class="box3">
            <p><label for="answer">Enter your Answer</label></p>
           <textarea name="id" rows="4" cols="50" required></textarea>
           <input style="display:none;" type="number" name="id2" value="' . $row1['Qid'] . '"/>
            <input style="display:none;" type="number" name="id3" value="' . $id . '"/>
           <br>
           <input type="submit" value="Submit"></div>
        </form><hr>';

    }
    echo $str;
    ?>
</div>


<!--MY QUESTION TAB-->


<div id="My Questions" class="tabcontent">

    <?php
    $my_question = "
            select *
            from WebAnsweringSystem.Questions join WebAnsweringSystem.Users U on Questions.Uid = U.Uid
            where Questions.Uid =$id
            ";
    $my_question = mysqli_query($con, $my_question);
    $my_answer = "with temp(Qid,Title,question_body) as (
                select Questions.Qid,Title,question_body
                from WebAnsweringSystem.Questions
                where Questions.Uid =$id)
                select *
                from WebAnsweringSystem.Questions join WebAnsweringSystem.Answer A on Questions.Qid = A.Qid 
                left outer join WebAnsweringSystem.Vote on A.Aid=Vote.Aid,temp
                where Questions.Uid =$id and temp.Qid=A.Qid";
    $my_answer = mysqli_query($con, $my_answer);
    $str = "";
    while ($row1 = mysqli_fetch_array($my_question)) {
        $str = $str . '
        <div class="box1"><h2>Title:' . $row1["Title"] . '</h2>
        <h2>Body:' . $row1["question_body"] . '</h2></div>';
        while ($row2 = mysqli_fetch_array($my_answer)) {
            $str = $str . '<hr><div class="box">';
            $str = $str . '<h3>Answer:' . $row2["Answer"] . '</h3>';
            $str = $str . '<div class="v">';
            $str = $str . '</div></div>';
            $str = $str . '<hr>';
        }
    }
    echo $str;
    ?>
</div>


<!--My Answers-->


<div id="My Answers" class="tabcontent">

    <?php
    $answer = "select *
        from WebAnsweringSystem.Answer join WebAnsweringSystem.Questions Q on Answer.Qid = Q.Qid
        where Answer.Uid=$id";
    $answer = mysqli_query($con, $answer);
    $str = "";
    while ($row2 = mysqli_fetch_array($answer)) {
        $str = $str . '<div class="box1"><h2>Title:' . $row2["Title"] . '</h2>';
        $str = $str . '<h2>Description:' . $row2["question_body"] . '</h2></div>';
        $str = $str . '<hr><div class="box">';
        $str = $str . '<h3>Answer:' . $row2["Answer"] . '</h3></div>';
        $str = $str . '<hr>';
    }

    echo $str;
    ?>
</div>


<!-- Profile -->
<div id="Profile" class="tabcontent">
    <?php
    $sql = "select * from WebAnsweringSystem.Users where Uid=$id";
    $result = mysqli_query($con, $sql);
    $str = '';
    while ($row1 = mysqli_fetch_array($result)) {
        $str = $str . '    
    <div class="profilecon">
        <h1>Profile</h1>
        <hr>
        <label for="fname"><h2>First Name:' . $row1['Fname'] . '</h2></label><br>
        <label for="lname"><h2>Last Name:' . $row1['Lname'] . '</h2></label> <br>
        <label for="city"><h2>City:' . $row1['City'] . '</h2></label>
        <label for="state"><h2>State:' . $row1['State'] . '</h2></label>
        <label for="country"><h2>Country:' . $row1['Country'] . '</h2></label>
        <br>
        <label for="username"><h2>Username:' . $row1['Username'] . '</h2></label>
        <label for="email"><h2>Email:' . $row1['Email'] . '</h2></label>
        <br>
';
    }
    echo $str;
    ?>
</div>

<script>
    function myfunction(qa) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(qa).style.display = "block";
        evt.currentTarget.className += " active";
    }
</script>


</body>
</html>

