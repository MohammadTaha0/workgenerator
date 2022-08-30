<?php
session_start();
include 'conn.php';
$user_id = $_POST['id'];
$user_role = $_POST['role'];
$sql = mysqli_query($con,"SELECT * FROM `follow` Where `follow_id`='$user_id' AND `follow_role`='$user_role'");
echo mysqli_num_rows($sql);