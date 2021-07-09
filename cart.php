<?php
require_once("admin/includes/db_connect.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Cart</title>
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
                            <div class="cart_title">Shopping Cart</div>
                            <div class="cart_items">
                                <ul class="cart_list">

                                    <?php
                                    global $connection;
                                    $u_id = $_SESSION['u_id'];
                                    $total = 0;
                                    $query = "SELECT users.u_id,products.*,carts.* FROM ((carts inner join `users` on carts.u_id=users.u_id) inner join products on products.p_id=carts.p_id) WHERE users.u_id='$u_id'";
                                    $result = mysqli_query($connection, $query);
                                    $count = 0;
                                    foreach ($result as $row) {
                                        $total = $total + $row['no_of_products'] * $row['selling_price']; ?>
                                        <li class="cart_item clearfix" id="item<?php echo $row['p_id']; ?>">
                                            <div class="cart_item_image text-center"><br><img src="{{ asset($row->options->image) }} " style="width: 70px; width: 70px;" alt=""></div>
                                            <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
                                                <div class="cart_item_name cart_info_col">
                                                    <div class="cart_item_title">Name</div>
                                                    <div class="cart_item_text"><?php echo $row['pro_name'] ?></div>
                                                </div>

                                                <div class="cart_item_color cart_info_col">
                                                    <div class="cart_item_title">Color</div>
                                                    <div class="cart_item_text"><?php echo $row['pro_color'] ?></div>
                                                </div>
                                                <div class="cart_item_color cart_info_col">
                                                    <div class="cart_item_title">Size</div>
                                                    <div class="cart_item_text"><?php echo $row['pro_size'] ?></div>
                                                </div>


                                                <div class="cart_item_quantity cart_info_col">
                                                    <div class="cart_item_title">Quantity</div><br>

                                                    <form action="">
                                                        <input type="hidden" class="pro_id" value="<?php echo $row['cart_id'] ?>">
                                                        <input min="1" type="number" class="qty" data-no='<?php echo $count; ?>' data-cart='<?php echo $row['cart_id']; ?>' data-price='<?php echo $row['selling_price']; ?>' value="<?php echo $row['no_of_products'] ?>" style="width: 50px;">
                                                    </form>
                                                </div>



                                                <div class="cart_item_price cart_info_col">
                                                    <div class="cart_item_title">Price</div>
                                                    <div class="cart_item_text" class="price">
                                                        $<?php echo $row['selling_price'] ?></div>
                                                </div>
                                                <div class="cart_item_total cart_info_col">
                                                    <div class="cart_item_title">Total</div>
                                                    <div class="cart_item_text" id="totalPrice<?php echo $count; ?>" data-totalprice='<?php echo $row['selling_price'] * $row['no_of_products'] ?>' ; class="totalprice">
                                                        $<?php echo $row['selling_price'] * $row['no_of_products'] ?></div>
                                                </div>

                                                <div class="cart_item_total cart_info_col">
                                                    <div class="cart_item_title">Action</div><br>
                                                    <span class="removeItem btn btn-sm btn-danger" data-no='<?php echo $count; ?>' data-totalcost='<?php echo $row['selling_price'] * $row['no_of_products'] ?>' data-quantity='<?php echo $row['no_of_products'] ?>' data-id="<?php echo $row['p_id']; ?>">x</span>
                                                </div>



                                            </div>
                                        </li>
                                    <?php
                                        $count++;
                                    } ?>
                                </ul>
                            </div>
                            <input type="hidden" id="count" value="<?php echo $count; ?>">
                            <!-- Order Total -->
                            <div class="order_total">
                                <div class="order_total_content text-md-right">
                                    <div class="order_total_title">Order Total:</div>
                                    <div id='orderTotal' class="ordertotal order_total_amount" class="total">
                                        $<?php echo $total ?>
                                        <input type="hidden" id="orderCost" value="<?php echo $total ?>">

                                    </div>
                                </div>
                            </div>


                            <div class="cart_buttons">
                                <button type="button" class="button cart_button_clear">All Cancel</button>
                                <a href="checkout.php" class="button cart_button_checkout">Checkout</a>
                            </div>
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