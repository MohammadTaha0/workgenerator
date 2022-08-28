<?php
session_start();
include 'conn.php';
$emp_id = $_SESSION['auth_user']['ID'];
$sql = mysqli_query($con, "SELECT * FROM `jobs` WHERE `emp_id`='$emp_id'");
if (mysqli_num_rows($sql) > 0) {
    while ($row = mysqli_fetch_array($sql)) {
?>
        <tr>
            <td><?php echo $row['Auto_generated_ID'];  ?></td>
            <td><?php echo $row['Title'];  ?></td>
            <td><?php echo $row['Category'];  ?></td>
            <td><?php echo $row['min_sal'] . ' - ' . $row['max_sal'];  ?></td>
            <td><?php echo $row['Skills'];  ?></td>
            <td><?php echo $row['Experience'];  ?></td>
            <td><?php if ($row['Job_Role'] == 0) {
                    echo "Part Time";
                } elseif ($row['Job_Role'] == 1) {
                    echo "Full Time";
                }  ?></td>
        </tr>
<?php
    }
}
?>