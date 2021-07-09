<?php
session_start();

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
                    <div id="success">
                        <?php
    if (isset($_GET['success'])) {
        echo '<div class="alert alert-success alert-dismissible" style="width:50%; margin-left:200px;">';
        echo '<button type="button" class="close" data-dismiss="alert">&times;</button>';
        echo $_GET['success'];
        echo '</div>';
    }
    ?>
                    </div>

                    <div class="container my-4">
                        <div id="error">
                            <?php
      if (isset($_GET['error'])) {
          echo '<div class="alert alert-danger alert-dismissible" style="width:70%;">';
          echo '<button type="button" class="close" data-dismiss="alert">&times;</button>';
          echo $_GET['error'];
          echo '</div>';
      }
      ?>
                        </div>
                        <h4>User Signup</h4>
                    </div>
                    <div class="card-body">
                        <form action="u_controller.php?action=add" method="POST">
                            <div id="dynamic_container">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text br-15"><i class="fa fa-user"
                                                aria-hidden="true"></i>
                                        </span>
                                    </div>
                                    <input type="text" name="name" placeholder="User Name" class="form-control" />
                                    <?php
                     if (isset($_SESSION['nameErr'])) {
                         echo '<p id="error" style="width:70%; margin-left:40px;">';
                         echo $_SESSION['nameErr'];
                         unset($_SESSION['nameErr']);
                         echo '</p>';
                     }
        ?>
                                </div>
                                <div class="input-group mt-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text br-15"><i class="fas fa-phone-square"></i></span>
                                    </div>
                                    <input name="phone" type="number" placeholder="User Phone" class="form-control" />
                                    <?php
                     if (isset($_SESSION['phoneErr'])) {
                         echo '<p id="error" style="width:70%; margin-left:40px;">';
                         echo $_SESSION['phoneErr'];
                         unset($_SESSION['phoneErr']);
                         echo '</p>';
                     }
        ?>
                                </div>
                                <div class="input-group mt-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text br-15"><i class="fas fa-at"></i></span>
                                    </div>
                                    <input name="email" type="email" placeholder="User Email" class="form-control" />
                                    <?php
                     if (isset($_SESSION['emailErr'])) {
                         echo '<p id="error" style="width:70%; margin-left:40px;">';
                         echo $_SESSION['emailErr'];
                         unset($_SESSION['emailErr']);
                         echo '</p>';
                     }
        ?>
                                </div>
                                <div class="input-group mt-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text br-15"><i class="fa fa-key"
                                                aria-hidden="true"></i>
                                        </span>
                                    </div>
                                    <input type="password" name="password" placeholder="User Password"
                                        class="form-control" />
                                    <?php
                     if (isset($_SESSION['passwordErr'])) {
                         echo '<p id="error" style="width:70%; margin-left:40px;">';
                         echo $_SESSION['passwordErr'];
                         unset($_SESSION['passwordErr']);
                         echo '</p>';
                     }
        ?>

                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" name="save"
                                    class="btn btn-success btn-sm float-right submit_btn"><i
                                        class="fas fa-arrow-alt-circle-right"></i> Submit</button>
                            </div>
                        </form>

                    </div>

                </div>
            </div>
        </div>
</body>

</html>