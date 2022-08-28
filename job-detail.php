<?php
session_start();
include 'conn.php';
if (!isset($_SESSION['seeker'])) {
    $_SESSION['errormsg'] = "Please Login With Seeker ID First!";
    header("location: index.php");
}
$jobid = $_GET['jobid'];
if (mysqli_num_rows($jobselect = mysqli_query($con, "SELECT *,DATE_FORMAT(Date,'%y-%m-%d') FROM `jobs` WHERE `Auto_generated_ID`='$jobid'")) > 0); {
    $fetchjob = mysqli_fetch_assoc($jobselect);
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
    <div class="container-fliud bg-white p-0 w-100">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

        <?php
        include 'header.php';
        ?>

        <!-- Header End -->
        <div class="container-xxl py-5 bg-dark page-header mb-5">
            <div class="container my-5 pt-5 pb-4">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Job Detail</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb text-uppercase">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page"><?php echo $fetchjob['Title']; ?></li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Header End -->


        <!-- Job Detail Start -->
        <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="container">
                <div class="row gy-5 gx-4">
                    <div class="col-lg-8">
                        <div class="d-flex align-items-center mb-5">
                            <img class="flex-shrink-0 img-fluid border rounded" src="img/com-logo-2.jpg" alt="" style="width: 80px; height: 80px;">
                            <div class="text-start ps-4">
                                <h3 class="mb-3"><?php echo $fetchjob['Title']; ?></h3>
                                <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i><?php echo $fetchjob['Location']; ?></span>
                                <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i><?php echo (($fetchjob['Job_Role'] == "0") ? "Part Time" : "Full Time"); ?></span>
                                <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary me-2"></i><?php echo $fetchjob['min_sal'] . ' - ' . $fetchjob['max_sal']; ?></span>
                            </div>
                        </div>

                        <div class="mb-5">
                            <h4 class="mb-3">Job description</h4>
                            <p><?php echo $fetchjob['Description']; ?></p>
                            <h4 class="mb-3">Skills</h4>
                            <p>Followings Skills are neccessory</p>
                            <ul class="list-unstyled" id="ulskills">
                                <input type="hidden" value="<?php echo $fetchjob['Skills']; ?>" id="arrayval">
                            </ul>
                        </div>

                        <script>
                            var array = document.getElementById("arrayval").value;
                            var substr = array.split(',');
                            for (i = 0; i < substr.length; ++i) {
                                var ul = document.getElementById("ulskills");
                                var li = document.createElement("li");
                                var span = document.createElement("span");
                                var span2 = document.createElement("span");
                                span2.innerText = substr[i]
                                ul.append(li);
                                // var k = document.createElement("i");
                                li.append(span)
                                // li.append(k)
                                span.append(span2)
                                span.setAttribute("class", "fa fa-angle-right text-primary me-4")
                                span2.setAttribute("class", "text-dark ms-2")
                                span2.setAttribute("style", "font-size: 12px;letter-spacing: 1px;color:rgba(0,0,0,0.7)!important;")


                            }
                        </script>
                        <div class="">
                            <h4 class="mb-4">Apply For The Job</h4>
                            <form id="form" enctype="multipart/form-data">
                                <div class="row g-3">
                                    <div class="col-12 col-sm-6">
                                        <input type="file" class="form-control d-none" name="file" id="file">
                                        <label for="file" id="lab" class="border w-100 h6 bg-primary text-light py-2 d-flex align-items-center justify-content-center" style="cursor: pointer;">Upload Your Resume</label>
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
                                            width: 350px;
                                        }

                                        label {
                                            display: block;
                                            font-size: 18px;
                                            font-weight: 700;
                                            margin-bottom: 5px;
                                        }

                                        .vscomp-toggle-button {
                                            padding: 10px 30px 10px 10px;
                                            border-radius: 5px;
                                        }
                                    </style>
                                    <div class="col-6">
                                        <select id="multi_option" class="w-100" multiple name="native-select" placeholder="Native Select" data-silent-initial-value-set="false">
                                            <?php

                                            $skills = ['HTML', 'CSS', 'Java Script', 'Jquery', 'Wordpress', 'PHP', 'ASP.Net', 'Bootsrap 5', 'React', 'Angular', 'Laravel', 'Django', 'Flutter', 'Dart Programming'];
                                            for ($i = 0; $i < count($skills); $i++) {
                                            ?>
                                                <option value="<?php echo $skills[$i]; ?>"><?php echo $skills[$i]; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                        <input type="hidden" name="job_id" id="job_id" value="<?php echo $jobid; ?>">
                                    </div>
                                    <div class="col-12">
                                        <textarea class="form-control" rows="5" placeholder="Messege" id="msg" name="msg"></textarea>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100 mt-5" type="submit" name="submit" id="submit">Apply Now</button>
                                    </div>
                                </div>
                            </form>
                            <script>
                                $(document).ready(function() {
                                    $("#file").change(function() {
                                        // alert("taha")
                                        resume = $("#file").val();
                                        //    alert(resume);
                                        $("#lab").text(resume);
                                    })
                                    $("#form").on("submit", function(e) {
                                        var formData = new FormData(this);
                                        e.preventDefault();
                                        // alert($("#multi_option").val());
                                        name = $("#name").val();
                                        email = $("#email").val();
                                        phone = $("#phone").val();
                                        file = $("#file").val();
                                        multi_option = $("#multi_option").val();
                                        jobid = $("#job_id").val();
                                        msg = $("#msg").val();
                                        if (file == "") {
                                            alert("Resume Is Required");
                                        } else if (multi_option == "") {
                                            alert("At least 1 Skills Are Required");
                                        } else if (msg == "") {
                                            alert("Messege Is Required");
                                        } else {
                                            $.ajax({
                                                url: "apply.php",
                                                type: "POST",
                                                data: formData,
                                                contentType: false,
                                                processData: false,
                                                success: function(data) {
                                                    if (data == 1) {
                                                        alert("APPLIED");
                                                    } else if (data == 0) {
                                                        alert("sorry");
                                                    } else if (data == 4) {
                                                        alert("Already Applied");
                                                    }
                                                }
                                            })
                                        }
                                    })
                                });
                            </script>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="bg-light rounded p-5 mb-4 wow slideInUp" data-wow-delay="0.1s">
                            <h4 class="mb-4">Job Summery</h4>
                            <p><i class="fa fa-angle-right text-primary me-2"></i>Publish Date: <?php
                                                                                                $month_num =  date("m", strtotime($fetchjob['lastdate']));
                                                                                                switch ($month_num) {
                                                                                                    case 1:
                                                                                                        $name = "Jan";
                                                                                                        break;
                                                                                                    case 2:
                                                                                                        $name = "Feb";
                                                                                                        break;
                                                                                                    case 3:
                                                                                                        $name = "Mar";
                                                                                                        break;
                                                                                                    case 4:
                                                                                                        $name = "Apr";
                                                                                                        break;
                                                                                                    case 5:
                                                                                                        $name = "May";
                                                                                                        break;
                                                                                                    case 6:
                                                                                                        $name = "June";
                                                                                                        break;
                                                                                                    case 7:
                                                                                                        $name = "July";
                                                                                                        break;
                                                                                                    case 8:
                                                                                                        $name = "Aug";
                                                                                                        break;
                                                                                                    case 9:
                                                                                                        $name = "Sept";
                                                                                                        break;
                                                                                                    case 10:
                                                                                                        $name = "Oct";
                                                                                                        break;
                                                                                                    case 11:
                                                                                                        $name = "Nov";
                                                                                                        break;
                                                                                                    case 12:
                                                                                                        $name = "Dec";
                                                                                                        break;
                                                                                                };

                                                                                                echo date("d", strtotime($fetchjob['lastdate'])) . '/' . $name . '/' . date("Y", strtotime($fetchjob['lastdate']));
                                                                                                ?></p>
                            <p><i class="fa fa-angle-right text-primary me-2"></i>Job Nature: <?php echo (($fetchjob['Job_Role'] == 0) ? "Part Time" : "Full Time"); ?></p>
                            <p><i class="fa fa-angle-right text-primary me-2"></i>Salary: <?php echo $fetchjob['min_sal'] . ' - ' . $fetchjob['max_sal']; ?></p>
                            <p><i class="fa fa-angle-right text-primary me-2"></i>Location: <?php echo $fetchjob['Location']; ?></p>
                            <p class="m-0"><i class="fa fa-angle-right text-primary me-2"></i>
                                <small class="text-truncate mt-2 fs-6">
                                    <input type="hidden" data-role="jobid" value="<?php echo $jobrow['Auto_generated_ID']; ?>">Date-Line: <span data-role="left" data-value="<?php echo $fetchjob['Auto_generated_ID']; ?>" data-id="<?php echo $fetchjob['lastdate']; ?>"></span>
                                </small>
                            </p>
                        </div>
                        <div class="bg-light rounded p-5 wow slideInUp" data-wow-delay="0.1s">
                            <h4 class="mb-4">Company Detail</h4>
                            <p class="m-0"><?php echo $fetchjob['Description']; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Job Detail End -->


        <!-- Footer Start -->
        <?php
        include 'footer.php';
        ?>
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <?php
    include 'link.php';
    ?>
    <script type="text/javascript" src="./js/virtual-select.min.js"></script>
    <script type="text/javascript">
        VirtualSelect.init({
            ele: '#multi_option'
        });
    </script>
</body>


</html>