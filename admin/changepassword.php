<?php
require_once("includes/db_connect.php");
session_start();
if (!isset($_SESSION['admin_id'])) {
    header("Location:login.php");
}

global $connection;
$curpasswordErr=$newpasswordErr =$conpasswordErr= "";
$query = "SELECT * FROM admin";
$result = mysqli_query($connection, $query);
$res = mysqli_fetch_assoc($result);
$u_id=$_SESSION['admin_id'];
$oldpassword=$res['password'];
if (isset($_POST['save'])) {
    $curpassword=$_POST['curpassword'];
    $newpassword=$_POST['newpassword'];
    $conpassword=$_POST['conpassword'];
    if ($curpassword==$oldpassword) {
        if ($newpassword==$conpassword) {
            $update="UPDATE admin set password='$newpassword' where id='$u_id'";
            $query=mysqli_query($connection, $update);
            if ($query) {
                $_SESSION['successmsg']="Password successfully Updated";
                header("Location:login.php");
            }
        } else {
            $_SESSION['errormsg']="new password and confirm password fields must be equal";
        }
    } else {
        $_SESSION['errormsg']="old password is wrong.";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="adminMenu/lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="adminMenu/lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="adminMenu/lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
    <link href="adminMenu/lib/rickshaw/rickshaw.min.css" rel="stylesheet">

    <!-- Starlight CSS -->

    <link rel="stylesheet" href="adminMenu/css/starlight.css">
    <title>Php Crud</title>
</head>
<style>
#error {
    color: red;
}

#success {
    color: green;
}
</style>

<body>

    </div>
    <form class="p-2 mx-auto mt-1 bg-gradient bg-light shadow m-5"
        action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST"
        style="max-width:550px; height:450px;">



        <?php if (isset($_SESSION['errormsg'])) {    ?>
        <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
            <strong>Error!</strong> <?php echo $_SESSION['errormsg']; ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php unset($_SESSION['errormsg']); } ?>

        <h2 class="p-2 text-center">Change Passward</h2>
        <div class="form-group">
            <label style="margin-left: 40px;" for="email">Old Password</label>
            <input type="password" style="height:50px; width:450px; margin-left:30px;" class="form-control"
                name="curpassword" id="email">
            <?php
                if ($curpasswordErr) {
                    echo '<p id="error" style="width:70%; margin-left:50px;">';
                    echo "$curpasswordErr";
                    echo '</p>';
                }
                ?>
        </div>

        <div class="form-group">
            <label for="email" style="margin-left: 40px;">New password</label>
            <input type="password" style="height:50px; width:450px; margin-left:30px;" class="form-control"
                name="newpassword" id="email">
            <?php
                if ($newpasswordErr) {
                    echo '<p id="error" style="width:70%; margin-left:40px;">';
                    echo "$newpasswordErr";
                    echo '</p>';
                }
                ?>
        </div>
        <div class="form-group">
            <label for="email" style="margin-left: 40px;">Confirm password</label>
            <input type="password" style="height:50px; width:450px; margin-left:30px;" class="form-control"
                name="conpassword" id="email">
            <?php
                if ($conpasswordErr) {
                    echo '<p id="error" style="width:70%; margin-left:40px;">';
                    echo "$conpasswordErr";
                    echo '</p>';
                }
                ?>
        </div>
        <button type="submit" class="btn btn-success" style="height:60px; width:450px; margin-left:30px;"
            name="save">Change Password</button>


    </form>

    </div>

    <script src="adminMenu/lib/jquery/jquery.js"></script>
    <script src="adminMenu/lib/popper.js/popper.js"></script>
    <script src="adminMenu/lib/bootstrap/bootstrap.js"></script>
    <script src="adminMenu/lib/jquery-ui/jquery-ui.js"></script>
</body>

</html>