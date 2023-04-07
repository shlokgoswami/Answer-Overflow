<?php
include('connection.php');
$aid = (int)$_POST['aid'];
$uid = (int)$_POST['uid'];
$votes = $con->query('select * from WebAnsweringSystem.Vote where Aid=' . $aid . ' and Uid=' . $uid);
if (mysqli_num_rows($votes) > 0) {
    $con->query('delete from WebAnsweringSystem.Vote where Aid=' . $aid . ' and Uid=' . $uid);
} else {
    $con->query('insert into WebAnsweringSystem.Vote (Aid, Uid) values (' . $aid . ',' . $uid . ')');
}
header('Location: ' . $_SERVER['HTTP_REFERER']);

?>

