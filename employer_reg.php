<?php
session_start();
include 'conn.php';
if (isset($_SESSION['login'])) {
    $_SESSION['errormsg'] = "Already Registered";
    header("location: index.php");
}
?>
<?php
if (isset($_POST['name'])) {
    $name = $_POST['name'];
    $val = $_POST['val'];
    if (mysqli_num_rows($sql = mysqli_query($con, "SELECT * FROM `job_seeker` A INNER JOIN `employer` B WHERE A.`$name`='$val' OR B.`$name`='$val'")) > 0) {
        echo 'Already Exist <i class="fa-solid fa-times-circle fs-5"></i>';
    }
    exit;
}
if (isset($_POST['ein'])) {
    $ein = $_POST['ein'];
    $val = $_POST['val'];
    if (mysqli_num_rows($sql = mysqli_query($con, "SELECT * FROM `employer` WHERE `$ein`='$val'")) > 0) {
        echo 'Already Exist <i class="fa-solid fa-times-circle fs-5"></i>';
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
                        <h4 class="mb-4">Welcome! Register To Continue.</h4>
                        <p>Already have an account? <a href="login.php">login now</a></p>
                        <form id="form_submit">
                            <div class="row g-3">
                                <div class="col-12 text-center mb-0">
                                    <input type="file" id="img" name="img" class="d-none">
                                    <br>
                                    <label for="img" class="border form-control col-12 rounded d-flex justify-content-center align-items-center m-auto flex-column" style="height: 100px"> <i class="fa-regular fa-camera fs-3"></i> <img src="" id="img_tag" alt="">
                                        <span class="mt-1">Profile Image</span>
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating position-relative">
                                        <input type="number" class="form-control" id="ein" placeholder="Employer Identification Number" name="ein" maxlenght="9">
                                        <div id="einHelp" class="form-text position-absolute  pt-3 top-0 pe-2 end-0 start-50 text-danger text-end"></div>
                                        <label for="ein">Employer Identification Number</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating position-relative">
                                        <input type="text" class="form-control" id="name" placeholder="Your Name" name="name">
                                        <div id="nameHelp" class="form-text position-absolute  pt-3 top-0 pe-2 end-0 start-50 text-danger text-end"></div>
                                        <label for="name">Your Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating position-relative">
                                        <input type="email" class="form-control" id="email" placeholder="Your Email" name="email">
                                        <div id="emailHelp" class="form-text position-absolute pt-3 top-0 pe-2 end-0 start-50 text-danger text-end"></div>
                                        <label for="email">Your Email</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-floating position-relative">
                                        <input type="text" class="form-control" id="contact" placeholder="Contact" name="contact">
                                        <div id="conHelp" class="form-text position-absolute  pt-3 top-0 pe-2 end-0 start-50 text-danger text-end"></div>
                                        <label for="contact">Contact</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-floating position-relative">
                                        <input type="text" class="form-control" id="username" placeholder="User Name" name="username">
                                        <div id="userHelp" class="form-text position-absolute  pt-3 top-0 pe-2 end-0 start-50 text-danger text-end"></div>
                                        <label for="username">User Name</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-floating position-relative">
                                        <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                                        <div id="passHelp" class="form-text position-absolute  pt-3 top-0 pe-2 end-0 start-50 text-danger text-end"></div>
                                        <label for="password">Password</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-floating position-relative">
                                        <input type="text" class="form-control" id="company" placeholder="Company Name" name="company">
                                        <div id="compHelp" class="form-text position-absolute  pt-3 top-0 pe-2 end-0 start-50 text-danger text-end"></div>
                                        <label for="company">Company Name</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-floating position-relative">
                                        <input type="text" class="form-control" id="address" placeholder="Address" name="address">
                                        <div id="addHelp" class="form-text position-absolute  pt-3 top-0 pe-2 end-0 start-50 text-danger text-end"></div>
                                        <label for="address">Address</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-floating position-relative">
                                        <input type="text" class="form-control" id="empno" placeholder="Number of Employees" name="empno">
                                        <div id="noempHelp" class="form-text position-absolute  pt-3 top-0 pe-2 end-0 start-50 text-danger text-end"></div>
                                        <label for="empno">Number of Employees</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-floating position-relative">
                                        <input type="text" class="form-control" id="organization" placeholder="Type Of Oraganization" name="organization">
                                        <div id="orgHelp" class="form-text position-absolute  pt-3 top-0 pe-2 end-0 start-50 text-danger text-end"></div>
                                        <label for="organization">Type Of Oraganization</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" type="submit" id="submit" name="submit">Register</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function() {
                $("#form_submit").on("submit", function(e) {
                    var formData = new FormData(this);
                    e.preventDefault();
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
                    img = $("img").val();
                    if (ein == "") {
                        $("#ein").addClass("error");
                        $("#einHelp").html('<i class="fa-solid fa-times-circle fs-5 fs-5"></i>')
                    } else if (ein.length < 6) {
                        $("#ein").addClass("error");
                        $("#einHelp").html('min 6 number <i class="fa-solid fa-times-circle fs-5"></i>')
                    } else if (ein.length > 13) {
                        $("#ein").addClass("error");
                        $("#einHelp").html('max 13 number <i class="fa-solid fa-times-circle fs-5"></i>')
                    } else if (name == "") {
                        $("#name").addClass("error");
                        $("#nameHelp").html('<i class="fa-solid fa-times-circle fs-5 fs-5"></i>')
                    } else if (name.length < 4) {
                        $("#name").addClass("error");
                        $("#nameHelp").html('at least 4 letter <i class="fa-solid fa-times-circle fs-5"></i>')
                    } else if (name.length > 12) {
                        $("#name").addClass("error");
                        $("#nameHelp").html('max 12 letter <i class="fa-solid fa-times-circle fs-5"></i>')
                    } else if (email == "") {
                        $("#email").addClass("error");
                        $("#emailHelp").html('<i class="fa-solid fa-times-circle fs-5 fs-5"></i>')
                    } else if (email.indexOf(".") != email.length - 4) {
                        $("#emailHelp").html('Invalid Email <i class="fa-solid fa-times-circle fs-5"></i>')
                        $('#email').addClass("error");
                    } else if (email.indexOf("@") != email.length - 10) {
                        $("#emailHelp").html('Invalid Email <i class="fa-solid fa-times-circle fs-5"></i>')
                        $('#email').addClass("error");
                    } else if (contact == "") {
                        $("#contact").addClass("error");
                        $("#conHelp").html('<i class="fa-solid fa-times-circle fs-5 fs-5"></i>');
                    } else if (username == "") {
                        $("#username").addClass("error");
                        $("#userHelp").html('<i class="fa-solid fa-times-circle fs-5 fs-5"></i>');
                    } else if (username.length < 4) {
                        $("#userHelp").html('at least 4 letters <i class="fa-solid fa-times-circle fs-5"></i>')
                        $('#username').addClass("error");
                    } else if (username.length > 9) {
                        $("#userHelp").html('Max 9 letters <i class="fa-solid fa-times-circle fs-5"></i>')
                        $('#username').addClass("error");
                    } else if (password == "") {
                        $("password").addClass("error");
                        $("#passHelp").html('<i class="fa-solid fa-times-circle fs-5 fs-5"></i>');
                    } else if (password.length < 8) {
                        $("#passHelp").html('min 8 characters <i class="fa-solid fa-times-circle fs-5"></i>')
                        $('#password').addClass("error");
                    } else if (password.length > 18) {
                        $("#passHelp").html('max 18 characters <i class="fa-solid fa-times-circle fs-5"></i>')
                        $('#password').addClass("error");
                    } else if (company == "") {
                        $("#company").addClass("error");
                        $("#compHelp").html('<i class="fa-solid fa-times-circle fs-5 fs-5"></i>');
                    } else if (company.length > 20) {
                        $("#compHelp").html('max 20 letters <i class="fa-solid fa-times-circle fs-5"></i>')
                        $('#company').addClass("error");
                    } else if (address == "") {
                        $("#address").addClass("error");
                        $("#addHelp").html('<i class="fa-solid fa-times-circle fs-5 fs-5"></i>')
                    } else if (address.length > 50) {
                        $("#addHelp").html('max 50 letters <i class="fa-solid fa-times-circle fs-5"></i>')
                        $('#address').addClass("error");
                    } else if (empno == "") {
                        $("#empno").addClass("error");
                        $("#noempHelp").html('<i class="fa-solid fa-times-circle fs-5 fs-5"></i>')
                    } else if (organization == "") {
                        $("#organization").addClass("error");
                        $("#orgHelp").html('<i class="fa-solid fa-times-circle fs-5 fs-5"></i>')
                    } else {
                        $('input').removeClass("error");
                        $(".form-text").html('<i class="fa-solid fa-check fs-4 text-primary"></i>')
                        $.ajax({
                            url: "emp_register.php",
                            type: "POST",
                            data: formData,
                            contentType: false,
                            processData: false,
                            success: function(reg) {
                                if (reg == 1) {
                                    $("#form_submit").trigger("reset");
                                    alert("Registered Successfully");
                                    window.location.href = 'login.php';
                                } else if (reg == 3) {
                                    alert("This Employer Identification Number Already Exist");
                                } else if (reg == 4) {
                                    alert("This Email Already Exist");
                                } else if (reg == 5) {
                                    alert("This Username Already Exist");
                                } else if (reg == 0) {
                                    alert("Image Is Required");
                                }
                            }
                        })
                    }
                });
                $("#ein").keyup(function() {
                    val = $(this).val();
                    if (val.length < 6) {
                        $("#ein").addClass("error");
                        $("#einHelp").html('min 6 number <i class="fa-solid fa-times-circle fs-5"></i>')
                    } else if (val.length > 13) {
                        $("#ein").addClass("error");
                        $("#einHelp").html('max 13 number <i class="fa-solid fa-times-circle fs-5"></i>')
                    } else {
                        $.ajax({
                            type: "post",
                            data: {
                                ein: "EIN",
                                val: val
                            },
                            success: function(valid) {
                                if (valid == "") {
                                    $("#ein").removeClass("error");
                                    $("#einHelp").html(valid + '<i class="fa-solid fa-check fs-4 text-success"></i>')
                                } else {

                                    $("#ein").addClass("error");
                                    $("#einHelp").html(valid)
                                }
                            }
                        })
                    }
                })
                $("#name").keyup(function() {
                    val = $(this).val();
                    if (val.length < 4) {
                        $("#name").addClass("error");
                        $("#nameHelp").html('at least 4 letter <i class="fa-solid fa-times-circle fs-5"></i>')
                    } else if (val.length > 12) {
                        $("#name").addClass("error");
                        $("#nameHelp").html('max 12 letter <i class="fa-solid fa-times-circle fs-5"></i>')
                    } else {
                        $("#name").removeClass("error");
                        $("#nameHelp").html('<i class="fa-solid fa-check fs-4 text-success"></i>')
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
                            type: "post",
                            data: {
                                name: "Email",
                                val: $("#email").val(),
                            },
                            success: function(valid) {
                                if (valid == '') {
                                    $("#email").removeClass("error");
                                    $("#emailHelp").html(valid + '<i class="fa-solid fa-check fs-4 text-success"></i>');

                                } else {
                                    $("#emailHelp").html(valid);
                                    $("#email").addClass("error");
                                }
                            }
                        });
                    }

                });
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
                                if (ans == '') {
                                    ele.removeClass("error");
                                    $("#userHelp").html(ans + '<i class="fa-solid fa-check fs-4 text-success"></i>');
                                } else {
                                    $("#userHelp").html(ans);
                                    ele.addClass("error");

                                }
                            }
                        });
                    }
                })
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
                $("#company").keyup(function() {
                    val = $(this).val();
                    if (val.length > 20) {
                        $("#compHelp").html('max 20 letters <i class="fa-solid fa-times-circle fs-5"></i>')
                        $('#company').addClass("error");
                    } else {
                        $.ajax({
                            type: "POST",
                            data: {
                                ein: "Company_Name",
                                val: val,
                            },
                            success: function(res) {
                                if (res == "") {
                                    $("#compHelp").html('<i class="fa-solid fs-4 fa-check text-primary"></i>')
                                    $('#company').removeClass("error");
                                } else {
                                    $("#compHelp").html(res)
                                    $('#company').addClass("error");
                                }
                            }
                        })
                    }
                })
                $("#address").keyup(function() {
                    val = $("#address").val();
                    if (val.length > 50) {
                        $("#addHelp").html('max 50 letters <i class="fa-solid fa-times-circle fs-5"></i>')
                        $('#address').addClass("error");
                    } else {
                        $("#addHelp").html(' <i class="fa-solid fa-check text-primary fs-4"></i>')
                        $('#address').removeClass("error");
                    }
                })
                $("#empno").keyup(function() {
                    val = $(this).val();
                    if (val != "") {
                        $("#empno").removeClass("error");
                        $("#noempHelp").html('<i class="fa-solid fa-check text-primary fs-4"></i>')
                    } else {
                        $("#empno").addClass("error");
                        $("#noempHelp").html('<i class="fa-solid fa-times-circle fs-5"></i>')
                    }
                })
                $("#organization").keyup(function() {
                    val = $(this).val();
                    if (val != "") {
                        $("#organization").removeClass("error");
                        $("#orgHelp").html('<i class="fa-solid fa-check text-primary fs-4"></i>')
                    } else {
                        $("#organization").addClass("error");
                        $("#orgHelp").html('<i class="fa-solid fa-times-circle fs-5"></i>')
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