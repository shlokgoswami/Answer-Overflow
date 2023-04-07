<?php

include('connection.php');
$id1 = $_POST['id1'];
$id2 = $_POST['id2'];
$id3 = (int)$_POST['id3'];
$sql = "insert into WebAnsweringSystem.Questions (Title,question_body,Uid)
       values ('$id1','$id2','$id3')";
$result = $con->query($sql);
header('Location: ' . $_SERVER['HTTP_REFERER']);


