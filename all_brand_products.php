<?php
require_once("admin/includes/db_connect.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>All Products</title>
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
        <!-- Home -->

        <div class="home">
            <div class="home_background parallax-window" data-parallax="scroll"
                data-image-src="images/shop_background.jpg"></div>
            <div class="home_overlay"></div>
            <div class="home_content d-flex flex-column align-items-center justify-content-center">
                <h2 class="home_title">Brands Products </h2>
            </div>
        </div>

        <!-- Shop -->

        <div class="shop">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">

                        <!-- Shop Sidebar -->
                        <div class="shop_sidebar">
                            <div class="sidebar_section">
                                <div class="sidebar_title">Categories</div>
                                <ul class="sidebar_categories">
                                    <?php
 global $connection;
 $sql="SELECT * FROM categories";
 $data=mysqli_query($connection, $sql);
 foreach ($data as $row) { ?>
                                    <li><a
                                            href="all_cat_products.php?id=<?php echo $row['cat_id']?>"><?php echo $row['cat_name'] ?></a>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-9">

                        <!-- Shop Content -->

                        <div class="shop_content">
                            <div class="shop_bar clearfix">
                                <div class="shop_product_count"><span>186</span> products found</div>
                                <div class="shop_sorting">
                                    <span>Sort by:</span>
                                    <ul>
                                        <li>
                                            <span class="sorting_text">highest rated<i
                                                    class="fas fa-chevron-down"></span></i>
                                            <ul>
                                                <li class="shop_sorting_button"
                                                    data-isotope-option='{ "sortBy": "original-order" }'>highest rated
                                                </li>
                                                <li class="shop_sorting_button"
                                                    data-isotope-option='{ "sortBy": "name" }'>name</li>
                                                <li class="shop_sorting_button"
                                                    data-isotope-option='{ "sortBy": "price" }'>price</li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="product_grid">
                                <div class="product_grid_border"></div>

                                <?php
 global $connection;
 $id=$_GET['id'];
 $sql="SELECT * FROM products where b_id='$id'";
 $results=mysqli_query($connection, $sql);
 foreach ($results as $pro) { ?>
                                <!-- Product Item -->
                                <div class="product_item is_new">
                                    <div class="product_border"></div>
                                    <div
                                        class="product_image d-flex flex-column align-items-center justify-content-center">
                                        <a href="product.php?p_id=<?php echo$pro['p_id']?>">
                                        <img style="height:100px;width:100px;"
                                            
                                            src="admin/media/products/<?php  echo $pro['image'] ?>" alt="">
                                       </a>
                                    </div>
                                    <div class="product_content mt-3">
                                        <div class="product_price">
                                            <?php $result=$pro['discount_price'] ?>
                                            <?php if ($result=="") {
     echo '<span class="text-danger" style="font-size:20px;">$</span>';

     echo $pro['selling_price']; ?>
                                            <?php
 } else { ?>
                                            <span class="text-success">$<?php  echo $pro['selling_price'] ?></span
                                                class="text-danger"> $<?php  echo $pro['discount_price'] ?>
                                            <?php  } ?>

                                        </div>
                                        <div class="product_name" style="font-weight:bold;">
                                            <div><a href="product_details.php?id=<?php echo$pro['p_id'] ?>&&name=<?php echo$pro['pro_name']   ?>"
                                                    tabindex="0"><?php echo$pro['pro_name']   ?></a></div>
                                        </div>
                                    </div>
                                    <div class="product_fav"><i class="fas fa-heart"></i></div>
                                    <ul class="product_marks">
                                        <li class="product_mark product_discount">
                                            <?php $result=$pro['discount_price'] ?>
                                            <?php if ($result=="") { ?>
                                        </li>
                                        <span class="product_mark product_new">new</span>
                                        <?php
    } else { ?>
                                        <?php $result1=$pro['discount_price'] ?>
                                        <?php $result2=$pro['selling_price'] ?>
                                        <?php $amount =$result1/$result2*100?>

                                        <li class="product_mark product_new bg-success">
                                            <?php  echo intval($amount) ?> %</li>
                                        <?php  } ?>
                                    </ul>
                                    <button class="product_cart_button addcart btn btn-md btn-info p-1"
                                 data-id="<?php echo $pro['p_id']?>">Add to
                                                                Cart</button>
                                </div>

                                <?php  } ?>
                            </div>
                        
                        </div>

                    </div>
                </div>
            </div>
        </div>



        <!-- Brands -->

        <div class="brands p-0 m-0">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="brands_slider_container">

                            <!-- Brands Slider -->

                            <div class="owl-carousel owl-theme brands_slider">
                                <?php
 global $connection;
 $sql="SELECT * FROM brands";
 $data=mysqli_query($connection, $sql);
 foreach ($data as $brands) { ?>

                                <div class="owl-item">

                                    <div class="brands_item d-flex flex-column justify-content-center">
                                        <a href="all_brand_products.php?id=<?php echo$brands['b_id'] ?>">
                                            <img style="height:40px; width:40px;"
                                                src="admin/media/brands/<?php  echo $brands['b_logo'] ?>" alt="">
                                        </a>
                                    </div>

                                </div>
                                <?php }?>

                            </div>

                            <!-- Brands Slider Navigation -->
                            <div class="brands_nav brands_prev"><i class="fas fa-chevron-left"></i></div>
                            <div class="brands_nav brands_next"><i class="fas fa-chevron-right"></i></div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Newsletter -->

        <div class="newsletter">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div
                            class="newsletter_container d-flex flex-lg-row flex-column align-items-lg-center align-items-center justify-content-lg-start justify-content-center">
                            <div class="newsletter_title_container">
                                <div class="newsletter_icon"><img src="images/send.png" alt=""></div>
                                <div class="newsletter_title">Sign up for Newsletter</div>
                                <div class="newsletter_text">
                                    <p>...and receive %20 coupon for first shopping.</p>
                                </div>
                            </div>
                            <div class="newsletter_content clearfix">
                                <form action="#" class="newsletter_form">
                                    <input type="email" class="newsletter_input" required="required"
                                        placeholder="Enter your email address">
                                    <button class="newsletter_button">Subscribe</button>
                                </form>
                                <div class="newsletter_unsubscribe_link"><a href="#">unsubscribe</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->

        <footer class="footer">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 footer_col">
                        <div class="footer_column footer_contact">
                            <div class="logo_container">
                                <div class="logo"><a href="#">OneTech</a></div>
                            </div>
                            <div class="footer_title">Got Question? Call Us 24/7</div>
                            <div class="footer_phone">+38 068 005 3570</div>
                            <div class="footer_contact_text">
                                <p>17 Princess Road, London</p>
                                <p>Grester London NW18JR, UK</p>
                            </div>
                            <div class="footer_social">
                                <ul>
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                    <li><a href="#"><i class="fab fa-google"></i></a></li>
                                    <li><a href="#"><i class="fab fa-vimeo-v"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 offset-lg-2">
                        <div class="footer_column">
                            <div class="footer_title">Find it Fast</div>
                            <ul class="footer_list">
                                <li><a href="#">Computers & Laptops</a></li>
                                <li><a href="#">Cameras & Photos</a></li>
                                <li><a href="#">Hardware</a></li>
                                <li><a href="#">Smartphones & Tablets</a></li>
                                <li><a href="#">TV & Audio</a></li>
                            </ul>
                            <div class="footer_subtitle">Gadgets</div>
                            <ul class="footer_list">
                                <li><a href="#">Car Electronics</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-2">
                        <div class="footer_column">
                            <ul class="footer_list footer_list_2">
                                <li><a href="#">Video Games & Consoles</a></li>
                                <li><a href="#">Accessories</a></li>
                                <li><a href="#">Cameras & Photos</a></li>
                                <li><a href="#">Hardware</a></li>
                                <li><a href="#">Computers & Laptops</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-2">
                        <div class="footer_column">
                            <div class="footer_title">Customer Care</div>
                            <ul class="footer_list">
                                <li><a href="#">My Account</a></li>
                                <li><a href="#">Order Tracking</a></li>
                                <li><a href="#">Wish List</a></li>
                                <li><a href="#">Customer Services</a></li>
                                <li><a href="#">Returns / Exchange</a></li>
                                <li><a href="#">FAQs</a></li>
                                <li><a href="#">Product Support</a></li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </footer>

        <!-- Copyright -->

        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col">

                        <div
                            class="copyright_container d-flex flex-sm-row flex-column align-items-center justify-content-start">
                            <div class="copyright_content">
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                Copyright &copy;
                                <script>
                                document.write(new Date().getFullYear());
                                </script> All rights reserved | This
                                template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a
                                    href="https://colorlib.com" target="_blank">Colorlib</a>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            </div>
                            <div class="logos ml-sm-auto">
                                <ul class="logos_list">
                                    <li><a href="#"><img src="images/logos_1.png" alt=""></a></li>
                                    <li><a href="#"><img src="images/logos_2.png" alt=""></a></li>
                                    <li><a href="#"><img src="images/logos_3.png" alt=""></a></li>
                                    <li><a href="#"><img src="images/logos_4.png" alt=""></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
    <script src="plugins/Isotope/isotope.pkgd.min.js"></script>
    <script src="plugins/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
    <script src="plugins/parallax-js-master/parallax.min.js"></script>
    <script src="js/shop_custom.js"></script>
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