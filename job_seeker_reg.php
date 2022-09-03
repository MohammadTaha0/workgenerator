<?php
session_start();
include 'conn.php';
if (isset($_SESSION['login'])) {
    $_SESSION['errormsg'] = "Already Registered !";
    header("location: index.php");
}
?>
<?php
if (isset($_POST['val'])) {
    $name = $_POST['name'];
    $val = $_POST['val'];
    if (mysqli_num_rows($sql = mysqli_query($con, "SELECT * FROM `job_seeker` A INNER JOIN `employer` B WHERE A.`$name`='$val' OR B.`$name`='$val'")) > 0) {
        echo '<i class="fa-solid fa-times-circle fs-5"></i> Already Exist';
    }
    exit;
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
    <style>
        .error {
            outline: 2px solid #FF0000 !important;
        }

        .success {
            outline: 2px solid #00CC00 !important;
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
                        <h4 class="mb-4">Welcome! Register To Continue.</h4>
                        <p>Already have an account? <a href="login.php">login now</a></p>
                        <form id="form_submit">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="name" placeholder="Your Name" name="name">
                                        <div id="nameHelp" class="form-text position-absolute  pt-3 top-0 pe-2 end-0 start-50 text-danger text-end"></div>
                                        <label for="name">Your Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" id="email" placeholder="Your Email" name="email">
                                        <div id="emailHelp" class="form-text position-absolute  pt-3 top-0 pe-2 end-0 start-50 text-danger text-end"></div>
                                        <label for="email">Your Email</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" placeholder="Contact" name="contact" id="contact">
                                        <div id="conHelp" class="form-text position-absolute  pt-3 top-0 pe-2 end-0 start-50 text-danger text-end"></div>
                                        <label for="subject">Contact</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" placeholder="User Name" name="username" id="username">
                                        <div id="userHelp" class="form-text position-absolute  pt-3 top-0 pe-2 end-0 start-50 text-danger text-end"></div>
                                        <label for="subject">User Name</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating position-relative">
                                        <input type="password" class="form-control" placeholder="Password" name="password" id="password">
                                        <div id="passHelp" class="form-text position-absolute pt-3 top-0 pe-2 end-0 text-danger text-end"></div>
                                        <label for="name">Password</label>
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
                    if (name == "" && email == "" && contact == "" && username == "" && password == "") {
                        function setvalid() {
                            $('.form-floating').children("input").addClass("error");
                            $(".form-text").html(' <i class="fa-solid fa-times-circle fs-5"></i>');
                        }
                        setvalid();
                        $('input').keyup(function() {
                            $(this).removeClass("error");
                        })
                    } else if ($("#name").val() == "") {
                        $("#nameHelp").html(' <i class="fa-solid fa-times-circle fs-5"></i>')
                        $('#name').addClass("error");
                    } else if ($("#email").val() == "") {
                        $("#emailHelp").html(' <i class="fa-solid fa-times-circle fs-5"></i>')
                        $('#email').addClass("error");
                    } else if ($("#contact").val() == "") {
                        $("#conHelp").html(' <i class="fa-solid fa-times-circle fs-5"></i>')
                        $('#contact').addClass("error");
                    } else if ($("#username").val() == "") {
                        $("#userHelp").html(' <i class="fa-solid fa-times-circle fs-5"></i>')
                        $('#username').addClass("error");
                    } else if ($("#password").val() == "") {
                        $("#passHelp").html(' <i class="fa-solid fa-times-circle fs-5"></i>')
                        $('#password').addClass("error");
                    } else if (name.length < 4) {
                        $("#nameHelp").html('At least 4 letters <i class="fa-solid fa-times-circle fs-5"></i>')
                        $('#name').addClass("error");
                    } else if (name.length > 12) {
                        $("#nameHelp").html('maximum 15 letters <i class="fa-solid fa-times-circle fs-5"></i>')
                        $('#name').addClass("error");
                    } else if (name.length < 4) {
                        $("#nameHelp").html('At least 4 letters <i class="fa-solid fa-times-circle fs-5"></i>')
                        $('#name').addClass("error");
                    } else if (name.length > 12) {
                        $("#nameHelp").html('maximum 15 letters <i class="fa-solid fa-times-circle fs-5"></i>')
                        $('#name').addClass("error");
                    } else if (contact.length != 11) {
                        $("#conHelp").html('Invalid Number <i class="fa-solid fa-times-circle fs-5"></i>')
                        $('#contact').addClass("error");
                    } else if (username.length < 4) {
                        $("#userHelp").html('at least 4 letters<i class="fa-solid fa-times-circle fs-5"></i>')
                        $('#username').addClass("error");
                    } else if (username.length > 9) {
                        $("#userHelp").html('Max 9 letters <i class="fa-solid fa-times-circle fs-5"></i>')
                        $('#username').addClass("error");
                    } else if (password.length < 8) {
                        $("#passHelp").html('at least 8 characters <i class="fa-solid fa-times-circle fs-5"></i>')
                        $('#password').addClass("error");
                    } else if (password.length > 18) {
                        $("#passHelp").html('max 18 characters <i class="fa-solid fa-times-circle fs-5"></i>')
                        $('#password').addClass("error");
                    } else {
                        $.post(
                            "job_register.php",
                            $("#form_submit").serialize(),
                            function(reg) {
                                if (reg == 1) {
                                    alert("Regiterd Successfully");
                                    $("#form_submit").trigger("reset");
                                    window.location.href = 'login.php';
                                } else if (reg == 3) {
                                    alert("This Email Alredy Exist");
                                } else if (reg == 4) {
                                    alert("This Username Alredy Exist");
                                }
                            }
                        )
                    }
                })
                $("#name").keyup(function() {
                    name = $(this).val();
                    if (name.length < 4) {
                        $("#nameHelp").html('At least 4 letters <i class="fa-solid fa-times-circle fs-5"></i>')
                        $('#name').addClass("error");
                    } else if (name.length > 15) {
                        $("#nameHelp").html('maximum 15 letters <i class="fa-solid fa-times-circle fs-5"></i>')
                        $('#name').addClass("error");
                    } else {
                        $("#nameHelp").html('<i class="fa-solid fa-check fs-4 text-success"></i>')
                        $('#name').removeClass("error");
                    }
                })
                $("#password").keyup(function() {
                    pass = $(this).val();
                    if (pass.length < 8) {
                        $("#passHelp").html('at least 8 characters <i class="fa-solid fa-times-circle fs-5"></i>')
                        $('#password').addClass("error");
                    } else if (pass.length > 18) {
                        $("#passHelp").html('max 18 characters <i class="fa-solid fa-times-circle fs-5"></i>')
                        $('#password').addClass("error");
                    } else {
                        $("#passHelp").html('<i class="fa-solid fa-check fs-4 text-success"></i>')
                        $('#password').removeClass("error");
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
                        $.ajax({
                            type: 'post',
                            data: {
                                name: "Email",
                                val: val
                            },
                            success: function(response) {
                                if (response == '<i class="fa-solid fa-times-circle fs-5"></i> Already Exist') {
                                    $("#emailHelp").html(response);
                                    ele.addClass("error");
                                } else {
                                    ele.removeClass("error");
                                    $("#emailHelp").html(response + '<i class="fa-solid fa-check fs-4 text-success"></i>');
                                }
                            }
                        });
                    }

                });
                $("#username").keyup(function() {
                    val = $(this).val();
                    ele = $(this);
                    if (val.length < 4) {
                        $("#userHelp").html('at least 4 letters <i class="fa-solid fa-times-circle fs-5"></i>')
                        $('#username').addClass("error");
                    } else if (val.length > 9) {
                        $("#userHelp").html('Max 9 letters <i class="fa-solid fa-times-circle fs-5"></i>')
                        $('#username').addClass("error");
                    } else {
                        $.ajax({
                            type: 'post',
                            data: {
                                name: "Username",
                                val: val
                            },
                            success: function(ans) {
                                if (ans == '<i class="fa-solid fa-times-circle fs-5"></i> Already Exist') {
                                    $("#userHelp").html(ans);
                                    ele.addClass("error");
                                } else {
                                    ele.removeClass("error");
                                    $("#userHelp").html(ans + '<i class="fa-solid fa-check fs-4 text-success"></i>');
                                }
                            }
                        });
                    }
                })
                $("#contact").keyup(function() {
                    val = $(this).val();
                    ele = $(this);
                    if (val.length != 11) {
                        $("#conHelp").html('Invalid Number <i class="fa-solid fa-times-circle fs-5"></i>')
                        $('#contact').addClass("error");
                    } else {
                        $.ajax({
                            type: 'post',
                            data: {
                                name: "Contact",
                                val: val
                            },
                            success: function(ans) {
                                if (ans == "") {
                                    ele.removeClass("error");
                                    $("#conHelp").html(ans + '<i class="fa-solid fa-check fs-4 text-success"></i>');
                                } else {
                                    $("#conHelp").html(ans);
                                    ele.addClass("error");
                                }
                            }
                        });
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