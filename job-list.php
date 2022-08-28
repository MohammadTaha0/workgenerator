<?php
include 'conn.php';
session_start();
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
                <h1 class="display-3 text-white mb-3 animated slideInDown">Job List</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb text-uppercase">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Job List</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Header End -->

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
                            <?php
                            if ($jobs = mysqli_query($con, "SELECT * FROM `jobs`")) {
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
                                                        <a class="btn btn-light btn-square me-3" href=""><i class="far fa-heart text-primary"></i></a>
                                                        <a class="btn btn-primary" href="./job-detail.php?jobid=<?php echo $jobrow['Auto_generated_ID']; ?>">Apply Now</a>
                                                    </div>
                                                    <small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i>Date Line: <?php echo $jobrow['lastdate']; ?></small>
                                                </div>
                                            </div>
                                        </div>
                            <?php
                                    }
                                }
                            }
                            ?>
                        </div>
                        <div id="tab-2" class="tab-pane fade show p-0">
                            <?php
                            if ($jobs = mysqli_query($con, "SELECT * FROM `jobs` WHERE `Job_Role`=1")) {
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
                                                        <a class="btn btn-light btn-square me-3" href=""><i class="far fa-heart text-primary"></i></a>
                                                        <a class="btn btn-primary" href="./job-detail.php?jobid=<?php echo $jobrow['Auto_generated_ID']; ?>">Apply Now</a>
                                                    </div>
                                                    <small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i>Date Line: 01 Jan, 2045</small>
                                                </div>
                                            </div>
                                        </div>
                            <?php
                                    }
                                }
                            }
                            ?>
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
                                                        <a class="btn btn-light btn-square me-3" href=""><i class="far fa-heart text-primary"></i></a>
                                                        <a class="btn btn-primary" href="./job-detail.php?jobid=<?php echo $jobrow['Auto_generated_ID']; ?>">Apply Now</a>
                                                    </div>
                                                    <small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i>Date Line: 01 Jan, 2045</small>
                                                </div>
                                            </div>
                                        </div>
                            <?php
                                    }
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Jobs End -->


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