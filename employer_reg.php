<?php
session_start();
include 'conn.php';
if (isset($_SESSION['login'])) {
    $_SESSION['errormsg'] = "Already Registered";
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
                        <h4 class="mb-4">Welcome! Register To Continue.</h4>
                        <p>Already have an account? <a href="login.php">login now</a></p>
                        <form id="form_submit">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="number" class="form-control" id="ein" placeholder="Employer Identification Number" name="ein" maxlenght="9">
                                        <label for="ein">Employer Identification Number</label>
                                    </div>
                                </div>
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
                                <div class="col-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="contact" placeholder="Contact" name="contact">
                                        <label for="contact">Contact</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="username" placeholder="User Name" name="username">
                                        <label for="username">User Name</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-floating">
                                        <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                                        <label for="password">Password</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="company" placeholder="Company Name" name="company">
                                        <label for="company">Company Name</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="address" placeholder="Address" name="address">
                                        <label for="address">Address</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="empno" placeholder="Number of Employees" name="empno">
                                        <label for="empno">Number of Employees</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="organization" placeholder="Type Of Oraganization" name="organization">
                                        <label for="organization">Type Of Oraganization</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" type="button" id="submit" name="submit">Register</button>
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
                    // alert("click");
                    ein = $("#ein").val();
                    name = $("#name").val();
                    email = $("#email").val();
                    contct = $("#contct").val();
                    username = $("#username").val();
                    password = $("#password").val();
                    company = $("#company").val();
                    address = $("#address").val();
                    empno = $("#empno").val();
                    organization = $("#organization").val();
                    if (ein == "" || name == "" || email == "" || contact == "" || username == "" || password == "" || company == "" || address == "" || empno == "" || organization == "") {
                        alert("All Fields Are Required");
                    } else {
                        $.post(
                            "emp_register.php",
                            $("#form_submit").serialize(),
                            function(reg) {
                                if (reg == 1) {
                                    $("#form_submit").trigger("reset");
                                    alert("Registered Successfully");
                                    window.location.href='login.php';
                                } else if (reg == 3) {
                                    alert("This Employer Identification Number Already Exist");
                                } else if (reg == 4) {
                                    alert("This Email Already Exist");
                                } else if (reg == 5) {
                                    alert("This Username Already Exist");
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