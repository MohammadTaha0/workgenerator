<?php
session_start();
include 'conn.php';

$user_id = $_GET['user_id'];
$seek = mysqli_query($con, "SELECT * FROM `job_seeker` WHERE `User_ID`='$user_id'");
$fet_seek = mysqli_fetch_assoc($seek);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile | <?php echo $fet_seek['Name'] ?></title>
    <?php
    include 'link.php';
    ?>
    <style>
        #click_img_show {
            display: none;
        }

        .pro_cont label {
            width: 100%;
        }

        .pro_cont {
            width: 170px;
            height: 170px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            background: grey;
            color: white;
            margin: auto;
            border: 5px solid lightgrey;
        }

        .pro_cont img {
            object-fit: contain;
            width: 170px;
            height: 170px;
            border-radius: 100%;
        }
    </style>
</head>

<body>

    <div class="container-fluid p-0 w-100 bg-white" id="mybody">
        <?php
        include 'header.php';
        ?>
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

        <input type="hidden" id="user_id" value="<?php echo $user_id; ?>"> 
        <div class="container my-5">
            <div class="main-body">
                <div class="row gutters-sm position-relative justify-content-center" id="load">
                    <div class="col-md-4 mb-3 col-4" id="sidebar">

                    </div>
                    <div class="col-md-8" id="rightbar">

                    </div>
                </div>
            </div>
        </div>


    </div>


    <style type="text/css">
        body {
            margin-top: 20px;
            color: #1a202c;
            text-align: left;
            background-color: #e2e8f0;
        }

        .main-body {
            padding: 15px;
        }

        .card {
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
        }

        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 0 solid rgba(0, 0, 0, .125);
            border-radius: .25rem;
        }

        .card-body {
            flex: 1 1 auto;
            min-height: 1px;
            padding: 1rem;
        }

        .gutters-sm {
            margin-right: -8px;
            margin-left: -8px;
        }

        .gutters-sm>.col,
        .gutters-sm>[class*=col-] {
            padding-right: 8px;
            padding-left: 8px;
        }

        .mb-3,
        .my-3 {
            margin-bottom: 1rem !important;
        }

        .bg-gray-300 {
            background-color: #e2e8f0;
        }

        .h-100 {
            height: 100% !important;
        }

        .shadow-none {
            box-shadow: none !important;
        }
    </style>
    <script>
        $(document).ready(function() {
            id = $("#user_id").val();
            console.log(id)
            $.ajax({
                url: "seeker_profile_sidebar.php",
                type: "GET",
                data: {talentProfile: "taha",user_id: id},
                dataType: "html",
                success: function(fata) {
                    $("#sidebar").html(fata);
                }
            })
            $.ajax({
                url: "seeker_profile_rightbar.php",
                type: "GET",
                data: {talentProfile: "taha",user_id: id},
                dataType: "html",
                success: function(fata) {
                    $("#rightbar").html(fata);
                }
            })
        });
    </script>
    <?php
    include 'footer.php';
    ?>
</body>

<?php
include 'link.php';
?>

</html>