<?php
session_start();
include 'conn.php';
$emp_id = $_SESSION['auth_user']['ID'];
$sql = mysqli_query($con, "SELECT * FROM `jobs` WHERE `emp_id`='$emp_id'");
if (mysqli_num_rows($sql) > 0) {
    while ($row = mysqli_fetch_array($sql)) {
?>
        <tr id="<?php echo $row['Auto_generated_ID'] ?>">
            <td data-role="id"><?php echo $row['Auto_generated_ID'];  ?></td>
            <td data-role="title"><?php echo $row['Title'];  ?></td>
            <td data-role="cat"><?php echo $row['Category'];  ?></td>
            <td><?php echo "<span data-role='minsal'>" . $row['min_sal'] . "</span>" . ' - ' . "<span data-role='maxsal'>" . $row['max_sal'] . "</span>";  ?></td>
            <td data-role="skills"><?php echo $row['Skills'];  ?></td>
            <td data-role="exper"><?php echo $row['Experience'];  ?></td>
            <td><?php if ($row['Job_Role'] == 0) {
                    echo "<span data-role='role'>" . "Part" . "</span>" . " Time";
                } elseif ($row['Job_Role'] == 1) {
                    echo "<span data-role='role'>" . "Full" . "</span>" . " Time";
                }  ?></td>
            <td data-role="loc"><?php echo $row['Location'];  ?></td>
            <td data-role="descrip"><?php echo $row['Description'];  ?></td>
            <td data-role="lastdate"><?php echo $row['lastdate'];  ?></td>
            <td><button class="btn btn-light" data-role="edit" type="button" data-id="<?php echo $row['Auto_generated_ID'] ?>"> <i class="fa-solid fa-edit text-primary"></i></button></td>
            <td>
                <form data-role="delform">
                    <input type="hidden" value="<?php echo $row['Auto_generated_ID'] ?>" name="delidd">
                    <button class="btn btn-light" name="deletee" data-role="delete" type="button" data-id="<?php echo $row['Auto_generated_ID'] ?>"> <i class="fa-solid fa-trash-can text-danger"></i></button>
                </form>
            </td>
        </tr>

<?php
    }
}
?>


<script>
    $(document).ready(function() {
        $("#hidedel").click(function() {
            $("#delcont").fadeOut(400);
        })
        $("#frommm").fadeOut(1);
        $("#delcont").fadeOut(1);
        $("button[data-role=delete]").click(function() {
            $("#delcont").fadeIn(400);
            delid = $(this).data('id');
            $("#delval").val(delid)
            title = $("#" + delid).children('td[data-role=title]').text();
            $("#deltitle").text(title);
            // alert(delid);
            console.log(delid);
        });
        $("button[data-role=edit]").click(function() {
            id = $(this).data('id');
            // alert(id);
            title = $("#" + id).children('td[data-role=title]').text();
            cat = $("#" + id).children('td[data-role=cat]').text();
            minsal = $("#" + id).children('td').children('span[data-role=minsal]').text();
            maxsal = $("#" + id).children('td').children('span[data-role=maxsal]').text();
            skills = $("#" + id).children('td[data-role=skills]').text();
            var substr = skills.split(',')
            exper = $("#" + id).children('td[data-role=exper]').text();
            role = $("#" + id).children('td').children('span[data-role=role]').text();
            loc = $("#" + id).children('td[data-role=loc]').text();
            descrip = $("#" + id).children('td[data-role=descrip]').text();
            lastdate = $("#" + id).children('td[data-role=lastdate]').text();
            $("#frommm").fadeIn(400);
            vid = id;
            $("#title").val(title);
            $("#cat").val(cat);
            $("#misal").val(minsal);
            $("#maxsal").val(maxsal);
            $("#exper").val(exper);
            if (role == "Full") {
                $("#role").children('option[value=1]').attr("selected", "selected");
            } else {
                $("#role").children('option[value=1]').removeAttr("selected");
            }
            $("#Location").val(loc);
            $("#descrip").val(descrip);
            $("#lastdate").val(lastdate);
            $("#update_id").val(id);

            for (i = 0; i < substr.length; i++) {

                // $("div[data-value=" + substr[i] + "]").attr("aria-selected", "true");
                // $("div[data-value=" + substr[i] + "]").attr("class", "vscomp-option focused selected");
                $("input[name=native-select]").val(skills);
                $(".vscomp-value").text(skills)
                $("#vscomp-ele-wrapper-1829").attr("class", "vscomp-ele-wrapper vscomp-wrapper multiple has-select-all has-clear-button has-search-input popup-position-center focused has-value");
            }
        })

        $("#update_close").click(function() {
            $("#frommm").fadeOut(200);
            idd = $("button[data-role=edit]").data('id');
            role = $("#" + idd).children('td').children('span[data-role=role]').text();
            $("#role").children('option[data-role=' + role + ']').removeAttr("selected");
            for (i = 0; i < substr.length; i++) {

                $("div[data-value=" + substr[i] + "]").attr("aria-selected", "fasle");
                $("div[data-value=" + substr[i] + "]").attr("class", "vscomp-option ");
                $("input[name=native-select]").val(skills);
                $(".vscomp-value").text(" ")
                $("#vscomp-ele-wrapper-1829").attr("class", "vscomp-ele-wrapper vscomp-wrapper multiple has-select-all has-clear-button has-search-input popup-position-center focused");
            }
        })
    });
</script>