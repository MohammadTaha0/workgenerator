<!-- Navbar Start -->
<style>
    a,
    .nav-item {
        font-size: 15px !important;
    }

    #notify {
        position: relative;
    }

    #notify::before {
        content: attr(current-count);
        font-size: 13px;
        display: flex;
        justify-content: center;
        align-items: center;
        color: white;
        position: absolute;
        width: 20px;
        height: 20px;
        background-color: var(--primary);
        z-index: 999999;
        border-radius: 50%;
        right: -35%;
        border: 2px solid white;
        top: 30%;
    }
</style>
<nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
    <a href="index.php" class="navbar-brand d-flex align-items-center text-center py-0 px-4 px-lg-5">
        <h2 class="m-0 text-primary">WorkGenerator</h2>
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            <a href="index.php" class="nav-item nav-link">Home</a>
            <?php
            if (isset($_SESSION['employer'])) {
                $for_status_emp_id = $_SESSION['auth_user']['ID'];
                if ($status_query = mysqli_query($con, "SELECT `Status` FROM `employer` WHERE `ID`=$for_status_emp_id")) {
                    $fetch_status = mysqli_fetch_array($status_query);
                    if ($fetch_status['Status'] == "active") {
            ?>

                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Post, View & Create</a>
                            <div class="dropdown-menu rounded-0 m-0">
                                <a href="appdetails.php" class="dropdown-item">View Application Details</a>
                                <a href="job-detail.html" class="dropdown-item">Cretate Events</a>
                                <a href="job-detail.html" class="dropdown-item">Organize Training</a>
                                <a href="postedjob.php" class="dropdown-item">Post Job</a>
                            </div>
                        </div> <?php
                            } elseif ($fetch_status['Status'] == "inactive") {
                                ?>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="tooltip" data-bs-placement="top" title="You are not allowed to post any job until we approve you">Post, View & Create</a>
                            <div class="dropdown-menu rounded-0 m-0">
                                <a href="appdetails.php" class="dropdown-item disabled">View Application Details</a>
                                <a href="job-detail.html" class="dropdown-item disabled">Cretate Events</a>
                                <a href="job-detail.html" class="dropdown-item disabled">Organize Training</a>
                                <a href="postedjob.php" class="dropdown-item disabled">Post Job</a>
                            </div>
                            <script>
                                $(document).ready(function() {
                                    $('[data-toggle="tooltip"]').tooltip();
                                });
                            </script>
                        </div>
                <?php
                            }
                        }
                    } else {
                ?>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Jobs</a>
                    <div class="dropdown-menu rounded-0 m-0">
                        <a href="job-list.php" class="dropdown-item">Job List</a>
                        <?php
                        if (isset($_SESSION['seeker'])) {
                        ?>
                            <a href="apliedjobs.php" class="dropdown-item">Applied Jobs</a>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            <?php
                    }
                    if (isset($_SESSION['seeker'])) {
            ?>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Training & Events</a>
                    <div class="dropdown-menu rounded-0 m-0">
                        <a href="job-list.html" class="dropdown-item">Training Programs</a>
                        <a href="job-list.html" class="dropdown-item">Events Nearby</a>
                    </div>
                </div>
            <?php
                    }
            ?>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Our services</a>
                <div class="dropdown-menu rounded-0 m-0">
                    <a href="./about.php" class="dropdown-item">About Us</a>
                    <a href="./contact.php" class="dropdown-item">Contact Us</a>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="./category.php" class="nav-link">Companies</a>
            </div>
            <?php
            if (isset($_SESSION['seeker'])) {
            ?>
                <a href="profile.php" class="nav-item nav-link">Profile</a>
                <?php
                $user_id = $_SESSION['auth_user']['User_ID'];
                if (mysqli_num_rows($sql = mysqli_query($con, "SELECT `id` FROM `applications` WHERE `Status`='1' AND `User_ID`='$user_id'")) > 0) {
                ?>
                    <a href="profile.html" id="notify" class="nav-item nav-link" current-count="<?php echo mysqli_num_rows($sql); ?>"><i class="fa-regular fa-bell fs-4 text-primary"></i></a>
                <?php
                }

                ?>


            <?php
            }
            ?>
        </div>
        <?php
        if (!isset($_SESSION['login'])) {
        ?>
            <a href="./employer_reg.php" class="btn btn-primary rounded-0 py-4 px-4 d-none d-lg-block">Post A Job<i class="fa fa-arrow-right ms-3"></i></a>
            <a href="./job_seeker_reg.php" class="btn btn-success rounded-0 py-4 px-4 d-none d-lg-block">Find A Job<i class="fa fa-arrow-right ms-3"></i></a>
        <?php
        }
        ?>
        <?php
        if (isset($_SESSION['login'])) {
        ?>
            <a href="logout.php" class="btn btn-danger rounded-0 py-4 px-4 d-none d-lg-block">Logout<i class="fa fa-arrow-right ms-3"></i></a>
        <?php
        }
        ?>

    </div>
</nav>
<!-- Navbar End -->