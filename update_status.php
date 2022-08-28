<?php
session_start();
include 'conn.php';
$id = $_POST['ids'];
$updatestatus = $_POST['updatestatus'];
// echo $app_id;
$updatestat = mysqli_query($con, "UPDATE `applications` SET `Status`='$updatestatus' WHERE `id`='$id'");
if ($updatestat) {

    $sel = mysqli_query($con, "SELECT `Status` FROM `applications` WHERE `id`='$id'");
    $sef = mysqli_fetch_assoc($sel);
    echo $sef['Status'];
}
