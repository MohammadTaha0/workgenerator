<?php
include 'conn.php';
$ein = $_POST['ein'];
$name = $_POST['name'];
$email = $_POST['email'];
$contact = $_POST['contact'];
$username = $_POST['username'];
$password = $_POST['password'];
$company = $_POST['company'];
$address = $_POST['address'];
$no_of_emp = $_POST['empno'];
$organization = $_POST['organization'];

if (mysqli_num_rows(mysqli_query($con, "SELECT * FROM `employer` WHERE `EIN`='$ein'")) > 0) {
    echo 3;
}else if (mysqli_num_rows(mysqli_query($con, "SELECT * FROM `employer` WHERE `Email`='$email'")) > 0) {
    echo 4;
}else if (mysqli_num_rows(mysqli_query($con, "SELECT * FROM `employer` WHERE `UserName`='$username'")) > 0) {
    echo 5;
}
 else {
    $run = mysqli_query($con, "INSERT INTO `employer`(`EIN`, `Name`, `Email`, `Contact`, `Username`, `Password`, `Company_Name`, `Address`, `Number_of_Employees`, `Type_of_Organization`, `Status`) VALUES('$ein','$name','$email','$contact','$username','$password','$company','$address','$no_of_emp','$organization','inactive')");
    if ($run) {
        echo 1;
    } else {
        echo 0;
    }
}
