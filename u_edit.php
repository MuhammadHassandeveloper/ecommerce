<?php
session_start();
require_once("admin/includes/db_connect.php");
$id=$_GET['id'];
global $connection;
$sql="SELECT * FROM users where u_id='$id'";
$result=mysqli_query($connection,$sql);
foreach ($result as $row) {
    ?>
<!DOCTYPE html>
<html>

<head>
    <title>Online Ecommerce</title>
    <script src="styles/bootstrap4/popper.js"></script>
    <link rel="stylesheet" href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css">
    <script src="js/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="styles/bootstrap4/bootstrap.min.js">
    <link rel="stylesheet" href="styles/bootstrap4/bootstrap.min.css">
    <link rel="stylesheet" href="styles/newstyle.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

    <script src="js\newjs.js"></script>
    <style>
    input {
        height: 50px;
    }

    #error {
        color: red;
    }

    #success {
        color: green;
    }
    </style>

</head>

<!-- Coded With Love By Mutiullah Samim-->

<body>
    <dvi class="container h-100">
        <div class="d-flex justify-content-center">
            <div class="card mt-5 col-md-4 animated bounceInDown myForm">
                <div class="card-header">
                    <h4>Edit Profile</h4>
                </div>
                <div class="card-body">
                    <form action="u_controller.php?action=edit" method="POST">
                        <div id="dynamic_container">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text br-15"><i class="fa fa-user" aria-hidden="true"></i>
                                    </span>
                                </div>
                                <input type="hidden" name="u_id" value="<?php echo $row['u_id']  ?>"
                                    class="form-control" />
                                <input type="text" name="name" value="<?php echo $row['name']  ?>"
                                    class="form-control" />
                            </div>
                            <div class="input-group mt-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text br-15"><i class="fas fa-phone-square"></i></span>
                                </div>
                                <input name="phone" type="number" value="<?php echo $row['phone']  ?>"
                                    class="form-control" />

                            </div>
                            <div class="input-group mt-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text br-15"><i class="fas fa-at"></i></span>
                                </div>
                                <input name="email" type="email" value="<?php echo $row['email']  ?>"
                                    class="form-control" />

                            </div>
                            <div class="input-group mt-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text br-15"><i class="fa fa-key" aria-hidden="true"></i>
                                    </span>
                                </div>
                                <input type="password" name="password" value="<?php echo $row['password']  ?>"
                                    class="form-control" />

                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" name="save" class="btn btn-success btn-sm float-right submit_btn"><i
                                    class="fas fa-arrow-alt-circle-right"></i> Submit</button>
                        </div>
                    </form>

                </div>
                <?php
}?>
            </div>
        </div>
        </div>
</body>

</html>