<?php
session_start();
include 'conn.php';
if (isset($_SESSION['employer'])) {
    $user_id = $_SESSION['auth_user']['ID'];
    $file = $_FILES['image']['name'];
    $folder = 'img/employer/' . rand() . $file;
    if (move_uploaded_file($_FILES['image']['tmp_name'], $folder)) {
        $sql = mysqli_query($con, "UPDATE `employer` SET `emp_img`='$folder' WHERE `ID`='$user_id'");
        if ($sql) {
            unlink($_SESSION['old_img']);
        }
    }
} else if (isset($_SESSION['seeker'])) {
    $user_id = $_SESSION['auth_user']['User_ID'];
    $file = $_FILES['image']['name'];
    $folder = 'img/seeker Profile/' . rand() . $file;
    if (move_uploaded_file($_FILES['image']['tmp_name'], $folder)) {
        $sql = mysqli_query($con, "UPDATE `seeker_profile` SET `img`='$folder' WHERE `user_id`='$user_id'");
        if ($sql) {
            unlink($_SESSION['old_img']);
        }
    }
}
