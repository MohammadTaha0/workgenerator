<?php
session_start();
include 'conn.php';
if (isset($_GET['talentProfile'])) {
    $user_id = $_GET['user_id'];
} else {
    if (isset($_SESSION['employer'])) {
        $user_id = $_SESSION['$session_user_id'];
    } else {
        $user_id = $_SESSION['auth_user']['User_ID'];
    }
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
    .card-body .row {
        height: 30px;
        overflow: hidden !important;
    }

    .card-body .row a {
        height: 30px;
    }

    .card-body .row button,
    #seeker_details div button {
        opacity: 0;
        transition: .5s !important;
    }

    <?php
    if (isset($_SESSION['employer'])) {
    ?>.card-body .row:hover button,
    #seeker_details div:hover button {
        opacity: 0;
    }

    <?php
    } else {
    ?>.card-body .row:hover button,
    #seeker_details div:hover button {
        opacity: 1;
    }

    <?php
    }
    ?>
    #skills_input {
        display: none;
    }

    #multi_option {
        max-width: 100% !important;
    }
</style>
<div class="card mb-3">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-3">
                <h6 class="mb-0">Full Name</h6>
            </div>
            <div class="col-sm-9 text-secondary">
                <a id="Name"><?php echo $fet_seek['Name'] ?></a>
                <button type="button" class="btn" data-id="Name" data-value="<?php echo $fet_seek['Name'] ?>" data-bs-toggle="modal" data-bs-target="#modal"><i class="fa-solid fa-edit"></i></button>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-3">
                <h6 class="mb-0">Email</h6>
            </div>
            <div class="col-sm-9 text-secondary">
                <a class="text-secondary" id="Email" href="mailto:<?php echo $fet_seek['Email'] ?>"><?php echo $fet_seek['Email'] ?></a>
                <button type="button" class="btn" data-id="Email" data-value="<?php echo $fet_seek['Email'] ?>" data-bs-toggle="modal" data-bs-target="#modal" data-bs-whatever="@mdo"><i class="fa-solid fa-edit"></i></button>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-3">
                <h6 class="mb-0">Phone</h6>
            </div>
            <div class="col-sm-9 text-secondary">
                <a class="text-secondary" id="Contact" href="tel:<?php echo $fet_seek['Contact'] ?>"><?php echo $fet_seek['Contact'] ?></a>
                <button type="button" class="btn" data-id="Contact" data-value="<?php echo $fet_seek['Contact'] ?>" data-bs-toggle="modal" data-bs-target="#modal"><i class="fa-solid fa-edit"></i></button>
            </div>
        </div>
        <hr>
        <hr>
        <div class="row">
            <div class="col-sm-3">
                <h6 class="mb-0">Address</h6>
            </div>
            <div class="col-sm-9 text-secondary">
                <a id="Address"><?php echo $fet_pro['address'] ?></a>
                <button type="button" class="btn" data-id="Address" data-value="<?php echo $fet_pro['address'] ?>" data-bs-toggle="modal" data-bs-target="#modal" data-bs-whatever="@mdo"><i class="fa-solid fa-edit"></i></button>
            </div>
        </div>
        <hr>
    </div>
</div>
<div class="row gutters-sm justify-content-center">
    <div class="col-sm-6">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <h6 class="d-flex align-items-center mb-3 material-icons text-info mr-2">Skills</h6>

                    </div>
                    <div class="col-6 text-end">
                        <button type="button" class="btn" data-id="Skills" data-value="<?php echo $fet_pro['skills'] ?>" data-bs-toggle="modal" data-bs-target="#modal" data-bs-whatever="@mdo"><i class="fa-solid fa-edit"></i></button>
                    </div>
                </div>
                <ul id="skillscont" class="text-info">
                    <small>
                        <input type="hidden" value="<?php echo $fet_pro['skills']; ?>" id="arrayval">
                    </small>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-sm-6 mb-3">
        <div class="card h-100">
            <div class="card-body" id="seeker_details">
                <h6 class="d-flex align-items-center mb-3 material-icons text-info mr-2">Seeker Details :-</h6>
                <div class="text-capitalize fw-bold bg-info text-white w-100 ps-3 py-2 mb-2">Experince : <?php echo $fet_pro['exper'] ?>

                    <button type="button" class="btn ms-5" data-id="Experince" data-value="<?php echo $fet_pro['exper'] ?>" data-bs-toggle="modal" data-bs-target="#modal" data-bs-whatever="@mdo"><i class="fa-solid fa-edit"></i></button>
                </div>

                <div class="text-capitalize fw-bold bg-info text-white w-100 ps-3 py-2 mb-2">expertise : <?php echo $fet_pro['expertise'] ?>
                    <button type="button" class="btn ms-5" data-id="Expertise" data-value="<?php echo $fet_pro['expertise'] ?>" data-bs-toggle="modal" data-bs-target="#modal" data-bs-whatever="@mdo"><i class="fa-solid fa-edit"></i></button>
                </div>

                <div class="text-capitalize fw-bold bg-info text-white w-100 ps-3 py-2 mb-2">previous Company : <?php echo $fet_pro['prev comp'] ?>
                    <button type="button" class="btn ms-5" data-id="prev comp" data-value="<?php echo $fet_pro['prev comp'] ?>" data-bs-toggle="modal" data-bs-target="#modal" data-bs-whatever="@mdo"><i class="fa-solid fa-edit"></i></button>
                </div>

                <div class="text-capitalize fw-bold bg-info text-white w-100 ps-3 py-2 mb-2">Current Company : <?php echo $fet_pro['curr comp'] ?>
                    <button type="button" class="btn ms-5" data-id="curr comp" data-value="<?php echo $fet_pro['curr comp'] ?>" data-bs-toggle="modal" data-bs-target="#modal" data-bs-whatever="@mdo"><i class="fa-solid fa-edit"></i></button>
                </div>

                <div class="text-capitalize fw-bold bg-info text-white w-100 ps-3 py-2 mb-2">category : <?php echo $fet_cat['cat_name'] ?>
                    <button type="button" class="btn ms-5" data-id="category" data-value="<?php echo $fet_cat['cat_name'] ?>" data-bs-toggle="modal" data-bs-target="#modal" data-bs-whatever="@mdo"><i class="fa-solid fa-edit"></i></button>
                </div>

                <div class="text-capitalize fw-bold bg-info text-white w-100 ps-3 py-2 mb-2">mobile : <a href="tel:<?php echo $fet_pro['mobile'] ?>" class="text-white"><?php echo $fet_pro['mobile'] ?></a>
                    <button type="button" class="btn ms-5" data-id="Mobile" data-value="<?php echo $fet_pro['mobile'] ?>" data-bs-toggle="modal" data-bs-target="#modal" data-bs-whatever="@mdo"><i class="fa-solid fa-edit"></i></button>
                </div>

                <div class="text-capitalize fw-bold bg-info text-white w-100 ps-3 py-2 mb-2">email : <a class="text-white" href="mailto: <?php echo $fet_seek['Email'] ?>"><?php echo $fet_seek['Email'] ?></a>
                    <button type="button" class="btn ms-5" data-id="Email" data-value="<?php echo $fet_seek['Email'] ?>" data-bs-toggle="modal" data-bs-target="#modal" data-bs-whatever="@mdo"><i class="fa-solid fa-edit"></i></button>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-capitalize" id="exampleModalLabel">Edit Your Name</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-floating mb-3" id="float_email_inp">
                        <input type="text" class="form-control" name="epd_val" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput" id="label_edit">Email address</label>
                    </div>
                    <div class="row align-items-center mb-3" id="skills_input">
                        <div class="col-12 col-sm-12 text-secondary">
                            <select id="multi_option" class="col-12" multiple name="native-select" placeholder="Native Select" data-silent-initial-value-set="false">
                                <?php
                                $crt = mysqli_query($con, "SELECT * FROM `skills`");
                                while ($catfet = mysqli_fetch_array($crt)) {
                                ?>
                                    <option value="<?php echo $catfet['skills'] ?>"><?php echo $catfet['skills'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row" id="exper_inp">
                        <div class="col-12 col-sm-12 text-secondary">
                            <div class="input-group">
                                <input type="text" id="exper" name="exper" placeholder="Experince" class="form-control">
                                <select name="year" id="year" class="input-group-text form-select">
                                    <option value="Year" selected="selected">Year</option>
                                    <option value="Month">Month</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="cat_cont">
                        <div class="col-sm-12 text-secondary">
                            <select name="category" class="form-select" id="category">
                                <?php
                                $crt = mysqli_query($con, "SELECT * FROM `category`");
                                while ($catfet = mysqli_fetch_array($crt)) {
                                ?>
                                    <option value="<?php echo $catfet['cat_id'] ?>"><?php echo $catfet['cat_name'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" data-bs-dismiss="modal" id="save" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {

        $("button[data-bs-toggle=modal]").click(function() {
            var id = $(this).attr("data-bs-target");
            var modal_id = "#" + $("div[data-role=modal_cont]").attr("id");
            // attr = $(this);
            // $(this).attr("data-bs-target", modal_id);;
            var value = $(this).data('value');
            var name = $(this).data('id');
            $("#exampleModalLabel").text("Edit Your " + name);
            if (name == "Skills") {
                $("#skills_input").fadeIn(100);
                $("#float_email_inp").fadeOut(100);
                $("#cat_cont").fadeOut(100);
                $("#exper_inp").fadeOut(100);
            } else if (name == "Experince") {
                value = value.replace("Year", "")
                value = value.replace("Month", "")
                $("#skills_input").fadeOut(100);
                $("#float_email_inp").fadeOut(100);
                $("#exper_inp").fadeIn(100);
                $("#cat_cont").fadeOut(100);
                $("#exper").val(value);
                $("#year").val(value);
                $("#label_edit").text(name);
            } else if (name == "category") {
                $("#skills_input").fadeOut(100);
                $("#float_email_inp").fadeOut(100);
                $("#cat_cont").fadeIn(100);
                $("#exper_inp").fadeOut(100);
                $("#floatingInput").val(value);
                $("#label_edit").text("Category");
            } else {
                $("#skills_input").fadeOut(100);
                $("#float_email_inp").fadeIn(100);
                $("#cat_cont").fadeOut(100);
                $("#exper_inp").fadeOut(100);
                $("#floatingInput").val(value);
                $("#label_edit").text(name);
            }

            if (name == "Skills") {
                $("#save").click(function() {
                    if ($("#multi_option").val() == "") {
                        $("#save").removeAttr("data-bs-dismiss");
                        alert("Select Skills First Then Try to save")
                    } else {
                        skills = $("#multi_option").val()
                        skills = skills.toString();
                        $.post(
                            "upfate_profile.php", {
                                updval: skills,
                                updname: name,
                            },
                            function(upd_pro) {
                                console.log(upd_pro);
                                $("#sidebar").load("seeker_profile_sidebar.php");
                                $("#rightbar").load("seeker_profile_rightbar.php");
                            }
                        );
                    }
                })
            } else if (name == "Experince") {
                $("#save").click(function() {
                    $.post(
                        "upfate_profile.php", {
                            updval: $("#exper").val(),
                            updyear: $("#year").val(),
                            updname: name,
                        },
                        function(upd_pro) {
                            console.log(upd_pro);
                            $("#sidebar").load("seeker_profile_sidebar.php");
                            $("#rightbar").load("seeker_profile_rightbar.php");
                        }
                    );
                })
            } else if (name == "category") {
                $("#save").click(function() {
                    console.log($("#category").val());
                    $.post(
                        "upfate_profile.php", {
                            updval: $("#category").val(),
                            updname: name,
                        },
                        function(upd_pro) {
                            console.log(upd_pro);
                            $("#sidebar").load("seeker_profile_sidebar.php");
                            $("#rightbar").load("seeker_profile_rightbar.php");
                        }
                    );
                })
            } else {
                $("#save").click(function() {
                    $.post(
                        "upfate_profile.php", {
                            updval: $("#floatingInput").val(),
                            updname: name,
                        },
                        function(upd_pro) {
                            console.log(upd_pro);
                            $("#sidebar").load("seeker_profile_sidebar.php");
                            $("#rightbar").load("seeker_profile_rightbar.php");
                        }
                    );
                })
            }
        })

    });


    var array = document.getElementById("arrayval").value;
    var substr = array.split(',');
    for (i = 0; i < substr.length; ++i) {
        var ul = document.getElementById("skillscont");
        // ul.children("small").innerText = substr[i];
        var li = document.createElement("li");
        var span = document.createElement("span");
        var small = document.createElement("small");
        small.innerText = substr[i]
        ul.append(li);
        // var k = document.createElement("i");
        li.append(small)
        // li.append(k)
        // span.append(small)
        small.setAttribute("class", "text-dark ms-0")
        small.setAttribute("style", "font-size: 12px;letter-spacing: 1px;color:rgba(0,0,0,0.7)!important;")


    }
</script>
<?php
include 'link.php';
?>