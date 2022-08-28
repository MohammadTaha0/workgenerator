<?php
include 'conn.php';
$name = $_POST['name'];
$email = $_POST['email'];
$contact = $_POST['contact'];
$username = $_POST['username'];
$password = $_POST['password'];
if (mysqli_num_rows(mysqli_query($con, "SELECT * FROM `job_seeker` WHERE `Email`='$email'")) > 0) {
    echo 3;
} else if (mysqli_num_rows(mysqli_query($con, "SELECT * FROM `job_seeker` WHERE `UserName`='$username'")) > 0) {
    echo 4;
} else {

$run = mysqli_query($con, "INSERT INTO `job_seeker`(`Name`, `Email`, `Contact`, `Username`, `Password`) VALUES('$name','$email','$contact','$username','$password')");
if ($run) {
    echo 1;
} else {
    echo 0;
}
}
