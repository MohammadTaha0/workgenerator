<?php
session_start();
include '../conn.php';

if (isset($_POST['user'])) {
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    if (mysqli_num_rows($sql = mysqli_query($con, "SELECT * FROM `admin` WHERE `user`='$user' AND `pass`='$pass'")) > 0) {
        echo "Welcome Admin";
        $_SESSION['admin'] = "admin";
    } else {
        echo "Invalid UserName Or Password";
    }
    exit;
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>

    <div class="container">
        <div class="row justify-content-center align-items-center mt-5 py-5">
            <div class="col-5 shadow">
                <form class="form">
                    <h4 class="text-center text-secondary pt-3">Admin Login</h4>
                    <div class="row pt-2 pb-4 bg-light px-3">
                        <div class="col-12 mb-3">
                            <input type="text" class="form-control" name="user" id="user" placeholder="User Name">
                        </div>
                        <div class="col-12 mb-3">
                            <input type="text" id="pass" name="pass" class="form-control" placeholder="Password">
                        </div>
                        <div class="col-12">
                            <input type="button" id="btn" class="btn btn-primary" value="Login">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $("#btn").click(function() {
                user = $("#user").val();
                pass = $("#pass").val();
                if (user == "" || pass == "") {
                    alert("ALL fields are Required")
                } else {
                    $.ajax({
                        type: "post",
                        data: {
                            user: user,
                            pass: pass
                        },
                        success: function(data) {
                            alert(data);
                            if (data == "Welcome Admin") {
                                window.location.href = "index.php";
                            } else {

                            }
                        }
                    })
                }
            })
        });
    </script>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>