<?php
require_once("includes/config.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Orders Details</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="OneTech shop project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
    <link href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
    <link rel="stylesheet" type="text/css" href="plugins/jquery-ui-1.12.1.custom/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="styles/shop_styles.css">
    <link rel="stylesheet" type="text/css" href="styles/shop_responsive.css">
    <style>
        #successmsg {
            color: white;
            background-color: green;
            padding: 6px;
            margin: 2px;
            text-align: center;
            margin-left: 160px !important;
            width: 30%;
            align-items: center;
            display: none;
            position: fixed;
            top: 40%;
            left: 40%;
            z-index: 333;
        }

        #errormsg {
            display: block;
            position: fixed;
            top: 40%;
            left: 30%;
            z-index: 333;
            color: white;
            background-color: red;
            padding: 6px;
            margin-left: 160 !important;
            margin: 2px;
            text-align: center;
            align-items: center;
            width: 40%;
            display: none;
        }
    </style>

</head>

<body>

    <div class="super_container">

        <!-- Header -->
        <div id="successmsg"></div>
        <div id="errormsg"></div>
        <?php
        include_once("includes/header.php");
        ?>
        <div class="sl-mainpanel">
            <div class="sl-pagebody">
                <div class="card pd-20 pd-sm-40">
                    <h3 class="card-body-title text-center p-2 mt-4">
                        Order Details
                    </h3>
                    <?php
                    $id = $_GET['orderid'];
                    $sql = "SELECT users.*,shipping.*,orders.* FROM ((users INNER JOIN shipping ON users.u_id=shipping.u_id) INNER JOIN orders ON users.u_id=orders.u_id) WHERE orders.id='$id'";
                    $res = mysqli_query($connection, $sql);
                    foreach ($res as $row) {
                    ?>
                        <div class="container mt-5">

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
                </div>
                <div class="container mt-5 mb-5">
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




                                        <!-- 
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
                                        <?php } ?> -->










                                    </div><!-- table-wrapper -->
                                    <!-- //product details end -->
                                </div><!-- card -->
                            </div><!-- col-6 -->


                        </div><!-- card -->
                    </div><!-- col-6 -->
                </div>
            </div><!-- row -->
        </div><!-- card -->
    <?php } ?>



    </div>
    </div>



    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->


    <?php
    include_once("includes/footer.php");

    ?>
    </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="styles/bootstrap4/popper.js"></script>
    <script src="styles/bootstrap4/bootstrap.min.js"></script>
    <script src="plugins/greensock/TweenMax.min.js"></script>
    <script src="plugins/greensock/TimelineMax.min.js"></script>
    <script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
    <script src="plugins/greensock/animation.gsap.min.js"></script>
    <script src="plugins/greensock/ScrollToPlugin.min.js"></script>
    <script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
    <script src="plugins/slick-1.8.0/slick.js"></script>
    <script src="plugins/easing/easing.js"></script>
    <script src="js/custom.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>



    <script>
        $(document).ready(function() {
            $(".addcart").on('click', function() {
                var id = $(this).data('id');
                $.ajax({
                    url: 'cart_controller.php?action=add',
                    type: 'POST',
                    data: {
                        id: id,
                    },
                    success: function(data) {
                        if (data == 0) {
                            $("#errormsg").html("Login Please").slideDown(
                                1000);
                            setTimeout(() => {
                                $("#errormsg").slideUp();
                            }, 2000);
                        } else if (data == 2) {
                            $("#successmsg").html("Successfully aaded Again").slideDown(
                                1000);
                            setTimeout(() => {
                                $("#successmsg").slideUp();
                            }, 2000);
                        } else {

                            let carts = data;
                            $("#mycart").html(carts);

                            console.log(carts);
                            $("#successmsg").html("Successfully aaded").slideDown(
                                1000);
                            setTimeout(() => {
                                $("#successmsg").slideUp();
                            }, 2000);
                        }
                    }
                });

            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $(".addwishlist").on('click', function() {
                var id = $(this).data('id');
                console.log(id);
                $.ajax({
                    url: 'wishlist_controller.php?action=add',
                    type: 'POST',
                    data: {
                        id: id,
                    },
                    success: function(data) {
                        if (data == 0) {
                            $("#errormsg").html("First you  Login").slideDown(
                                1000);
                            setTimeout(() => {
                                $("#errormsg").slideUp();
                            }, 2000);
                        } else if (data == 22) {
                            $("#errormsg").html("Already Added in wishlist").slideDown(
                                1000);
                            setTimeout(() => {
                                $("#errormsg").slideUp();
                            }, 2000);
                        } else {
                            let lists = data;
                            $("#mywishlist").html(lists);
                            $("#successmsg").html("Successfully added").slideDown(
                                1000);
                            setTimeout(() => {
                                $("#successmsg").slideUp();
                            }, 2000);
                        }
                    }
                });

            });
        });
    </script>

</body>

</html>