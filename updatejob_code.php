<?php
session_start();
include 'conn.php';
$emp_id = $_SESSION['auth_user']['ID'];
$category = $_POST['cat'];
$skill = $_POST['skills'];
$title = $_POST['title'];
$job_role = $_POST['role'];
$descrip = $_POST['descrip'];
$exper = $_POST['exper'];
$min_sal = $_POST['minsal'];
$max_sal = $_POST['maxsal'];
$lastdate = $_POST['lastdate'];
$location = $_POST['Location'];
$id = $_POST['updid'];
$run = mysqli_query($con, "UPDATE `jobs` SET `Title`='$title',`Category`='$category',`Location`='$location',`min_sal`='$min_sal',`max_sal`='$max_sal',`Skills`='$skill',`Experience`='$exper',`Job_Role`='$job_role',`Description`='$descrip',`lastdate`='$lastdate',`emp_id`='$emp_id' WHERE `Auto_generated_ID`='$id'");
if ($run) {
    echo 1;
} else {
    echo 0;
}
