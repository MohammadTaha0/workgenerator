<?php
session_start();
include 'conn.php';
$user_id = $_SESSION['auth_user']['User_ID'];
$job_id = $_POST['jobid'];
echo $job_id;
$app = mysqli_query($con, "SELECT `id`,`Name`,`Title` FROM `applications` A INNER JOIN `job_seeker` B INNER JOIN `jobs` C WHERE A.`job_id`='$job_id' AND A.`User_ID`='$user_id' AND B.`User_id`='$user_id' AND C.`Auto_generated_ID`='$job_id'");
$fetch = mysqli_fetch_array($app);
$app_id = $fetch['id'];
$emp = mysqli_query($con,"SELECT `emp_id` FROM `applications` WHERE `job_id`='$job_id'");
$emp_fetch = mysqli_fetch_array($emp);
$emp_id = $emp_fetch['emp_id'];
$rec_role = "0";
$sen_role = "1";
$name  = $fetch['Name'];
$msg = '<b>'. $name .'</b> Apply to your job <b>'. $fetch['Title'] . '</b>';
$sql = mysqli_query($con,"INSERT INTO `notification` (`app_id`,`send_id`,`sen_role`,`rec_id`,`rec_role`,`msg`,`date`) VALUES('$app_id','$user_id','$sen_role','$emp_id','$rec_role','$msg',current_timestamp())");
if($sql)
{
    echo "success";
}

?>