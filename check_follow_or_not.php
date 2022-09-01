<?php
session_start();
include 'conn.php';
$follow_role = $_POST['check_role'];
$follow_id = $_POST['cehck_id'];
if (isset($_SESSION['employer'])) {
    $user_id = $_SESSION['auth_user']['ID'];
    $sel_role = mysqli_query($con, "SELECT `role` FROM `employer` WHERE `ID`='$user_id'");
    $fetch_role = mysqli_fetch_assoc($sel_role);
    $sen_role = $fetch_role['role'];

    if(mysqli_num_rows(mysqli_query($con,"SELECT * FROM `follow` WHERE `user_id`='$user_id' AND `sen_role`='$sen_role' AND `follow_id`='$follow_id' AND `follow_role`='$follow_role'")) > 0)
    {
        echo 1;
    }
    else{
        echo "unfollow";
    }
}
else if (isset($_SESSION['seeker'])) {
    $user_id = $_SESSION['auth_user']['User_ID'];
    $sel_role = mysqli_query($con, "SELECT `role` FROM `job_seeker` WHERE `User_ID`='$user_id'");
    $fetch_role = mysqli_fetch_assoc($sel_role);
    $sen_role = $fetch_role['role'];

    if(mysqli_num_rows(mysqli_query($con,"SELECT * FROM `follow` WHERE `user_id`='$user_id' AND `sen_role`='$sen_role' AND `follow_id`='$follow_id' AND `follow_role`='$follow_role'")) > 0)
    {
        echo 1;
    }
    else{
        echo "unfollow";
    }
}
