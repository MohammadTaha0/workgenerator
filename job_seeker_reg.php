<?php
session_start();
include 'conn.php';
if (isset($_SESSION['login'])) {
    $_SESSION['errormsg'] = "Already Registered !";
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <?php
    include 'link.php';
    ?>
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
                        <h4 class="mb-4">Welcome! Register To Continue.</h4>
                        <p>Already have an account? <a href="login.php">login now</a></p>
                        <form id="form_submit">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="name" placeholder="Your Name" name="name">
                                        <label for="name">Your Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" id="email" placeholder="Your Email" name="email">
                                        <label for="email">Your Email</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" placeholder="Contact" name="contact" id="contact">
                                        <label for="subject">Contact</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" placeholder="User Name" name="username" id="username">
                                        <label for="subject">User Name</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="password" class="form-control" placeholder="Password" name="password" id="password">
                                        <label for="subject">Password</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" type="button" name="submit" id="submit">Register</button>
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
                    var name = $("#name").val();
                    var email = $("#email").val();
                    var contact = $("#contact").val();
                    var username = $("#username").val();
                    var password = $("#password").val();
                    if (name == "" || email == "" || contact == "" || username == "" || password == "") {
                        alert("All Fields Are Required");
                    } else {
                        $.post(
                            "job_register.php",
                            $("#form_submit").serialize(),
                            function(reg) {
                                if (reg == 1) {
                                    alert("Regiterd Successfully");
                                    $("#form_submit").trigger("reset");
                                    window.location.href='login.php';
                                } else if (reg == 3) {
                                    alert("This Email Alredy Exist");
                                } else if (reg == 4) {
                                    alert("This Username Alredy Exist");
                                }
                            }
                        )
                    }
                })
            });
        </script>


        <?php
        include 'footer.php';
        ?>


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <?php
    include 'link.php';
    ?>

    </div>
</body>

</html>