<?php
session_start();
include 'conn.php';
$lim = $_GET['lim'];
$where = $_GET['where'];
if ($jobs = mysqli_query($con, "SELECT * FROM `jobs` $where $lim")) {
    if (mysqli_num_rows($jobs)) {
        while ($jobrow = mysqli_fetch_array($jobs)) {
            echo '<div class="job-item p-4 mb-4" id="' . $jobrow['Auto_generated_ID'] . '">
<div class="row g-4">
    <div class="col-sm-12 col-md-8 d-flex align-items-center">
        <img class="flex-shrink-0 img-fluid border rounded" src="img/com-logo-1.jpg" alt="" style="width: 80px; height: 80px;">
        <div class="text-start ps-4">
            <h5 class="mb-3">' . $jobrow['Title'] . '</h5>
            <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i>' . $jobrow['Location'] . '</span>
            <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i>' . (($jobrow['Job_Role'] == 0) ? "Part Time" : "Full time") . '</span>
            <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary me-2"></i>' . $jobrow['min_sal'] . " - " . $jobrow['max_sal'] . '</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
        <div class="d-flex mb-3">
            ' . ((isset($_SESSION['seeker'])) ? "<a class='btn btn-light btn-square me-3' href=''><i class='far fa-heart text-primary'></i></a>
            <a class='btn btn-primary' href='./job-detail.php?jobid=" . $jobrow['Auto_generated_ID'] .
                "'>View Details</a>" : "<a class='btn btn-light btn-square me-3' href='./login.php'><i class='far fa-heart text-primary'></i></a>
            <a class='btn btn-primary' href='./login.php'>View Details</a>") . ' 
        </div>
        <small class="text-truncate"><i class="fa-regular fa-calendar text-primary me-2"></i>Publish: <time class="timeago" datetime="' . $jobrow['Date'] . '"></time></small>
        <small class="text-truncate mt-2"><i class="fa-regular fa-clock text-primary me-2"></i>
            <input type="hidden" data-role="jobid" value="' . $jobrow['Auto_generated_ID'] . '"><span data-role="left" data-value="' . $jobrow['Auto_generated_ID'] . '" data-id="' . $jobrow['lastdate'] . '"></span> </small>
    </div>
</div>
</div>';
        }
    }
}
?>
<script src="./timeago/jquery.timeago.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function() {
        $("time.timeago").timeago();
    });
</script>