<?php
session_start();
include 'conn.php';
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
        #close {
            transition: .5s;
            opacity: .3;
        }

        #close:hover {
            opacity: 1;
        }

        #closecont {
            display: none;
        }

        #closecont div .col-12 {
            display: none;
        }
    </style>
</head>

<body class="position-relative">
    <?php
    if (isset($_SESSION['seeker'])) {



        if (isset($_SESSION['errormsg'])) {
    ?>
            <script>
                alert("<?php echo $_SESSION['errormsg']; ?>");
            </script>
    <?php
            unset($_SESSION['errormsg']);
        }
    }
    ?>
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


        <!-- Carousel Start -->
        <div class="container-fluid p-0">
            <div class="owl-carousel header-carousel position-relative">
                <div class="owl-carousel-item position-relative">
                    <img class="img-fluid" src="img/carousel-1.jpg" alt="">
                    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(43, 57, 64, .5);">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-10 col-lg-8">
                                    <?php
                                    if (isset($_SESSION['employer'])) {
                                    ?>
                                        <h1 class="display-3 text-white animated slideInDown mb-4">Find The Best talent That Fit Your Jobs</h1>
                                        <p class="fs-5 fw-medium text-white mb-4 pb-2">Vero elitr justo clita lorem. Ipsum dolor at sed stet sit diam no. Kasd rebum ipsum et diam justo clita et kasd rebum sea elitr.</p>
                                        <a href="#searchcont" class="btn btn-secondary py-md-3 px-md-5 animated slideInRight">Find A Talent</a>
                                    <?php
                                    } elseif (isset($_SESSION['seeker'])) {
                                    ?>
                                        <h1 class="display-3 text-white animated slideInDown mb-4">Find The Best Startup Job That Fit You</h1>
                                        <p class="fs-5 fw-medium text-white mb-4 pb-2">Vero elitr justo clita lorem. Ipsum dolor at sed stet sit diam no. Kasd rebum ipsum et diam justo clita et kasd rebum sea elitr.</p>
                                        <a href="#searchcont" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Search A Job</a>
                                    <?php
                                    } else {
                                    ?>
                                        <h1 class="display-3 text-white animated slideInDown mb-4">Find The Best Startup Job That Fit You</h1>
                                        <p class="fs-5 fw-medium text-white mb-4 pb-2">Vero elitr justo clita lorem. Ipsum dolor at sed stet sit diam no. Kasd rebum ipsum et diam justo clita et kasd rebum sea elitr.</p>
                                        <a href="#searchcont" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Search A Job</a>

                                        <a href="#searchcont" class="btn btn-secondary py-md-3 px-md-5 animated slideInRight">Find A Talent</a>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="owl-carousel-item position-relative">
                    <img class="img-fluid" src="img/carousel-2.jpg" alt="">
                    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(43, 57, 64, .5);">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-10 col-lg-8">
                                    <?php
                                    if (isset($_SESSION['employer'])) {
                                    ?>
                                        <h1 class="display-3 text-white animated slideInDown mb-4">Find The Best talent That Fit Your Jobs</h1>
                                        <p class="fs-5 fw-medium text-white mb-4 pb-2">Vero elitr justo clita lorem. Ipsum dolor at sed stet sit diam no. Kasd rebum ipsum et diam justo clita et kasd rebum sea elitr.</p>
                                        <a href="#searchcont" class="btn btn-secondary py-md-3 px-md-5 animated slideInRight">Find A Talent</a>
                                    <?php
                                    } elseif (isset($_SESSION['seeker'])) {
                                    ?>
                                        <h1 class="display-3 text-white animated slideInDown mb-4">Find The Best Startup Job That Fit You</h1>
                                        <p class="fs-5 fw-medium text-white mb-4 pb-2">Vero elitr justo clita lorem. Ipsum dolor at sed stet sit diam no. Kasd rebum ipsum et diam justo clita et kasd rebum sea elitr.</p>
                                        <a href="#searchcont" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Search A Job</a>
                                    <?php
                                    } else {
                                    ?>
                                        <h1 class="display-3 text-white animated slideInDown mb-4">Find The Best Startup Job That Fit You</h1>
                                        <p class="fs-5 fw-medium text-white mb-4 pb-2">Vero elitr justo clita lorem. Ipsum dolor at sed stet sit diam no. Kasd rebum ipsum et diam justo clita et kasd rebum sea elitr.</p>
                                        <a href="#searchcont" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Search A Job</a>

                                        <a href="#searchcont" class="btn btn-secondary py-md-3 px-md-5 animated slideInRight">Find A Talent</a>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Carousel End -->


        <!-- Search Start -->
        <?php
        if (isset($_SESSION['employer'])) {

        ?>
            <div class="container-fluid bg-primary mb-5 wow fadeIn" data-wow-delay="0.1s" style="padding: 35px;" id="searchcont">
                <div class="container">
                    <div class="row g-2">
                        <div class="col-md-10">
                            <div class="row g-2">
                                <div class="col-md-4">
                                    <input type="text" class="form-control border-0" placeholder="Search Talent" id="talent_search" name="talent_search" />
                                </div>
                                <div class="col-md-4">
                                    <select class="form-select border-0" id="exper_search" name="exper_search">
                                        <option selected>Experience</option>
                                        <?php
                                        $exper = mysqli_query($con, "SELECT `exper` FROM `seeker_profile` ORDER BY `exper` ASC");
                                        while ($exper_fetch = mysqli_fetch_array($exper)) {

                                        ?>
                                            <option value="<?php echo $exper_fetch['exper'] ?>"><?php echo $exper_fetch['exper'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <select class="form-select border-0" id="cat_search" name="cat_search">
                                        <option selected>Category</option>
                                        <?php
                                        $category = mysqli_query($con, "SELECT `cat_name` FROM `category` ORDER BY `cat_name` ASC");
                                        while ($category_fetch = mysqli_fetch_array($category)) {

                                        ?>
                                            <option value="<?php echo $category_fetch['cat_id'] ?>"><?php echo $category_fetch['cat_name'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-dark border-0 w-100" type="button" id="search_talent">Search</button>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        } else {
        ?>
            <div class="container-fluid bg-success mb-5 wow fadeIn" data-wow-delay="0.1s" style="padding: 35px;">
                <div class="container">
                    <form id="form">
                        <div class="row g-2">
                            <div class="col-md-10">
                                <div class="row g-2">
                                    <div class="col-md-4">
                                        <input type="text" class="form-control border-0" placeholder="Keyword" id="title_srch" name="title_srch" required>
                                    </div>
                                    <div class="col-md-4">
                                        <select class="form-select border-0" name="cat_srch" id="cat_srch" required>
                                            <option selected>Category</option>
                                            <?php
                                            if (mysqli_num_rows($jobsel = mysqli_query($con, "SELECT `cat_name` FROM `category` ORDER BY `cat_name` ASC"))) {
                                                while ($selfetch = mysqli_fetch_array($jobsel)) {
                                            ?>
                                                    <option value="<?php echo $selfetch['cat_id'] ?>"><?php echo $selfetch['cat_name'] ?></option>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <select class="form-select border-0" name="loc_srch" id="loc_srch" required>
                                            <option selected>Location</option>
                                            <?php
                                            if (mysqli_num_rows($jobsel = mysqli_query($con, "SELECT `Location` FROM `jobs` ORDER BY `Location` ASC"))) {
                                                while ($selfetch = mysqli_fetch_array($jobsel)) {
                                            ?>
                                                    <option value="<?php echo $selfetch['Location'] ?>"><?php echo $selfetch['Location'] ?></option>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-primary border-0 w-100" type="button" id="srch">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        <?php
        }
        ?>
        <!-- Search End -->
        <div class="container">
            <div class="tab-cont" id="res">
            </div>
        </div>
        <style>
            #talent_result .col-3 {
                /* display: none; */
                transition: 1s;
            }
        </style>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-11">
                    <div class="row justify-content-center" id="talent_result">

                    </div>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function() {
                $("#srch").click(function() {
                    key = $("#title_srch").val();
                    key = $("#cat_srch").val();
                    key = $("#title_srch").val();

                    $.post(
                        "search.php",
                        $("#form").serialize(),
                        function(data) {
                            // alert("data");
                            $("#res").html(data);
                        }
                    )
                })
                $("#search_talent").click(function() {
                    $("div[data-role=talent_res]").animate({
                        'opacity': '0.0'
                    });
                    talent = $("#talent_search").val();
                    exper = $("#exper_search").val();
                    cat = $("#cat_search").val();
                    if (talent == "") {
                        alert("Talent Is Required");
                    } else if (exper == "Experience") {
                        alert("Experience Is Required");
                    } else if (cat == "category") {
                        alert("category Is Required");
                    } else {
                        $.post(
                            "search_talent.php", {
                                talent: talent,
                                exper: exper,
                                cat: cat,
                            },
                            function(talent_data) {
                                $("#talent_result").html(talent_data);
                                $("div[data-role=talent_res]").animate({
                                    'opacity': '1'
                                }, 1000);

                            }
                        )
                    }
                    // alert(talent + " " + exper + " " + skill) 
                })
            });
        </script>

        <!-- Category Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Explore Our Company</h1>
                <div class="row g-4 mt-2 justify-content-center">
                    <?php
                    if (mysqli_num_rows($cat = mysqli_query($con, "SELECT `ID`,`Company_Name`,`Number_of_Employees` FROM `employer`")) > 0) {
                        while ($cet_data = mysqli_fetch_array($cat)) {
                    ?>
                            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                                <a class="cat-item rounded p-4" href="company_details.php?comp_id=<?php echo $cet_data['ID'] ?>">
                                    <i class="fa-regular fa-buildings fa-3x text-primary mb-4"></i>
                                    <h6 class="mb-3"><?php echo $cet_data['Company_Name'] ?></h6>
                                    <p class="mb-0"><?php echo $cet_data['Number_of_Employees'] ?> Employees</p>
                                </a>
                            </div>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
        <!-- Category End -->


        <?php
        if (isset($_SESSION['employer'])) {
        } else {
        ?>
            <!-- About Start -->

            <div class="container-xxl py-5">
                <div class="container">
                    <div class="row g-5 align-items-center">
                        <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                            <div class="row g-0 about-bg rounded overflow-hidden">
                                <div class="col-6 text-start">
                                    <img class="img-fluid w-100" src="img/about-1.jpg">
                                </div>
                                <div class="col-6 text-start">
                                    <img class="img-fluid" src="img/about-2.jpg" style="width: 85%; margin-top: 15%;">
                                </div>
                                <div class="col-6 text-end">
                                    <img class="img-fluid" src="img/about-3.jpg" style="width: 85%;">
                                </div>
                                <div class="col-6 text-end">
                                    <img class="img-fluid w-100" src="img/about-4.jpg">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                            <h1 class="mb-4">We Help To Get The Best Job And Find A Talent</h1>
                            <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet</p>
                            <p><i class="fa fa-check text-primary me-3"></i>Tempor erat elitr rebum at clita</p>
                            <p><i class="fa fa-check text-primary me-3"></i>Aliqu diam amet diam et eos</p>
                            <p><i class="fa fa-check text-primary me-3"></i>Clita duo justo magna dolore erat amet</p>
                            <a class="btn btn-primary py-3 px-5 mt-3" href="">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- About End -->


            <!-- Jobs Start -->
            <div class="container-xxl py-5">
                <div class="container">
                    <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Job Listing</h1>
                    <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.3s">
                        <ul class="nav nav-pills d-inline-flex justify-content-center border-bottom mb-5">
                            <li class="nav-item">
                                <a class="d-flex align-items-center text-start mx-3 ms-0 pb-3 active" data-bs-toggle="pill" href="#tab-1">
                                    <h6 class="mt-n1 mb-0">Featured</h6>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="d-flex align-items-center text-start mx-3 pb-3" data-bs-toggle="pill" href="#tab-2" name="full_time">
                                    <h6 class="mt-n1 mb-0">Full Time</h6>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="d-flex align-items-center text-start mx-3 me-0 pb-3" data-bs-toggle="pill" href="#tab-3">
                                    <h6 class="mt-n1 mb-0">Part Time</h6>
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div id="tab-1" class="tab-pane fade show p-0 active">

                                <a class="btn btn-primary py-3 px-5" href="./job-list.php">Browse More Jobs</a>

                            </div>

                            <div id="tab-2" class="tab-pane fade show p-0">
                                <a class="btn btn-primary py-3 px-5" href="./job-list.php">Browse More Jobs</a>
                            </div>
                            <div id="tab-3" class="tab-pane fade show p-0">
                                <?php
                                if ($jobs = mysqli_query($con, "SELECT * FROM `jobs` WHERE `Job_Role`=0")) {
                                    if (mysqli_num_rows($jobs)) {
                                        while ($jobrow = mysqli_fetch_array($jobs)) {
                                ?>
                                            <div class="job-item p-4 mb-4">
                                                <div class="row g-4">
                                                    <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                                        <img class="flex-shrink-0 img-fluid border rounded" src="img/com-logo-1.jpg" alt="" style="width: 80px; height: 80px;">
                                                        <div class="text-start ps-4">
                                                            <h5 class="mb-3"><?php echo $jobrow['Title']; ?></h5>
                                                            <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i><?php echo $jobrow['Location']; ?></span>
                                                            <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i><?php if ($jobrow['Job_Role'] == 0) {
                                                                                                                                                echo "Part Time";
                                                                                                                                            } elseif ($jobrow['Job_Role'] == 1) {
                                                                                                                                                echo "Full Time";
                                                                                                                                            } ?></span>
                                                            <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary me-2"></i><?php echo $jobrow['min_sal'] . ' - ' . $jobrow['max_sal']; ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                                        <div class="d-flex mb-3">
                                                            <?php
                                                            if (isset($_SESSION['seeker'])) {
                                                            ?>
                                                                <a class="btn btn-light btn-square me-3" href=""><i class="far fa-heart text-primary"></i></a>
                                                                <a class="btn btn-primary" href="./job-detail.php?jobid=<?php echo $jobrow['Auto_generated_ID']; ?>">View Details</a>
                                                            <?php
                                                            } else {
                                                            ?>
                                                                <a class="btn btn-light btn-square me-3" href="./login.php"><i class="far fa-heart text-primary"></i></a>
                                                                <a class="btn btn-primary" href="./login.php">View Details</a>
                                                            <?php
                                                            }
                                                            ?>
                                                        </div>
                                                        <small class="text-truncate"><i class="fa-regular fa-calendar text-primary me-2"></i>Publish: <time class="timeago" datetime="<?php echo $jobrow['Date']; ?>"></time></small>
                                                        <small class="text-truncate mt-2"><i class="fa-regular fa-clock text-primary me-2"></i>
                                                            <input type="hidden" data-role="jobid" value="<?php echo $jobrow['Auto_generated_ID']; ?>"><span data-role="left" data-value="<?php echo $jobrow['Auto_generated_ID']; ?>" data-id="<?php echo $jobrow['lastdate']; ?>"></span> </small>
                                                    </div>
                                                </div>
                                            </div>
                                <?php
                                        }
                                    }
                                }
                                ?>
                                <a class="btn btn-primary py-3 px-5" href="job-list.php">Browse More Jobs</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Jobs End -->
        <?php
        }
        ?>

        <?php
        if (isset($_SESSION['employer'])) {
            $for_status_emp_id = $_SESSION['auth_user']['ID'];
            if ($status_query = mysqli_query($con, "SELECT `Status` FROM `employer` WHERE `ID`=$for_status_emp_id")) {
                $fetch_status = mysqli_fetch_array($status_query);
                if ($fetch_status['Status'] == "active") {
        ?>

                    <div class="container-xxl py-5 faseIn">
                        <div class="row justify-content-center position-relative">
                            <div class="col-md-12 mb-4">
                                <div class="" data-wow-delay="0.5s">
                                    <div class="container-xxl py-5 faseIn">
                                        <div class="row justify-content-center p-0 flex-column-reverse align-items-center">
                                            <div class="col-md-5 my-5 position-absolute bg-white border border-light border-3 shadow top-25 px-0" style="z-index: 99999;" id="frommm">
                                                <button type="button" id="update_close" class="btn btn-primary position-absolute top-0 end-0"><i class="fa-solid fa-times"></i></button>
                                                <div class="" data-wow-delay="0.5s">
                                                    <h4 class="mb-4 text-center text-light bg-dark py-4 m-0">UPDATE JOB</h4>
                                                    <form id="jobform" data-role="update_form" class="px-3">
                                                        <div class="row g-3">
                                                            <div class="col-md-6">
                                                                <div class="form-floating">
                                                                    <input type="text" class="form-control" id="title" placeholder="Title" name="title">
                                                                    <label for="title">Title</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-floating">
                                                                    <input type="text" class="form-control" id="cat" placeholder="category" name="cat">
                                                                    <label for="cat">Category</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-floating">
                                                                    <input type="number" class="form-control" id="misal" name="minsal" placeholder="Minimum Salary">
                                                                    <label for="misal">Minimum Salary</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-floating">
                                                                    <input type="number" class="form-control" id="maxsal" name="maxsal" placeholder="Maximum Salary">
                                                                    <label for="maxsal">Maximum Salary</label>
                                                                </div>
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

                                                                #multi_option {
                                                                    max-width: 100%;
                                                                    height: auto !important;
                                                                    width: 350px;
                                                                    /* height: 100% !important; */
                                                                }

                                                                .vscomp-toggle-button {
                                                                    padding: 10px 30px 10px 10px;
                                                                    border-radius: 5px;
                                                                }
                                                            </style>
                                                            <div class="col-12">
                                                                <div class="form-floating">
                                                                    <select id="multi_option" class="w-100" multiple name="native-select" placeholder="Skills" data-silent-initial-value-set="false">
                                                                        <?php

                                                                        $skills = ['HTML', 'CSS', 'JavaScript', 'Jquery', 'Wordpress', 'PHP', 'ASP.Net', 'Bootsrap5', 'React', 'Angular', 'Laravel', 'Django', 'Flutter', 'Dart Programming'];
                                                                        for ($i = 0; $i < count($skills); $i++) {
                                                                        ?>
                                                                            <option data-role="<?php echo $skills[$i]; ?>" class="h-100" value="<?php echo $skills[$i]; ?>"><?php echo $skills[$i]; ?></option>
                                                                        <?php
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                    <input type="hidden" name="job_id" id="job_id" value="<?php echo $jobid; ?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-floating">
                                                                    <input type="text" class="form-control" id="exper" name="exper" placeholder="Experience">
                                                                    <label for="exper">Experience</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-floating">
                                                                    <Select type="number" class="form-select" id="role" name="role">
                                                                        <option data-role="Part" value="0">Part Time</option>
                                                                        <option data-role="Full" value="1">Full Time</option>
                                                                    </Select>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-floating">
                                                                    <input type="date" class="form-control" id="lastdate" name="lastdate" placeholder="Last Date">
                                                                    <label for="lastdate">Last Date</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-floating">
                                                                    <input type="text" class="form-control" id="Location" placeholder="Location" name="location">
                                                                    <label for="Location">Location</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-floating">
                                                                    <textarea class="form-control" placeholder="Leave a message here" id="descrip" style="height: 150px" name="descrip"></textarea>
                                                                    <label for="descrip">Description</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 pb-5 pt-3">
                                                                <input type="hidden" value="" id="update_id">
                                                                <button class="btn btn-primary py-2 px-3" type="button" data-role="update_job">Update Job</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="col-5 position-absolute top-25 bg-white my-5 shadow  border border-light border-3 p-0" style="z-index: 999999;" id="post">
                                                <div class="">
                                                    <button type="button" class="btn-primary position-absolute top-0 end-0" id="closeadd"><i class="fa-solid fa-times"></i></button>
                                                    <h2 class="mb-4 text-center btn-dark py-3">Post Job</h2>
                                                    <form id="jobform2" class="px-3">
                                                        <div class="row g-3">
                                                            <div class="col-md-6">
                                                                <div class="form-floating">
                                                                    <input type="text" class="form-control" id="title" placeholder="Title" name="title">
                                                                    <label for="title">Title</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-floating">
                                                                    <input type="text" class="form-control" id="cat" placeholder="category" name="cat">
                                                                    <label for="cat">Category</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-floating">
                                                                    <input type="text" class="form-control" id="misal" name="minsal" placeholder="Minimum Salary">
                                                                    <label for="misal">Minimum Salary</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-floating">
                                                                    <input type="text" class="form-control" id="maxsal" name="maxsal" placeholder="Maximum Salary">
                                                                    <label for="maxsal">Maximum Salary</label>
                                                                </div>
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

                                                                #multi_option {
                                                                    max-width: 100%;
                                                                    width: 350px;
                                                                    /* height: 100% !important; */
                                                                }

                                                                .vscomp-toggle-button {
                                                                    padding: 10px 30px 10px 10px;
                                                                    border-radius: 5px;
                                                                }
                                                            </style>
                                                            <div class="col-12">
                                                                <div class="form-floating">
                                                                    <select id="multi_option" class="w-100" multiple name="native-select" placeholder="Skills" data-silent-initial-value-set="false">
                                                                        <?php

                                                                        $skills = ['HTML', 'CSS', 'Java Script', 'Jquery', 'Wordpress', 'PHP', 'ASP.Net', 'Bootsrap 5', 'React', 'Angular', 'Laravel', 'Django', 'Flutter', 'Dart Programming'];
                                                                        for ($i = 0; $i < count($skills); $i++) {
                                                                        ?>
                                                                            <option class="h-100" value="<?php echo $skills[$i]; ?>"><?php echo $skills[$i]; ?></option>
                                                                        <?php
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                    <input type="hidden" name="job_id" id="job_id" value="<?php echo $jobid; ?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-floating">
                                                                    <input type="text" class="form-control" id="exper" name="exper" placeholder="Experience">
                                                                    <label for="exper">Experience</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-floating">
                                                                    <Select type="number" class="form-select" id="role" name="role">
                                                                        <option value="" selected class="f">Job Role</option>
                                                                        <option value="0">Part Time</option>
                                                                        <option value="1">Full Time</option>
                                                                    </Select>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-floating">
                                                                    <input type="date" class="form-control" id="lastdate" name="lastdate" placeholder="Last Date">
                                                                    <label for="lastdate">Last Date</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-floating">
                                                                    <input type="text" class="form-control" id="Location" placeholder="Location" name="location">
                                                                    <label for="Location">Location</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-floating">
                                                                    <textarea class="form-control" placeholder="Leave a message here" id="descrip" style="height: 150px" name="descrip"></textarea>
                                                                    <label for="descrip">Description</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 pb-5 pt-3">
                                                                <button class="btn btn-primary py-2 px-3" type="button" id="click">Post Job</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="row justify-content-center">
                                                    <div class="col-3 text-center btn-light py-4 shadow position-absolute top-0" id="delcont">
                                                        <h4 class="mb-3 text-capitalize" id="deltitle">Title</h4>
                                                        <h6 class="mb-3">Do you really want to Delete?</h6>
                                                        <form id="maindelform">
                                                            <input type="hidden" name="inpvaldel" value="" id="delval">
                                                            <button type="button" class="btn btn-dark" id="hidedel">Cancel</button>
                                                            <button type="button" data-role="delthisjob" class="btn btn-light border border-econdary border-2">Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <script>
                                                $(document).ready(function() {
                                                    $("button[data-role=delthisjob]").click(function() {
                                                        $.ajax({
                                                            url: "deletejob.php",
                                                            type: "POST",
                                                            data: $("#maindelform").serialize(),
                                                            success: function(del) {
                                                                console.log(del);
                                                                if (del == 1) {
                                                                    $("#display").load("postjob_display.php", function() {
                                                                        $.ajax({
                                                                            url: "postjob_display.php",
                                                                            type: "GET",
                                                                            dataType: "html",
                                                                            success: function(fata) {
                                                                                $("#display").html(fata);
                                                                            }
                                                                        })
                                                                    });
                                                                    $("#delcont").fadeOut(400);
                                                                    alert("Delete Successfully");
                                                                } else if (del == 0) {
                                                                    alert("Something Went Wrong During Delete This Job");
                                                                }
                                                            }
                                                        })
                                                    })
                                                    $("button[data-role=update_job]").click(function() {
                                                        updid = $("#update_id").val();
                                                        title = $("#title").val();
                                                        cat = $("#cat").val();
                                                        minsal = $("#misal").val();
                                                        maxsal = $("#maxsal").val();
                                                        skills = $("#multi_option").val();
                                                        skills = skills.toString();
                                                        console.log(skills);
                                                        exper = $("#exper").val();
                                                        role = $("#role").val();
                                                        lastdate = $("#lastdate").val();
                                                        Location = $("#Location").val();
                                                        descrip = $("#descrip").val();
                                                        $.ajax({
                                                            url: "updatejob_code.php",
                                                            type: "POST",
                                                            data: {
                                                                updid: updid,
                                                                title: title,
                                                                cat: cat,
                                                                minsal: minsal,
                                                                maxsal: maxsal,
                                                                skills: skills,
                                                                exper: exper,
                                                                role: role,
                                                                lastdate: lastdate,
                                                                Location: Location,
                                                                descrip: descrip
                                                            },
                                                            success: function(upd) {
                                                                if (upd == 1) {
                                                                    $("#display").load("postjob_display.php", function() {
                                                                        $.ajax({
                                                                            url: "postjob_display.php",
                                                                            type: "GET",
                                                                            dataType: "html",
                                                                            success: function(fata) {
                                                                                $("#display").html(fata);
                                                                            }
                                                                        })
                                                                    });
                                                                    $("#frommm").fadeOut(400);
                                                                    alert("Update Job Succesfully")
                                                                } else if (upd == 0) {
                                                                    alert("Something Went Wrong")
                                                                }
                                                            }

                                                        });
                                                    })


                                                    $("#post").fadeOut(10)
                                                    $("#click").click(function() {
                                                        title = $("#title").val();
                                                        cat = $("#cat").val();
                                                        minsal = $("#minsal").val();
                                                        maxsal = $("#maxsal").val();
                                                        skills = $("#multi_option").val();
                                                        exper = $("#exper").val();
                                                        role = $("#role").val();
                                                        lastdate = $("#lastdate").val();
                                                        Location = $("#Location").val();
                                                        descrip = $("#descrip").val();

                                                        $.post(
                                                            "postjob_code.php",
                                                            $("#jobform2").serialize(),
                                                            function(data) {
                                                                $("#jobform2").trigger("reset");
                                                                if (data == 1) {
                                                                    alert("Post Job Successffully");
                                                                } else if (data == 0) {
                                                                    alert("Something Went Wrong!");
                                                                }
                                                            }
                                                        );
                                                    })
                                                    $("#addjobs").click(function() {
                                                        $("#post").fadeIn(400)
                                                    })
                                                    $("#closeadd").click(function() {
                                                        $("#post").fadeOut(400)
                                                    })
                                                });
                                            </script>
                                            <?php

                                            ?>
                                            <div class="col-12 my-5">
                                                <div class="row wow fadeInDown justify-content-between">
                                                    <div class="col-6">
                                                        <h5 class="mb-4">Your Posted Jobs</h5>
                                                    </div>
                                                    <div class="col-6 text-end">
                                                        <button type="button" id="addjobs" title="Add More Jobs" class="btn btn-primary"><i class="fa-light fa-plus"></i></button>
                                                    </div>
                                                    <div class="col-12 align-content-center">
                                                        <table class="table table-bordered align-middle text-center">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>Title</th>
                                                                    <th>Category</th>
                                                                    <th>Salary</th>
                                                                    <th>Skills</th>
                                                                    <th>Experiennce</th>
                                                                    <th>Role</th>
                                                                    <th>Location</th>
                                                                    <th>Description</th>
                                                                    <th>Last Date</th>
                                                                    <th colspan="2">Actions</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="display">

                                                            </tbody>
                                                            <script>
                                                                $(document).ready(function() {
                                                                    $("#click").click(function() {
                                                                        $("#display").load("postjob_display.php", function() {
                                                                            $.ajax({
                                                                                url: "postjob_display.php",
                                                                                type: "GET",
                                                                                dataType: "html",
                                                                                success: function(fata) {
                                                                                    $("#display").html(fata);
                                                                                }
                                                                            })
                                                                        });
                                                                    })
                                                                    $.ajax({
                                                                        url: "postjob_display.php",
                                                                        type: "GET",
                                                                        dataType: "html",
                                                                        success: function(fata) {
                                                                            $("#display").html(fata);
                                                                        }
                                                                    })
                                                                });
                                                            </script>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php

                            if (isset($_POST['update'])) {
                                $hiddenid = $_POST['hiddenid'];
                                $category = $_POST['cat'];
                                $skill = $_POST['skills'];
                                $minsal = $_POST['minsal'];
                                $title = $_POST['title'];
                                $maxsal = $_POST['maxsal'];
                                $job_role = $_POST['role'];
                                $descrip = $_POST['descrip'];
                                $exper = $_POST['exper'];
                                $min_sal = $_POST['minsal'];
                                $max_sal = $_POST['maxsal'];
                                $location = $_POST['location'];
                                $lastdate = $_POST['lastdate'];
                                $run = mysqli_query($con, "UPDATE `jobs` SET `Title`='$title',`Category`='$category',`Location`='$location',`min_sal`='$min_sal',`max_sal`='$max_sal',`Skills`='$skill',`Experience`='$exper',`Job_Role`='$job_role',`Description`='$descrip',`lastdate`='$lastdate' WHERE `Auto_generated_ID`='$hiddenid'");
                                // print_r($run);
                                if ($run) {
                            ?>
                                    <script>
                                        window.location.href = "postedjob.php";
                                    </script>
                            <?php
                                }
                            }
                            ?>
                        </div>
                    </div>



                    <script>
                        $(document).ready(function() {
                            $("#frommm").fadeOut(1);
                        });
                    </script>
                <?php
                } else {
                ?>
                    <div class="container-xxl faseIn py-5">
                        <div class="row justify-content-center wow fadeInUp" data-wow-delay="0.5s">
                            <div class="col-6 text-center bg-danger text-light align-items-center py-3">
                                You are not allow to post any job until we approve your details
                            </div>
                        </div>
                    </div>
            <?php
                }
            }
            ?>

        <?php
        } else {
        }
        ?>


        <!-- Testimonial Start -->
        <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="container">
                <h1 class="text-center mb-5">Our Clients Say!!!</h1>
                <div class="owl-carousel testimonial-carousel">
                    <div class="testimonial-item bg-light rounded p-4">
                        <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                        <p>Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore diam</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded" src="img/testimonial-1.jpg" style="width: 50px; height: 50px;">
                            <div class="ps-3">
                                <h5 class="mb-1">Client Name</h5>
                                <small>Profession</small>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item bg-light rounded p-4">
                        <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                        <p>Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore diam</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded" src="img/testimonial-2.jpg" style="width: 50px; height: 50px;">
                            <div class="ps-3">
                                <h5 class="mb-1">Client Name</h5>
                                <small>Profession</small>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item bg-light rounded p-4">
                        <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                        <p>Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore diam</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded" src="img/testimonial-3.jpg" style="width: 50px; height: 50px;">
                            <div class="ps-3">
                                <h5 class="mb-1">Client Name</h5>
                                <small>Profession</small>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item bg-light rounded p-4">
                        <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                        <p>Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore diam</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded" src="img/testimonial-4.jpg" style="width: 50px; height: 50px;">
                            <div class="ps-3">
                                <h5 class="mb-1">Client Name</h5>
                                <small>Profession</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Testimonial End -->

        <?php
        include 'footer.php';
        ?>


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fa-solid fa-arrow-up"></i></a>
    </div>
    <script src="./timeago/jquery.timeago.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function() {
            $("time.timeago").timeago();
        });
    </script>
    <?php
    include 'link.php';
    ?>
    <script>
        $(document).ready(function() {
            function getjobsdata() {
                $.ajax({
                    url: "alljobscode.php",
                    data: {
                        lim: "LIMIT 6",
                        where: " "
                    },
                    type: "GET",
                    dataType: "html",
                    success: function(jobs) {
                        $("#tab-1").html(jobs);
                    }
                })
                $.ajax({
                    url: "alljobscode.php",
                    data: {
                        lim: "LIMIT 6",
                        where: "WHERE `Job_Role`='1'"
                    },
                    type: "GET",
                    dataType: "html",
                    success: function(fulltime) {
                        $("#tab-2").html(fulltime);
                    }
                })
                $.ajax({
                    url: "alljobscode.php",
                    data: {
                        lim: "LIMIT 6",
                        where: "WHERE `Job_Role`='0'"
                    },
                    type: "GET",
                    dataType: "html",
                    success: function(Paertime) {
                        $("#tab-3").html(Paertime);
                    }
                })
            }
            getjobsdata();
        })
    </script>
</body>


</html>