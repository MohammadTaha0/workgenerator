<?php
session_start();
include 'conn.php';
$role = $_POST['role'];
if ($role == "unfollow") {
    $userrole = $_POST['userrole'];
    if (isset($_SESSION['employer'])) {
        $user_id = $_SESSION['auth_user']['ID'];
        $sel_role = mysqli_query($con, "SELECT `role`,`Name` FROM `employer` WHERE `ID`='$user_id'");
        $fetch_role = mysqli_fetch_assoc($sel_role);
        $sen_role = $fetch_role['role'];
        $user_name = $fetch_role['Name'];
    } else if (isset($_SESSION['seeker'])) {
        $user_id = $_SESSION['auth_user']['User_ID'];
        $sel_role = mysqli_query($con, "SELECT `role`,`Name` FROM `job_seeker` WHERE `User_ID`='$user_id'");
        $fetch_role = mysqli_fetch_assoc($sel_role);
        $sen_role = $fetch_role['role'];
        $user_name = $fetch_role['Name'];
    }
    $follow_id = $_POST['id'];
    $msg = $user_name . ' Unfollow You';
    $insert_noti = mysqli_query($con, "UPDATE `notification` SET `msg`='$msg', `date`=current_timestamp() WHERE `send_id`='$user_id' AND `rec_id`='$follow_id' AND `sen_role`='$sen_role' AND `rec_role`='$userrole'");
    $sql = mysqli_query($con, "DELETE FROM `follow`  WHERE `user_id`='$user_id' AND `follow_id`='$follow_id' AND `sen_role`='$sen_role' AND `follow_role`='$userrole'");
    if ($sql) {
    }
} else {
    if (isset($_SESSION['employer'])) {
        $user_id = $_SESSION['auth_user']['ID'];
        $sel_role = mysqli_query($con, "SELECT `role`,`Name` FROM `employer` WHERE `ID`='$user_id'");
        $fetch_role = mysqli_fetch_assoc($sel_role);
        $sen_role = $fetch_role['role'];
        $user_name = $fetch_role['Name'];
    } else if (isset($_SESSION['seeker'])) {
        $user_id = $_SESSION['auth_user']['User_ID'];
        $sel_role = mysqli_query($con, "SELECT `role`,`Name` FROM `job_seeker` WHERE `User_ID`='$user_id'");
        $fetch_role = mysqli_fetch_assoc($sel_role);
        $sen_role = $fetch_role['role'];
        $user_name = $fetch_role['Name'];
    }
    $follow_id = $_POST['id'];
    $sql = mysqli_query($con, "INSERT INTO `follow`(`user_id`,`follow_id`,`sen_role`,`follow_role`) VALUES('$user_id','$follow_id','$sen_role','$role')");
    if ($sql) {
        $msg = $user_name . ' Start Following You';
        $delete = mysqli_query($con, "DELETE FROM `notification` WHERE `send_id`='$user_id' AND `rec_id`='$follow_id' AND `sen_role`='$sen_role' AND `rec_role`='$role'");
        if ($delete) {
            $insert_noti = mysqli_query($con, "INSERT INTO `notification`(`send_id`,`rec_id`,`sen_role`,`rec_role`,`msg`,`date`) vALUES('$user_id','$follow_id','$sen_role','$role','$msg',current_timestamp())");
        }
        echo 1;
    } else {
        echo 0;
    }
}
