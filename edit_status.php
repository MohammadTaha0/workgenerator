<?php
session_start();
include 'conn.php';
$app_id = $_POST['app_id'];

$sel = mysqli_query($con, "SELECT `Status` FROM `applications` WHERE `id`='$app_id'");
$sef = mysqli_fetch_assoc($sel);

?>

<script>
    $(document).ready(function() {
        $("#confirm_upd").click(function() {
            select = $("#updatestatus").val();
            $.post(
                "update_status.php",
                $("#update_status").serialize(),
                function(data) {
                    if (data == 0) {
                        $("#edit_cont").html(" ");
                        $("#display_edit").html("Request");
                    }else if (data == 1) {
                        $("#edit_cont").html(" ");
                        $("#display_edit").html("Hired");
                    }
                }
            )
        })
    });
</script>

<?php


?>