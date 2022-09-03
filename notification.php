<?php
session_start();
include 'conn.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Notifications </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <?php
    include 'link.php';
    ?>
    <style>
        .bg-grey {
            background-color: rgba(240, 240, 240);
        }

        .col-12 {
            border-bottom: 2px solid lightgrey;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <?php
    if (isset($_SESSION['seeker'])) {



        if (isset($_SESSION['errormsg'])) {
    ?>
            <script>
                alert("<?php echo $_SESSION['errormsg']; ?>");
            </script>
    <?php
            unset($_SESSION['errormsg']);
        }
    }
    ?>
    <div class="container-fluid p-0 w-100 bg-white">
        <?php
        include 'header.php';
        ?>
        <div class="row justify-content-center bg-light py-5 m-0">
            <div class="col-11 bg-light">
                <h3 class="text-center text-secondary py-3">Notifications</h3>
                <div class="row align-items-center justify-content-center" id="noti_get_row">

                </div>
            </div>
        </div>
    </div>

</body>
<script>
    $(document).ready(function() { 
        $.ajax({
            url: "notify.php",
            type: "GET",
            dataType: "html",
            success: function(noti) {
                $("#noti_get_row").html(noti);
            }
        })
    });
</script>

</html>