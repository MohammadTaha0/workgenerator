<?php

session_start();
include 'conn.php';
if (isset($_SESSION['seeker'])) {
    $user_id = $_SESSION['auth_user']['User_ID'];
    $sql = mysqli_query($con, "SELECT `role`,`Name` FROM `job_seeker` WHERE `User_ID`='$user_id'");
    $fetch = mysqli_fetch_assoc($sql);
    $your_role = $fetch['role'];
    $select_noti = mysqli_query($con, "SELECT `Company_Name`,`msg`,`date`,`seen`,`send_id`,`sen_role` FROM `notification` A INNER JOIN `employer` B WHERE A.`send_id`=B.`ID` AND A.`sen_role`=B.`role` AND A.`rec_id`='$user_id' AND A.`rec_role`='$your_role' AND A.`seen`='unseen'");
    echo mysqli_num_rows($select_noti);
} elseif (isset($_SESSION['employer'])) {
    $user_id = $_SESSION['auth_user']['ID'];
    $your_role = "0";
    $noti = mysqli_query($con, "SELECT `Name` FROM `notification` A INNER JOIN `job_seeker` B WHERE A.`send_id`=B.`User_ID` AND A.`sen_role`=B.`role` AND A.`rec_id`='$user_id' AND A.`rec_role`='$your_role' AND A.`seen`='unseen'");
    $noti_emp = mysqli_query($con, "SELECT `Name` FROM `notification` A INNER JOIN `employer` B WHERE A.`send_id`=B.`ID` AND A.`sen_role`=B.`role` AND A.`rec_id`='$user_id' AND A.`rec_role`='$your_role' AND A.`seen`='unseen'");
    $one = mysqli_num_rows($noti);
    $two = mysqli_num_rows($noti_emp);
    echo $one + $two;
}
