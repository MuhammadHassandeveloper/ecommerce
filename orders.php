<?php
require_once("admin/includes/db_connect.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Orders</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="OneTech shop project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
    <link href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="styles/cart_styles.css">
    <link rel="stylesheet" type="text/css" href="styles/cart_responsive.css">
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
    </style>
</head>

<body>
    <div id="successmsg"></div>
    <div id="errormsg"></div>
    <?php
    include_once("includes/header.php");
    ?>
    <div class="super_container">

        <!-- Header -->

        <!-- Cart -->
        <div class="cart_section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="cart_container">
                            <div class="cart_title">Orders </div>
                            <table class="table table-response">
                                <thead>
                                    <tr>
                                        <th scope="col">Payment Type</th>
                                        <th scope="col">Payment Id</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    global $connection;
                                    $u_id = $_SESSION['u_id'];

                                    $query = "SELECT * FROM orders WHERE u_id='$u_id'";
                                    $result = mysqli_query($connection, $query);
                                    $count = 0;
                                    foreach ($result as $row) { ?>
                                        <tr>
                                            <td scope="col"><?php echo $row['payment_type'] ?></td>
                                            <td scope="col"><?php echo $row['payment_id'] ?></td>
                                            <td scope="col"><?php echo $row['paying_amount'] ?>$</td>
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
                                            <td scope="col"><?php echo $row['order_time'] ?></td>
                                            <td scope="col"> <a href="u_order_details.php?orderid=<?php echo $row['id'] ?>" class="btn btn-md btn-info">View</a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Footer -->

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
    <script src="plugins/easing/easing.js"></script>
    <script src="js/cart_custom.js"></script>


    <script>
        const count = $("#count").val();
        console.log(count);
        let cart_item_prices = [];
        for (let i = 0; i < count; i++) {
            console.log($("#totalPrice" + i).data('totalprice'));
            cart_item_prices.push($("#totalPrice" + i).data('totalprice'));
        }

        // console.log(cart_item_prices);
        // $(".removeItem").click(function() {
        //     const id = $(this).data('id');
        //     const dataNo = parseInt($(this).data('no'));
        //     cart_item_prices.splice(dataNo, 1);


        //     const totalCost = cart_item_prices.length ? cart_item_prices.reduce(function(cur, prev) {
        //         return cur + prev;
        //     }) : 0;
        //     $('#item' + id).remove();
        //     $("#orderTotal").html('$' + totalCost);
        //     // console.log(cart_item_prices);
        // });
        $(".qty").change(function() {
            const p_id = $(this).siblings(".pro_id").val();
            const quty = $(this).val();
            const dataNo = parseInt($(this).data('no'));
            const price = $(this).data('price') * quty;
            const tprice = $("#totalPrice" + dataNo);
            $.ajax({
                url: 'cart_controller.php?action=edit',
                type: 'POST',
                data: {
                    id: p_id,
                    quty: quty,
                },
                success: function(data) {
                    cart_item_prices[dataNo] = parseInt(price);
                    const totalCost = cart_item_prices.reduce(function(cur, prev) {
                        return cur + prev;
                    });
                    tprice.html('$' + price);
                    // console.log(cart_item_prices);
                    $("#orderTotal").html('$' + totalCost);
                }
            });
        });
    </script>
</body>

</html>