<?php
session_start();
include 'conn.php';
if (!isset($_SESSION['seeker'])) {
    $_SESSION['errormsg'] = "Please Login With Employer ID First!";
    header("location:index.php");
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
    <div class="container-fluid bg-white p-0 w-100">
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
        <div class="container-fluid py-5 bg-dark page-header mb-5">
            <div class="container my-5 pt-5 pb-4">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Applied Jobs</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb text-uppercase">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Applied Jobs</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Header End -->


        <!-- Job Applied Start -->

        <div class="container-xxl py-5 wow fadeInUp">
            <div class="row">
                <div class="col-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Job Title</th>
                                <th>Job Skills</th>
                                <th>Job Category</th>
                                <th>Location</th>
                                <th>Salary</th>
                                <th>Dateline</th>
                                <th>Job Apply Date</th>
                                <th>Job Role</th>
                                <th>Your Resume</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody id="display">

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
                
                $.ajax({
                    type: "GET",
                    url: "appliedjobs_code.php",
                    dataType: "html",
                    success: function(data) {
                        $("#display").html(data);
                    }
                })
            });
        </script>

        <!-- Job Applied End -->


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
</body>

</html>