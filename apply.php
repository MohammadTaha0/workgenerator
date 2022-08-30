<?php
session_start();
include 'conn.php';
$jobid = $_POST['job_id'];
$user_id = $_SESSION['auth_user']['User_ID'];
if (mysqli_num_rows($jobselect = mysqli_query($con, "SELECT * FROM `jobs` WHERE `Auto_generated_ID`='$jobid'")) > 0) {
    if (mysqli_num_rows(mysqli_query($con, "SELECT * FROM `applications` WHERE `job_id`='$jobid' AND `User_ID`='$user_id'")) > 0) {
        echo 4;
    } else {
        $detch = mysqli_fetch_array($jobselect);
        $job_id = $detch['Auto_generated_ID'];
        $user_id = $_SESSION['auth_user']['User_ID'];
        $emp_id = $detch['emp_id'];
        $skills = $skill_fetch['skills'];
        $msg = $_POST['msg'];
        $file = $_FILES['file']['name'];
        $filetmp = $_FILES['file']['tmp_name'];
        $folder = './upload/' . rand() . "-"  . $file;
        if (move_uploaded_file($_FILES['file']['tmp_name'], $folder)) {
            $sql = mysqli_query($con, "INSERT INTO `applications`(`job_id`, `User_ID`, `Message`, `appResume`, `emp_id`) VALUES('$job_id','$user_id','$msg','$skills','$folder','$emp_id')");
            if ($sql) {
                echo 1;
            } else {
                echo 0;
            }
        }
    }
}
