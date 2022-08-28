<?php
session_start();
include 'conn.php';
// echo "taha";
$email = $_POST['email'];
$password = $_POST['password'];

$run = mysqli_query($con, "SELECT * FROM `employer` WHERE `Email`='$email' AND `Password`='$password'");

if (mysqli_num_rows($run) > 0) {
    // echo "login";
    foreach ($run as $data) {
        $id = $data['ID'];
        $ein = $data['EIN'];
        $name = $data['Name'];
        $email = $data['Email'];
        $contact = $data['Contact'];
        $username = $data['Username'];
        $password = $data['Password'];
        $company_name = $data['Company_Name'];
        $address = $data['Address'];
        $number_of_employees = $data['Number_of_Employees'];
        $type_of_organization = $data['Type_of_Organization'];
        $status = $data['Status'];
    }
    $_SESSION['login'] = true;
    $_SESSION['employer'] = true;
    $_SESSION['auth_user'] = [
        'ID' => $id,
        'EIN' => $ein,
        'Name' => $name,
        'Email' => $email,
        'Contact' => $contact,
        'Username' => $username,
        'Password' => $password,
        'Company_Name' => $company_name,
        'Address' => $address,
        'Number_of_Employees' => $number_of_employees,
        'Type_of_Organization' => $type_of_organization,
        'Status' => $status,
    ];
    // echo $_SESSION['auth_user']['Name'];
    echo 1;
} else {
    $run = mysqli_query($con, "SELECT * FROM `job_seeker` WHERE `Email`='$email' AND `Password`='$password'");

    if (mysqli_num_rows($run) > 0) {
        // echo "login";
        foreach ($run as $data) {
            $user_id = $data['User_ID'];
            $name = $data['Name'];
            $email = $data['Email'];
            $contact = $data['Contact'];
            $username = $data['Username'];
            $password = $data['Password'];
        }
        $_SESSION['login'] = true;
        $_SESSION['seeker'] = 'true';
        $_SESSION['auth_user'] = [
            'User_ID' => $user_id,
            'Name' => $name,
            'Email' => $email,
            'Contact' => $contact,
            'Username' => $username,
            'Password' => $password,
        ];
        // echo $_SESSION['auth_user']['Name'];
        echo 2;
    } else {
        echo 3;
    }
}
