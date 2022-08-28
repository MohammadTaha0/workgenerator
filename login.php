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
                                    <div class="form-floating">
                                        <input type="email" class="form-control" id="email" placeholder="Your Email" name="email">
                                        <label for="email">Your Email</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="password" class="form-control" id="password" placeholder="Password" name="password">
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
                    if(email == "" || password == "")
                    {
                        alert("All Fields Are Required");
                    }
                    else{
                        $.post(
                            "logincode.php",
                            $("#form").serialize(),
                            function(login) { 
                                if(login == 1)
                                {
                                    alert("Welcome Employer");
                                    window.location.href="index.php";
                                }else if(login == 2)
                                {
                                    alert("Welcome Job Seeker");
                                    window.location.href="index.php";
                                }else if(login == 3)
                                {
                                    alert("Invalid Email Or Pasword");
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