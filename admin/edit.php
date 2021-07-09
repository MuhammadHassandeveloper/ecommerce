<?php
require_once("includes/db_connect.php");
session_start();
if (!isset($_SESSION['admin_id'])) {
    header("Location:login.php");
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
    <div>

        <?php
                    if (isset($_SESSION['errormsg'])) {
                        ?>
        <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
            <strong>Success!</strong> <?php echo $_SESSION['errormsg']; ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php
                             unset($_SESSION['errormsg']);
                    }
                   ?>




        <?php
$id=$_GET['id'];
global $connection;
$query = "SELECT * FROM admin where id='$id'";
$result = mysqli_query($connection, $query);
foreach ($result as $row) { ?>
        <form class="p-2 mx-auto mt-1 bg-gradient bg-light shadow m-5" action="profile_controller.php?action=edit"
            method="POST" style="max-width:550px; height:450px;">
            <input type="hidden" class="form-control" name="id" id="email" value="<?php echo $_SESSION['admin_id']?>">

            <h2 class="p-2 text-center">Edit Profile</h2>
            <div class="form-group">
                <label style="margin-left: 40px;" for="email">Admin Name</label>
                <input type="text" style="height:50px; width:450px; margin-left:30px;" class="form-control" name="name"
                    id="email" value="<?php echo $row['name']?>">
            </div>

            <div class="form-group">
                <label for="email" style="margin-left: 40px;">Admin Email</label>
                <input type="text" style="height:50px; width:450px; margin-left:30px;" class="form-control" name="email"
                    id="email" value="<?php echo $row['email']  ?>">
            </div>

            <button type="submit" class="btn btn-primary" style="height:60px; width:450px; margin-left:30px;"
                name="save">Update</button>


        </form>
        <?php }  ?>
    </div>

    <script src="adminMenu/lib/jquery/jquery.js"></script>
    <script src="adminMenu/lib/popper.js/popper.js"></script>
    <script src="adminMenu/lib/bootstrap/bootstrap.js"></script>
    <script src="adminMenu/lib/jquery-ui/jquery-ui.js"></script>
</body>

</html>