<?php
require_once("admin/includes/db_connect.php");
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Online Ecommerce</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css">
    <link rel="stylesheet" href="styles/bootstrap4/bootstrap.min.css">
    <link rel="stylesheet" href="styles/newstyle.css">


    <style>
    input {
        height: 50px;
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
                    <?php
                    if (isset($_SESSION['successmsg'])) {
                        ?>
                    <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                        <strong>Suucess!</strong> <?php echo $_SESSION['successmsg']; ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php
                             unset($_SESSION['successmsg']);
                    }
                   ?>
                    <?php
                    if (isset($_SESSION['errormsg'])) {
                        ?>
                    <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                        <strong>Success!</strong> <?php echo $_SESSION['errormsg']; ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php
                             unset($_SESSION['errormsg']);
                    }
                   ?>
                    <h4>User Login</h4>
                </div>
                <div class="card-body">
                    <form action="u_controller.php?action=login" method="POST">
                        <div id="dynamic_container">
                            <div class="input-group mt-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text br-15"><i class="fas fa-at"></i></span>
                                </div>
                                <input name="email" type="email" placeholder="User Email" class="form-control" />

                            </div>
                            <?php
                     if (isset($_SESSION['emailErr'])) {
                         echo '<p id="error" style="width:70%; margin-left:40px;">';
                         echo $_SESSION['emailErr'];
                         unset($_SESSION['emailErr']);
                         echo '</p>';
                     }
        ?>
                            <br>

                            <div class="input-group mt-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text br-15"><i class="fa fa-key" aria-hidden="true"></i>
                                    </span>
                                </div>
                                <input type="password" name="password" placeholder="User Password" class="form-control">


                            </div>
                            <?php
                     if (isset($_SESSION['passwordErr'])) {
                         echo '<p id="error" style="width:70%; margin-left:40px;">';
                         echo $_SESSION['passwordErr'];
                         unset($_SESSION['passwordErr']);
                         echo '</p>';
                     }
        ?>
                        </div>
                        <br>
                        <div class="card-footer">
                            <button type="submit" name="save" class="btn btn-success btn-sm float-right submit_btn"><i
                                    class="fas fa-arrow-alt-circle-right"></i> Submit</button>
                        </div>
                    </form>

                </div>

            </div>
        </div>
        </div>
        <script src="styles/bootstrap4/popper.js"></script>
        <script src="styles/bootstrap4/bootstrap.min.js"></script>
</body>

</html>