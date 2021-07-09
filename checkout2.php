<?php
require_once("admin/includes/db_connect.php");
require_once("includes/config.php");
require_once("payment/jazz.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Checkout</title>
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
    <?php
    if (isset($_POST['submit'])) {
        if ($_POST['name'] == "" && $_POST['number'] == "" && $_POST['city'] == "") {
            echo "<h4 style='color:red;margin-left:850px;'> All Fields Are Required</h4>";
        } else {
            global $connection;
            $u_id = $_SESSION['u_id'];
            $name = $_POST['name'];
            $number = $_POST['number'];
            $city = $_POST['city'];
            $address = $_POST['address'];
            $sql = "INSERT INTO shipping(u_id,name,number,city,address) VALUES('$u_id','$name','$number','$city','$address')";
            $data = mysqli_query($connection, $sql);
            if ($data) {
                $_SESSION['successmsg'] = "Successfully Added";
            }
        }
    }


    if (isset($_POST['edit'])) {
        global $connection;
        $u_id = $_SESSION['u_id'];
        $name = $_POST['name'];
        $number = $_POST['number'];
        $city = $_POST['city'];
        $address = $_POST['address'];
        $sql = "UPDATE shipping SET name='$name',number='$number',city='$city',address='$address' where u_id='$u_id'";
        $data = mysqli_query($connection, $sql);
        if ($data) {
            $_SESSION['successmsg'] = "Successfully added";
        }
    }
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
                                            <div class="cart_title">Shipping Cart</div>
                                            <div class="cart_items">
                                                <ul class="cart_list">

                                                    <?php
                                                    $cart_items = array();
                                                    global $connection;
                                                    $u_id = $_SESSION['u_id'];
                                                    $total = 0;
                                                    $query = "SELECT users.u_id,products.*,carts.* FROM ((carts inner join `users` on carts.u_id=users.u_id) inner join products on products.p_id=carts.p_id) WHERE users.u_id='$u_id'";
                                                    $result = mysqli_query($connection, $query);
                                                    $count = 0;
                                                    foreach ($result as $row) {
                                                        $total = $total + $row['no_of_products'] * $row['selling_price']; ?>
                                                        <li class="cart_item clearfix" id="item<?php echo $row['p_id']; ?>">
                                                            <div class="cart_item_image text-center"><br><img src="admin/media/products/<?php echo $row['image']  ?>" style="width: 70px; width: 70px;" alt=""></div>
                                                            <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
                                                                <div class="cart_item_name cart_info_col">
                                                                    <div class="cart_item_title">Name</div>
                                                                    <div class="cart_item_text mr-2">
                                                                        <?php echo $row['pro_name'] ?>
                                                                    </div>
                                                                </div>


                                                                <div class="cart_item_color cart_info_col">
                                                                    <div class="cart_item_title">Color</div>
                                                                    <div class="cart_item_text">
                                                                        <?php echo $row['pro_color'] ?>
                                                                    </div>
                                                                </div>
                                                                <div class="cart_item_color cart_info_col">
                                                                    <div class="cart_item_title ml-3">Size</div>
                                                                    <div class="cart_item_text ml-2">
                                                                        <?php echo $row['pro_size'] ?>
                                                                    </div>
                                                                </div>


                                                                <div class="cart_item_quantity cart_info_col">
                                                                    <div class="cart_item_title">Quantity</div><br>

                                                                    <form action="" class="mt-2 ml-2 center">
                                                                        <input type="hidden" class="pro_id" value="<?php echo $row['cart_id'] ?>">
                                                                        <input minlength="1" type="text" class="qty" data-no='<?php echo $count; ?>' data-cart='<?php echo $row['cart_id']; ?>' data-price='<?php echo $row['selling_price']; ?>' value="<?php echo $row['no_of_products'] ?>" style="width: 50px;">
                                                                    </form>
                                                                </div>



                                                                <div class="cart_item_price cart_info_col">
                                                                    <div class="cart_item_title">Price</div>
                                                                    <div class="cart_item_text ml-3" class="price">
                                                                        $<?php echo $row['selling_price'] ?></div>
                                                                </div>
                                                                <div class="cart_item_total cart_info_col">
                                                                    <div class="cart_item_title">Total</div>
                                                                    <div class="cart_item_text ml-3" id="totalPrice<?php echo $count; ?>" data-totalprice='<?php echo $row['selling_price'] * $row['no_of_products'] ?>' ; class="totalprice">
                                                                        $<?php echo $row['selling_price'] * $row['no_of_products'] ?>
                                                                    </div>
                                                                </div>





                                                            </div>
                                                        </li>
                                                    <?php
                                                        // array_push($cart_items,array("pro_id"=>$row['pro_id'],"pro_name"=>$row["pro_name"],"color"=>$row['pro_color'],"size"=>$row['pro_size'],"quantity"=>$row['no_of_products'],"price"=>$row['selling_price'],"total"=>$row['selling_price']* $row['no_of_products']));
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
                                                        $<?php echo $total ?>
                                                        <input type="hidden" id='total' value='<?php echo $total; ?>'>
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





                <div class="col-lg-5" style="border: 1px solid grey; padding: 20px; border-radius: 25px;">
                    <div class="contact_form_container">
                        <h3 class="contact_form_title text-center ">Shipping Address</h3>
                        <?php
                        global $connection;
                        $u_id = $_SESSION['u_id'];
                        $sql = "SELECT *  FROM shipping where u_id='$u_id'";
                        $res = mysqli_query($connection, $sql);
                        $result = mysqli_num_rows($res);
                        $name = '';
                        $phone = '';
                        $city = '';
                        $address = '';
                        if ($result > 0) {
                            $shipping = mysqli_fetch_object($res);
                            $name = $shipping->name;
                            $phone = $shipping->number;
                            $city = $shipping->city;
                            $address = $shipping->address;
                        } ?>

                        <form action="" id="contact_form" method="post" class="p-3">
                            <!-- shipping adress -->
                            <div class="form-group">
                                <label for="exampleInputEmail1">Full Name</label>
                                <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Enter Your Full Name" id='name' value='<?php echo $name; ?>' name="name">
                            </div>


                            <div class="form-group">
                                <label for="exampleInputEmail1">Contact Number</label>
                                <input type="number" class="form-control" aria-describedby="emailHelp" placeholder="Enter Your Contact" id='phone' value='<?php echo $phone; ?>' name="number">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">City Name</label>
                                <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Enter Your City " id='city' value="<?php echo $city; ?>" name="city">
                            </div>


                            <div class="form-group">
                                <label for="exampleInputEmail1">Address</label>
                                <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Enter Your Address" id='address' value="<?php echo $address; ?>" name="address">
                            </div>

                            <!-- <div class="contact_form_button text-center">
                                <button name="submit" type="submit" class="btn btn-primary btn-md w-100 p-2">ADD
                                    NOW</button>
                            </div> -->

                        </form>







                        <!-- //payment adddress -->
                        <div class="contact_form_title p-2 text-center" style="font-weight: bold;font-size:30px;">
                            Payment By
                        </div>
                        <form method="post" id='proceedCheckout'>
                            <div class="form-group">
                                <ul class="logos_list">

                                    <li><input type="radio" id="jazz" class='p-method' name="paymentMethod" value="#jazzcash" checked><img src="images/jazz.png" style="width: 100px; height: 60px;">
                                    </li>

                                    <li><input id="creditradio" type="radio" class='p-method' name="paymentMethod" value="#credit"><img src="images/credit.jpg" style="width: 100px; height: 60px;">
                                    </li>
                                    <li><input type="radio" class='p-method' name="paymentMethod" value="#oncash"><img src="images/cash.png" style="width: 100px; height: 60px;">
                                    </li>

                                </ul>

                            </div>
                            <!-- jazz cash payment -->
                            <div class='payment-type' id="jazzcash">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Phone</label>
                                    <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Enter Your Phone " id='jazzphone' name="phone">
                                </div>
                                <!-- 
                                <div class="form-group">
                                    <label for="exampleInputEmail1">CNIC</label>
                                    <input type="text" class="form-control" aria-describedby="emailHelp"
                                        placeholder="Last 6 Digits Of CNIC" id='jazzcnic' name="cnic">
                                </div> -->

                            </div>
                            <!-- end jazz cash -->

                            <!-- credit card payment -->

                            <!-- 
                            <style>
                            #credit {
                                display: none;

                            }
                            </style>


                            <div class='payment-type' id="credit">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">CARD NUMBER</label>

                                    <input type="number" class="form-control" aria-describedby="emailHelp"
                                        placeholder="ENTER CARD NUMBER " name="cardnumber">
                                </div>
                                <li class=" d-flex" style="justify-content: space-between;">
                                    <div class="form-group w-25">
                                        <label for="exampleInputEmail1">EXP MONTH</label>
                                        <br>
                                        <input type="number" class="form-control" aria-describedby="emailHelp"
                                            placeholder="EXP MONTH" name="expmonth">
                                    </div>

                                    <div class="form-group w-25">
                                        <label for="exampleInputEmail1">EXP YEAR</label>
                                        <br>
                                        <input type="number" class="form-control" aria-describedby="emailHelp"
                                            placeholder="EXP YEAR" name="expyear">
                                    </div>
                                    <div class="form-group w-25">
                                        <label for="exampleInputEmail1">CVV</label>
                                        <br>
                                        <input type="number" class="form-control" aria-describedby="emailHelp"
                                            placeholder="CVV" name="cvv">
                                    </div>
                                </li>
                            </div> -->
                            <!-- end jazz cash -->



                            <div class="contact_form_button text-center">
                                <button name="add" type="submit" class="btn btn-info w-100 p-2">Proceed</button>
                            </div>
                        </form>

                    </div>
                </div>







            </div>
        </div>
        <div class="panel"></div>
    </div>


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
        // const cartItems=JSON.parse("<?php echo $cart_items; ?>");
        // console.log("working");
        // console.log(cartItems);
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

        $(".p-method").change(function() {
            $(".payment-type").hide();
            $($(this).val()).show();
        });
        $("#proceedCheckout").submit(function(e) {
            e.preventDefault();
            formData = {
                name: $("#name").val(),
                phone: $("#phone").val(),
                city: $('#city').val(),
                address: $('#address').val(),
                total: $("#total").val(),
                jazzPhone: $("#jazzphone").val(),
                // jazzCnic:$("#jazzcnic").val()
            }

            $.post('api/jazzcash.php', formData, function(data) {
                // console.log(data);
                data = JSON.parse(data);
                alert(data.message);
                window.location.href = "index.php";
            });
        });
    </script>


</body>

</html>