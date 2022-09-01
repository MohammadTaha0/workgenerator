<?php
session_start();
include 'conn.php';
if (isset($_SESSION['employer'])) {
    $user_id = $_SESSION['$session_user_id'];
} else {
    $user_id = $_SESSION['auth_user']['User_ID'];
}
$seek_pro = mysqli_query($con, "SELECT * FROM `seeker_profile` WHERE `User_ID`='$user_id'");
$fet_pro = mysqli_fetch_assoc($seek_pro);
$cat_id = $fet_pro['category'];
$cat = mysqli_query($con, "SELECT * FROM `category` WHERE `cat_id`='$cat_id'");
$fet_cat = mysqli_fetch_assoc($cat);
$seek = mysqli_query($con, "SELECT * FROM `job_seeker` WHERE `User_ID`='$user_id'");
$fet_seek = mysqli_fetch_assoc($seek);
?>
<style>
    span button {
        transition: .5s;
        opacity: 0;
    }

    <?php
    if (isset($_SESSION['employer'])) {
    ?>li:hover button {
        opacity: 0;
    }

    #unfollow {
        background-color: pink;
        color: darkred;
        display: none;
    }

    <?php
    } elseif (isset($_SESSION['seeker'])) {
    ?>li:hover button {
        opacity: 1;
    }

    #buttons_group_cont {
        display: none;
    }

    <?php
    }
    ?>
</style>
<div class="card">
    <div class="card-body">
        <div class="d-flex flex-column align-items-center text-center position-relative">
            <img id="pro_img_click" src="<?php echo $fet_pro['img'] ?>" alt="Admin" class="rounded-circle" width="150">
            <div class="mt-3">
                <h4 class="text-capitalize"><?php echo $fet_seek['Name'] ?></h4>
                <p class="text-secondary mb-1 text-capitalize"><?php echo $fet_cat['cat_name'] ?></p>
                <p class="text-muted font-size-sm text-capitalize"><?php echo $fet_pro['address'] ?></p>
                <p class="badge text-dark mx-0 fs-6"> <span id="display_followers"></span> Follower</p>
                <?php
                if (isset($_SESSION['seeker'])) {
                    if ($_SESSION['auth_user']['User_ID'] == $fet_seek['User_ID']) {
                ?>
                        <div id="buttons_group_cont">
                            <button class="btn btn-primary px-4 rounded-3" data-role="<?php echo $fet_seek['role']; ?>" data-id="<?php echo $fet_seek['User_ID']; ?>" type="button" id="follow">Follow</button>
                            <button class="btn btn-light px-4 rounded-3" data-role="<?php echo $fet_seek['role']; ?>" data-id="<?php echo $fet_seek['User_ID']; ?>" type="button" id="unfollow">Unfollow</button> <button class="btn btn-outline-primary">Message</button>
                        </div>
                    <?php
                    }
                } elseif (isset($_SESSION['employer'])) {
                    ?>
                    <div>
                        <button class="btn btn-primary px-4 rounded-3" data-role="<?php echo $fet_seek['role']; ?>" data-id="<?php echo $fet_seek['User_ID']; ?>" type="button" id="follow">Follow</button>
                        <button class="btn btn-light px-4 rounded-3" data-role="<?php echo $fet_seek['role']; ?>" data-id="<?php echo $fet_seek['User_ID']; ?>" type="button" id="unfollow">Unfollow</button> <button class="btn btn-outline-primary">Message</button>
                    </div>
                <?php
                }
                ?>
            </div>
            <div class="position-absolute shadow" id="click_img_show">
                <img src="<?php echo $fet_pro['img'] ?>" alt="Admin" class="" width="160">
            </div>
        </div>
    </div>
</div>
<div class="card mt-3">
    <ul class="list-group list-group-flush">
        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
            <h6 class="mb-0"> Github</h6>
            <span class="text-secondary position-relative"><button type="button" class="btn ms-5" style="z-index: 99999;" data-id="Git" data-value="<?php echo $fet_pro['git'] ?>" data-bs-toggle="modal" data-bs-target="#modal" data-bs-whatever="@mdo"><i class="fa-solid fa-edit"></i></button>
                <a href="<?php echo $fet_pro['git'] ?>"><?php echo $fet_pro['git'] ?></a>

            </span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
            <h6 class="mb-0">Twitter</h6>
            <span class="text-secondary">
                <button type="button" class="btn ms-5" style="z-index: 99999;" data-id="twitter" data-value="<?php echo $fet_pro['twitter'] ?>" data-bs-toggle="modal" data-bs-target="#modal" data-bs-whatever="@mdo"><i class="fa-solid fa-edit"></i></button>
                <a href="<?php echo $fet_pro['twitter'] ?>"><?php echo $fet_pro['twitter'] ?></a></span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap align-middle align-items-middle">
            <h6 class="mb-0">
                facebook
            </h6>
            <span class="text-secondary">
                <button type="button" class="btn ms-5" style="z-index: 99999;" data-id="Facebook" data-value="<?php echo $fet_pro['facebook'] ?>" data-bs-toggle="modal" data-bs-target="#modal" data-bs-whatever="@mdo"><i class="fa-solid fa-edit"></i></button>
                <a href="<?php echo $fet_pro['facebook'] ?>"><?php echo $fet_pro['facebook'] ?></a></span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
            <h6 class="mb-0">Linkedin</h6>
            <span class="text-secondary">
                <button type="button" class="btn ms-5" style="z-index: 99999;" data-id="Linked" data-value="<?php echo $fet_pro['linked'] ?>" data-bs-toggle="modal" data-bs-target="#modal" data-bs-whatever="@mdo"><i class="fa-solid fa-edit"></i></button>
                <a href="<?php echo $fet_pro['linked'] ?>"><?php echo $fet_pro['linked'] ?></a></span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
            <h6 class="mb-0">Fiverr</h6>
            <span class="text-secondary">
                <button type="button" class="btn ms-5" style="z-index: 99999;" data-id="Fiverr" data-value="<?php echo $fet_pro['fiverr'] ?>" data-bs-toggle="modal" data-bs-target="#modal" data-bs-whatever="@mdo"><i class="fa-solid fa-edit"></i></button>
                <a href="<?php echo $fet_pro['fiverr'] ?>"><?php echo $fet_pro['fiverr'] ?></a></span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
            <h6 class="mb-0">Upwork</h6>
            <span class="text-secondary">
                <button type="button" class="btn ms-5" style="z-index: 99999;" data-id="Upwork" data-value="<?php echo $fet_pro['upwork'] ?>" data-bs-toggle="modal" data-bs-target="#modal" data-bs-whatever="@mdo"><i class="fa-solid fa-edit"></i></button>
                <a href="<?php echo $fet_pro['upwork'] ?>"><?php echo $fet_pro['upwork'] ?></a></span>
        </li>

    </ul>
</div>
<script>
    $(document).ready(function() {
        $("#pro_img_click").mouseover(function() {
            $("#click_img_show").fadeIn(400);
        })
        $("#click_img_show").mouseleave(function() {
            $("#click_img_show").fadeOut(400);

        })

        // follow work 
        $.ajax({
            url: "check_follow_or_not.php",
            type: "POST",
            data: {
                cehck_id: $("#follow").data('id'),
                check_role: $("#follow").data('role'),
            },
            success: function(follow) {
                console.log(follow);
                if (follow == 1) {
                    $("#unfollow").fadeIn(500);
                    $("#follow").fadeOut(1);
                }
            }
        })

        function followers_get() {
            // alert($("#follow").data('id'))
            $.ajax({
                url: "followers.php",
                type: "POST",
                data: {
                    id: $("#follow").data('id'),
                    role: $("#follow").data('role'),
                },
                success: function(followers) {
                    $("#display_followers").html(followers);
                }
            })
        }
        followers_get();
        $("#follow").click(function() {
            id = $(this).data('id');
            role = $(this).data('role');
            $.post(
                "follow.php", {
                    count: $("#display_followers").text(),
                    id: id,
                    role: role,
                },
                function(following) {
                    setInterval(followers_get, 5000);
                    if (following == 1) {
                        $("#unfollow").fadeIn(500);
                        $("#follow").fadeOut(1);
                    }
                }
            )
        });
        $("#unfollow").click(function() {
            id = $(this).data('id');
            role = $(this).data('role');
            $.post(
                "follow.php", {
                    count: $("#display_followers").text(),
                    id: id,
                    role: "unfollow",
                    userrole: role,
                },
                function(unfollow) {
                    setInterval(followers_get, 5000);
                    $("#unfollow").fadeOut(1);
                    $("#follow").fadeIn(500);
                }
            )
        });
        setInterval(followers_get, 10000)

    });
</script>