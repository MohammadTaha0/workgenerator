<?php 
session_start();
include '../conn.php';
$id = $_POST['id'];

$sql = mysqli_query($con,"DELETE FROM `employer` WHERE `ID`='$id'");
if($sql)
{
    echo 1;
}
else{
    echo 0;
}
?>