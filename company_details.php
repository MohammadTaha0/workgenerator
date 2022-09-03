<?php
session_start();
include 'conn.php';
$comp_id = $_GET['comp_id'];
$sql = mysqli_query($con, "SELECT * FROM `employer` WHERE `ID`='$comp_id'");
$fetch = mysqli_fetch_array($sql);
$job_sql = mysqli_query($con, "SELECT * FROM `jobs` WHERE `emp_id`='$comp_id'");
$hire_sql = mysqli_query($con, "SELECT * FROM `applications` WHERE `Status`='1'");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $fetch['Company_Name'] ?></title>
    <?php include 'link.php'; ?>
</head>
<style>
    #unfollow {
        background-color: pink;
        color: darkred;
        display: none;
    }
</style>

<body class="bg-white">

    <div class="container-fluid p-0 w-100 bg-white">
        <?php include 'header.php'; ?>
        <!-- Header End -->
        <div class="container-fluid py-5 bg-dark page-header mb-1">
            <div class="container my-5 pt-5 pb-4">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Comapny Details</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb text-uppercase">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Comapny Details</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Header End -->
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12 bg-white shadow mb-0 py-3">
                    <div class="row justify-content-center text-center mb-5">
                        <div class="col-12 rounded-circle shadow d-flex justify-content-center align-items-center" style="width: 150px; height: 150px;">
                            <img src="<?php echo $fetch['emp_img'] ?>" style="object-fit: contain !important;" class="d-block w-100 rounded-circle" alt="">
                        </div>
                        <div class="col-12 mt-5">
                            <h1 class="text-success mb-3 fw-bolder"><?php echo $fetch['Company_Name'] ?></h1>
                            <p class="badge text-dark mx-0 fs-6"> <span id="display_followers"></span> Followers</p>
                            <p class="badge text-dark mx-0 fs-6"><?php echo mysqli_num_rows($hire_sql); ?> Hires</p>
                        </div>
                        <div class="col-12 mt-2">
                            <button class="btn btn-primary px-4 rounded-3" data-role="<?php echo $fetch['role']; ?>" data-id="<?php echo $fetch['ID']; ?>" type="button" id="follow">Follow</button>
                            <button class="btn btn-light px-4 rounded-3" data-role="<?php echo $fetch['role']; ?>" data-id="<?php echo $fetch['ID']; ?>" type="button" id="unfollow">Unfollow</button> 
                            <button class="btn btn-secondary px-4 rounded-3">Messege</button>
                        </div>
                    </div>
                </div>
                <div class="col-12 mt-0 mb-1 py-4">
                    <h5 class="text-center my-3 text-success bg-light py-4">Company Details</h5>
                    <ul class="list-unstyled p-0 m-0 text-capitalize">
                        <li class="mb-3">
                            <b><i class="text-success fa-solid fa-angle-right me-2"></i> Company Name</b> : <?php echo $fetch['Company_Name'] ?>
                        </li>
                        <li class="mb-3">
                            <b><i class="text-success fa-solid fa-angle-right me-2"></i> Employer Name</b> : <?php echo $fetch['Name'] ?>
                        </li>
                        <li class="mb-3">
                            <b><i class="text-success fa-solid fa-angle-right me-2"></i> Organization </b> : <?php echo $fetch['Type_of_Organization'] ?>
                        </li>
                        <li class="mb-3">
                            <b><i class="text-success fa-solid fa-angle-right me-2"></i> Country</b> : Pakistan
                        </li>
                        <li class="mb-3">
                            <b><i class="text-success fa-solid fa-angle-right me-2"></i> Jobs Posted</b> : <?php echo mysqli_num_rows($job_sql); ?> posted
                        </li>
                        <li class="mb-3">
                            <b><i class="text-success fa-solid fa-angle-right me-2"></i> Hires</b> : <?php echo mysqli_num_rows($hire_sql); ?> hires
                        </li>
                        <li class="mb-3">
                            <b><i class="text-success fa-solid fa-angle-right me-2"></i>Address</b> <span class="">:<?php echo $fetch['Address'] ?></span>
                        </li>
                        <li class="mb-0">
                            <b><i class="text-success fa-solid fa-angle-right me-2"></i> Total Employees</b> : <?php echo $fetch['Number_of_Employees'] ?>
                        </li>
                    </ul>
                </div>
                <div class="col-12 mt-0 mb-3 py-4 h-auto">
                    <h5 class="text-center my-3 text-success bg-light py-4">Employer Details</h5>
                    <ul class="list-unstyled p-0 m-0 text-capitalize">
                        <li class="mb-3">
                            <b><i class="text-success fa-solid fa-angle-right me-2"></i> Employer Name</b> : <?php echo $fetch['Name'] ?>
                        </li>
                        <li class="mb-3 text-lowercase">
                            <b><i class="text-success fa-solid fa-angle-right me-2"></i> Employer Email</b> : <?php echo $fetch['Email'] ?>
                        </li>
                        <li class="mb-3">
                            <b><i class="text-success fa-solid fa-angle-right me-2"></i> Contact</b> : <?php echo $fetch['Contact'] ?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $.ajax({
                url: "check_follow_or_not.php",
                type: "POST",
                data: {
                    cehck_id: $("#follow").data('id'),
                    check_role: $("#follow").data('role'),
                },
                success: function(follow) {
                    console.log(follow);
                    if (follow == 1) {
                        $("#unfollow").fadeIn(500);
                        $("#follow").fadeOut(1);
                    }
                }
            })
            function followers_get() {
                $.ajax({
                    url: "followers.php",
                    type: "POST",
                    data: {
                        id: $("#follow").data('id'),
                        role: $("#follow").data('role'),
                    },
                    success: function(followers) {
                        $("#display_followers").html(followers);
                    }
                })
            }
            followers_get();
            $("#follow").click(function() {
                id = $(this).data('id');
                role = $(this).data('role');
                $.post(
                    "follow.php", {
                        count: $("#display_followers").text(),
                        id: id,
                        role: role,
                    },
                    function(following) {
                        setInterval(followers_get, 5000);
                        if (following == 1) {
                            $("#unfollow").fadeIn(500);
                            $("#follow").fadeOut(1);
                            // $("#display_followers").load("check_follow_or_not.php");
                        }
                    }
                )
            });
            $("#unfollow").click(function() {
                id = $(this).data('id');
                role = $(this).data('role');
                $.post(
                    "follow.php", {
                        count: $("#display_followers").text(),
                        id: id,
                        role: "unfollow",
                        userrole: role,
                    },
                    function(unfollow) {
                        setInterval(followers_get, 5000);
                        $("#unfollow").fadeOut(1);
                        $("#follow").fadeIn(500);
                    }
                )
            });
            setInterval(followers_get, 10000)
        });
    </script>

    <?php include 'link.php'; ?>
    <?php
    include 'footer.php';
    ?>

</body>

</html>