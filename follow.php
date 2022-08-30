<?php
session_start();
include 'conn.php';
$role = $_POST['role'];
if ($role == "unfollow") {
    $userrole = $_POST['userrole'];
    if (isset($_SESSION['employer'])) {
        $user_id = $_SESSION['auth_user']['ID'];
        $sel_role = mysqli_query($con, "SELECT `role` FROM `employer` WHERE `ID`='$user_id'");
        $fetch_role = mysqli_fetch_assoc($sel_role);
        $sen_role = $fetch_role['role'];
    } else if (isset($_SESSION['seeker'])) {
        $user_id = $_SESSION['auth_user']['User_ID'];
        $sel_role = mysqli_query($con, "SELECT `role` FROM `job_seeker` WHERE `User_ID`='$user_id'");
        $fetch_role = mysqli_fetch_assoc($sel_role);
        $sen_role = $fetch_role['role'];
    }
    $follow_id = $_POST['id'];
    $sql = mysqli_query($con, "DELETE FROM `follow`  WHERE `user_id`='$user_id' AND `follow_id`='$follow_id' AND `sen_role`='$sen_role' AND `follow_role`='$userrole'");
    if ($sql) {
    }
} else {
    if (isset($_SESSION['employer'])) {
        $user_id = $_SESSION['auth_user']['ID'];
        $sel_role = mysqli_query($con, "SELECT `role` FROM `employer` WHERE `ID`='$user_id'");
        $fetch_role = mysqli_fetch_assoc($sel_role);
        $sen_role = $fetch_role['role'];
    } else if (isset($_SESSION['seeker'])) {
        $user_id = $_SESSION['auth_user']['User_ID'];
        $sel_role = mysqli_query($con, "SELECT `role` FROM `job_seeker` WHERE `User_ID`='$user_id'");
        $fetch_role = mysqli_fetch_assoc($sel_role);
        $sen_role = $fetch_role['role'];
    }
    $follow_id = $_POST['id'];
    $count = $_POST['count'];
    $count = $count + 1;
    $sql = mysqli_query($con, "INSERT INTO `follow`(`user_id`,`follow_id`,`sen_role`,`follow_role`) VALUES('$user_id','$follow_id','$sen_role','$role')");
    if ($sql) {
        echo 1;
    } else {
        echo 0;
    }
}
