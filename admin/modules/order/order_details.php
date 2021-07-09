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
        <div class="sl-pagebody">
            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">
                    Order Details
                </h6>
                <?php
                $id = $_GET['orderid'];
                $sql = "SELECT users.*,shipping.*,orders.* FROM ((users INNER JOIN shipping ON users.u_id=shipping.u_id) INNER JOIN orders ON users.u_id=orders.u_id) WHERE orders.id='$id'";
                $res = mysqli_query($connection, $sql);
                foreach ($res as $row) {
                ?>
                    <div class="card pd-20 pd-sm-40">
                        <div class="row mg-t-30">
                            <div class="col-md-6 mg-t-30 mg-md-t-0">
                                <div class="card bd-0">
                                    <div class="card-header card-header-default bg-info justify-content-between">
                                        <h6 class="mg-b-0 tx-14 tx-white tx-normal">Order Details</h6>

                                    </div><!-- card-header -->
                                    <div class="card-body bg-gray-200 text-dark">
                                        <p class="mg-b-0">
                                            <strong class="font-weight-bold">Name:</strong>
                                            <small style="font-size: 15px; margin-left:100px;"><?php echo $row['name'] ?></small>
                                        <p>
                                        <p class="mg-b-0">
                                            <strong class="font-weight-bold">Phone:</strong>
                                            <small style="font-size: 15px; margin-left:100px;"><?php echo $row['phone'] ?></small>
                                        <p>

                                        <p class="mg-b-0">
                                            <strong class="font-weight-bold">Payment Type:</strong>
                                            <small style="font-size: 15px; margin-left:100px;"><?php echo $row['payment_type'] ?></small>
                                        <p>
                                        <p class="mg-b-0">
                                            <strong class="font-weight-bold">Payment Id:</strong>
                                            <small style="font-size: 15px; margin-left:100px;"><?php echo $row['payment_id'] ?></small>
                                        <p>
                                        <p class="mg-b-0">
                                            <strong class="font-weight-bold">Total:</strong>
                                            <small style="font-size: 15px; margin-left:100px;"><?php echo $row['total'] ?></small>
                                        <p>
                                        <p class="mg-b-0">
                                            <strong class="font-weight-bold">Date:</strong>
                                            <small style="font-size: 15px; margin-left:100px;"><?php echo $row['order_time'] ?></small>
                                        <p>
                                    </div><!-- card-body -->
                                </div><!-- card -->
                            </div><!-- col-6 -->


                            <div class="col-md-6 mg-t-30 mg-md-t-0">
                                <div class="card bd-0">
                                    <div class="card-header card-header-default bg-info justify-content-between">
                                        <h6 class="mg-b-0 tx-14 tx-white tx-normal">Shippiing Details</h6>

                                    </div><!-- card-header -->
                                    <!-- //shipping details -->
                                    <div class="card-body bg-gray-200 text-dark">
                                        <p class="mg-b-0">
                                            <strong class="font-weight-bold">Name:</strong>
                                            <small style="font-size: 15px; margin-left:100px;"><?php echo $row['name'] ?></small>
                                        <p>
                                        <p class="mg-b-0">
                                            <strong class="font-weight-bold">Phone:</strong>
                                            <small style="font-size: 15px; margin-left:100px;"><?php echo $row['number'] ?></small>
                                        <p>

                                        <p class="mg-b-0">
                                            <strong class="font-weight-bold">Adress:</strong>
                                            <small style="font-size: 15px; margin-left:100px;"><?php echo $row['address'] ?></small>
                                        <p>
                                        <p class="mg-b-0">
                                            <strong class="font-weight-bold">City:</strong>
                                            <small style="font-size: 15px; margin-left:100px;"><?php echo $row['city'] ?></small>
                                        <p>
                                        <p class="mg-b-0">
                                            <strong class="font-weight-bold">Total:</strong>
                                            <small style="font-size: 15px; margin-left:100px;"><?php echo $row['total'] ?></small>
                                        <p>
                                        <p class="mg-b-0">
                                            <strong class="font-weight-bold">Date:</strong>
                                            <small style="font-size: 15px; margin-left:100px;"><?php echo $row['order_time'] ?></small>
                                        <p>
                                    </div><!-- card-body -->
                                </div>
                            </div><!-- row -->
                        </div><!-- card -->
                    </div><!-- card -->
            </div><!-- col-6 -->

            <div class="card pd-20 pd-sm-40">
                <div class="row mg-t-30">
                    <div class="col-md-12 mg-t-30 mg-md-t-0">
                        <div class="card bd-0">
                            <div class="card-header card-header-default bg-info justify-content-between">
                                <h6 class="mg-b-0 tx-14 tx-white tx-normal">Products Details</h6>
                            </div><!-- card-header -->

                            <div class="table-wrapper">
                                <table id="datatable1" class="table display responsive nowrap">
                                    <thead>
                                        <th class="wd-15p">product name</th>
                                        <th class="wd-15p">Size</th>
                                        <th class="wd-15p">Color</th>
                                        <th class="wd-15p">Quality</th>
                                        <th class="wd-15p">Total</th>
                                        <th class="wd-20p">Status</th>

                                    </thead>
                                    <tbody>
                                        <style>
                                            .status-td span {
                                                padding: 5px;
                                            }
                                        </style>
                                        <?php
                                        $id = $row['id'];
                                        $sql = "SELECT * FROM orders_details WHERE order_id='$id'";
                                        $res = mysqli_query($connection, $sql);
                                        foreach ($res as $result) { ?>
                                            <tr>
                                                <td><?php echo $result['pro_name'] ?></td>
                                                <td><?php echo $result['color'] ?></td>
                                                <td><?php echo $result['size'] ?></td>
                                                <td><?php echo $result['quantity'] ?></td>
                                                <td><?php echo $result['total'] ?></td>
                                                <td>
                                                    <?php if ($row['order_status'] == 0) {  ?>
                                                        <span style='color:white; background:red;padding:5px;'> Pending </span>
                                                    <?php      } elseif ($row['order_status'] == 1) { ?>
                                                        <span style='color:white; background:green;padding:5px;'> Payment Accept </span>
                                                    <?php } elseif ($row['order_status'] == 2) { ?>
                                                        <span style='color:white; background:green;padding:5px;'> Proczess </span>
                                                    <?php } elseif ($row['order_status'] == 3) { ?>
                                                        <span style='color:white; background:green;padding:5px;'> Delieverd </span>
                                                    <?php } else { ?>
                                                        <span style='color:white; background:red;padding:5px;'> Cancel </span>
                                                    <?php   }
                                                    ?>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>





                                <?php if ($row['order_status'] == 0) {  ?>
                                    <a class="btn btn-md btn-primary w-100 p-3" href="order_controller.php?action=acceptpayment&&id=<?php echo $row['id']; ?>">Payment Accept</a>

                                    <a class="btn btn-md btn-danger w-100 p-3 mt-2" href="order_controller.php?action=cancelorder&&id=<?php echo $row['id']; ?>">Order Cancel</a>
                                <?php      } elseif ($row['order_status'] == 1) { ?>

                                    <a class="btn btn-md btn-info w-100 p-3 mt-2" href="order_controller.php?action=deliveryprocess&&id=<?php echo $row['id']; ?>">Process Delievery </a>

                                <?php } elseif ($row['order_status'] == 2) { ?>

                                    <a class="btn btn-md btn-success w-100 p-3 mt-2" href="order_controller.php?action=delieverydone&&id=<?php echo $row['id']; ?>">Delievery Done</a>

                                <?php } elseif ($row['order_status'] == 4) { ?>
                                    <h5 class="text-success text-center mt-2">This order is not valid</h5>
                                <?php   } else { ?>
                                    <h5 class="text-success text-center mt-2">This order is suucessfully Delieverd</h5>
                                <?php } ?>










                            </div><!-- table-wrapper -->
                            <!-- //product details end -->
                        </div><!-- card -->
                    </div><!-- col-6 -->


                </div><!-- card -->
            </div><!-- col-6 -->

        </div><!-- row -->
    </div><!-- card -->
<?php } ?>



</div>
</div>
</div><!-- sl-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->



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