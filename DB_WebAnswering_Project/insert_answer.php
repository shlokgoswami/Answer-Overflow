<?php
include('connection.php');
$id = $_POST['id'];
$id2 = $_POST['id2'];
$id3 = $_POST['id3'];
$sql = "insert into WebAnsweringSystem.Answer(Answer,Qid,Uid)
       values ('$id','$id2','$id3')";
$result = $con->query($sql);
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>


