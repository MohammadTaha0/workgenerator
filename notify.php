<?php
session_start();
include 'conn.php';
if (isset($_SESSION['seeker'])) {
    $user_id = $_SESSION['auth_user']['User_ID'];
    $sql = mysqli_query($con, "SELECT `role`,`Name` FROM `job_seeker` WHERE `User_ID`='$user_id'");
    $fetch = mysqli_fetch_assoc($sql);
    $your_role = $fetch['role'];
    $select_noti = mysqli_query($con, "SELECT `Name`,`msg`,`date`,`seen`,`send_id`,`sen_role` FROM `notification` A INNER JOIN `employer` B WHERE A.`send_id`=B.`ID` AND A.`sen_role`=B.`role` AND A.`rec_id`='$user_id' AND A.`rec_role`='$your_role'");
    while ($fetch_noti = mysqli_fetch_array($select_noti)) {
?>
        <div class="col-12 <?php echo (($fetch_noti['seen'] == "unseen")? "bg-grey":"bg-white"); ?> py-3 align-items-center">
            <a data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="text-decoration-none" data-id="<?php echo $fetch_noti['send_id'] ?>" data-name="<?php echo $fetch_noti['Name'] ?>" data-role="<?php echo $fetch_noti['sen_role'] ?>" data-msg="<?php echo $fetch_noti['msg'] ?>" data-date="<?php echo $fetch_noti['date'] ?>">
                <div class="row justify-content-between text-capitalize align-items-center">
                    <div class="col-2 fs-5 fw-bolder d-flex align-items-center"> <i class="fa-regular fa-envelope text-primary me-3 fs-2"></i><span><?php echo $fetch_noti['Name'] ?></span></div>
                    <div class="col-9">
                        <span class="text-dark ms-1"><?php echo $fetch_noti['msg'] ?></span>
                    </div>
                    <div class="col-1 d-flex align-items-center justify-content-end">
                        <span class="badge text-primary"><?php echo $fetch_noti['date'] ?></span> <span class="badge ms-0 ps-0"> <i class="fa-light fa-clock text-primary"></i> </span>
                    </div>
                </div>
            </a>
        </div>
<?php
    }
}


?>
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
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Follow Back</button>
            </div>
        </div>
    </div>
</div>
<?php
$user_id = $_SESSION['auth_user']['User_ID'];
$sql = mysqli_query($con, "SELECT `role`,`Name` FROM `job_seeker` WHERE `User_ID`='$user_id'");
$fetch = mysqli_fetch_assoc($sql);
$your_role = $fetch['role'];
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
            send_date = $(this).data('date');
            user_id = $("#user_id").val();
            user_role = $("#user_role").val();
            $("#staticBackdropLabel").text(send_name);
            $(".modal-body").text(send_msg);
            $.post(
                "seen.php", {
                    send_id: send_id,
                    send_role: send_role,
                    rec_id: user_id,
                    rec_role: user_role,
                },
                function(seen) {
                    $("#noti_get_row").load("notify.php");
                }
            )
        })
    });
</script>