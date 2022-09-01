<?php
session_start();
include 'conn.php';

$talent = $_POST['talent'];
$exper = $_POST['exper'];
$cat = $_POST['cat'];
// echo $exper . " ";

$sql = mysqli_query($con, "SELECT * FROM `seeker_profile` A INNER JOIN `job_seeker` B WHERE A.`user_id`=B.`User_ID` AND (A.`exper` LIKE '%$exper%' OR A.`expertise` LIKE '%$talent%' OR A.`category` LIKE '%$cat%') ");
if (mysqli_num_rows($sql) > 0) {
    while ($fetch = mysqli_fetch_array($sql)) {
        $cat_name = $fetch['category'];
        $catsql = mysqli_query($con,"SELECT * FROM `category` WHERE `cat_id`='$cat_name'");
        $fetchcat = mysqli_fetch_assoc($catsql);

?>
        <div class="col-3 shadow py-2 mx-1" data-role='talent_res'>
            <div class="row mx-2 justify-content-center align-items-center">
                <div class="col-12 rounded-circle d-flex justify-content-center align-items-center" style="height: 140px; width: 140px;">
                    <a href="profile.php?user_id=<?php echo $fetch['User_ID']; ?>"><img src="<?php echo $fetch['img'] ?>" class="d-block w-100 rounded-circle" alt=""></a>
                </div>
                <div class="col-10">
                    <div class="row justify-content-between text-center">
                        <div class="col-12">
                            <a href="profile.php?user_id=<?php echo $fetch['User_ID']; ?>" class="h6 fs-5"> <?php echo $fetch['Name'] ?> </a>
                            <br>
                            <span class="badge text-dark"> <?php echo $fetchcat['cat_name'] ?> </span>
                        </div>
                        <div class="col-12 my-2">
                            <a href="profile.php?user_id=<?php echo $fetch['User_ID']; ?>" class="btn btn-primary">View Profile</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
    }
}
