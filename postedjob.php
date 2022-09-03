<?php
session_start();
include 'conn.php';
if (!isset($_SESSION['employer'])) {
    $_SESSION['errormsg'] = "Please Logged In With Employer ID First!";
    header("location: index.php");
    unset($_SESSION['errormsg']);
}
error_reporting(0);
$editid = $_GET['editid'];
$sql1 = mysqli_query($con, "SELECT * FROM `jobs` WHERE `Auto_generated_ID`='$editid'");
$row1 = mysqli_fetch_array($sql1);

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
        .form-floating {
            height: 45px !important;
        }

        .form-floating .form-control,
        select,
        option {
            height: 100% !important;
            font-size: 15px;
        }

        select {
            font-size: 16px !important;
            /* top: 0% !important; */
            padding: 0px 20px 0px 15px !important;
            position: unset !important;
        }

        .form-floating label {
            top: 0% !important;
            font-size: 14px;
        }

        #frommm {
            /* background: linear-gradient(to right,rgba(122,444,12),rgba(101,174,1)); */
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
        include 'footer.php';
        ?>

        <?php
        $delid = $_GET['delid'];
        $sql2 = mysqli_query($con, "DELETE FROM `jobs` WHERE `Auto_generated_ID`='$delid'");
        if ($sql2) {
            header("Location: postedjob.php");
        }
        ?>

        <!-- Back to Top -->
        
    </div>

    <?php
    include 'link.php';
    ?>

</body>

</html>