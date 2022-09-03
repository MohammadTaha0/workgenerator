<?php
session_start();
include 'conn.php';
$emp_id = $_POST['emp'];

if (isset($_SESSION['seeker'])) {
    $rec_id = $_SESSION['auth_user']['User_ID'];
} else {
    $rec_id = $_POST['seeker'];
}
$hire = $_POST['hire'];
$app_id = $_POST['app_id'];
$job_name = $_POST['title'];
$sql = mysqli_query($con, "SELECT `Company_Name` FROM `employer` WHERE `ID`='$emp_id'");
$fetch = mysqli_fetch_array($sql);
$Comp_name = $fetch['Company_Name'];
if ($hire == "hired") {
    $msg = 'Congrats, You Hired By <b>' . $Comp_name . ' Company </b> as a ' . '<b>' . $job_name . '</b>';
    $delete = mysqli_query($con, "DELETE FROM `notification` WHERE `send_id`='$app_id' AND `rec_id`='$rec_id' AND `sen_role`='0' AND `rec_role`='1'");
    if ($delete) {
        $insert_noti = mysqli_query($con, "INSERT INTO `notification`(`app_id`,`send_id`,`rec_id`,`sen_role`,`rec_role`,`msg`,`date`) vALUES('$app_id','$emp_id','$rec_id','0','1','$msg',current_timestamp())");
    }
} elseif ($hire == "req") {
    $msg = 'Oops, You Hired By <b>' . $Comp_name . ' Company </b> as a ' . '<b>' . $job_name . '</b> but later he was change his decisions';
    $insert_noti = mysqli_query($con, "UPDATE `notification` SET `msg`='$msg', `date`=current_timestamp() WHERE `send_id`='$app_id' AND `rec_id`='$rec_id' AND `sen_role`='0' AND `rec_role`='1'");
}
