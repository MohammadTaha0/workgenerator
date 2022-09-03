<?php
include 'conn.php';
session_start();
if (isset($_SESSION['login'])) {
    $_SESSION['errormsg'] = "Already! Logged In";
    header("location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>JobEntry - Job Portal Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <?php
    include 'link.php';
    ?>
    <style>
        .error {
            outline: 2px solid #FF0000 !important;
        }

        .success {
            outline: 2px solid #00CC00 !important;
        }

        .form-text {
            z-index: 999999;
        }
    </style>
</head>

<body>
    <div class="container-fluid p-0 w-100 bg-white">
        <?php
        include 'header.php';
        ?>
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <div class="container mt-5">
            <div class="row">
                <div class="col-md-6 m-auto">
                    <div class="wow fadeInUp" data-wow-delay="0.5s">
                        <h4 class="mb-4 text-center">Welcome! Login To Continue.</h4>
                        <form id="form">
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <div class="form-floating position-relative">
                                        <input type="email" class="form-control" id="email" placeholder="Your Email" name="email">
                                        <div id="emailHelp" class="form-text position-absolute pt-3 top-0 pe-2 end-0 start-50 text-danger text-end"></div>
                                        <label for="email">Your Email</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating position-relative">
                                        <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                                        <div id="passHelp" class="form-text position-absolute pt-3 top-0 pe-2 end-0 start-50 text-danger text-end"></div>
                                        <label for="password">Password</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" type="button" id="submit">Login</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script>
            $(document).ready(function() {

                $("#submit").click(function() {
                    email = $("#email").val();
                    password = $("#password").val();
                    if (email == "" || password == "") {
                        $(".form-text").html('<i class="fa-solid fa-times-circle fs-5"></i>')
                        $('.form-floating').children('input').addClass("error");
                    } else if (email.indexOf(".") != email.length - 4) {
                        $("#emailHelp").html('Invalid Email <i class="fa-solid fa-times-circle fs-5"></i>')
                        $('#email').addClass("error");
                    } else if (email.indexOf("@") != email.length - 10) {
                        $("#emailHelp").html('Invalid Email <i class="fa-solid fa-times-circle fs-5"></i>')
                        $('#email').addClass("error");
                    } else if (email == "") {
                        $("#emailHelp").html('<i class="fa-solid fa-times-circle fs-5"></i>')
                        $('#email').addClass("error");
                    } else if (password == "") {
                        $("#passHelp").html(' <i class="fa-solid fa-times-circle fs-5"></i>')
                        $('#password').addClass("error");
                    } else if (password.length < 8) {
                        $("#passHelp").html('min 8 characters <i class="fa-solid fa-times-circle fs-5"></i>')
                        $('#password').addClass("error");
                    } else if (password.length > 18) {
                        $("#passHelp").html('max 18 characters <i class="fa-solid fa-times-circle fs-5"></i>')
                        $('#password').addClass("error");
                    } else {
                        $("input").removeClass("remove");
                        $(".form-text").html('<i class="fa-solid fa-check fs-4 text-success"></i>')
                        $.post(
                            "logincode.php",
                            $("#form").serialize(),
                            function(login) {
                                if (login == 1) {
                                    alert("Welcome Employer");
                                    window.location.href = "index.php";
                                } else if (login == 2) {
                                    alert("Welcome Job Seeker");
                                    window.location.href = "index.php";
                                } else if (login == 3) {
                                    alert("Invalid Email Or Pasword");
                                }
                            }
                        )
                    }
                })
                $("#email").keyup(function() {
                    val = $(this).val();
                    ele = $(this);
                    if (val.indexOf(".") != val.length - 4) {
                        $("#emailHelp").html('Invalid Email <i class="fa-solid fa-times-circle fs-5"></i>')
                        $('#email').addClass("error");
                    } else if (val.indexOf("@") != val.length - 10) {
                        $("#emailHelp").html('Invalid Email <i class="fa-solid fa-times-circle fs-5"></i>')
                        $('#email').addClass("error");
                    } else {
                        $("#emailHelp").html('<i class="fa-solid fa-check fs-4 text-success"></i>');
                        $("#email").removeClass("error");
                    }
                });
                $("#password").keyup(function() {
                    pass = $(this).val();
                    if (pass.length < 8) {
                        $("#passHelp").html('min 8 characters <i class="fa-solid fa-times-circle fs-5"></i>')
                        $('#password').addClass("error");
                    } else if (pass.length > 18) {
                        $("#passHelp").html('max 18 characters <i class="fa-solid fa-times-circle fs-5"></i>')
                        $('#password').addClass("error");
                    } else {
                        $("#passHelp").html('<i class="fa-solid fa-check fs-4 text-success"></i>')
                        $('#password').removeClass("error");
                    }
                })
            });
        </script>


        <?php
        include 'footer.php';
        ?>


        <!-- Back to Top -->

    </div>

    <?php
    include 'link.php';
    ?>

    </div>
</body>

</html>