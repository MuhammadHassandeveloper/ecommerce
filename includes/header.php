<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Oline Store</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="OneTech shop project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
    <link href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="../plugins/OwlCarousel2-2.2.1/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="../plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="../plugins/OwlCarousel2-2.2.1/animate.css">
    <link rel="stylesheet" type="text/css" href="../plugins/slick-1.8.0/slick.css">
    <link rel="stylesheet" type="text/css" href="../styles/main_styles.css">
    <link rel="stylesheet" type="text/css" href="../styles/responsive.css">
    <style>
        a {
            text-decoration: none;
            list-style-type: none;
        }
    </style>

</head>

<body>
    <!-- Header -->

    <header class="header">

        <!-- Top Bar -->

        <div class="top_bar">
            <div class="container">
                <div class="row">
                    <div class="col d-flex flex-row">
                        <div class="top_bar_contact_item">
                            <div class="top_bar_icon"><img src="images/phone.png" alt=""></div>+309 7747374
                        </div>
                        <div class="top_bar_contact_item">
                            <div class="top_bar_icon"><img src="images/mail.png" alt=""></div><a href="mailto:fastsales@gmail.com">sehrish@gmail.com</a>
                        </div>
                        <div class="top_bar_content ml-auto">
                            <div class="top_bar_menu">
                                <ul class="standard_dropdown top_bar_dropdown">

                                    <div class="top_bar_user">
                                        <div class="user_icon"><img src="images/user.svg" alt=""></div>
                                        <div><a href="u_signup.php">Register</a></div>
                                    </div>
                                    <li>
                                        <?php
                                        if (isset($_SESSION['u_id'])) {
                                            echo '<span>User:</span>';
                                            echo $_SESSION['name']; ?>
                                            <ul>
                                                <li><a href="u_edit.php?id=<?php echo $_SESSION['u_id']; ?>">Edit
                                                        Profile</a></li>
                                                <li><a href="wishlist.php">WishList</a></li>
                                                <li><a href="checkout.php">Checkout</a></li>
                                                <li><a href="cart.php">Cart</a></li>
                                                <li><a href="orders.php">orders</a></li>
                                                <li><a href=" u_logout.php">Logout</a></li>
                                            </ul>

                                        <?php
                                        } else {
                                            echo '<div><a href="u_login.php">Sign in</a></div>';
                                        }
                                        ?>
                                    </li>
                                </ul>
                            </div>


                            <?php
                            if (isset($_SESSION['successmsg'])) {
                            ?>
                                <div class=" alert alert-success alert-dismissible fade show text-center" role="alert">
                                    <strong>Success!</strong> <?php echo $_SESSION['successmsg']; ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php
                                unset($_SESSION['successmsg']);
                            }
                            ?>
                            <?php
                            if (isset($_SESSION['errormsg'])) {
                            ?>
                                <div class=" alert alert-warning alert-dismissible fade show text-center" role="alert">
                                    <strong>Warning!</strong> <?php echo $_SESSION['errormsg']; ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php
                                unset($_SESSION['errormsg']);
                            }
                            ?>

                            <?php
                            if (isset($_SESSION['emailErr'])) {
                            ?>
                                <div class=" alert alert-danger alert-dismissible fade show text-center" role="alert">
                                    <strong>Error!</strong> <?php echo $_SESSION['emailErr']; ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php
                                unset($_SESSION['emailErr']);
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Header Main -->

        <div class="header_main">
            <div class="container">
                <div class="row">

                    <!-- Logo -->
                    <div class="col-lg-2 col-sm-3 col-3 order-1">
                        <div class="logo_container">
                            <div class="logo"><a href="index.php">Online Store</a></div>
                        </div>
                    </div>

                    <!-- Search -->
                    <div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
                        <div class="header_search">
                            <div class="header_search_content">
                                <div class="header_search_form_container">
                                    <form action="#" method="GET" class="header_search_form clearfix">
                                        <input type="search" required="required" class="header_search_input" name="q" placeholder="Search for products...">

                                        <div class="custom_dropdown">
                                            <div class="custom_dropdown_list">
                                                <span class="custom_dropdown_placeholder clc">All Brands</span>
                                                <i class="fas fa-chevron-down"></i>
                                                <ul class="custom_list clc">
                                                    <li><a class="clc" href="#">All Brands</a></li>
                                                    <?php
                                                    global $connection;
                                                    $sql = "SELECT * FROM brands";
                                                    $data = mysqli_query($connection, $sql);
                                                    foreach ($data as $row) {  ?>
                                                        <li><a href="all_brand_products.php?id=<?php echo $row['b_id'] ?>"><?php echo $row['b_name'] ?></a>
                                                        </li>

                                                    <?php  } ?>
                                                </ul>
                                            </div>
                                        </div>


                                        <button type="submit" class="header_search_button trans_300" value="Submit"><img src="images/search.png" alt=""></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Wishlist -->
                    <div class="col-lg-4 col-9 order-lg-3 order-2 text-lg-left text-right">
                        <div class="wishlist_cart d-flex flex-row align-items-center justify-content-end">
                            <div class="wishlist d-flex flex-row align-items-center justify-content-end">
                                <div class="wishlist_icon"><img src="images/heart.png" alt=""></div>
                                <?php
                                if (isset($_SESSION['u_id'])) {
                                    $u_id = $_SESSION['u_id'];
                                    $mydb = "SELECT w_id FROM wishlists WHERE u_id='$u_id'";
                                    $res = mysqli_query($connection, $mydb);
                                    $num = mysqli_num_rows($res); ?>
                                    <div class="wishlist_content">
                                        <div class="wishlist_text"><a href="wishlist.php">Wishlist</a></div>
                                        <div class="wishlist_count" id="mywishlist"> <?php echo $num ?></div>
                                    </div>
                                <?php
                                }  ?>
                            </div>

                            <!-- Cart -->
                            <div class="cart">
                                <div class="cart_container d-flex flex-row align-items-center justify-content-end">
                                    <div class="cart_icon mr-1">
                                        <img src="images/cart.png" alt="">
                                        <?php
                                        if (isset($_SESSION['u_id'])) {
                                            global $connection;
                                            $u_id = $_SESSION['u_id'];
                                            $mydb = "SELECT cart_id FROM carts WHERE u_id='$u_id'";
                                            $res = mysqli_query($connection, $mydb);
                                            $num = mysqli_num_rows($res); ?>
                                            <div class="cart_count"><span id="mycart"><?php echo $num ?></span></div>
                                    </div>
                                    <div class="cart_content">
                                        <div class="cart_text"><a href="cart.php">Cart</a></div>
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

        <!-- Main Navigation -->

        <nav class="main_nav">
            <div class="container">
                <div class="row">
                    <div class="col">

                        <div class="main_nav_content d-flex flex-row">

                            <!-- Categories Menu -->

                            <div class="cat_menu_container">
                                <div class="cat_menu_title d-flex flex-row align-items-center justify-content-start">
                                    <div class="cat_burger"><span></span><span></span><span></span></div>
                                    <div class="cat_menu_text">categories</div>
                                </div>



                                <ul class="cat_menu">
                                    <?php
                                    global $connection;
                                    $sql = "SELECT * FROM categories";
                                    $data = mysqli_query($connection, $sql);
                                    foreach ($data as $row) {
                                        $cat_id = $row['cat_id']; ?>
                                        <li class="hassubs">
                                            <a href="all_cat_products.php?id=<?php echo $row['cat_id'] ?>" id="category"><?php echo $row['cat_name'] ?><i class="fas fa-chevron-right"></i></a>
                                            <ul>
                                                <?php
                                                global $connection;
                                                $sql = "SELECT * FROM sub_categories where cat_id='$cat_id'";
                                                $data = mysqli_query($connection, $sql);
                                                foreach ($data as $sub) {  ?>
                                                    <li class="hassubs">
                                                        <a href="all_sub_products.php?id=<?php echo $sub['sub_id'] ?>" id="subcategory"><?php echo $sub['sub_name'] ?><i class="fas fa-chevron-right"></i></a>

                                                    </li>
                                                <?php   } ?>
                                            </ul>
                                        <?php
                                    } ?>
                                        </li>
                                </ul>




                            </div>

                            <!-- Main Nav Menu -->

                            <div class="main_nav_menu ml-auto">
                                <ul class="standard_dropdown main_nav_dropdown">
                                    <li><a href="index.php">Home<i class="fas fa-chevron-down"></i></a></li>

                                    <li><a href="contact.php">Contact<i class="fas fa-chevron-down"></i></a>
                                    </li>
                                </ul>
                            </div>

                            <!-- Menu Trigger -->

                            <div class="menu_trigger_container ml-auto">
                                <div class="menu_trigger d-flex flex-row align-items-center justify-content-end">
                                    <div class="menu_burger">
                                        <div class="menu_trigger_text">menu</div>
                                        <div class="cat_burger menu_burger_inner">
                                            <span></span><span></span><span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Menu -->

        <div class="page_menu">
            <div class="container">
                <div class="row">
                    <div class="col">

                        <div class="page_menu_content">

                            <div class="page_menu_search">
                                <form action="#">
                                    <input type="search" required="required" class="page_menu_search_input" placeholder="Search for products...">
                                </form>
                            </div>
                            <ul class="page_menu_nav">
                                <li class="page_menu_item has-children">
                                    <a href="#">Language<i class="fa fa-angle-down"></i></a>
                                    <ul class="page_menu_selection">
                                        <li><a href="#">English<i class="fa fa-angle-down"></i></a></li>
                                        <li><a href="#">Italian<i class="fa fa-angle-down"></i></a></li>
                                        <li><a href="#">Spanish<i class="fa fa-angle-down"></i></a></li>
                                        <li><a href="#">Japanese<i class="fa fa-angle-down"></i></a></li>
                                    </ul>
                                </li>
                                <li class="page_menu_item has-children">
                                    <a href="#">Currency<i class="fa fa-angle-down"></i></a>
                                    <ul class="page_menu_selection">
                                        <li><a href="#">US Dollar<i class="fa fa-angle-down"></i></a></li>
                                        <li><a href="#">EUR Euro<i class="fa fa-angle-down"></i></a></li>
                                        <li><a href="#">GBP British Pound<i class="fa fa-angle-down"></i></a>
                                        </li>
                                        <li><a href="#">JPY Japanese Yen<i class="fa fa-angle-down"></i></a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="page_menu_item">
                                    <a href="#">Home<i class="fa fa-angle-down"></i></a>
                                </li>
                                <li class="page_menu_item has-children">
                                    <a href="#">Super Deals<i class="fa fa-angle-down"></i></a>
                                    <ul class="page_menu_selection">
                                        <li><a href="#">Super Deals<i class="fa fa-angle-down"></i></a></li>
                                        <li class="page_menu_item has-children">
                                            <a href="#">Menu Item<i class="fa fa-angle-down"></i></a>
                                            <ul class="page_menu_selection">
                                                <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a>
                                                </li>
                                                <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a>
                                                </li>
                                                <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a>
                                                </li>
                                                <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                        <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                        <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                    </ul>
                                </li>
                                <li class="page_menu_item has-children">
                                    <a href="#">Featured Brands<i class="fa fa-angle-down"></i></a>
                                    <ul class="page_menu_selection">
                                        <li><a href="#">Featured Brands<i class="fa fa-angle-down"></i></a></li>
                                        <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                        <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                        <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                    </ul>
                                </li>
                                <li class="page_menu_item has-children">
                                    <a href="#">Trending Styles<i class="fa fa-angle-down"></i></a>
                                    <ul class="page_menu_selection">
                                        <li><a href="#">Trending Styles<i class="fa fa-angle-down"></i></a></li>
                                        <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                        <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                        <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                    </ul>
                                </li>
                                <li class="page_menu_item"><a href="blog.html">blog<i class="fa fa-angle-down"></i></a>
                                </li>
                                <li class="page_menu_item"><a href="contact.html">contact<i class="fa fa-angle-down"></i></a></li>
                            </ul>

                            <div class="menu_contact">
                                <div class="menu_contact_item">
                                    <div class="menu_contact_icon"><img src="images/phone_white.png" alt="">
                                    </div>
                                    +38 068 005 3570
                                </div>
                                <div class="menu_contact_item">
                                    <div class="menu_contact_icon"><img src="images/mail_white.png" alt="">
                                    </div><a href="mailto:fastsales@gmail.com" id="email">fastsales@gmail.com</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>


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
        let carts = $(".cart").val();
        $(".cartvalue").html(carts);
    </script>

</body>

</html>