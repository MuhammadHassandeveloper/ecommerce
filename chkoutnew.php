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
                                        <span>User:</span>Hassan <ul>
                                            <li><a href="u_edit.php?id=7">Edit
                                                    Profile</a></li>
                                            <li><a href="wishlist.php">WishList</a></li>
                                            <li><a href="checkout.php">Checkout</a></li>
                                            <li><a href="cart.php">Cart</a></li>
                                            <li><a href="orders.php">orders</a></li>
                                            <li><a href=" u_logout.php">Logout</a></li>
                                        </ul>

                                    </li>
                                </ul>
                            </div>



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
                                                    <li><a href="all_brand_products.php?id=20">Sony </a>
                                                    </li>

                                                    <li><a href="all_brand_products.php?id=21">Rado </a>
                                                    </li>

                                                    <li><a href="all_brand_products.php?id=22">Lenovo</a>
                                                    </li>

                                                    <li><a href="all_brand_products.php?id=23">Assus </a>
                                                    </li>

                                                    <li><a href="all_brand_products.php?id=24">Cannon </a>
                                                    </li>

                                                    <li><a href="all_brand_products.php?id=25">Dell </a>
                                                    </li>

                                                    <li><a href="all_brand_products.php?id=26">Gucci</a>
                                                    </li>

                                                    <li><a href="all_brand_products.php?id=27">Levis</a>
                                                    </li>

                                                    <li><a href="all_brand_products.php?id=28">Nike</a>
                                                    </li>

                                                    <li><a href="all_brand_products.php?id=29">Adidas</a>
                                                    </li>

                                                    <li><a href="all_brand_products.php?id=30">dell</a>
                                                    </li>

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
                                <div class="wishlist_content">
                                    <div class="wishlist_text"><a href="wishlist.php">Wishlist</a></div>
                                    <div class="wishlist_count" id="mywishlist"> 4</div>
                                </div>
                            </div>

                            <!-- Cart -->
                            <div class="cart">
                                <div class="cart_container d-flex flex-row align-items-center justify-content-end">
                                    <div class="cart_icon mr-1">
                                        <img src="images/cart.png" alt="">
                                        <div class="cart_count"><span id="mycart">2</span></div>
                                    </div>
                                    <div class="cart_content">
                                        <div class="cart_text"><a href="cart.php">Cart</a></div>
                                    </div>
                                </div>

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
                                    <li class="hassubs">
                                        <a href="all_cat_products.php?id=9" id="category">Mens Fashion <i class="fas fa-chevron-right"></i></a>
                                        <ul>
                                            <li class="hassubs">
                                                <a href="all_sub_products.php?id=12" id="subcategory">Gents Tshirt<i class="fas fa-chevron-right"></i></a>

                                            </li>
                                            <li class="hassubs">
                                                <a href="all_sub_products.php?id=13" id="subcategory">Gents shirt<i class="fas fa-chevron-right"></i></a>

                                            </li>
                                            <li class="hassubs">
                                                <a href="all_sub_products.php?id=14" id="subcategory">Gents pent<i class="fas fa-chevron-right"></i></a>

                                            </li>
                                        </ul>
                                    </li>
                                    <li class="hassubs">
                                        <a href="all_cat_products.php?id=10" id="category">Womens Fashion <i class="fas fa-chevron-right"></i></a>
                                        <ul>
                                            <li class="hassubs">
                                                <a href="all_sub_products.php?id=15" id="subcategory">Womens Tshirt<i class="fas fa-chevron-right"></i></a>

                                            </li>
                                            <li class="hassubs">
                                                <a href="all_sub_products.php?id=16" id="subcategory">Womens shirt<i class="fas fa-chevron-right"></i></a>

                                            </li>
                                            <li class="hassubs">
                                                <a href="all_sub_products.php?id=17" id="subcategory">Womens Pent<i class="fas fa-chevron-right"></i></a>

                                            </li>
                                        </ul>
                                    </li>
                                    <li class="hassubs">
                                        <a href="all_cat_products.php?id=11" id="category"> Childs <i class="fas fa-chevron-right"></i></a>
                                        <ul>
                                            <li class="hassubs">
                                                <a href="all_sub_products.php?id=18" id="subcategory"> Child Dress &amp; Footware<i class="fas fa-chevron-right"></i></a>

                                            </li>
                                            <li class="hassubs">
                                                <a href="all_sub_products.php?id=19" id="subcategory">Child Body Care<i class="fas fa-chevron-right"></i></a>

                                            </li>
                                            <li class="hassubs">
                                                <a href="all_sub_products.php?id=20" id="subcategory">Child Diaper <i class="fas fa-chevron-right"></i></a>

                                            </li>
                                        </ul>
                                    </li>
                                    <li class="hassubs">
                                        <a href="all_cat_products.php?id=12" id="category">Watch <i class="fas fa-chevron-right"></i></a>
                                        <ul>
                                            <li class="hassubs">
                                                <a href="all_sub_products.php?id=21" id="subcategory">Gents Watch<i class="fas fa-chevron-right"></i></a>

                                            </li>
                                            <li class="hassubs">
                                                <a href="all_sub_products.php?id=22" id="subcategory">Womans Watch<i class="fas fa-chevron-right"></i></a>

                                            </li>
                                            <li class="hassubs">
                                                <a href="all_sub_products.php?id=23" id="subcategory">Kids Watch<i class="fas fa-chevron-right"></i></a>

                                            </li>
                                            <li class="hassubs">
                                                <a href="all_sub_products.php?id=43" id="subcategory">brand watch<i class="fas fa-chevron-right"></i></a>

                                            </li>
                                        </ul>
                                    </li>
                                    <li class="hassubs">
                                        <a href="all_cat_products.php?id=14" id="category"> Electronics <i class="fas fa-chevron-right"></i></a>
                                        <ul>
                                        </ul>
                                    </li>
                                    <li class="hassubs">
                                        <a href="all_cat_products.php?id=18" id="category">Sports &amp; Outdoor <i class="fas fa-chevron-right"></i></a>
                                        <ul>
                                        </ul>
                                    </li>
                                    <li class="hassubs">
                                        <a href="all_cat_products.php?id=19" id="category">childrens<i class="fas fa-chevron-right"></i></a>
                                        <ul>
                                        </ul>
                                    </li>
                                    <li class="hassubs">
                                        <a href="all_cat_products.php?id=20" id="category">laptops<i class="fas fa-chevron-right"></i></a>
                                        <ul>
                                            <li class="hassubs">
                                                <a href="all_sub_products.php?id=32" id="subcategory">keyboard<i class="fas fa-chevron-right"></i></a>

                                            </li>
                                            <li class="hassubs">
                                                <a href="all_sub_products.php?id=33" id="subcategory">screens<i class="fas fa-chevron-right"></i></a>

                                            </li>
                                            <li class="hassubs">
                                                <a href="all_sub_products.php?id=35" id="subcategory">laptop charger<i class="fas fa-chevron-right"></i></a>

                                            </li>
                                            <li class="hassubs">
                                                <a href="all_sub_products.php?id=36" id="subcategory">Hard Disks<i class="fas fa-chevron-right"></i></a>

                                            </li>
                                            <li class="hassubs">
                                                <a href="all_sub_products.php?id=37" id="subcategory">Rams<i class="fas fa-chevron-right"></i></a>

                                            </li>
                                            <li class="hassubs">
                                                <a href="all_sub_products.php?id=41" id="subcategory">muose<i class="fas fa-chevron-right"></i></a>

                                            </li>
                                        </ul>
                                    </li>
                                    <li class="hassubs">
                                        <a href="all_cat_products.php?id=21" id="category">mobiles<i class="fas fa-chevron-right"></i></a>
                                        <ul>
                                            <li class="hassubs">
                                                <a href="all_sub_products.php?id=34" id="subcategory">Chargers<i class="fas fa-chevron-right"></i></a>

                                            </li>
                                            <li class="hassubs">
                                                <a href="all_sub_products.php?id=38" id="subcategory">mobile charger<i class="fas fa-chevron-right"></i></a>

                                            </li>
                                            <li class="hassubs">
                                                <a href="all_sub_products.php?id=39" id="subcategory">data cables<i class="fas fa-chevron-right"></i></a>

                                            </li>
                                            <li class="hassubs">
                                                <a href="all_sub_products.php?id=40" id="subcategory">hand frees<i class="fas fa-chevron-right"></i></a>

                                            </li>
                                        </ul>
                                    </li>
                                    <li class="hassubs">
                                        <a href="all_cat_products.php?id=22" id="category">Shoes<i class="fas fa-chevron-right"></i></a>
                                        <ul>
                                            <li class="hassubs">
                                                <a href="all_sub_products.php?id=42" id="subcategory">Bata Shoes<i class="fas fa-chevron-right"></i></a>

                                            </li>
                                        </ul>
                                    </li>
                                    <li class="hassubs">
                                        <a href="all_cat_products.php?id=24" id="category">winter vagetables<i class="fas fa-chevron-right"></i></a>
                                        <ul>
                                        </ul>
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

                                                    <li class="cart_item clearfix" id="item29">
                                                        <div class="cart_item_image text-center"><br><img src="admin/media/products/1614355131-download 3.jpg" style="width: 70px; width: 70px;" alt=""></div>
                                                        <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
                                                            <div class="cart_item_name cart_info_col">
                                                                <div class="cart_item_title">Name</div>
                                                                <div class="cart_item_text mr-2">
                                                                    shirt </div>
                                                            </div>


                                                            <div class="cart_item_color cart_info_col">
                                                                <div class="cart_item_title">Color</div>
                                                                <div class="cart_item_text">
                                                                    red </div>
                                                            </div>
                                                            <div class="cart_item_color cart_info_col">
                                                                <div class="cart_item_title ml-3">Size</div>
                                                                <div class="cart_item_text ml-2">
                                                                    SMALL </div>
                                                            </div>


                                                            <div class="cart_item_quantity cart_info_col">
                                                                <div class="cart_item_title">Quantity</div><br>

                                                                <form action="" class="mt-2 ml-2 center">
                                                                    <input type="hidden" class="pro_id" value="177">
                                                                    <input minlength="1" type="text" class="qty" data-no="0" data-cart="177" data-price="309999" value="1" style="width: 50px;">
                                                                </form>
                                                            </div>



                                                            <div class="cart_item_price cart_info_col">
                                                                <div class="cart_item_title">Price</div>
                                                                <div class="cart_item_text ml-3">
                                                                    $309999</div>
                                                            </div>
                                                            <div class="cart_item_total cart_info_col">
                                                                <div class="cart_item_title">Total</div>
                                                                <div class="cart_item_text ml-3" id="totalPrice0" data-totalprice="309999" ;="">
                                                                    $309999 </div>
                                                            </div>





                                                        </div>
                                                    </li>
                                                    <li class="cart_item clearfix" id="item34">
                                                        <div class="cart_item_image text-center"><br><img src="admin/media/products/1614394238-w1.jpg" style="width: 70px; width: 70px;" alt=""></div>
                                                        <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
                                                            <div class="cart_item_name cart_info_col">
                                                                <div class="cart_item_title">Name</div>
                                                                <div class="cart_item_text mr-2">
                                                                    b_watch </div>
                                                            </div>


                                                            <div class="cart_item_color cart_info_col">
                                                                <div class="cart_item_title">Color</div>
                                                                <div class="cart_item_text">
                                                                    blue </div>
                                                            </div>
                                                            <div class="cart_item_color cart_info_col">
                                                                <div class="cart_item_title ml-3">Size</div>
                                                                <div class="cart_item_text ml-2">
                                                                    medium </div>
                                                            </div>


                                                            <div class="cart_item_quantity cart_info_col">
                                                                <div class="cart_item_title">Quantity</div><br>

                                                                <form action="" class="mt-2 ml-2 center">
                                                                    <input type="hidden" class="pro_id" value="178">
                                                                    <input minlength="1" type="text" class="qty" data-no="1" data-cart="178" data-price="12000" value="1" style="width: 50px;">
                                                                </form>
                                                            </div>



                                                            <div class="cart_item_price cart_info_col">
                                                                <div class="cart_item_title">Price</div>
                                                                <div class="cart_item_text ml-3">
                                                                    $12000</div>
                                                            </div>
                                                            <div class="cart_item_total cart_info_col">
                                                                <div class="cart_item_title">Total</div>
                                                                <div class="cart_item_text ml-3" id="totalPrice1" data-totalprice="12000" ;="">
                                                                    $12000 </div>
                                                            </div>





                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <input type="hidden" id="count" value="2">
                                            <!-- Order Total -->
                                            <div class="order_total">
                                                <div class="order_total_content text-md-right">
                                                    <div class="order_total_title">Order Total:</div>
                                                    <div id="orderTotal" class="order_total_amount">
                                                        $321999 <input type="hidden" id="total" value="321999">
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

                        <form action="" id="contact_form" method="post" class="p-3">
                            <!-- shipping adress -->
                            <div class="form-group">
                                <label for="exampleInputEmail1">Full Name</label>
                                <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Enter Your Full Name" id="name" value="Hassan  ali" name="name">
                            </div>


                            <div class="form-group">
                                <label for="exampleInputEmail1">Contact Number</label>
                                <input type="number" class="form-control" aria-describedby="emailHelp" placeholder="Enter Your Contact" id="phone" value="03095075740" name="number">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">City Name</label>
                                <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Enter Your City " id="city" value="Sahiwal" name="city">
                            </div>


                            <div class="form-group">
                                <label for="exampleInputEmail1">Address</label>
                                <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Enter Your Address" id="address" value="farid town" name="address">
                            </div>

                        </form>

                        <!-- //payment adddress -->
                        <div class="contact_form_title p-2 text-center" style="font-weight: bold;font-size:30px;">
                            Payment By
                        </div>
                        <form method="post" id="proceedCheckout">
                            <div class="form-group">
                                <ul class="logos_list">

                                    <li><input type="radio" id="jazz" class="p-method" name="paymentMethod" value="#jazzcash" checked=""><img src="images/jazz.png" style="width: 100px; height: 60px;">
                                    </li>

                                </ul>

                            </div>
                            <!-- jazz cash payment -->
                            <div class="payment-type" id="jazzcash">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Phone</label>
                                    <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Enter Your Phone " id="jazzphone" name="phone">
                                </div>
                            </div>



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


    <!-- Newsletter -->

    <div class="newsletter">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="newsletter_container d-flex flex-lg-row flex-column align-items-lg-center align-items-center justify-content-lg-start justify-content-center">
                        <div class="newsletter_title_container">
                            <div class="newsletter_icon"><img src="images/send.png" alt=""></div>
                            <div class="newsletter_title">Sign up for Newsletter
                            </div>
                            <div class="newsletter_text">
                                <p>...and receive %20 coupon for first shopping.</p>
                            </div>
                        </div>
                        <div class="newsletter_content clearfix">
                            <form action="admin/modules/newslater/newslater_controller.php?action=add" class="newsletter_form" method="POST">

                                <input type="email" class="newsletter_input" required="required" placeholder="Enter your email address" name="email">

                                <button type="submit" name="save" class="newsletter_button">Subscribe</button>
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
                            <li><a href="#">Computers &amp; Laptops</a></li>
                            <li><a href="#">Cameras &amp; Photos</a></li>
                            <li><a href="#">Hardware</a></li>
                            <li><a href="#">Smartphones &amp; Tablets</a></li>
                            <li><a href="#">TV &amp; Audio</a></li>
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
                            <li><a href="#">Video Games &amp; Consoles</a></li>
                            <li><a href="#">Accessories</a></li>
                            <li><a href="#">Cameras &amp; Photos</a></li>
                            <li><a href="#">Hardware</a></li>
                            <li><a href="#">Computers &amp; Laptops</a></li>
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

                    <div class="copyright_container d-flex flex-sm-row flex-column align-items-center justify-content-start">
                        <div class="copyright_content">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright ©<script>
                                document.write(new Date().getFullYear());
                            </script>2021 All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
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
        const cartItems = [{
            "pro_id": "29",
            "pro_name": "shirt",
            "color": "red",
            "size": "SMALL",
            "quantity": "1",
            "price": "309999",
            "total": 309999
        }, {
            "pro_id": "34",
            "pro_name": "b_watch",
            "color": "blue",
            "size": "medium",
            "quantity": "1",
            "price": "12000",
            "total": 12000
        }];

        console.log(cartItems);

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
                cartItems: JSON.stringify(cartItems),
                // jazzCnic:$("#jazzcnic").val()
            }

            $.post('api/jazzcash.php', formData, function(data) {
                console.log(data);
                data = JSON.parse(data);
                alert(data.message);
                window.location.href = "index.php";
            });
        });
    </script>




</body>

</html>