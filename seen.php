<?php
session_start();
include 'conn.php';
$user_id = $_POST['rec_id'];
$user_role = $_POST['rec_role'];
$send_id = $_POST['send_id'];
$send_role = $_POST['send_role'];
$app = $_POST['app'];

$upd = mysqli_query($con,"UPDATE `notification` SET `seen`='seen' WHERE `send_id`='$send_id' AND `sen_role`='$send_role' AND `rec_id`='$user_id' AND `rec_role`='$user_role' AND `app_id`='$app'");
?>