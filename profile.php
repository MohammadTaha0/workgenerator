<?php
session_start();
include 'conn.php';
$user_id = $_SESSION['auth_user']['User_ID'];
$seek = mysqli_query($con, "SELECT * FROM `job_seeker` WHERE `User_ID`='$user_id'");
$fet_seek = mysqli_fetch_assoc($seek);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile | <?php echo $fet_seek['Name'] ?></title>
    <?php
    include 'link.php';
    ?>
    <style>
        #click_img_show {
            display: none;
        }

        .pro_cont label {
            width: 100%;
        }

        .pro_cont {
            width: 170px;
            height: 170px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            background: grey;
            color: white;
            margin: auto;
            border: 5px solid lightgrey;
        }

        .pro_cont img {
            object-fit: contain;
            width: 170px;
            height: 170px;
            border-radius: 100%;
        }
    </style>
</head>

<body>

    <div class="container-fluid p-0 w-100 bg-white" id="mybody">
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

        <div class="container my-5">
            <div class="main-body">
                <div class="row gutters-sm position-relative justify-content-center" id="load">
                    <?php
                    $user_id = $_SESSION['auth_user']['User_ID'];
                    if (mysqli_num_rows(mysqli_query($con, "SELECT * FROM `seeker_profile` WHERE `user_id`='$user_id'")) == 0) {
                    ?>
                        <div class="col-lg-8" id="hide">
                            <div class="card">
                                <h4 class="text-center mt-5">Build Your Profile First !</h4>
                                <form id="build_form">
                                    <div class="card-body">
                                        <div class="row align-items-center mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Profile Picture</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="file" name="profile" id="profile" class="form-control d-none">
                                                <span class="pro_cont">
                                                    <label for="profile">
                                                        <i class="fa-regular fa-camera text-center fa-3x"></i>
                                                    </label>
                                                    <img id="pro_img" class="d-none" src="" alt="">
                                                </span>

                                            </div>
                                        </div>
                                        <div class="row align-items-center mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Designation</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="text" name="desig" id="desig" class="form-control" placeholder="Full Stack Developer">
                                            </div>
                                        </div>
                                        <div class="row align-items-center mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Expertise</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="text" class="form-control" id="expertise" name="expertise" placeholder="PHP">
                                                <div id="emailHelp" class="form-text">Only 1 Required.</div>
                                            </div>
                                        </div>
                                        <div class="row align-items-center mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Address</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="text" id="address" name="address" class="form-control" placeholder="Bay Area, San Francisco, CA">
                                            </div>
                                        </div>
                                        <div class="row align-items-center mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Previouse Company Name</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="text" id="prv_comp" name="prv_comp" class="form-control" placeholder="Twitter">
                                            </div>
                                        </div>
                                        <div class="row align-items-center mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Current Company Name</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="text" id="curr_comp" name="curr_comp" class="form-control" placeholder="Google">
                                            </div>
                                        </div>
                                        <div class="row align-items-center mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Mobile</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="text" id="mob" name="mob" class="form-control" placeholder="+92 342 959 411">
                                            </div>
                                        </div>
                                        <div class="row align-items-center mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Category</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <select name="category" class="form-select" id="category">
                                                    <?php
                                                    $crt = mysqli_query($con, "SELECT * FROM `category`");
                                                    while ($catfet = mysqli_fetch_array($crt)) {
                                                    ?>
                                                        <option value="<?php echo $catfet['cat_id'] ?>"><?php echo $catfet['cat_name'] ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row align-items-center mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Skills</h6>
                                            </div>
                                            <style>
                                                *,
                                                *:after,
                                                *:before {
                                                    -webkit-box-sizing: border-box;
                                                    -moz-box-sizing: border-box;
                                                    -ms-box-sizing: border-box;
                                                    box-sizing: border-box;
                                                }

                                                body {
                                                    font-family: arial;
                                                    font-size: 16px;
                                                    margin: 0;
                                                    background: #0f4dff;
                                                    background: #003ce9;
                                                    background: #0276ad;

                                                    color: #fff;
                                                    display: flex;
                                                    align-items: center;
                                                    justify-content: center;
                                                    min-height: 100vh;
                                                }

                                                #multi_option {
                                                    max-width: 100%;
                                                    /* width: 350px; */
                                                }


                                                .vscomp-toggle-button {
                                                    padding: 10px 30px 10px 10px;
                                                    border-radius: 5px;
                                                }
                                            </style>
                                            <div class="col-12 col-sm-9 text-secondary">
                                                <select id="multi_option" class="col-12" multiple name="native-select" placeholder="Native Select" data-silent-initial-value-set="false">
                                                    <?php
                                                    $crt = mysqli_query($con, "SELECT * FROM `skills`");
                                                    while ($catfet = mysqli_fetch_array($crt)) {
                                                    ?>
                                                        <option value="<?php echo $catfet['skills'] ?>"><?php echo $catfet['skills'] ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row align-items-center mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Experience</h6>
                                            </div>
                                            <div class="col-12 col-sm-9 text-secondary">
                                                <div class="row align-items-center justify-content-center">
                                                    <div class="col-9 me-0">
                                                        <input type="text" id="exper" name="exper" placeholder="Experince" class="form-control w-100">
                                                    </div>
                                                    <div class="col-3 ms-0">
                                                        <select name="year" id="year" class="form-select w-100">
                                                            <option value="Year">Year</option>
                                                            <option value="Month">Month</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row align-items-center mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Git Hub</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input id="git" name="git" type="text" class="form-control" placeholder="https://github.com">
                                            </div>
                                        </div>
                                        <div class="row align-items-center mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Linkedin</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input id="linked" name="linked" type="text" class="form-control" placeholder="https://www.linkedin.com">
                                            </div>
                                        </div>
                                        <div class="row align-items-center mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Twitter</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input id="twitter" name="twitter" type="text" class="form-control" placeholder="https://twitter.com">
                                            </div>
                                        </div>
                                        <div class="row align-items-center mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Facebook</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input id="facebook" name="facebook" type="text" class="form-control" placeholder="https://www.facebook.com">
                                            </div>
                                        </div>
                                        <div class="row align-items-center mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Fiverr</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input id="fiverr" name="fiverr" type="text" class="form-control" placeholder="https://www.fiverr.com">
                                            </div>
                                        </div>
                                        <div class="row align-items-center mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">UpWork</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input id="upwork" name="upwork" type="text" class="form-control" placeholder="https://www.upwork.com">
                                            </div>
                                        </div>
                                        <div class="row align-items-center">
                                            <div class="col-sm-3"></div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="submit" class="btn btn-primary px-4" value="Build" id="build" name="build">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    <?php
                    } else {
                    ?>
                        <div class="col-md-4 mb-3 col-4" id="sidebar">

                        </div>
                        <div class="col-md-8" id="rightbar">

                        </div>
                </div>
            <?php
                    }
            ?>
            </div>
        </div>

    </div>


    <style type="text/css">
        body {
            margin-top: 20px;
            color: #1a202c;
            text-align: left;
            background-color: #e2e8f0;
        }

        .main-body {
            padding: 15px;
        }

        .card {
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
        }

        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 0 solid rgba(0, 0, 0, .125);
            border-radius: .25rem;
        }

        .card-body {
            flex: 1 1 auto;
            min-height: 1px;
            padding: 1rem;
        }

        .gutters-sm {
            margin-right: -8px;
            margin-left: -8px;
        }

        .gutters-sm>.col,
        .gutters-sm>[class*=col-] {
            padding-right: 8px;
            padding-left: 8px;
        }

        .mb-3,
        .my-3 {
            margin-bottom: 1rem !important;
        }

        .bg-gray-300 {
            background-color: #e2e8f0;
        }

        .h-100 {
            height: 100% !important;
        }

        .shadow-none {
            box-shadow: none !important;
        }
    </style>
    <script>
        $(document).ready(function() {
            $("#build_form").on("submit", function(e) {
                var formData = new FormData(this);
                e.preventDefault();
                pro_img = $("#profile").val();
                desig = $("#desig").val();
                expertise = $("#expertise").val();
                address = $("#address").val();
                prv_comp = $("#prv_comp").val();
                curr_comp = $("#curr_comp").val();
                mob = $("#mob").val();
                category = $("#category").val();
                skills = $("#multi_option").val();
                exper = $("#exper").val();
                year = $("#year").val();
                git = $("#git").val();
                linked = $("#linked").val();
                twiiter = $("#twitter").val();
                facebook = $("#facebook").val();
                fiver = $("#fiverr").val();
                upwork = $("#upwork").val();
                console.log(pro_img, desig, expertise, address, prv_comp, curr_comp, mob, category, skills, exper, git, linked, twiiter, facebook, fiver, upwork);
                $.ajax({
                    url: "profilecode.php",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(pro_data) {
                        console.log(pro_data);
                        if (pro_data == 1) {
                            alert("Build Your Profile SuccessFully")
                            $("#hide").fadeOut(500);
                            $("#show").fadeIn(500);
                            $("#load").load();
                        } else {
                            alert("Something Went Wrong")
                        }
                    }
                })
            })
            $("#pro_img_click").mouseover(function() {
                $("#click_img_show").fadeIn(400);
            })
            $("#click_img_show").mouseleave(function() {
                $("#click_img_show").fadeOut(400);

            })
            $.ajax({
                url: "seeker_profile_sidebar.php",
                type: "GET",
                dataType: "html",
                success: function(fata) {
                    $("#sidebar").html(fata);
                }
            })
            $.ajax({
                url: "seeker_profile_rightbar.php",
                type: "GET",
                dataType: "html",
                success: function(fata) {
                    $("#rightbar").html(fata);
                }
            })
        });
    </script>
    <?php
    include 'footer.php';
    ?>
</body>

<?php
include 'link.php';
?>

</html>