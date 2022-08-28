<?php
session_start();
include 'conn.php';
$user_id = $_SESSION['auth_user']['User_ID'];
$seek_pro = mysqli_query($con, "SELECT * FROM `seeker_profile` WHERE `User_ID`='$user_id'");
$fet_pro = mysqli_fetch_assoc($seek_pro);
$cat_id = $fet_pro['category'];
$cat = mysqli_query($con, "SELECT * FROM `category` WHERE `cat_id`='$cat_id'");
$fet_cat = mysqli_fetch_assoc($cat);
$seek = mysqli_query($con, "SELECT * FROM `job_seeker` WHERE `User_ID`='$user_id'");
$fet_seek = mysqli_fetch_assoc($seek);
?>
<style>
    span button{
        transition: .5s;
        opacity: 0;
    }
    li:hover button{
        opacity: 1;
    }
</style> 
<div class="card">
    <div class="card-body">
        <div class="d-flex flex-column align-items-center text-center position-relative">
            <img id="pro_img_click" src="<?php echo $fet_pro['img'] ?>" alt="Admin" class="rounded-circle" width="150">
            <div class="mt-3">
                <h4 class="text-capitalize"><?php echo $fet_seek['Name'] ?></h4>
                <p class="text-secondary mb-1 text-capitalize"><?php echo $fet_cat['cat_name'] ?></p>
                <p class="text-muted font-size-sm text-capitalize"><?php echo $fet_pro['address'] ?></p>
                <button class="btn btn-primary">Follow</button>
                <button class="btn btn-outline-primary">Message</button>
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