<?php
session_start();
include 'conn.php';
$user_id = $_SESSION['auth_user']['ID'];
$_SESSION['$session_user_id'] = $user_id;
$seek = mysqli_query($con, "SELECT * FROM `employer` WHERE `ID`='$user_id'");
$fet_seek = mysqli_fetch_assoc($seek);
$job_sql = mysqli_query($con, "SELECT * FROM `jobs` WHERE `emp_id`='$user_id'");
$hire_sql = mysqli_query($con, "SELECT * FROM `applications` WHERE `Status`='1'");
$_SESSION['old_img'] = $fet_seek['emp_img'];
?>

<!-- update test modal  -->

<div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-capitalize" id="exampleModalLabel">Edit Your Name</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-floating mb-3" id="float_email_inp">
                        <input type="text" class="form-control" name="epd_val" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput" id="label_edit">Email address</label>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" data-bs-dismiss="modal" id="save" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>

<!-- update image modal  -->

<div class="modal fade" id="updmodal_img" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-capitalize" id="exampleModalLabel">Edit Your Name</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="upload">
                <div class="modal-body">
                    <div class="col-12 mb-3">
                        <input type="file" class="form-control" name="image" id="file" placeholder="">
                    </div>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" data-bs-dismiss="modal" id="upd_img" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- data -->

<div class="row justify-content-center">
    <div class="col-12 bg-white shadow mb-0 py-3">
        <div class="row justify-content-center text-center mb-5">
            <div class="col-12 rounded-circle shadow d-flex justify-content-center align-items-center" style="width: 150px; height: 150px;" data-bs-target="#updmodal_img" data-bs-toggle="modal" data-bs-whatever="@mdo">
                <img src="<?php echo $fet_seek['emp_img'] ?>" style="object-fit: contain !important;" class="d-block w-100 rounded-circle" alt="" data-id="emp_img" data-value="<?php echo $fet_seek['emp_img'] ?>">
            </div>
            <div class="col-12 mt-5">
                <span class="text-success mb-3 fw-bolder h1"><?php echo $fet_seek['Company_Name'] ?> </span>
                <span><button type="button" class="btn" data-id="Company_Name" data-value="<?php echo $fet_seek['Company_Name'] ?>" data-bs-toggle="modal" data-bs-target="#modal" data-bs-whatever="@mdo"><i class="fa-solid fa-edit"></i></button></span>
                <br>
                <p class="badge text-dark mx-0 fs-6"> <span id="display_followers"></span> Followers</p>
                <p class="badge text-dark mx-0 fs-6"><?php echo mysqli_num_rows($hire_sql); ?> Hires</p>
            </div>
            <div class="col-12 mt-2">
                <button class="btn btn-primary px-4 rounded-3" data-role="<?php echo $fet_seek['role']; ?>" data-id="<?php echo $fet_seek['ID']; ?>" type="button" id="follow">Follow</button>
                <button class="btn btn-light px-4 rounded-3" data-role="<?php echo $fet_seek['role']; ?>" data-id="<?php echo $fet_seek['ID']; ?>" type="button" id="unfollow">Unfollow</button>
                <button class="btn btn-secondary px-4 rounded-3" id="msg">Messege</button>
            </div>
        </div>
    </div>
    <div class="col-12 mt-0 mb-1 py-4">
        <h5 class="text-center my-3 text-success bg-light py-4">Company Details</h5>
        <ul class="list-unstyled p-0 m-0 text-capitalize">
            <li class="mb-3">
                <b><i class="text-success fa-solid fa-angle-right me-2"></i> Company Name</b> : <span class="comp"><?php echo $fet_seek['Company_Name'] ?></span>
                <span><button type="button" class="btn" data-id="Company_Name" data-value="<?php echo $fet_seek['Company_Name'] ?>" data-bs-toggle="modal" data-bs-target="#modal" data-bs-whatever="@mdo"><i class="fa-solid fa-edit"></i></button></span>
            </li>
            <li class="mb-3">
                <b><i class="text-success fa-solid fa-angle-right me-2"></i> Employer Name</b> : <span class="name"><?php echo $fet_seek['Name'] ?></span>
                <span><button type="button" class="btn" data-id="Name" data-value="<?php echo $fet_seek['Name'] ?>" data-bs-toggle="modal" data-bs-target="#modal" data-bs-whatever="@mdo"><i class="fa-solid fa-edit"></i></button></span>
            </li>
            <li class="mb-3">
                <b><i class="text-success fa-solid fa-angle-right me-2"></i> Organization </b> : <span class="type"><?php echo $fet_seek['Type_of_Organization'] ?></span>
                <span><button type="button" class="btn" data-id="Type_of_Organization" data-value="<?php echo $fet_seek['Type_of_Organization'] ?>" data-bs-toggle="modal" data-bs-target="#modal" data-bs-whatever="@mdo"><i class="fa-solid fa-edit"></i></button></span>
            </li>
            <li class="mb-3">
                <b><i class="text-success fa-solid fa-angle-right me-2"></i> Jobs Posted</b> : <?php echo mysqli_num_rows($job_sql); ?> posted
            </li>
            <li class="mb-3">
                <b><i class="text-success fa-solid fa-angle-right me-2"></i> Hires</b> : <?php echo mysqli_num_rows($hire_sql); ?> hires
            </li>
            <li class="mb-3">
                <b><i class="text-success fa-solid fa-angle-right me-2"></i>Address</b> <span class="address">:<?php echo $fet_seek['Address'] ?></span>
                <span><button type="button" class="btn" data-id="Address" data-value="<?php echo $fet_seek['Address'] ?>" data-bs-toggle="modal" data-bs-target="#modal" data-bs-whatever="@mdo"><i class="fa-solid fa-edit"></i></button></span>
            </li>
            <li class="mb-0">
                <b><i class="text-success fa-solid fa-angle-right me-2"></i> Total Employees</b> : <span class="total"><?php echo $fet_seek['Number_of_Employees'] ?></span>
                <span><button type="button" class="btn" data-id="Number_of_Employees" data-value="<?php echo $fet_seek['Number_of_Employees'] ?>" data-bs-toggle="modal" data-bs-target="#modal" data-bs-whatever="@mdo"><i class="fa-solid fa-edit"></i></button></span>
            </li>
        </ul>
    </div>
    <div class="col-12 mt-0 mb-3 py-4 h-auto">
        <h5 class="text-center my-3 text-success bg-light py-4">Employer Details</h5>
        <ul class="list-unstyled p-0 m-0 text-capitalize">
            <li class="mb-3">
                <b><i class="text-success fa-solid fa-angle-right me-2"></i> Employer Name</b> : <span class="name"><?php echo $fet_seek['Name'] ?></span>
                <span><button type="button" class="btn" data-id="Name" data-value="<?php echo $fet_seek['Name'] ?>" data-bs-toggle="modal" data-bs-target="#modal" data-bs-whatever="@mdo"><i class="fa-solid fa-edit"></i></button></span>
            </li>
            <li class="mb-3 text-lowercase">
                <b><i class="text-success fa-solid fa-angle-right me-2"></i> Employer Email</b> : <span class="email"><?php echo $fet_seek['Email'] ?></span>
            </li>
            <li class="mb-3">
                <b><i class="text-success fa-solid fa-angle-right me-2"></i> Contact</b> : <span class="contact"><?php echo $fet_seek['Contact'] ?></span>
                <span><button type="button" class="btn" data-id="Contact" data-value="<?php echo $fet_seek['Contact'] ?>" data-bs-toggle="modal" data-bs-target="#modal" data-bs-whatever="@mdo"><i class="fa-solid fa-edit"></i></button></span>
            </li>
        </ul>
    </div>
</div>

<script>
    $(document).ready(function() {
        $("#upload").on("submit", function(e) {
            var formdata = new FormData(this);
            e.preventDefault();
            if ($("#file").val() == "") {} else {
                $.ajax({
                    url: "upd_img.php",
                    type: "POST",
                    data: formdata,
                    contentType: false,
                    processData: false,
                    success: function(img) {
                        $("#ress").load("employer_profile.php")
                    }
                })
            }
        })
        $("button[data-bs-toggle=modal]").click(function() {
            button = $(this);
            name = $(this).data('id');
            value = $(this).data('value');

            $("#exampleModalLabel").text("Edit Your " + name);
            $("#label_edit").text(name);
            $("#floatingInput").val(value);

            $("#save").click(function() {
                fin_val = $("#floatingInput").val();
                $.post(
                    "upfate_profile.php", {
                        updval: fin_val,
                        name: name,
                    },
                    function(ifupd) {
                        $("#ress").load("employer_profile.php")
                    }
                )
            })
        })
        $.ajax({
            url: "check_follow_or_not.php",
            type: "POST",
            data: {
                cehck_id: $("#follow").data('id'),
                check_role: $("#follow").data('role'),
            },
            success: function(follow) {
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