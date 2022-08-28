<?php
session_start();
include 'conn.php';
$user_id = $_SESSION['auth_user']['User_ID'];
$val = mysqli_real_escape_string($con, $_POST['updval']);
$updname = $_POST['updname'];
if ($updname == "Name" || $updname == "Email" || $updname == "Contact") {
    if (mysqli_query($con, "UPDATE `job_seeker` SET `$updname`='$val' WHERE `User_ID`='$user_id' ")) {
        echo $val;
    }
}
elseif($updname == "Experince") {
    $year = $val . " " .  $_POST['updyear'];
    echo $year;
    if (mysqli_query($con, "UPDATE `seeker_profile` SET `exper`='$year' WHERE `User_ID`='$user_id' ")) {
        echo $year;
    }
} 
else {
    if (mysqli_query($con, "UPDATE `seeker_profile` SET `$updname`='$val' WHERE `User_ID`='$user_id' ")) {
        echo $val;
    }
}

// if(mysqli_query($con,"UPDATE `seeker_profile` SET "))
// echo $val;
// echo $updname;
