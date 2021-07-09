<?php
require_once("admin/includes/db_connect.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Product</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="OneTech shop project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
    <link href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
    <link rel="stylesheet" type="text/css" href="styles/product_styles.css">
    <link rel="stylesheet" type="text/css" href="styles/product_responsive.css">
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
        <?php
include_once("includes/header.php");
   ?>

        <!-- Single Product -->
        <div class="single_product">
            <div id="successmsg"></div>
            <div id="errormsg"></div>
            <div class="container">
                <?php
    $p_id=$_GET['p_id'];
        global $connection;
$sql="SELECT categories.cat_name,products. * FROM categories inner join products on categories.cat_id=products.cat_id WHERE p_id='$p_id'";
$result=mysqli_query($connection, $sql);
foreach ($result as $data) {?>
                <div class="row">

                    <!-- Images -->
                    <div class="col-lg-2 order-lg-1 order-2">
                        <ul class="image_list">
                            <li data-image="admin/media/products/<?php echo$data['image']  ?>"><img
                                    src="admin/media/products/<?php echo$data['image']  ?>" alt=""></li>
                            <li data-image="admin/media/products/<?php echo$data['image']  ?>"><img
                                    src="admin/media/products/<?php echo$data['image']  ?>" alt=""></li>
                        </ul>
                    </div>

                    <!-- Selected Image -->
                    <div class="col-lg-5 order-lg-2 order-1">
                        <div class="image_selected"><img src="admin/media/products/<?php echo$data['image']  ?>" alt="">
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="col-lg-5 order-3">
                        <div class="product_description">
                            <div class="product_category"><?php echo$data['cat_name']  ?></div>
                            <div class="product_name"><?php echo$data['pro_name']  ?></div>
                            <div class="rating_r rating_r_4 product_rating"><i></i><i></i><i></i><i></i><i></i></div>
                            <div class="product_text">
                                <p><?php echo$data['pro_details']  ?></p>
                            </div>
                            <div class="order_info d-flex flex-row">
                                <form action="#">
                                    <div class="clearfix" style="z-index: 1000;">

                                        <!-- Product Quantity -->
                                        <div class="product_quantity clearfix">
                                            <span>Quantity: </span>
                                            <input id="quantity" type="text"
                                                value="<?php echo$data['pro_quantity']  ?>">
                                            <div class="quantity_buttons">
                                                <div id="quantity_inc_button" class="quantity_inc quantity_control"><i
                                                        class="fas fa-chevron-up"></i></div>
                                                <div id="quantity_dec_button" class="quantity_dec quantity_control"><i
                                                        class="fas fa-chevron-down"></i></div>
                                            </div>
                                        </div>

                                        <!-- Product Color -->
                                        <ul class="product_color">
                                            <li>
                                                <span>Color: </span>
                                                <div class="color_mark_container">
                                                </div>
                                                <div class="color ml-5"><span> <?php echo$data['pro_color']  ?></span>
                                                </div>
                                            </li>
                                        </ul>

                                    </div>

                                    <div class="product_price">$<?php echo$data['selling_price']  ?></div>
                                    <div class="button_container">
                                        <button class="button cart_button" type="button" id="addcart"
                                            data-id="<?php echo $data['p_id'];?>">Add to Cart</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>

                </div>

                <?php } ?>
            </div>
        </div>

        <!-- Recently Viewed -->

        <div class="viewed">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="viewed_title_container">
                            <h3 class="viewed_title">Recently Viewed</h3>
                            <div class="viewed_nav_container">
                                <div class="viewed_nav viewed_prev"><i class="fas fa-chevron-left"></i></div>
                                <div class="viewed_nav viewed_next"><i class="fas fa-chevron-right"></i></div>
                            </div>
                        </div>

                        <div class="viewed_slider_container">

                            <!-- Recently Viewed Slider -->

                            <div class="owl-carousel owl-theme viewed_slider">

                                <!-- Recently Viewed Item -->
                                <div class="owl-item">
                                    <div
                                        class="viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                        <div class="viewed_image"><img src="images/view_1.jpg" alt=""></div>
                                        <div class="viewed_content text-center">
                                            <div class="viewed_price">$225<span>$300</span></div>
                                            <div class="viewed_name"><a href="#">Beoplay H7</a></div>
                                        </div>
                                        <ul class="item_marks">
                                            <li class="item_mark item_discount">-25%</li>
                                            <li class="item_mark item_new">new</li>
                                        </ul>
                                    </div>
                                </div>

                                <!-- Recently Viewed Item -->
                                <div class="owl-item">
                                    <div
                                        class="viewed_item d-flex flex-column align-items-center justify-content-center text-center">
                                        <div class="viewed_image"><img src="images/view_2.jpg" alt=""></div>
                                        <div class="viewed_content text-center">
                                            <div class="viewed_price">$379</div>
                                            <div class="viewed_name"><a href="#">LUNA Smartphone</a></div>
                                        </div>
                                        <ul class="item_marks">
                                            <li class="item_mark item_discount">-25%</li>
                                            <li class="item_mark item_new">new</li>
                                        </ul>
                                    </div>
                                </div>

                                <!-- Recently Viewed Item -->
                                <div class="owl-item">
                                    <div
                                        class="viewed_item d-flex flex-column align-items-center justify-content-center text-center">
                                        <div class="viewed_image"><img src="images/view_3.jpg" alt=""></div>
                                        <div class="viewed_content text-center">
                                            <div class="viewed_price">$225</div>
                                            <div class="viewed_name"><a href="#">Samsung J730F...</a></div>
                                        </div>
                                        <ul class="item_marks">
                                            <li class="item_mark item_discount">-25%</li>
                                            <li class="item_mark item_new">new</li>
                                        </ul>
                                    </div>
                                </div>

                                <!-- Recently Viewed Item -->
                                <div class="owl-item">
                                    <div
                                        class="viewed_item is_new d-flex flex-column align-items-center justify-content-center text-center">
                                        <div class="viewed_image"><img src="images/view_4.jpg" alt=""></div>
                                        <div class="viewed_content text-center">
                                            <div class="viewed_price">$379</div>
                                            <div class="viewed_name"><a href="#">Huawei MediaPad...</a></div>
                                        </div>
                                        <ul class="item_marks">
                                            <li class="item_mark item_discount">-25%</li>
                                            <li class="item_mark item_new">new</li>
                                        </ul>
                                    </div>
                                </div>

                                <!-- Recently Viewed Item -->
                                <div class="owl-item">
                                    <div
                                        class="viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                        <div class="viewed_image"><img src="images/view_5.jpg" alt=""></div>
                                        <div class="viewed_content text-center">
                                            <div class="viewed_price">$225<span>$300</span></div>
                                            <div class="viewed_name"><a href="#">Sony PS4 Slim</a></div>
                                        </div>
                                        <ul class="item_marks">
                                            <li class="item_mark item_discount">-25%</li>
                                            <li class="item_mark item_new">new</li>
                                        </ul>
                                    </div>
                                </div>

                                <!-- Recently Viewed Item -->
                                <div class="owl-item">
                                    <div
                                        class="viewed_item d-flex flex-column align-items-center justify-content-center text-center">
                                        <div class="viewed_image"><img src="images/view_6.jpg" alt=""></div>
                                        <div class="viewed_content text-center">
                                            <div class="viewed_price">$375</div>
                                            <div class="viewed_name"><a href="#">Speedlink...</a></div>
                                        </div>
                                        <ul class="item_marks">
                                            <li class="item_mark item_discount">-25%</li>
                                            <li class="item_mark item_new">new</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Brands -->

        <div class="brands">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="brands_slider_container">

                            <!-- Brands Slider -->

                            <div class="owl-carousel owl-theme brands_slider">

                                <div class="owl-item">
                                    <div class="brands_item d-flex flex-column justify-content-center"><img
                                            src="images/brands_1.jpg" alt=""></div>
                                </div>
                                <div class="owl-item">
                                    <div class="brands_item d-flex flex-column justify-content-center"><img
                                            src="images/brands_2.jpg" alt=""></div>
                                </div>
                                <div class="owl-item">
                                    <div class="brands_item d-flex flex-column justify-content-center"><img
                                            src="images/brands_3.jpg" alt=""></div>
                                </div>
                                <div class="owl-item">
                                    <div class="brands_item d-flex flex-column justify-content-center"><img
                                            src="images/brands_4.jpg" alt=""></div>
                                </div>
                                <div class="owl-item">
                                    <div class="brands_item d-flex flex-column justify-content-center"><img
                                            src="images/brands_5.jpg" alt=""></div>
                                </div>
                                <div class="owl-item">
                                    <div class="brands_item d-flex flex-column justify-content-center"><img
                                            src="images/brands_6.jpg" alt=""></div>
                                </div>
                                <div class="owl-item">
                                    <div class="brands_item d-flex flex-column justify-content-center"><img
                                            src="images/brands_7.jpg" alt=""></div>
                                </div>
                                <div class="owl-item">
                                    <div class="brands_item d-flex flex-column justify-content-center"><img
                                            src="images/brands_8.jpg" alt=""></div>
                                </div>

                            </div>

                            <!-- Brands Slider Navigation -->
                            <div class="brands_nav brands_prev"><i class="fas fa-chevron-left"></i></div>
                            <div class="brands_nav brands_next"><i class="fas fa-chevron-right"></i></div>

                        </div>
                    </div>
                </div>
            </div>
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
    <script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
    <script src="plugins/easing/easing.js"></script>
    <script src="js/product_custom.js"></script>


    <script>
    $(document).ready(function() {
        $("#addcart").on('click', function() {
            var id = $(this).data('id');
            $.ajax({
                url: 'cart_controller.php?action=add',
                type: 'POST',
                data: {
                    id: id,
                },
                success: function(data) {
                    if (data == 1) {
                        $("#successmsg").html("Successfully aaded").slideDown(
                            1000);
                        setTimeout(() => {
                            $("#successmsg").slideUp();
                        }, 2000);
                    } else if (data == 0) {
                        $("#errormsg").html("First you  Login").slideDown(
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
                    }
                }
            });

        });
    });
    </script>


</body>

</html>