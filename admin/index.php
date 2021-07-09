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
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Starlight">
    <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="twitter:image" content="http://themepixels.me/starlight/img/starlight-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/starlight">
    <meta property="og:title" content="Starlight">
    <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">

    <meta property="og:image" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">

    <title>Online Shop</title>

    <!-- vendor css -->
    <link href="adminMenu/lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="adminMenu/lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="adminMenu/lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
    <link href="adminMenu/lib/rickshaw/rickshaw.min.css" rel="stylesheet">

    <!-- Starlight CSS -->

    <link rel="stylesheet" href="adminMenu/css/starlight.css">
</head>

<body>
    <!-- ########## START: LEFT PANEL ########## -->
    <div class="sl-logo"><a href="index.php"><i class="icon ion-android-star-outline"></i> Online Shop</a></div>
    <?php
    include_once("includes/sidebar.php")

    ?>
    <!-- sl-sideleft -->
    <!-- ########## END: LEFT PANEL ########## -->
    <!--------------------------------------------------- Header -->
    <!-- ########## START: HEAD PANEL ########## -->
    <?php
    include_once("includes/header.php")

    ?>
    <!-- ########## END: HEAD PANEL ########## -->


    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="index.php">Online Shop</a>
            <span class="breadcrumb-item active">Dashboard</span>
        </nav>

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
        <div class="sl-pagebody">

            <div class="row row-sm">
                <div class="col-sm-6 col-xl-3">
                    <div class="card pd-20 bg-primary">
                        <div class="d-flex justify-content-between align-items-center mg-b-10">
                            <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Total Orders</h6>
                            <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
                        </div><!-- card-header -->
                        <div class="d-flex align-items-center justify-content-between">
                            <?php

                            $sql = "SELECT id FROM orders";
                            $res = mysqli_query($connection, $sql);
                            $row = mysqli_num_rows($res);

                            ?>
                            <h3 class="mg-b-0 tx-white tx-lato tx-bold"><?php echo $row  ?></h3>
                        </div><!-- card-body -->

                    </div><!-- card -->
                </div><!-- col-3 -->
                <div class="col-sm-6 col-xl-3 mg-t-20 mg-sm-t-0">
                    <div class="card pd-20 bg-info">
                        <div class="d-flex justify-content-between align-items-center mg-b-10">
                            <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Total Delieverd Ordered</h6>
                            <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
                        </div><!-- card-header -->
                        <div class="d-flex align-items-center justify-content-between">
                            <?php

                            $sql = "SELECT id FROM orders WHERE order_status=3";
                            $res = mysqli_query($connection, $sql);
                            $row = mysqli_num_rows($res);

                            ?>
                            <h3 class="mg-b-0 tx-white tx-lato tx-bold"><?php echo $row ?></h3>
                        </div><!-- card-body -->

                    </div><!-- card -->
                </div><!-- col-3 -->
                <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
                    <div class="card pd-20 bg-purple">
                        <div class="d-flex justify-content-between align-items-center mg-b-10">
                            <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Total Customers</h6>
                            <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
                        </div><!-- card-header -->
                        <div class="d-flex align-items-center justify-content-between">
                            <?php

                            $sql = "SELECT u_id FROM users";
                            $res = mysqli_query($connection, $sql);
                            $row = mysqli_num_rows($res);

                            ?>
                            <h3 class="mg-b-0 tx-white tx-lato tx-bold"><?php echo $row ?></h3>
                        </div><!-- card-body -->

                    </div><!-- card -->
                </div><!-- col-3 -->
                <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
                    <div class="card pd-20 bg-sl-primary">
                        <div class="d-flex justify-content-between align-items-center mg-b-10">
                            <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Total Products</h6>
                            <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
                        </div><!-- card-header -->
                        <div class="d-flex align-items-center justify-content-between">
                            <?php

                            $sql = "SELECT p_id FROM products";
                            $res = mysqli_query($connection, $sql);
                            $row = mysqli_num_rows($res);

                            ?>
                            <h3 class="mg-b-0 tx-white tx-lato tx-bold"><?php echo $row  ?></h3>
                        </div><!-- card-body -->

                    </div><!-- card -->
                </div><!-- col-3 -->
            </div><!-- row -->

        </div><!-- sl-pagebody -->
        <footer class="sl-footer">
            <div class="footer-left">
                <div class="mg-b-2">Copyright &copy; 2017. Starlight. All Rights Reserved.</div>
                <div>Made by ThemePixels.</div>
            </div>
            <div class="footer-right d-flex align-items-center">
                <span class="tx-uppercase mg-r-10">Share:</span>
                <a target="_blank" class="pd-x-5" href="https://www.facebook.com/sharer/sharer.php?u=http%3A//themepixels.me/starlight"><i class="fa fa-facebook tx-20"></i></a>
                <a target="_blank" class="pd-x-5" href="https://twitter.com/home?status=Starlight,%20your%20best%20choice%20for%20premium%20quality%20admin%20template%20from%20Bootstrap.%20Get%20it%20now%20at%20http%3A//themepixels.me/starlight"><i class="fa fa-twitter tx-20"></i></a>
            </div>
        </footer>
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
    <script src="adminMenu/lib/jquery/jquery.js"></script>
    <script src="adminMenu/lib/popper.js/popper.js"></script>
    <script src="adminMenu/lib/bootstrap/bootstrap.js"></script>
    <script src="adminMenu/lib/jquery-ui/jquery-ui.js"></script>
    <script src="adminMenu/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
    <script src="adminMenu/lib/jquery.sparkline.bower/jquery.sparkline.min.js"></script>
    <script src="adminMenu/lib/d3/d3.js"></script>
    <script src="adminMenu/lib/rickshaw/rickshaw.min.js"></script>
    <script src="adminMenu/lib/chart.js/Chart.js"></script>
    <script src="adminMenu/lib/Flot/jquery.flot.js"></script>
    <script src="adminMenu/lib/Flot/jquery.flot.pie.js"></script>
    <script src="adminMenu/lib/Flot/jquery.flot.resize.js"></script>
    <script src="adminMenu/lib/flot-spline/jquery.flot.spline.js"></script>

    <script src="adminMenu/js/starlight.js"></script>
    <script src="adminMenu/js/ResizeSensor.js"></script>
    <script src="adminMenu/js/dashboard.js"></script>
</body>

</html>