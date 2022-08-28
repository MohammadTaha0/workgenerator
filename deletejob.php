<?php
session_start();
include 'conn.php';
$delid = $_POST['inpvaldel'];
$sql = mysqli_query($con,"DELETE FROM `jobs` WHERE `Auto_generated_ID`=$delid");
$appsql = mysqli_query($con,"DELETE FROM `applications` WHERE `job_id`=$delid");
if($sql && $appsql)
{
    echo 1;
}
else{
    echo 0;
}
?>