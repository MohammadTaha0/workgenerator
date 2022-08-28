<?php
if (isset($_SESSION['seeker'])) {

$user_id = $_SESSION['auth_user']['User_ID'];
if (mysqli_num_rows($hired = mysqli_query($con, "SELECT `User_ID`,`Status`,`job_id`,`Title` FROM `applications` A INNER JOIN `jobs` B WHERE A.`Status`='1' AND A.job_id=B.Auto_generated_ID AND A.`User_ID`='$user_id'")) > 0) {

?>
    <div class="row">

        <?php
        // '<script>document.write(localStorage.setItem("hired_modal", "hired"))</script>';
        $_SESSION['hire_modal'] = "hire";
        while ($fetch_hire = mysqli_fetch_array($hired)) {
        ?>
            <!-- Modal -->

            <div class="col-6">
                <div class="modal fade" id="exampleModal" data-role="modals" data-id="<?php echo $fetch_hire['job_id'];  ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content position-relative">
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-primary">
                                <?php echo ((mysqli_num_rows($hired) <= 1) ? "😍" : "😍" . mysqli_num_rows($hired) . "Jobs") ?>
                                <span class="visually-hidden">Hired Jobs</span>
                            </span>
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">😍 Congratulation! Finally You Got Hired 💥 From <span class="text-capitalize text-decoration-underline cursor-pointer" onclick="window.location.href='job-detail.php?jobid=<?php echo $fetch_hire['job_id']; ?>'"><?php echo $fetch_hire['Title'] ?></span>.</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                For Details Visit
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close 👎 </button>
                                <button type="button" onclick="window.location.href='apliedjobs.php'" class="btn btn-primary">See more 🧐</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        <?php
        }
        ?>
    </div>
<?php
}
}