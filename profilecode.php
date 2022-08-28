<?php
session_start();
include 'conn.php';

$user_id = $_SESSION['auth_user']['User_ID'];
$pro_img = $_FILES['profile']['name'];
$pro_img_tmp = $_FILES['profile']['tmp_name'];
$folder = "img/Seeker Profile/" . $pro_img;
$desig = mysqli_real_escape_string($con, $_POST['desig']);
$expertise = mysqli_real_escape_string($con, $_POST['expertise']);
$address = mysqli_real_escape_string($con, $_POST['address']);
$prv_comp = $_POST['prv_comp'];
$curr_comp = mysqli_real_escape_string($con, $_POST['curr_comp']);
$mob = mysqli_real_escape_string($con, $_POST['mob']);
$category = mysqli_real_escape_string($con, $_POST['category']);
$skills = mysqli_real_escape_string($con, $_POST['native-select']);
$exper = mysqli_real_escape_string($con, $_POST['exper']);
$year = mysqli_real_escape_string($con, $_POST['year']);
$git = mysqli_real_escape_string($con, $_POST['git']);
$linked = mysqli_real_escape_string($con, $_POST['linked']);
$twitter = mysqli_real_escape_string($con, $_POST['twitter']);
$facebook = mysqli_real_escape_string($con, $_POST['facebook']);
$fiverr = mysqli_real_escape_string($con, $_POST['fiverr']);
$upwork = mysqli_real_escape_string($con, $_POST['upwork']);
$fin_exper = $exper . " " . $year;
if (move_uploaded_file($pro_img_tmp, $folder)) {
    $sql = mysqli_query($con, "INSERT INTO `seeker_profile`(`user_id`,`img`, `desig`, `expertise`, `address`, `prev comp`, `curr comp`, `mobile`, `category`, `skills`, `exper`, `git`, `linked`, `twitter`, `facebook`, `fiverr`, `upwork`) VALUES('$user_id','$folder','$desig','$expertise','$address','$prv_comp','$curr_comp','$mob','$category','$skills','$fin_exper','$git','$linked','$twitter','$facebook','$fiverr','$upwork')");
    if ($sql) {
        echo 1;
    } else {
        echo 0;
    }
}
