<?php
session_start();
include 'conn.php';
$userid = $_SESSION['auth_user']['User_ID'];
if (mysqli_num_rows($rowapp = mysqli_query($con, "SELECT * FROM `applications` A INNER JOIN `jobs` B WHERE A.`User_id`='$userid' AND B.`Auto_generated_ID`=A.`job_id` ")) > 0) {
    while ($fetchapp = mysqli_fetch_array($rowapp)) {
        $user_id = $_SESSION['auth_user']['User_ID'];
        $skill = mysqli_query($con, "SELECT `skills` FROM `seeker_profile` WHERE `user_id`='$user_id'");
        $skill_fetch = mysqli_fetch_array($skill);
?>

        <tr id="<?php echo $fetchapp['id']; ?>">
            <td><?php echo $fetchapp['Title']; ?></td>
            <td><?php echo $skill_fetch['skills']; ?></td>
            <td><?php echo $fetchapp['Category']; ?></td>
            <td><?php echo $fetchapp['Location']; ?></td>
            <td><?php echo $fetchapp['min_sal'] . ' - ' . $fetchapp['max_sal']; ?></td>
            <td><?php
                $month_num =  date("m", strtotime($fetchapp['lastdate']));
                switch ($month_num) {
                    case 1:
                        $name = "January";
                        break;
                    case 2:
                        $name = "Feburary";
                        break;
                    case 3:
                        $name = "March";
                        break;
                    case 4:
                        $name = "April";
                        break;
                    case 5:
                        $name = "May";
                        break;
                    case 6:
                        $name = "June";
                        break;
                    case 7:
                        $name = "July";
                        break;
                    case 8:
                        $name = "August";
                        break;
                    case 9:
                        $name = "September";
                        break;
                    case 10:
                        $name = "October";
                        break;
                    case 11:
                        $name = "November";
                        break;
                    case 12:
                        $name = "December";
                        break;
                };

                echo date("d", strtotime($fetchapp['lastdate'])) . '/' . $name . '/' . date("Y", strtotime($fetchapp['lastdate']));
                ?></td>
            <td><?php
                $month_num =  date("m", strtotime($fetchapp['date_time']));
                switch ($month_num) {
                    case 1:
                        $name = "January";
                        break;
                    case 2:
                        $name = "Feburary";
                        break;
                    case 3:
                        $name = "March";
                        break;
                    case 4:
                        $name = "April";
                        break;
                    case 5:
                        $name = "May";
                        break;
                    case 6:
                        $name = "June";
                        break;
                    case 7:
                        $name = "July";
                        break;
                    case 8:
                        $name = "August";
                        break;
                    case 9:
                        $name = "September";
                        break;
                    case 10:
                        $name = "October";
                        break;
                    case 11:
                        $name = "November";
                        break;
                    case 12:
                        $name = "December";
                        break;
                };

                echo date("d", strtotime($fetchapp['date_time'])) . '/' . $name . '/' . date("Y", strtotime($fetchapp['date_time']));
                ?>
            </td>
            <td><?php if ($fetchapp['Job_Role'] == 0) {
                    echo "Part Time";
                } elseif ($fetchapp['Job_Role'] == 1) {
                    echo "Full Time";
                } ?></td>
            <td data-role="resume" class="<?php echo $fetchapp['appResume']; ?>">
                <form class="pdf_form">
                    <button type="button" data-role="update" data-id="<?php echo $fetchapp['id']; ?>" class="btn btn-primary" id="resume">View</button>
                </form>
            </td>
            <td><?php if ($fetchapp['Status'] == 0) {
                    echo "Request";
                } elseif ($fetchapp['Status'] == 1) {
                    echo "Hired 🔥 😀";
                } ?></td>
            <td>
                <p><span> </span> </p>
            </td>
        </tr>
    <?php

    }
} else {
    ?>
    <tr class="bg-secondary text-light">
        <td colspan="10" class="text-center">Not Applied Yet</td>
    </tr>
<?php
}
?>

<script>
    $(document).ready(function() {
        $("#pdf_cont").fadeOut(1)
        $("button[data-role=update]").click(function() {
            id = $(this).data('id');
            resume = $("#" + id).children('td[data-role=resume]').attr("class")
            $("#pdf_cont").fadeIn(400);
            $("#pathpdf").attr("src", resume);
        });
        $("#pdf_close").click(function() {
            $("#pdf_cont").fadeOut(400)
        })
    });
</script>