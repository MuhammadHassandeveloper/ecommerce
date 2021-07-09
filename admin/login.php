<?php
require_once("includes/db_connect.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- vendor css -->
    <link href="adminMenu/lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="adminMenu/lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="adminMenu/lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
    <link href="adminMenu/lib/rickshaw/rickshaw.min.css" rel="stylesheet">

    <!-- Starlight CSS -->

    <link rel="stylesheet" href="adminMenu/css/starlight.css">
</head>
<style>
#error {
    color: red;
}

#success {
    color: white;
    padding: 3px;
    margin: 5px;
    background-color: green;
    display: none;
}
</style>

<body>

    <div class="container my-4 w-50">
        <p id="successmsg " style="color:red; text-align:center;"></p>
        <form class="p-2 mx-auto mt-1 bg-gradient bg-light shadow"
            style="max-width:550px; height:400px;margin-top:100px;">
            <!----------------------- success msg ---------------------------->
            <?php
                    if (isset($_SESSION['successmsg'])) {
                        ?>
            <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="d-flex align-items-center justify-content-start">
                    <i class="icon ion-ios-checkmark alert-icon tx-32 mg-t-5 mg-xs-t-0"></i>
                    <strong>Success!</strong> <?php echo $_SESSION['successmsg']; ?>
                </div><!-- d-flex -->
            </div><!-- alert -->

            <?php
                             unset($_SESSION['successmsg']);
                    }
                   ?>


            <h2 class="p-2 text-center">Admin Login</h2>
            <p id="wrongErr" style="color:red; text-align:center;"></p>
            <div class="form-group">
                <label style="margin-left: 40px;" for="email">email</label>
                <input type="text" style="height:50px; width:450px; margin-left:30px;" class="form-control" name="email"
                    id="uEmail">
                <p id="emailError" style="width:70%; margin-left:50px;color:red;"></p>

            </div>

            <div class="form-group " style="position:relative;">
                <label for="email" style="margin-left: 40px;">password</label>
                <input type="password" style="height:50px; width:450px; margin-left:30px;" class="form-control"
                    name="password" id="password"><span id="showPass" class="btn text-dark"
                    style="position: absolute;top:40px;right:65px"><i class="fa fa-eye"></i></span>
                <p id="passwordError" style="width:70%; margin-left:40px;color:red;"></p>
            </div>
            <button type="submit" class="btn btn-success" style="height:60px; width:450px; margin-left:30px;"
                name="save" id="loginbtn">Login</button>

        </form>

    </div>

    <script src="adminMenu/lib/jquery/jquery.js"></script>
    <script src="adminMenu/lib/popper.js/popper.js"></script>
    <script src="adminMenu/lib/bootstrap/bootstrap.js"></script>
    <script src="adminMenu/lib/jquery-ui/jquery-ui.js"></script>
    <script>
    $(document).ready(function() {
        $("#showPass").click(() => {
            const icon = $(this).find('i');
            const type = $("#password").attr('type');
            if (type == 'password') {
                $("#password").attr('type', 'text');
                icon.removeClass('fa-eye');
                icon.addClass('fa-eye-slash');
            } else {
                $("#password").attr('type', 'password');
                icon.removeClass('fa-eye-slash');
                icon.addClass('fa-eye');
            }
        });

        $("#loginbtn").click(function(e) {
            e.preventDefault();
            let form = {
                email: $("#uEmail").val(),
                password: $("#password").val(),
            }
            $.post('profile_controller.php?action=login', form, function(data) {
                data = JSON.parse(data);
                if (data == 0) {
                    document.write("<?php  $_SESSION['successmsg']="successfully login";
 ?>");
                    window.location.href = 'index.php';

                }
                if (data.email) {
                    $("#emailError").html(data.email);
                } else {

                    $("#emailError").html("");
                }
                if (data.password) {
                    $("#passwordError").html(data.password);
                } else {
                    $("#passwordError").html("");
                }
                if (data.u_error) {
                    $("#wrongErr").html(data.u_error);
                } else {

                    $("#wrongErr").html("");
                }
            });
        });
    });
    </script>
</body>

</html>