<?php
session_start();
include 'conn.php';
$emp_id = $_SESSION['auth_user']['ID'];
$category = $_POST['cat'];
$skill = $_POST['native-select']; 
$title = $_POST['title'];
$job_role = $_POST['role'];
$descrip = $_POST['descrip'];
$exper = $_POST['exper'];
$min_sal = $_POST['minsal'];
$max_sal = $_POST['maxsal'];
$lastdate = $_POST['lastdate'];
$location = $_POST['location'];
$run = mysqli_query($con, "INSERT INTO `jobs`(`Title`, `Category`, `Location`, `min_sal`,`max_sal`, `Skills`, `Experience`, `Job_Role`, `Description`, `Date`, `lastdate`,`emp_id`) VALUES('$title','$category','$location','$min_sal','$max_sal','$skill','$exper','$job_role','$descrip',now(),'$lastdate','$emp_id')");
if ($run) {
    echo 1;
}
else{
    echo 0;
}
