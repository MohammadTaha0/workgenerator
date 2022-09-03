<?php
session_start();
include 'conn.php';
if (isset($_SESSION['seeker'])) {
    $user_id = $_SESSION['auth_user']['User_ID'];
    $sql = mysqli_query($con, "SELECT `role`,`Name` FROM `job_seeker` WHERE `User_ID`='$user_id'");
    $fetch = mysqli_fetch_assoc($sql);
    $your_role = $fetch['role'];
    $select_noti = mysqli_query($con, "SELECT `app_id`,`Company_Name`,`msg`,`date`,`seen`,`send_id`,`sen_role` FROM `notification` A INNER JOIN `employer` B INNER JOIN `applications` C WHERE A.`send_id`=B.`ID` AND A.`sen_role`=B.`role` AND A.`rec_id`='$user_id' AND A.`rec_role`='$your_role' AND (A.`app_id`=C.`id` OR A.`app_id`='0')");

    while ($fetch_noti = mysqli_fetch_array($select_noti)) {
?>
        <div class="col-12 <?php echo (($fetch_noti['seen'] == "unseen") ? "bg-grey" : "bg-white"); ?> py-3 align-items-center">
            <a data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="text-decoration-none" data-id="<?php echo $fetch_noti['send_id'] ?>" data-name="<?php echo $fetch_noti['Company_Name'] ?>" data-role="<?php echo $fetch_noti['sen_role'] ?>" data-msg="<?php echo $fetch_noti['msg'] ?>" data-date="<?php echo $fetch_noti['date'] ?>" data-app="<?php echo $fetch_noti['app_id']; ?>">
                <div class="row justify-content-between text-capitalize align-items-center">
                    <div class="col-2 fs-5 fw-bolder d-flex align-items-center"> <i class="fa-regular fa-envelope text-primary me-3 fs-2"></i><span><?php echo $fetch_noti['Company_Name'] ?></span></div>
                    <div class="col-9">
                        <span class="text-dark ms-1"><?php echo $fetch_noti["msg"] ?></span>
                    </div>
                    <div class="col-1 d-flex align-items-center justify-content-end">
                        <span class="badge text-primary">
                            <time class="timeago" datetime="<?php echo $fetch_noti['date'] ?>"></time>
                        </span>
                        <span class="badge ms-0 ps-0"> <i class="fa-light fa-clock text-primary"></i> </span>
                    </div>
                </div>
            </a>
        </div>
    <?php
    }
} elseif (isset($_SESSION['employer'])) {
    $user_id = $_SESSION['auth_user']['ID'];
    $your_role = "0";
    $noti = mysqli_query($con, "SELECT `app_id`,`Name`,`msg`,`date`,`seen`,`send_id`,`sen_role` FROM `notification` A INNER JOIN `job_seeker` B INNER JOIN `applications` C WHERE A.`send_id`=B.`User_ID` AND A.`sen_role`=B.`role` AND A.`rec_id`='$user_id' AND A.`rec_role`='$your_role' AND( A.`app_id`=C.`id` OR A.`app_id`='0')");

    $noti_emp = mysqli_query($con, "SELECT `app_id`,`Name`,`msg`,`date`,`seen`,`send_id`,`sen_role` FROM `notification` A INNER JOIN `employer` B INNER JOIN `applications` C WHERE A.`send_id`=B.`ID` AND A.`sen_role`=B.`role` AND A.`rec_id`='$user_id' AND A.`rec_role`='$your_role' AND( A.`app_id`=C.`id` OR A.`app_id`='0')");

    while ($fetch_noti = mysqli_fetch_array($noti_emp)) {
    ?>
        <div class="col-12 <?php echo (($fetch_noti['seen'] == "unseen") ? "bg-grey" : "bg-white"); ?> py-3 align-items-center">
            <a data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="text-decoration-none" data-id="<?php echo $fetch_noti['send_id'] ?>" data-name="<?php echo $fetch_noti['Name'] ?>" data-role="<?php echo $fetch_noti['sen_role'] ?>" data-msg="<?php echo $fetch_noti['msg'] ?>" data-date="<?php echo $fetch_noti['date'] ?>" data-app="<?php echo  $fetch_noti['app_id'] ?>">
                <div class="row justify-content-between text-capitalize align-items-center">
                    <div class="col-2 fs-5 fw-bolder d-flex align-items-center"> <i class="fa-regular fa-envelope text-primary me-3 fs-2"></i><span><?php echo $fetch_noti['Name'] ?></span></div>
                    <div class="col-9">
                        <span class="text-dark ms-1"><?php echo $fetch_noti["msg"] ?></span>
                    </div>
                    <div class="col-1 d-flex align-items-center justify-content-end">
                        <span class="badge text-primary">
                            <time class="timeago" datetime="<?php echo $fetch_noti['date'] ?>"></time>
                        </span>
                        <span class="badge ms-0 ps-0"> <i class="fa-light fa-clock text-primary"></i> </span>
                    </div>
                </div>
            </a>
        </div>
    <?php
    }

    while ($fetch_noti = mysqli_fetch_array($noti)) {
    ?>
        <div class="col-12 <?php echo (($fetch_noti['seen'] == "unseen") ? "bg-grey" : "bg-white"); ?> py-3 align-items-center">
            <a data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="text-decoration-none" data-id="<?php echo $fetch_noti['send_id'] ?>" data-name="<?php echo $fetch_noti['Name'] ?>" data-role="<?php echo $fetch_noti['sen_role'] ?>" data-msg="<?php echo $fetch_noti['msg'] ?>" data-date="<?php echo $fetch_noti['date'] ?>" data-app="<?php echo  $fetch_noti['app_id'] ?>">
                <div class="row justify-content-between text-capitalize align-items-center">
                    <div class="col-2 fs-5 fw-bolder d-flex align-items-center"> <i class="fa-regular fa-envelope text-primary me-3 fs-2"></i><span><?php echo $fetch_noti['Name'] ?></span></div>
                    <div class="col-9">
                        <span class="text-dark ms-1"><?php echo $fetch_noti["msg"] ?></span>
                    </div>
                    <div class="col-1 d-flex align-items-center justify-content-end">
                        <span class="badge text-primary">
                            <time class="timeago" datetime="<?php echo $fetch_noti['date'] ?>"></time>
                        </span>
                        <span class="badge ms-0 ps-0"> <i class="fa-light fa-clock text-primary"></i> </span>
                    </div>
                </div>
            </a>
        </div>
<?php
    }
}


?>
<style>
    #unfollow {
        background-color: pink;
        color: darkred;
        display: none;
    }
</style>
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <div id="display_followers" class="d-none"></div>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <a href="" class="btn btn-secondary" id="btn">Profile</a>
                <?php if (isset($_SESSION['employer'])) {
                ?>
                    <a href="appdetails.php" id="ho_page" class="btn btn-primary"> View Application </a>
                <?php
                } else {
                ?>
                    <a href="apliedjobs.php" id="ho_page" class="btn btn-primary"> View Application </a>
                <?php
                }
                ?>

            </div>
        </div>
    </div>
</div>
<?php
if (isset($_SESSION['seeker'])) {
    $user_id = $_SESSION['auth_user']['User_ID'];
    $sql = mysqli_query($con, "SELECT `role`,`Name` FROM `job_seeker` WHERE `User_ID`='$user_id'");
    $fetch = mysqli_fetch_assoc($sql);
    $your_role = $fetch['role'];
} elseif (isset($_SESSION['employer'])) {
    $user_id = $_SESSION['auth_user']['ID'];
    $sql = mysqli_query($con, "SELECT `role`,`Name` FROM `employer` WHERE `ID`='$user_id'");
    $fetch = mysqli_fetch_assoc($sql);
    $your_role = $fetch['role'];
}

?>
<input type="hidden" id="user_id" value="<?php echo $user_id; ?>">
<input type="hidden" id="user_role" value="<?php echo $your_role; ?>">
<?php
?>
<script>
    $(document).ready(function() {
        $("a[data-bs-toggle=modal]").click(function() {
            send_id = $(this).data('id');
            send_name = $(this).data('name');
            send_role = $(this).data('role');
            send_msg = $(this).data('msg');
            send_msg = send_msg.replace(' " ', ' / ')
            send_date = $(this).data('date');
            send_app = $(this).data('app');
            user_id = $("#user_id").val();
            user_role = $("#user_role").val();

            $("#btn").attr('data-role', send_role);

            if (send_role == "0") {
                $("#btn").attr('href', 'company_details.php?comp_id=' + send_id);
            } else if (send_role == "1") {
                $("#btn").attr('href', 'profile.php?user_id=' + send_id);
            }
            if (send_app == 0) {
                $("#ho_page").fadeOut(10);
                $("#btn").fadeIn(10);
            } else if (send_app != 0) {
                $("#ho_page").fadeIn(10);
            }
            $("#staticBackdropLabel").text(send_name);
            $('.modal-body').html(send_msg);
            $.post(
                "seen.php", {
                    send_id: send_id,
                    send_role: send_role,
                    rec_id: user_id,
                    rec_role: user_role,
                    app: send_app,
                },
                function(seen) {
                    $("#noti_get_row").load("notify.php");
                }
            )

        })

    });
</script>
<script src="./timeago/jquery.timeago.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function() {
        $("time.timeago").timeago();
    });
</script>