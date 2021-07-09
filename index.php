<?php
require_once("admin/includes/db_connect.php");
global $connection;

$sql = "SELECT categories.cat_name,brands.b_name,products.* FROM ((categories inner join products on categories.cat_id=products.cat_id) inner join brands on brands.b_id=products.b_id)  WHERE best_rated=1 order by p_id desc limit 1";
$result = mysqli_query($connection, $sql);
// if (isset($_GET['q'])) {
//     $search = $_GET['q'];
//     global $connection;
//     $sql = "SELECT categories.cat_name,brands.b_name,products.* FROM ((categories inner join products on categories.cat_id=products.cat_id) inner join brands on brands.b_id=products.b_id) where pro_name LIKE '%$search%' or pro_color LIKE '%$search%' or pro_size LIKE '%$search%' or cat_name LIKE '%$search%'";
//     $result = mysqli_query($connection, $sql);
// }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>OneTech</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="OneTech shop project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
    <link href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
    <link rel="stylesheet" type="text/css" href="plugins/slick-1.8.0/slick.css">
    <link rel="stylesheet" type="text/css" href="styles/main_styles.css">
    <link rel="stylesheet" type="text/css" href="styles/responsive.css">
    <link rel="stylesheet" href="sweetalert2.min.css">

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
        <div id="successmsg"></div>
        <div id="errormsg"></div>
        <?php
        include_once("includes/header.php");
        ?>



        <!-- Banner -->
        <?php

        foreach ($result as $data) { ?>
            <div class="banner">
                <div class="banner_background" style="background-image:url(images/banner_background.jpg)"></div>
                <div class="container fill_height">
                    <div class="row fill_height">
                        <div class="banner_product_image"><img style="height:300px;width:350px;" src="admin/media/products/<?php echo $data['image'] ?>" alt="">
                        </div>
                        <div class="col-lg-5 offset-lg-4 fill_height">
                            <div class="banner_content">
                                <h1 class="banner_text"><?php echo $data['pro_name'] ?></h1>
                                <div class="banner_price">
                                    <?php $result = $data['discount_price'] ?>

                                    <?php if ($result == "") {
                                        echo '<span class="text-danger">$</span>';

                                        echo $data['selling_price']; ?>
                                    <?php
                                    } else { ?>
                                        <span>$<?php echo $data['selling_price'] ?></span>$<?php echo $data['discount_price'] ?>
                                    <?php  } ?>
                                </div>
                                <div class="banner_product_name"><?php echo $data['b_name'] ?></div>
                                <div class="button banner_button"><a href="#">Shop Now</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php  } ?>

        <!-- Characteristics -->

        <div class="characteristics">
            <div id="successmsg"></div>
            <div id="errormsg"></div>
            <div class="container">
                <div class="row">

                    <!-- Char. Item -->
                    <div class="col-lg-3 col-md-6 char_col">

                        <div class="char_item d-flex flex-row align-items-center justify-content-start">
                            <div class="char_icon"><img src="images/char_1.png" alt=""></div>
                            <div class="char_content">
                                <div class="char_title">Free Delivery</div>
                                <div class="char_subtitle">from $50</div>
                            </div>
                        </div>
                    </div>

                    <!-- Char. Item -->
                    <div class="col-lg-3 col-md-6 char_col">

                        <div class="char_item d-flex flex-row align-items-center justify-content-start">
                            <div class="char_icon"><img src="images/char_2.png" alt=""></div>
                            <div class="char_content">
                                <div class="char_title">Free Delivery</div>
                                <div class="char_subtitle">from $50</div>
                            </div>
                        </div>
                    </div>

                    <!-- Char. Item -->
                    <div class="col-lg-3 col-md-6 char_col">

                        <div class="char_item d-flex flex-row align-items-center justify-content-start">
                            <div class="char_icon"><img src="images/char_3.png" alt=""></div>
                            <div class="char_content">
                                <div class="char_title">Free Delivery</div>
                                <div class="char_subtitle">from $50</div>
                            </div>
                        </div>
                    </div>

                    <!-- Char. Item -->
                    <div class="col-lg-3 col-md-6 char_col">

                        <div class="char_item d-flex flex-row align-items-center justify-content-start">
                            <div class="char_icon"><img src="images/char_4.png" alt=""></div>
                            <div class="char_content">
                                <div class="char_title">Free Delivery</div>
                                <div class="char_subtitle">from $50</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Deals of the week -->

        <div class="deals_featured">
            <div class="container">
                <div class="row">
                    <div class="col d-flex flex-lg-row flex-column align-items-center justify-content-start">

                        <!-- Deals -->

                        <div class="deals">
                            <div class="deals_title">Deals of th Week</div>
                            <div class="deals_slider_container">

                                <!-- Deals Slider -->
                                <div class="owl-carousel owl-theme deals_slider">
                                    <?php
                                    global $connection;
                                    $sql = "SELECT brands.b_name ,products .* FROM brands INNER JOIN products ON brands.b_id=products.b_id WHERE hot_deal=1 ORDER BY p_id DESC limit 3";
                                    $hot = mysqli_query($connection, $sql);
                                    foreach ($hot as $deal) { ?>
                                        <!-- Deals Item -->
                                        <div class="owl-item deals_item">
                                            <div class="deals_image"><img src="admin/media/products/<?php echo $deal['image'] ?>" alt=""> </div>
                                            <div class="deals_content">
                                                <div class="deals_info_line d-flex flex-row justify-content-start">
                                                    <div class="deals_item_category"><a href="#"><?php echo $data['b_name'] ?></a></div>
                                                    <div class="deals_item_price_a ml-auto">

                                                        <?php $result = $deal['discount_price'] ?>

                                                        <?php if ($result == "") {
                                                            echo '<span class="text-danger">$</span>';

                                                            echo $deal['selling_price']; ?>
                                                        <?php
                                                        } else { ?>
                                                            <span class="text-success">$<?php echo $deal['selling_price'] ?></span class="text-danger"> $<?php echo $deal['discount_price'] ?>
                                                        <?php  } ?>


                                                    </div>
                                                </div>
                                                <div class="deals_info_line d-flex flex-row justify-content-start">
                                                    <div class="deals_item_name"><?php echo $data['pro_name'] ?></div>
                                                    <div class="deals_item_price ml-auto">

                                                    </div>
                                                </div>
                                                <div class="available">
                                                    <div class="available_line d-flex flex-row justify-content-start">
                                                        <div class="available_title">Available:
                                                            <span><?php echo $data['pro_quantity'] ?></span>
                                                        </div>
                                                        <div class="sold_title ml-auto">Already sold: <span>28</span></div>
                                                    </div>
                                                    <div class="available_bar"><span style="width:17%"></span></div>
                                                </div>
                                                <div class="deals_timer d-flex flex-row align-items-center justify-content-start">
                                                    <div class="deals_timer_title_container">
                                                        <div class="deals_timer_title">Hurry Up</div>
                                                        <div class="deals_timer_subtitle">Offer ends in:</div>
                                                    </div>
                                                    <div class="deals_timer_content ml-auto">
                                                        <div class="deals_timer_box clearfix" data-target-time="">
                                                            <div class="deals_timer_unit">
                                                                <div id="deals_timer1_hr" class="deals_timer_hr"></div>
                                                                <span>hours</span>
                                                            </div>
                                                            <div class="deals_timer_unit">
                                                                <div id="deals_timer1_min" class="deals_timer_min"></div>
                                                                <span>mins</span>
                                                            </div>
                                                            <div class="deals_timer_unit">
                                                                <div id="deals_timer1_sec" class="deals_timer_sec"></div>
                                                                <span>secs</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>


                                </div>

                            </div>

                            <div class="deals_slider_nav_container">
                                <div class="deals_slider_prev deals_slider_nav"><i class="fas fa-chevron-left ml-auto"></i></div>
                                <div class="deals_slider_next deals_slider_nav"><i class="fas fa-chevron-right ml-auto"></i></div>
                            </div>
                        </div>

                        <!-- Featured -->
                        <div class="featured">
                            <div class="tabbed_container">
                                <div class="tabs">
                                    <ul class="clearfix">
                                        <li class="active">Featured products</li>

                                    </ul>
                                    <div class="tabs_line"><span></span></div>
                                </div>

                                <!-- Product Panel -->
                                <div class="product_panel panel active">
                                    <div class="featured_slider slider">

                                        <!-- Slider Item -->
                                        <?php
                                        global $connection;
                                        $sql = "SELECT * FROM products WHERE status=1 order by p_id desc limit 20";
                                        $result1 = mysqli_query($connection, $sql);
                                        if (isset($_GET['q'])) {
                                            $search = $_GET['q'];
                                            global $connection;
                                            $sql = "SELECT * FROM products where pro_name LIKE '%$search%' or pro_color LIKE '%$search%' or pro_size LIKE '%$search%'";
                                            $result1 = mysqli_query($connection, $sql);
                                        }


                                        foreach ($result1 as $data) { ?>
                                            <div class="featured_slider_item">
                                                <div class="border_active"></div>

                                                <div class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                                    <div class="product_image d-flex flex-column align-items-center justify-content-center">
                                                        <a href="product.php?p_id=<?php echo $data['p_id'] ?>
                                                            "> <img style=" height:100px;" src="admin/media/products/<?php echo $data['image'] ?>" alt=""></a>
                                                    </div>
                                                    <div class="product_content">
                                                        <div class="product_price discount">
                                                            <?php $result = $data['discount_price'] ?>

                                                            <?php if ($result == "") {
                                                                echo '<span class="text-danger">$</span>';

                                                                echo $data['selling_price']; ?>
                                                            <?php
                                                            } else { ?>
                                                                <span>$<?php echo $data['selling_price'] ?></span>$<?php echo $data['discount_price'] ?>
                                                            <?php  } ?>

                                                        </div>
                                                        <div class="product_name">
                                                            <div><a href="product.php?p_id=<?php echo $data['p_id'] ?>
                                                            "><?php echo $data['pro_name'] ?></a>
                                                            </div>
                                                        </div>
                                                        <div class="product_extras">
                                                            <div class="product_color">
                                                                <input type="radio" checked name="product_color" style="background:#b19c83">
                                                                <input type="radio" name="product_color" style="background:#000000">
                                                                <input type="radio" name="product_color" style="background:#999999">
                                                            </div>
                                                            <?php if ($data['pro_quantity'] == 0) {   ?>
                                                                <button style="background:188, 194, 190; color:red;" class="btn btn-md w-100">Out
                                                                    Of
                                                                    Stock</button>
                                                            <?php } else { ?>
                                                                <button class="product_cart_button addcart" id="cart" data-id="<?php echo $data['p_id'] ?>">Add to Cart</button>
                                                            <?php } ?>
                                                        </div>
                                                    </div>


                                                    <?php
                                                    if (isset($_SESSION['u_id'])) {
                                                        global  $connection;
                                                        $p_id = $data['p_id'];
                                                        $u_id = $_SESSION['u_id'];
                                                        $sql = "SELECT * FROM `wishlists` where p_id='$p_id' && u_id='$u_id'";
                                                        $result = mysqli_query($connection, $sql);
                                                        $res =  mysqli_num_rows($result);
                                                        if ($res > 0) { ?>
                                                            <button>
                                                                <div class="product_fav bg-danger"><i class="fas fa-heart"></i>
                                                                </div>
                                                            </button>


                                                        <?php } else { ?>
                                                            <button class=" addwishlist" data-id="<?php echo $data['p_id'] ?>">
                                                                <div class="product_fav"><i class="fas fa-heart"></i>
                                                                </div>
                                                            </button>

                                                    <?php }
                                                    } ?>


                                                    <ul class="product_marks">
                                                        <li class="product_mark product_discount">
                                                            <?php $result = $data['discount_price'] ?>
                                                            <?php if ($result == "") { ?>
                                                                <span class="product_mark product_discount">new</span>
                                                            <?php
                                                            } else { ?>
                                                                <?php $result1 = $data['discount_price'] ?>
                                                                <?php $result2 = $data['selling_price'] ?>
                                                                <?php $amount = $result1 / $result2 * 100 ?>

                                                                <?php echo intval($amount) ?> %
                                                            <?php  } ?>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        <?php  } ?>

                                    </div>
                                    <div class=" featured_slider_dots_cover">
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- Popular Categories -->

        <div class="popular_categories">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="popular_categories_content">
                            <div class="popular_categories_title">Popular Categories</div>
                            <div class="popular_categories_slider_nav">
                                <div class="popular_categories_prev popular_categories_nav"><i class="fas fa-angle-left ml-auto"></i></div>
                                <div class="popular_categories_next popular_categories_nav"><i class="fas fa-angle-right ml-auto"></i></div>
                            </div>
                            <div class="popular_categories_link"><a href="#">full catalog</a></div>
                        </div>
                    </div>

                    <!-- Popular Categories Slider -->

                    <div class="col-lg-9">
                        <div class="popular_categories_slider_container">
                            <div class="owl-carousel owl-theme popular_categories_slider">

                                <?php
                                global $connection;
                                $sql = "SELECT * FROM categories";
                                $result = mysqli_query($connection, $sql);
                                foreach ($result as $row) { ?>
                                    <!-- Popular Categories Item -->
                                    <div class="owl-item">

                                        <div class="popular_category d-flex flex-column align-items-center justify-content-center">
                                            <div class="popular_category_image"><img src="images/popular_1.png" alt="">
                                            </div>
                                            <div class="popular_category_text"><a href="all_cat_products.php?id=<?php echo $row['cat_id'] ?>"><?php echo $row['cat_name'] ?></a>
                                            </div>
                                        </div>
                                    </div>

                                <?php
                                } ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Banner -->

        <div class="banner_2">
            <div class="banner_2_background" style="background-image:url(images/banner_2_background.jpg)"></div>
            <div class="banner_2_container">
                <div class="banner_2_dots"></div>
                <!-- Banner 2 Slider -->

                <div class="owl-carousel owl-theme banner_2_slider">
                    <?php
                    global $connection;
                    $sql = "SELECT categories.cat_name,brands.b_name,products.* FROM ((categories inner join products on categories.cat_id=products.cat_id) inner join brands on brands.b_id=products.b_id) where
best_rated=1  order by p_id desc limit 3";
                    $result = mysqli_query($connection, $sql);
                    foreach ($result as $mid) { ?>

                        <!-- Banner 2 Slider Item -->
                        <div class="owl-item">
                            <div class="banner_2_item">
                                <div class="container fill_height">
                                    <div class="row fill_height">
                                        <div class="col-lg-4 col-md-6 fill_height">
                                            <div class="banner_2_content">
                                                <div class="banner_2_category">
                                                    <h2>
                                                        <?php echo $mid['cat_name']  ?></h2>
                                                </div>
                                                <div class="banner_2_title">
                                                    <h2><?php echo $mid['pro_name']  ?></h2>
                                                </div>
                                                <div class="banner_2_text">
                                                    <h1>
                                                        <?php echo $mid['b_name']  ?></h1>
                                                    <br>
                                                    <h5>
                                                        <?php echo $mid['selling_price']  ?></h5>

                                                </div>
                                                <div class="rating_r rating_r_4 banner_2_rating">
                                                    <i></i><i></i><i></i><i></i><i></i>
                                                </div>
                                                <div class="button banner_2_button"><a href="#">Explore</a></div>
                                            </div>

                                        </div>
                                        <div class="col-lg-8 col-md-6 fill_height">
                                            <div class="banner_2_image_container">
                                                <div class="banner_2_image"><img style="height:300px;width:250px;" src="admin/media/products/<?php echo $mid['image']  ?> " alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php    } ?>


                </div>
            </div>
        </div>

        <!-- Hot New Arrivals -->

        <div class="new_arrivals">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="tabbed_container">
                            <div class="tabs clearfix tabs-right">
                                <div class="new_arrivals_title">Hot Selling Products</div>
                                <ul class="clearfix">
                                    <li class="active"></li>

                                </ul>
                                <div class="tabs_line"><span></span></div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12" style="z-index:1;">

                                    <!-- Product Panel -->
                                    <div class="product_panel panel active">
                                        <div class="arrivals_slider slider">
                                            <?php
                                            global $connection;
                                            $sql = "SELECT categories.cat_name,brands.b_name,products.* FROM ((categories inner join products on categories.cat_id=products.cat_id) inner join brands on brands.b_id=products.b_id) where
hot_deal=1  order by p_id desc limit 20";
                                            $result = mysqli_query($connection, $sql);
                                            foreach ($result as $hot) { ?>
                                                <!-- Slider Item -->
                                                <div class="arrivals_slider_item">
                                                    <div class="border_active"></div>
                                                    <div class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
                                                        <div class="product_image d-flex flex-column align-items-center justify-content-center">
                                                            <a href="product.php?p_id=<?php echo $hot['p_id'] ?>"> <img style="height:120px;" src="admin/media/products/<?php echo $hot['image'] ?>" alt=""></a>
                                                        </div>
                                                        <div class="product_content">
                                                            <div class="product_price">
                                                                $<?php echo $hot['selling_price']  ?>
                                                            </div>
                                                            <div class="product_name">
                                                                <div><a href="product.php?p_id=<?php echo $hot['p_id'] ?>"><?php echo $hot['pro_name']  ?></a>
                                                                </div>
                                                            </div>
                                                            <div class="product_extras">
                                                                <div class="product_color">
                                                                    <input type="radio" checked name="product_color" style="background:#b19c83">
                                                                    <input type="radio" name="product_color" style="background:#000000">
                                                                    <input type="radio" name="product_color" style="background:#999999">
                                                                </div>
                                                                <?php if ($hot['pro_quantity'] == 0) {   ?>
                                                                    <button style="background:188, 194, 190; color:red;" class="btn btn-md w-100">Out
                                                                        Of
                                                                        Stock</button>
                                                                <?php } else { ?>
                                                                    <button class="product_cart_button addcart" data-id="<?php echo $hot['p_id'] ?>">Add to
                                                                        Cart</button>
                                                                <?php } ?>
                                                            </div>
                                                        </div>



                                                        <?php
                                                        if (isset($_SESSION['u_id'])) {
                                                            global  $connection;
                                                            $p_id = $hot['p_id'];
                                                            $u_id = $_SESSION['u_id'];
                                                            $sql = "SELECT * FROM `wishlists` where p_id='$p_id' && u_id='$u_id'";
                                                            $result = mysqli_query($connection, $sql);
                                                            $res =  mysqli_num_rows($result);
                                                            if ($res > 0) { ?>
                                                                <button>
                                                                    <div class="product_fav bg-danger"><i class="fas fa-heart"></i>
                                                                    </div>
                                                                </button>


                                                            <?php } else { ?>
                                                                <button class=" addwishlist" data-id="<?php echo $hot['p_id'] ?>">
                                                                    <div class="product_fav"><i class="fas fa-heart"></i>
                                                                    </div>
                                                                </button>

                                                        <?php }
                                                        } ?>

                                                        <ul class="product_marks">

                                                            <li class="product_mark product_new">
                                                                <?php $result = $hot['discount_price'] ?>
                                                                <?php if ($result == "") { ?>
                                                                    <h2 style="font-size: 12px; margin-top:10px;">new</h2>
                                                                <?php
                                                                } else { ?>
                                                                    <?php $result1 = $hot['discount_price'] ?>
                                                                    <?php $result2 = $hot['selling_price'] ?>
                                                                    <?php $amount = $result1 / $result2 * 100 ?>
                                                                    <?php echo intval($amount) ?> %
                                                                <?php  } ?>

                                                            </li>

                                                        </ul>
                                                    </div>
                                                </div>


                                            <?php } ?>

                                        </div>
                                        <div class="arrivals_slider_dots_cover"></div>
                                    </div>



                                </div>



                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Best Sellers -->

        <div class="best_sellers">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="tabbed_container">
                            <div class="tabs clearfix tabs-right">
                                <div class="new_arrivals_title">Trends Products</div>
                                <ul class="clearfix">
                                    <li class="active"></li>
                                </ul>
                                <div class="tabs_line"><span></span></div>
                            </div>

                            <div class="bestsellers_panel panel active">

                                <!-- Best Sellers Slider -->

                                <div class="bestsellers_slider slider">
                                    <?php
                                    global $connection;
                                    $sql = "SELECT categories.cat_name,brands.b_name,products.* FROM ((categories inner join products on categories.cat_id=products.cat_id) inner join brands on brands.b_id=products.b_id) where
trend_products=1  order by p_id desc limit 18";
                                    $result = mysqli_query($connection, $sql);
                                    foreach ($result as $trend) { ?>
                                        <!-- Best Sellers Item -->
                                        <div class="bestsellers_item discount">
                                            <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                                <div class="bestsellers_image">
                                                    <a href="product.php?p_id=<?php echo $trend['p_id'] ?>">
                                                        <img src="admin/media/products/<?php echo $trend['image'] ?> " alt="">
                                                    </a>
                                                </div>
                                                <div class="bestsellers_content">
                                                    <div class="bestsellers_category"><a href="product.php?p_id=<?php echo $trend['p_id'] ?>"><?php echo $trend['cat_name']  ?>
                                                        </a></div>
                                                    <div class="bestsellers_name"><a href="product.php?p_id=<?php echo $trend['p_id'] ?>"><?php echo $trend['pro_name']  ?>
                                                            <?php echo $trend['pro_quantity']  ?></a></div>
                                                    <div class="rating_r rating_r_4 bestsellers_rating">
                                                        <i></i><i></i><i></i><i></i><i></i>
                                                    </div>
                                                    <?php $result = $trend['discount_price'] ?>
                                                    <?php if ($result == "") {
                                                        echo '<span class="text-danger">$</span>';
                                                        echo  $trend['selling_price']; ?>
                                                    <?php
                                                    } else { ?>
                                                        <span>$<?php echo $trend['selling_price'] ?></span>$<?php echo $trend['discount_price'] ?>
                                                    <?php  } ?>
                                                </div>
                                            </div>





                                            <?php
                                            if (isset($_SESSION['u_id'])) {
                                                global  $connection;
                                                $p_id = $trend['p_id'];
                                                $u_id = $_SESSION['u_id'];
                                                $sql = "SELECT * FROM `wishlists` where p_id='$p_id' && u_id='$u_id'";
                                                $result = mysqli_query($connection, $sql);
                                                $res =  mysqli_num_rows($result);
                                                if ($res > 0) { ?>
                                                    <button>
                                                        <div class="bestsellers_fav active"><i class="fas fa-heart"></i>
                                                        </div>
                                                    </button>

                                                <?php } else { ?>
                                                    <button class=" addwishlist" data-id="<?php echo $trend['p_id'] ?>">
                                                        <div class="bestsellers_fav active"><i class="fas fa-heart"></i>
                                                        </div>
                                                    </button>

                                            <?php }
                                            } ?>













                                            <button class="addwishlist" data-id="<?php echo $trend['p_id']  ?>">
                                                <div class="bestsellers_fav"><i class="fas fa-heart"></i>
                                                </div>
                                            </button>
                                            <ul class="bestsellers_marks">
                                                <li class="bestsellers_mark bestsellers_discount">
                                                    <?php $result = $trend['discount_price'] ?>
                                                    <?php if ($result == "") { ?>
                                                        <span class="bestsellers_mark bestsellers_discount">new</span>
                                                    <?php
                                                    } else { ?>
                                                        <?php $result1 = $trend['discount_price'] ?>
                                                        <?php $result2 = $trend['selling_price'] ?>
                                                        <?php $amount = $result1 / $result2 * 100 ?>
                                                        <?php echo intval($amount) ?> %
                                                    <?php  } ?>
                                                </li>
                                                </li>
                                            </ul>
                                            <?php if ($trend['pro_quantity'] == 0) {   ?>
                                                <button style="background:188, 194, 190; color:red;margin-left:70px;" class="btn btn-md mt-4 w-50">Out
                                                    Of
                                                    Stock</button>
                                            <?php } else { ?>

                                                <button data-id="<?php echo $trend['p_id'] ?>" style="margin-left:70px;" class="btn btn-danger mt-4 w-50 addcart"><span class="text-lighter"> Add to
                                                        Cart</span> </button>
                                            <?php } ?>

                                        </div>
                                    <?php   } ?>
                                </div>
                            </div>


                        </div>

                    </div>
                </div>
            </div>
        </div>


        <!-- Recently Viewed -->

        <div class="viewed">
            <div class="container">

                <div class="row">
                    <div class="col">
                        <div class="viewed_title_container">
                            <h3 class="viewed_title">Main Slider Products</h3>
                            <div class="viewed_nav_container">
                                <div class="viewed_nav viewed_prev"><i class="fas fa-chevron-left"></i></div>
                                <div class="viewed_nav viewed_next"><i class="fas fa-chevron-right"></i></div>
                            </div>
                        </div>

                        <div class="viewed_slider_container">

                            <!-- Recently Viewed Slider -->

                            <div class="owl-carousel owl-theme viewed_slider">

                                <!-- Recently Viewed Item -->
                                <?php
                                global $connection;
                                $sql = "SELECT categories.cat_name,brands.b_name,products.* FROM ((categories inner join products on categories.cat_id=products.cat_id) inner join brands on brands.b_id=products.b_id) where
main_slider=1  order by p_id desc limit 15";
                                $result = mysqli_query($connection, $sql);
                                foreach ($result as $main) { ?>
                                    <div class="owl-item">
                                        <div class="viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                            <div class="viewed_image">
                                                <a href="product.php?p_id=<?php echo $main['p_id'] ?>"> <img src="admin/media/products/<?php echo $main['image'] ?>" alt="">
                                                </a>
                                            </div>
                                            <div class="viewed_content text-center">
                                                <?php $result = $main['discount_price'] ?>

                                                <?php if ($result == "") {
                                                    echo '<span class="text-danger">$</span>';

                                                    echo $main['selling_price']; ?>
                                                <?php
                                                } else { ?>
                                                    <span>$<?php echo $main['selling_price'] ?></span>$<?php echo $main['discount_price'] ?>
                                                <?php  } ?>
                                                <div class="viewed_name"><a href="product.php?p_id=<?php echo $main['p_id'] ?>"><?php echo $main['pro_name'] ?>
                                                    </a>
                                                </div>
                                            </div>
                                            <button class="addwishlist" data-id="<?php echo $main['p_id']  ?>">
                                                <div class="bestsellers_fav active ml-5 pl-5"><i class="fas fa-heart"></i>
                                                </div>
                                            </button>
                                            <ul class="item_marks">
                                                <li class="item_mark item_discount">
                                                    <?php $result = $main['discount_price'] ?>
                                                    <?php if ($result == "") { ?>
                                                        <span class="product_mark item_discount">New</span>
                                                    <?php
                                                    } else { ?>
                                                        <?php $result1 = $main['discount_price'] ?>
                                                        <?php $result2 = $main['selling_price'] ?>
                                                        <?php $amount = $result1 / $result2 * 100 ?>
                                                        <?php echo intval($amount) ?> %
                                                    <?php  } ?>

                                                </li>
                                            </ul>

                                            <?php if ($main['pro_quantity'] == 0) {   ?>
                                                <button style="background:188, 194, 190; color:red" class="btn btn-md mt-3">Out
                                                    Of
                                                    Stock</button>
                                            <?php } else { ?>

                                                <button class="btn btn-danger mt-3 addcart" data-id="<?php echo $main['p_id'] ?>"><span class="text-lighter"> Add to
                                                        Cart</span> </button>
                                            <?php } ?>
                                        </div>

                                    </div>
                                <?php  } ?>

                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>

        <!-- Brands -->

        <div class=" brands">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="brands_slider_container">

                            <!-- Brands Slider -->

                            <div class="owl-carousel owl-theme brands_slider">
                                <?php
                                global $connection;
                                $sql = "SELECT * FROM brands";
                                $data = mysqli_query($connection, $sql);
                                foreach ($data as $result) {
                                ?>
                                    <div class="owl-item">
                                        <div class="brands_item d-flex flex-column justify-content-center">
                                            <img style="height:60px; width:50px;" src="admin/media/brands/<?php echo $result['b_logo'] ?>" alt="">
                                        </div>
                                    </div>

                                <?php
                                } ?>
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