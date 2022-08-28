<?php
session_start();
include 'conn.php';
include 'link.php';
$title_srch = $_POST['title_srch'];
$cat_srch = $_POST['cat_srch'];
$loc_srch = $_POST['loc_srch'];

if (mysqli_num_rows($searchdata = mysqli_query($con, "SELECT * FROM `jobs` WHERE `Title` LIKE '%$title_srch%' OR `Category` LIKE '%$cat_srch%' OR `Location` LIKE '$loc_srch'")) > 0) {
    while ($fetchseach = mysqli_fetch_array($searchdata)) {
        echo  '<div id="tab-1" class="tab-pane fade show p-0 active">
      <div class="job-item p-4 mb-0">
          <div class="row g-4">
              <div class="col-sm-12 col-md-8 d-flex align-items-center">
                  <img class="flex-shrink-0 img-fluid border rounded" src="img/com-logo-1.jpg" alt="" style="width: 80px; height: 80px;">
                  <div class="text-start ps-4">
                      <h5 class="mb-3">' . $fetchseach["Title"] . '</h5>
                      <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i>' . $fetchseach["Location"] . '</span>
                      <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i>' . (($fetchseach['Job_Role'] == "0") ? 'Part rime' : 'Full Time') . '</span>
                      <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary me-2"></i>' . $fetchseach["min_sal"] . " - " . $fetchseach["max_sal"] . '</span>
                  </div>
              </div>
              <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                  <div class="d-flex mb-3">
                  <a class="btn btn-light btn-square me-3" href=""><i class="far fa-heart text-primary"></i></a>
                  <a class="btn btn-primary" href="' . ((isset($_SESSION['seeker'])) ? './job-detail.php?jobid=' . $fetchseach['Auto_generated_ID'] . '' : 'login.php') . '">View Details</a>

                  </div>
                  <small class="text-truncate mt-2">
                    <i class="fa-regular fa-clock text-primary me-2"></i>
                    <input type="hidden" data-role="jobid" value="' . $fetchseach['Auto_generated_ID'] . '">
                    <span data-role="left" data-value="' . $fetchseach['Auto_generated_ID'] . '" data-id="' . $fetchseach['lastdate'] . '"></span>
                  </small>
              </div>
          </div>
      </div>
  </div>';
    }
}
?>
<script src="./timeago/jquery.timeago.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function() {
        $("time.timeago").timeago();
    });
</script>