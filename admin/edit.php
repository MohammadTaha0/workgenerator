
<?php
session_start();
include '../conn.php';
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
}
$id = $_POST['id'];
$value = $_POST['value'];
echo $id;
echo $value;
$sql = mysqli_query($con,"UPDATE `employer` SET `Status`='$value' WHERE `ID`='$id'");

?>


