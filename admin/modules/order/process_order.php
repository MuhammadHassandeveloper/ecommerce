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

    <!-- Tags Input CDN CSS -->
    <link href="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.css" rel="stylesheet" />

    <!-- chart -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">

    <!-- Datatable css -->
    <link href="../../adminMenu/lib/highlightjs/github.css" rel="stylesheet">
    <link href="../../adminMenu/lib/datatables/jquery.dataTables.css" rel="stylesheet">
    <link href="../../adminMenu/lib/select2/css/select2.min.css" rel="stylesheet">

    <!-- Starlight CSS -->
    <link rel="stylesheet" href="../../adminMenu/css/starlight.css">
    <link href="../../adminMenu/lib/summernote/summernote-bs4.css" rel="stylesheet">
</head>

<body>

    <!-- ########## START: LEFT PANEL ########## -->
    <div class="sl-logo"><a href="index.php"><i class="icon ion-android-star-outline"></i> starlight</a></div>
    < <?php
        include_once("../../includes/sidebar.php")

        ?> <!-- sl-sideleft -->
        <!-- ########## END: LEFT PANEL ########## -->
        <!--------------------------------------------------- Header -->
        <!-- ########## START: HEAD PANEL ########## -->
        <!-- ########## START: HEAD PANEL ########## -->
        <?php
        include_once("../../includes/header.php")

        ?>
        <!-- ########## END: HEAD PANEL ########## -->

        <div class="sl-mainpanel">

            <div class="sl-pagebody">
                <div class="sl-page-title">
                    <h5>Product Table</h5>
                </div><!-- sl-page-title -->

                <div class="card pd-20 pd-sm-40">
                    <h6 class="card-body-title">Product List
                        <!----------------------- success msg ---------------------------->
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
                        <!------------------- error message----- -->
                        <?php
                        if (isset($_SESSION['errormsg'])) {
                        ?>
                            <div class="alert alert-danger" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <div class="d-flex align-items-center justify-content-start">
                                    <i class="icon ion-ios-close alert-icon tx-24"></i>
                                    <strong>Error!</strong> <?php echo $_SESSION['errormsg']; ?>
                                </div><!-- d-flex -->
                            </div><!-- alert -->
                </div><!-- card -->



            <?php
                            unset($_SESSION['errormsg']);
                        }
            ?>

            </h6>

            <div class="table-wrapper">
                <table id="datatable1" class="table display responsive nowrap">
                    <thead>
                        <th class="wd-15p">payment_type</th>
                        <th class="wd-15p">payment_id</th>
                        <th class="wd-15p">Total</th>
                        <th class="wd-15p">Date</th>
                        <th class="wd-15p">Status</th>
                        <th class="wd-20p">Action</th>

                    </thead>
                    <tbody>
                        <style>
                            .status-td span {
                                padding: 5px;
                            }
                        </style>
                        <?php
                        $sql = "SELECT users.*,shipping.*,orders.* FROM ((users INNER JOIN shipping ON users.u_id=shipping.u_id) INNER JOIN orders ON users.u_id=orders.u_id) WHERE order_status=2 ";
                        $result = mysqli_query($connection, $sql);
                        foreach ($result as $row) { ?>
                            <td><?php echo $row['payment_type'] ?></td>
                            <td><?php echo $row['payment_id'] ?></td>
                            <td><?php echo $row['paying_amount'] ?></td>
                            <td><?php echo $row['order_time'] ?></td>
                            <td>
                                <?php if ($row['order_status'] == 0) {  ?>
                                    <span style='color:white; background:red;padding:5px;'> Pending </span>
                                <?php      } elseif ($row['order_status'] == 1) { ?>
                                    <span style='color:white; background:green;padding:5px;'> Payment Accept </span>
                                <?php } elseif ($row['order_status'] == 2) { ?>
                                    <span style='color:white; background:green;padding:5px;'> Progress </span>
                                <?php } elseif ($row['order_status'] == 3) { ?>
                                    <span style='color:white; background:green;padding:5px;'> Delieverd </span>
                                <?php } else { ?>
                                    <span style='color:white; background:green;padding:5px;'> Cancel </span>
                                <?php   }
                                ?>
                            </td>


                            <style>
                                .actions {
                                    display: flex;
                                }

                                .actions a {
                                    margin: 0 5px;
                                }
                            </style>
                            <td class='actions'>
                                <a href="order_details.php?orderid=<?php echo $row['id'] ?> " class="btn btn-sm btn-info" title="edit"><i class="fa fa-eye"></i></a>
                            </td>
                            </tr>

                    </tbody>
                <?php } ?>

                </table>


            </div><!-- table-wrapper -->
            </div><!-- card -->





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
        <script src="../../adminMenu/lib/jquery/jquery.js"></script>
        <script src="../../adminMenu/lib/popper.js/popper.js"></script>
        <script src="../../adminMenu/lib/bootstrap/bootstrap.js"></script>
        <script src="../../adminMenu/lib/jquery-ui/jquery-ui.js"></script>
        <script src="../../adminMenu/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>


        <script src="../../adminMenu/lib/highlightjs/highlight.pack.js"></script>
        <script src="../../adminMenu/lib/datatables/jquery.dataTables.js"></script>
        <script src="../../adminMenu/lib/datatables-responsive/dataTables.responsive.js"></script>
        <script src="../../adminMenu/lib/select2/js/select2.min.js"></script>

        <script>
            // $(function() {
            //     'use strict';

            //     $('#datatable1').DataTable({
            //         responsive: true,
            //         language: {
            //             searchPlaceholder: 'Search...',
            //             sSearch: '',
            //             lengthMenu: '_MENU_ items/page',
            //         }
            //     });

            //     $('#datatable2').DataTable({
            //         bLengthChange: false,
            //         searching: false,
            //         responsive: true
            //     });

            //     // Select2
            //     $('.dataTables_length select').select2({
            //         minimumResultsForSearch: Infinity
            //     });

            // });
            // 
        </script>



        <script src="../../adminMenu/lib/jquery.sparkline.bower/jquery.sparkline.min.js"></script>
        <script src="../../adminMenu/lib/d3/d3.js"></script>
        <script src="../../adminMenu/lib/rickshaw/rickshaw.min.js"></script>
        <script src="../../adminMenu/lib/chart.js/Chart.js"></script>
        <script src="../../adminMenu/lib/Flot/jquery.flot.js"></script>
        <script src="../../adminMenu/lib/Flot/jquery.flot.pie.js"></script>
        <script src="../../adminMenu/lib/Flot/jquery.flot.resize.js"></script>
        <script src="../../adminMenu/lib/flot-spline/jquery.flot.spli"></script>


        <script src="../../adminMenu/lib/medium-editor/medium-editor.js"></script>
        <script src="../../adminMenu/lib/summernote/summernote-bs4.min.js"></script>

        <script>
            $(function() {
                'use strict';

                // Inline editor
                var editor = new MediumEditor('.editable');

                // Summernote editor
                $('#summernote').summernote({
                    height: 150,
                    tooltip: false
                })
            });
        </script>

        <script>
            $(function() {
                'use strict';

                // Inline editor
                var editor = new MediumEditor('.editable');

                // Summernote editor
                $('#summernote1').summernote({
                    height: 150,
                    tooltip: false
                })
            });
        </script>


        <script src="../../adminMenu/js/starlight.js"></script>
        <script src="../../adminMenu/js/ResizeSensor.js"></script>
        <script src="../../adminMenu/js/dashboard.js"></script>

        <script>
            $(".status").click(function() {
                const myEl = $(this);
                const id = $(this).data('id');
                const status = $(this).attr('data-status');
                $.post("product_controller.php?action=status", {
                    id,
                    status
                }, function(data) {
                    if (status == "0") {
                        $("#activeMsg").html("successfully deactivated.");
                        myEl.attr('data-status', '1');
                        myEl.find('i').removeClass("fa-thumbs-down");
                        myEl.find('i').addClass("fa-thumbs-up");
                        $("#status" + id).html('<span style="background:red;">inactive</span>');
                    } else {

                        $("#activeMsg").html("successfully activated.");
                        myEl.find('i').removeClass("fa-thumbs-up");
                        myEl.find('i').addClass("fa-thumbs-down");
                        myEl.attr('data-status', '0');
                        $("#status" + id).html('<span style="background:green;">active</span>');
                    }
                    $("#ativeMsgDiv").removeClass('d-none');
                });
            });
        </script>

</body>

</html>