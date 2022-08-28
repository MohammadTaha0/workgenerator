<?php
session_start();
include 'conn.php';
$resume = $_SESSION[''];
$sql = mysqli_query($con, "SELECT * FROM `applications` WHERE `id`='$resume'");
$resume_fetch = mysqli_fetch_assoc($sql);
echo $resume_fetch['appResume'];
