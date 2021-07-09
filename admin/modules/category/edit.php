<?php
require_once("../../includes/db_connect.php");
session_start();
if (!isset($_SESSION['admin_id'])) {
    header("Location:../../login.php");
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

    <title>Starlight Responsive Bootstrap 4 Admin Template</title>

    <!-- vendor css -->
    <link href="../../adminMenu/lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="../../adminMenu/lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="../../adminMenu/lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
    <link href="../../adminMenu/lib/rickshaw/rickshaw.min.css" rel="stylesheet">

    <!-- Starlight CSS -->

    <link rel="stylesheet" href="../../adminMenu/css/starlight.css">
</head>

<body>

    <!-- ########## START: LEFT PANEL ########## -->
    <div class="sl-logo"><a href="index.php"><i class="icon ion-android-star-outline"></i> starlight</a></div>
    <?php
include_once("../../includes/sidebar.php")

?>
    <!-- sl-sideleft -->
    <!-- ########## END: LEFT PANEL ########## -->
    <!--------------------------------------------------- Header -->
    <!-- ########## START: HEAD PANEL ########## -->
    <?php
include_once("../../includes/header.php")

?>
    <!-- ########## END: HEAD PANEL ########## -->

    <div class="sl-mainpanel">


        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Category Update</h5>

            </div><!-- sl-page-title -->

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Category Update

                </h6>

                <?php
                $id=$_GET['id'];
$sql="SELECT * FROM categories where cat_id='$id'";
$result=mysqli_query($connection, $sql);
    foreach ($result as $row) {?>
                <div class="table-wrapper">
                    <form method="post" action="category_controller.php?action=edit">
                        <div class="modal-body pd-20">

                            <div class="form-group">
                                <input type="hidden" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" value="<?php echo $row['cat_id']?>" name="cat_id">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Category Name</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" value="<?php echo $row['cat_name']?>" name="cat_name">
                            </div>

                        </div><!-- modal-body -->
                        <div class="modal-footer">
                            <button type="submit" name="save" class="btn btn-info pd-x-20">Update</button>

                        </div>
                    </form>


                </div><!-- table-wrapper -->

                <?php }?>
            </div><!-- card -->




        </div><!-- sl-mainpanel -->



        <footer class="sl-footer">
            <div class="footer-left">
                <div class="mg-b-2">Copyright &copy; 2017. Starlight. All Rights Reserved.</div>
                <div>Made by ThemePixels.</div>
            </div>
            <div class="footer-right d-flex align-items-center">
                <span class="tx-uppercase mg-r-10">Share:</span>
                <a target="_blank" class="pd-x-5"
                    href="https://www.facebook.com/sharer/sharer.php?u=http%3A//themepixels.me/starlight"><i
                        class="fa fa-facebook tx-20"></i></a>
                <a target="_blank" class="pd-x-5"
                    href="https://twitter.com/home?status=Starlight,%20your%20best%20choice%20for%20premium%20quality%20admin%20template%20from%20Bootstrap.%20Get%20it%20now%20at%20http%3A//themepixels.me/starlight"><i
                        class="fa fa-twitter tx-20"></i></a>
            </div>
        </footer>
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
    <script src="../../adminMenu/lib/jquery/jquery.js"></script>
    <script src="../../adminMenu/lib/popper.js/popper.js"></script>
    <script src="../../adminMenu/lib/bootstrap/bootstrap.js"></script>
    <script src="../../adminMenu/lib/jquery-ui/jquery-ui.js"></script>
    <script src="../../adminMenu/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
    <script src="../../adminMenu/lib/jquery.sparkline.bower/jquery.sparkline.min.js"></script>
    <script src="../../adminMenu/lib/d3/d3.js"></script>
    <script src="../../adminMenu/lib/rickshaw/rickshaw.min.js"></script>
    <script src="../../adminMenu/lib/chart.js/Chart.js"></script>
    <script src="../../adminMenu/lib/Flot/jquery.flot.js"></script>
    <script src="../../adminMenu/lib/Flot/jquery.flot.pie.js"></script>
    <script src="../../adminMenu/lib/Flot/jquery.flot.resize.js"></script>
    <script src="../../adminMenu/lib/flot-spline/jquery.flot.spline.js"></script>

    <script src="../../adminMenu/js/starlight.js"></script>
    <script src="../../adminMenu/js/ResizeSensor.js"></script>
    <script src="../../adminMenu/js/dashboard.js"></script>
    <script src="../../adminMenu/js/starlight.js"></script>
    <script>
    $(function() {
        'use strict';

        $('#datatable1').DataTable({
            responsive: true,
            language: {
                searchPlaceholder: 'Search...',
                sSearch: '',
                lengthMenu: '_MENU_ items/page',
            }
        });

        $('#datatable2').DataTable({
            bLengthChange: false,
            searching: false,
            responsive: true
        });

        // Select2
        $('.dataTables_length select').select2({
            minimumResultsForSearch: Infinity
        });

    });
    </script>
</body>

</html>