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
    <!-- ########## START: HEAD PANEL ########## -->
    <?php
include_once("../../includes/header.php")

?>
    <!-- ########## END: HEAD PANEL ########## -->

    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="index.html">Starlight</a>
            <span class="breadcrumb-item active">Product Section</span>
        </nav>
        <?php
$id=$_GET['id'];
$sql="SELECT categories.cat_name,sub_categories.sub_name,brands.b_name,products.* FROM (((categories inner join products on categories.cat_id=products.cat_id) inner join sub_categories on products.sub_id=sub_categories.sub_id) inner join brands on products.b_id=brands.b_id)
    where p_id='$id' ";
$result=mysqli_query($connection, $sql);
foreach ($result as $row) {
    ?>
        <div class="sl-pagebody">


            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Product Details Page </h6>

                <div class="form-layout">
                    <div class="row mg-b-25">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Product Name: <span
                                        class="tx-danger">*</span></label><br>
                                <strong style="color:green;"><?php echo$row['pro_name']      ?></strong>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Product Code: <span
                                        class="tx-danger">*</span></label><br>
                                <strong style="color:green;"><?php echo$row['pro_code']      ?></strong>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Quantity: <span class="tx-danger">*</span></label><br>
                                <strong style="color:green;"><?php echo$row['pro_quantity']      ?></strong>

                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Category: <span class="tx-danger">*</span></label><br>
                                <strong style="color:green;"><?php echo$row['cat_name']      ?></strong>
                            </div>
                        </div><!-- col-4 -->


                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Sub Category: <span
                                        class="tx-danger">*</span></label><br>
                                <strong style="color:green;"><?php echo$row['sub_name']      ?></strong>

                            </div>
                        </div><!-- col-4 -->



                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Brand: <span class="tx-danger">*</span></label>
                                <br>
                                <strong style="color:green;"><?php echo$row['b_name']      ?></strong>
                            </div>
                        </div><!-- col-4 -->


                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Product Size: <span class="tx-danger">*</span></label>
                                <br>
                                <strong style="color:green;"><?php echo$row['pro_size']      ?></strong>
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Product Color: <span
                                        class="tx-danger">*</span></label>
                                <br>
                                <strong style="color:green;"><?php echo$row['pro_color']      ?></strong>

                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Selling Price: <span
                                        class="tx-danger">*</span></label>
                                <br>
                                <strong style="color:green;"><?php echo$row['selling_price']      ?></strong>

                            </div>
                        </div><!-- col-4 -->


                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label">Product Details: <span
                                        class="tx-danger">*</span></label>
                                <br>
                                <p style="color:green;"><?php echo$row['pro_details'] ?>
                                </p>

                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label">Video Link: <span class="tx-danger">*</span></label>
                                <br>
                                <strong style="color:green;"><?php echo$row['video_link']      ?></strong>
                            </div>
                        </div><!-- col-4 -->



                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Image <span class="tx-danger">*</span></label><br>
                                <label class="custom-file">

                                    <img src="../../media/products/<?php echo$row['image']?>"
                                        style="height: 80px; width: 80px;">
                                </label>

                            </div>
                        </div><!-- col-4 -->



                    </div><!-- row -->

                    <hr>
                    <br><br>

                    <div class="row ml-5">
                        <label for="" style="font-weight:bold;color:black;">Status</label>
                        <div style="margin-left:10px; color:white" class='status-td'
                            id="status<?php echo $row['p_id']; ?>" style='color:white'>
                            <?php echo $row['status']==1?'<span style="background:green">active</span>':'<span style="background:red;">inactive</span>'; ?>
                        </div>
                        <label for="" style="font-weight:bold;color:black; margin-left:100px;">Bset rated</label>
                        <div style="margin-left:10px; color:white" class='status-td'
                            id="status<?php echo $row['p_id']; ?>" style='color:white'>
                            <?php echo $row['best_rated']==1?'<span style="background:green">active</span>':'<span style="background:red;">inactive</span>'; ?>
                        </div>

                    </div><!-- end row -->




                </div><!-- form-layout -->
            </div><!-- card -->


        </div><!-- row -->
        <?php
}?>

    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->



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