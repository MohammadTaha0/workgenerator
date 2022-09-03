<?php
include 'conn.php';
session_start();
if (!isset($_SESSION['employer'])) {
    $_SESSION['errormsg'] = "Please Login With Employer ID First!";
?>
    <script>
        window.location.href = "index.php";
    </script>
<?php
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

<body class="">
    <div class="container-fliud bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar Start -->
        <?php
        include 'header.php';
        ?>
        <!-- Navbar End -->


        <!-- Header End -->
        <div class="container-fliud py-5 bg-dark page-header mb-5">
            <div class="container my-5 pt-5 pb-4">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Application Details</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb text-uppercase">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Application Details</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Header End -->


        <div class="container-xxl py-5 position-relative">

            <div class="container">
                <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Job Applications</h1>
                <div class="row">
                    <div class="col-12">
                        <table class="table table-bordered text-center align-middle">
                            <thead>
                                <tr>
                                    <th>Job</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Contact</th>
                                    <th>Experienece</th>
                                    <th>Skills</th>
                                    <th>Resume</th>
                                    <th>Msg</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $emp_id = $_SESSION['auth_user']['ID'];
                                if (mysqli_num_rows($details = mysqli_query($con, "SELECT * FROM `applications` APP INNER JOIN `jobs` JOB ON APP.`job_id`=JOB.`Auto_generated_ID` INNER JOIN `job_seeker` seeker WHERE APP.`User_ID`=seeker.`User_ID` AND APP.`emp_id`='$emp_id';")) > 0) {
                                    while ($fetchdet = mysqli_fetch_assoc($details)) {
                                        $user_id = $fetchdet['User_ID'];
                                        $skill = mysqli_query($con, "SELECT `skills`,`exper` FROM `seeker_profile` WHERE `user_id`='$user_id'");
                                        $skill_fetch = mysqli_fetch_array($skill);
                                ?>
                                        <tr id="<?php echo $fetchdet['id']; ?>">
                                            <td data-role="title"><?php echo $fetchdet['Title']; ?></td>
                                            <td><?php echo $fetchdet['Name']; ?></td>
                                            <td><?php echo $fetchdet['Email']; ?></td>
                                            <td><?php echo $fetchdet['Contact']; ?></td>
                                            <td><?php echo $skill_fetch['exper']; ?></td>
                                            <td><?php echo $skill_fetch['skills']; ?></td>
                                            <td data-role="resume" class="<?php echo $fetchdet['appResume']; ?>">
                                                <form class="pdf_form">
                                                    <button type="button" data-role="update" data-id="<?php echo $fetchdet['id']; ?>" class="btn btn-primary" id="resume">View</button>
                                                </form>
                                            </td>
                                            <td><?php echo $fetchdet['Message']; ?></td>
                                            <td>
                                                <span data-role="display_edit" data-id="<?php echo (($fetchdet['Status'] == "0") ? 'Request' : 'Hired'); ?>"><?php echo (($fetchdet['Status'] == "0") ? 'Request' : 'Hired'); ?></span>
                                                <form id="editform">
                                                    <button type="button" data-id="<?php echo $fetchdet['id']; ?>" data-role="statusupf" id="edit" name="update_status" class="btn btn-primary text-light"><i class="fa-regular fa-edit"></i></button>
                                                    <input type="hidden" value="<?php echo $fetchdet['User_ID']; ?>" data-role="seeker_id">
                                                    <input type="hidden" value="<?php echo $fetchdet['id']; ?>" data-role="job_id">
                                                    <input type="hidden" value="<?php echo $_SESSION['auth_user']['ID']; ?>" data-role="emp_id">
                                                </form>
                                            </td>
                                        </tr>
                                <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row justify-content-center mt-5" id="pdf_cont" style="height: 100vh;">
                    <div class="col-10 text-center position-relative">
                        <button type="button" class="btn btn-danger position-absolute top-0 end-0" id="pdf_close"><i class="fa-solid fa-times"></i></button>
                        <iframe id="pathpdf" src="" frameborder="0" width="100%" height="100%"></iframe>
                    </div>
                </div>
            </div>

            <script>
                $(document).ready(function() {
                    $("#pdf_cont").fadeOut(10)
                    $("#edit_cont").fadeOut(10)
                    $("button[data-role=update]").click(function() {
                        id = $(this).data('id');
                        resume = $("#" + id).children('td[data-role=resume]').attr("class")
                        $("#pdf_cont").fadeIn("fast");
                        $("#pathpdf").attr("src", resume);
                    });
                    $("button[data-role=statusupf]").click(function() {
                        $("#edit_cont").css("display", "block");
                        $("edit_cont").fadeIn("fast")
                        id = $(this).data('id');
                        status = $("#" + id).children('td').children('span[data-role=display_edit]').text();
                        upd = $("#input_update").val(id);
                        if (status == "Request") {
                            $("#req").text(status);
                            $("#hire").text("Hired");
                        } else if (status == "Hired") {
                            $("#req").text(status);
                            $("#req").attr("value", "1")
                            $("#hire").attr("value", "0")
                            $("#hire").text("Request");
                        }
                    })
                    $("button[data-role=upd-status]").click(function() {
                        ids = $(input_update).val();
                        id = $(this).data('id');
                        update_val = $("#updatestatus").val();

                        if ($("#updatestatus").val() == "1") {
                            $.post(
                                "send_hire.php", {
                                    seeker: $("#" + ids).children("td").children("form").children("input[data-role=seeker_id]").val(),
                                    emp: $("#" + ids).children("td").children("form").children("input[data-role=emp_id]").val(),
                                    app_id: $("#" + ids).children("td").children("form").children("input[data-role=job_id]").val(),
                                    title: $("#" + ids).children("td[data-role=title]").text(),
                                    hire: "hired",
                                },
                                function(noti) {
                                    console.log(noti);
                                }
                            )
                        }
                        else if ($("#updatestatus").val() == "0") {
                            $.post(
                                "send_hire.php", {
                                    seeker: $("#" + ids).children("td").children("form").children("input[data-role=seeker_id]").val(),
                                    emp: $("#" + ids).children("td").children("form").children("input[data-role=emp_id]").val(),
                                    app_id: $("#" + ids).children("td").children("form").children("input[data-role=job_id]").val(),
                                    title: $("#" + ids).children("td[data-role=title]").text(),
                                    hire: "req",
                                },
                                function(noti) {
                                    console.log(noti);
                                }
                            )
                            // alert("req");
                        }
                        $.ajax({
                            url: "update_status.php",
                            type: "POST",
                            data: {
                                ids: ids,
                                updatestatus: update_val
                            },
                            success: function(update) {
                                if (update == '0') {
                                    $("#" + ids).children('td').children('span[data-role=display_edit]').html("Request")
                                    $("#edit_cont").fadeOut("fast")
                                } else if (update == '1') {
                                    $("#" + ids).children('td').children('span[data-role=display_edit]').html("Hired")
                                    $("#edit_cont").fadeOut("fast")

                                }
                            }
                        })
                    })
                    $("#closethis").click(function() {
                        $("#edit_cont").fadeOut("fast")

                    })
                    $("#pdf_close").click(function() {
                        $("#pdf_cont").fadeOut(200)
                    })
                });
            </script>
            <div class="container-fluid position-absolute top-0 start-0 mt-5 pt-5" style="z-index: 9999;" id="edit_cont">
                <div class="row justify-content-center h-100 align-items-center">
                    <div class="col-4 bg-light p-4 border border-3 shadow">
                        <form id="update_status">
                            <div class="row">
                                <div class="col-12
                            mb-3">
                                    <input type="hidden" name="hid" id="input_update" value="">
                                    <select name="updatestatus" class="form-select" id="updatestatus">
                                        <option value="0" id="req">Request</option>
                                        <option value="1" id="hire">Hired</option>
                                    </select>
                                </div>
                                <div class="col-12 text-end">
                                    <button type="button" data-role="upd-status" data-id="" name="confirm_upd" class="btn btn-success">Update</button>
                                    <button type="button" id="closethis" name="closethis" class="btn btn-danger">Close</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Start -->
        <?php
        include 'footer.php';
        ?>
        <!-- Footer End -->


        <!-- Back to Top -->
        
    </div>


    <?php
    include 'link.php';
    ?>
</body>

</html>