<?php
session_start();
include '../conn.php';
if ($sql = mysqli_query($con, "SELECT * FROM `employer`")) {
    while ($fet = mysqli_fetch_array($sql)) {
?>
        <tr>
            <td><?php echo $fet['ID'] ?></td>
            <td><?php echo $fet['Email'] ?></td>
            <td><?php echo $fet['Name'] ?></td>
            <td><?php echo $fet['Company_Name'] ?></td>
            <td><?php echo $fet['Status'] ?></td>
            <td><button class="btn" data-role='edit' data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo" data-id="<?php echo $fet['ID'] ?>" data-value="<?php echo $fet['Status'] ?>"><i class="fa-regular fa-edit text-success"></i></button></td>
            <td><button class="btn"><i class="fa-regular fa-trash text-danger"></i></button></td>
        </tr>
<?php
    }
}
?>

<script>
    $(document).ready(function() {
        $("button[data-role=edit]").click(function() {
            id = $(this).data('id');
            value = $(this).data('value');
            $("#save").attr("data-id",id);
        })
    });
</script>