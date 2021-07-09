<?php
require_once("../admin/includes/db_connect.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Checkout</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="OneTech shop project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../styles/bootstrap4/bootstrap.min.css">
    <link href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="../styles/cart_styles.css">
    <link rel="stylesheet" type="text/css" href="../styles/cart_responsive.css">
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
include_once("../includes/header.php");
   ?>
    <div class="contact_form mt-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-7" style="border: 1px solid grey;border-radius: 25px;">
                    <div class="contact_form_container">
                        <!-- Cart -->
                        <div class="cart_section">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="cart_container">
                                            <div class="cart_title m-0 p-0">Shopping Cart</div>
                                            <div class="cart_items">
                                                <ul class="cart_list m-0 p-0">

                                                    <?php
                                    global $connection;
                     $u_id=$_SESSION['u_id'];
                     $total=0;
                     $query="SELECT users.u_id,products.*,carts.* FROM ((carts inner join `users` on carts.u_id=users.u_id) inner join products on products.p_id=carts.p_id) WHERE users.u_id='$u_id'";
                     $result=mysqli_query($connection, $query);
                     $count=0;
                     foreach ($result as $row) {
                         $total=$total+$row['no_of_products']*$row['selling_price']; ?>
                                                    <li class="cart_item clearfix" id="item<?php echo$row['p_id']; ?>">
                                                        <div class="cart_item_image text-center"><br><img
                                                                src="../admin/media/products/<?php echo$row['image']  ?>"
                                                                style="width: 70px;" alt=""></div>
                                                        <div class="cart_item_info d-flex flex-md-row">
                                                            <div class="cart_item_name cart_info_col">
                                                                <div class="cart_item_title">Name</div>
                                                                <div class="cart_item_text mr-2">
                                                                    <?php echo$row['pro_name'] ?>
                                                                </div>
                                                            </div>


                                                            <div class="cart_item_color cart_info_col">
                                                                <div class="cart_item_title">Color</div>
                                                                <div class="cart_item_text">
                                                                    <?php echo$row['pro_color'] ?>
                                                                </div>
                                                            </div>
                                                            <div class="cart_item_color cart_info_col">
                                                                <div class="cart_item_title ml-3">Size</div>
                                                                <div class="cart_item_text ml-2">
                                                                    <?php echo$row['pro_size'] ?>
                                                                </div>
                                                            </div>


                                                            <div class="cart_item_quantity cart_info_col">
                                                                <div class="cart_item_title">Quantity</div><br>

                                                                <form action="" class="mt-2 ml-2">
                                                                    <input type="hidden" class="pro_id"
                                                                        value="<?php echo$row['cart_id'] ?>">
                                                                    <input minlength="1" type="text" class="qty"
                                                                        data-no='<?php echo $count; ?>'
                                                                        data-cart='<?php echo $row['cart_id']; ?>'
                                                                        data-price='<?php echo $row['selling_price']; ?>'
                                                                        value="<?php echo$row['no_of_products'] ?>"
                                                                        style="width: 50px;">
                                                                </form>
                                                            </div>



                                                            <div class="cart_item_price cart_info_col">
                                                                <div class="cart_item_title">Price</div>
                                                                <div class="cart_item_text ml-3" class="price">
                                                                    $<?php echo$row['selling_price'] ?></div>
                                                            </div>
                                                            <div class="cart_item_total cart_info_col">
                                                                <div class="cart_item_title">Total</div>
                                                                <div class="cart_item_text ml-3"
                                                                    id="totalPrice<?php echo $count; ?>"
                                                                    data-totalprice='<?php echo$row['selling_price']* $row['no_of_products'] ?>'
                                                                    ; class="totalprice">
                                                                    $<?php echo$row['selling_price']* $row['no_of_products'] ?>
                                                                </div>
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
                                                    <div id='orderTotal' class="order_total_amount" class="total">
                                                        $<?php echo $total?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5"
                    style="border: 1px solid grey; padding: 10px; border-radius: 25px;font-size:20px; ">
                    <div class="contact_form_container">
                        <h2 class="contact_form_title text-center mt-5 cart_title">Shipping Address
                        </h2>
                        <form action="payment_controller.php?action=addshipping" method="post" id="payment-form">
                            <div class="form-row">
                                <label for="card-element">
                                    Cash On Delievery </label>
                                <div id="card-element">
                                    <!-- A Stripe Element will be inserted here. -->
                                </div>

                                <!-- Used to display form errors. -->
                                <div id="card-errors" role="alert"></div>
                            </div><br>
                            <input type="hidden" name="ship_name" value="{{ $data['name'] }} ">
                            <input type="hidden" name="ship_phone" value="{{ $data['phone'] }} ">
                            <input type="hidden" name="ship_email" value="{{ $data['email'] }} ">
                            <input type="hidden" name="ship_address" value="{{ $data['address'] }} ">
                            <input type="hidden" name="ship_city" value="{{ $data['city'] }} ">
                            <input type="hidden" name="payment_type" value="{{ $data['payment'] }} ">
                            <button type="submit" class="btn btn-md btn-primary mt-2 p-3 ml-3">Pay Now</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
        <div class="panel"></div>
    </div>


    <?php
 include_once("../includes/footer.php");

?>
    </div>

    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../styles/bootstrap4/popper.js"></script>
    <script src="../styles/bootstrap4/bootstrap.min.js"></script>
    <script src="../plugins/greensock/TweenMax.min.js"></script>
    <script src="../plugins/greensock/TimelineMax.min.js"></script>
    <script src="../plugins/scrollmagic/ScrollMagic.min.js"></script>
    <script src="../plugins/greensock/animation.gsap.min.js"></script>
    <script src="../plugins/greensock/ScrollToPlugin.min.js"></script>
    <script src="../plugins/easing/easing.js"></script>
    <script src="../js/cart_custom.js"></script>


    <script>
    const count = $("#count").val();
    let cart_item_prices = [];
    for (let i = 0; i < count; i++) {
        console.log($("#totalPrice" + i).data('totalprice'));
        cart_item_prices.push($("#totalPrice" + i).data('totalprice'));
    }
    $(".removeItem").click(function() {
        console.log("I've delted the item");
        const id = $(this).data('id');
        const quantity = $(this).data('quantity');
        $.post('cart_controller.php?action=delete', {
            id,
            no_of_products: quantity,
        }, function(data) {
            $("#item" + id).remove();
        });
    });
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
                console.log(cart_item_prices);
                $("#orderTotal").html('$' + totalCost);
            }
        });
    });
    </script>
</body>

</html>