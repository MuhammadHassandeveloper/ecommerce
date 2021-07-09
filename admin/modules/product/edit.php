<?php
require_once("../../includes/db_connect.php");
session_start();
if (!isset($_SESSION['admin_id'])) {
    header("Location:../../login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Starlight">
    <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="twitter:image" content="http://themepixels.me/starlight/img/starlight-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/starlight">
    <meta property="og:title" content="Starlight">
    <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">

    <meta property="og:image" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">

    <title>Starlight Responsive Bootstrap 4 Admin Template</title>

    <!-- vendor css -->
    <link href="../../adminMenu/lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="../../adminMenu/lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="../../adminMenu/lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
    <link href="../../adminMenu/lib/rickshaw/rickshaw.min.css" rel="stylesheet">

    <!-- Starlight CSS -->

    <link rel="stylesheet" href="../../adminMenu/css/starlight.css">
</head>

<body>

    <!-- ########## START: LEFT PANEL ########## -->
    <div class="sl-logo"><a href="index.php"><i class="icon ion-android-star-outline"></i> starlight</a></div>
    <?php
include_once("../../includes/sidebar.php")

?>
    <!-- ########## START: HEAD PANEL ########## -->
    <?php
include_once("../../includes/header.php")

?>
    <!-- ########## END: HEAD PANEL ########## -->


    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="index.html">Starlight</a>
            <span class="breadcrumb-item active">Product Section</span>
        </nav>
        <?php
$id=$_GET['id'];
$sql="SELECT categories.cat_name,brands.b_name,products.* FROM ((categories inner join products on categories.cat_id=products.cat_id) inner join brands on brands.b_id=products.b_id) where p_id='$id'";
$result=mysqli_query($connection, $sql);
foreach ($result as $row) {
    ?>

        <div class="sl-pagebody">

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Update Product
                    <a href="http://localhost/ecommerce/admin/modules/product/index.php"
                        class="btn btn-success btn-sm pull-right">View All Products</a>
                </h6>
                <form method="post" action="product_controller.php?action=edit" enctype="multipart/form-data">
                    @csrf
                    <input class="form-control" type="number" name="p_id" id="color" data-role="tagsinput"
                        value="<?php echo $row['p_id']  ?>">
                    <div class="form-layout">
                        <div class="row mg-b-25">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Product Name: <span
                                            class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="pro_name"
                                        placeholder="Enter Product Name" value="<?php echo $row['pro_name']  ?>">
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Product Code: <span
                                            class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="pro_code"
                                        placeholder="Enter Product Code" value="<?php echo $row['pro_code']  ?>">
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Quantity: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="pro_quantity"
                                        placeholder="product quantity" value="<?php echo $row['pro_quantity']  ?>">
                                </div>
                            </div><!-- col-4 -->


                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Discount Price: <span
                                            class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="discount_price"
                                        placeholder="Discount Price" value="<?php echo $row['discount_price']  ?>">
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                                    <select id="category" class="form-control select2" data-placeholder="Choose country"
                                        name="cat_id">
                                        <?php
                                   $sql="SELECT * FROM  categories";
    $result=mysqli_query($connection, $sql);
    foreach ($result as $cat) {?>
                                        <option class="text-center" value="<?php echo$cat['cat_id']?>">
                                            <?php echo $cat['cat_name']?>
                                            <ption>
                                                <?php } ?>

                                    </select>
                                </div>
                            </div><!-- col-4 -->


                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Sub Category: <span
                                            class="tx-danger">*</span></label>
                                    <select id="subCategory" class="form-control select2"
                                        data-placeholder="Choose country" name="sub_id">

                                    </select>
                                </div>
                            </div><!-- col-4 -->



                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Brand: <span class="tx-danger">*</span></label>
                                    <select class="form-control select2" data-placeholder="Choose country" name="b_id">
                                        <?php
                                   $sql="SELECT * FROM  brands";
    $result=mysqli_query($connection, $sql);
    foreach ($result as $brand) {?>
                                        <option class="text-center" value="<?php echo$brand['b_id']?>">
                                            <?php echo$brand['b_name']?>
                                            <ption>
                                                <?php } ?>

                                    </select>
                                </div>
                            </div><!-- col-4 -->


                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Product Size: <span
                                            class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="pro_size" id="size"
                                        data-role="tagsinput" value="<?php echo $row['pro_size']  ?>">
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Product Color: <span
                                            class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="pro_color" id="color"
                                        data-role="tagsinput" value="<?php echo $row['pro_color']  ?>">
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Selling Price: <span
                                            class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="selling_price"
                                        placeholder="Selling Price" value="<?php echo $row['selling_price']  ?>">
                                </div>
                            </div><!-- col-4 -->


                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label">Product Details: <span
                                            class="tx-danger">*</span></label>

                                    <textarea class="form-control" id="summernote" name="pro_details">
                      <?php echo$row['pro_details']?>

             </textarea>

                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label">Video Link: <span
                                            class="tx-danger">(optional)</span></label>
                                    <input class="form-control" name="video_link" placeholder="Video Link">
                                    <strong style="color:green;"><?php echo$row['video_link'] ?></strong>
                                </div>
                            </div><!-- col-4 -->



                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label">Image <span class="tx-danger">*</span></label>
                                    <input type="file" id="file" class="form-control" name="image">
                                    <img style="width:100px;height:60px; " title="old Image"
                                        src="../../media/products/<?php echo$row['image']?>" alt="" srcset="">

                                </div>
                            </div><!-- col-4 -->
                            <br> <br>



                            <div class="col-lg-4">
                                <label class="ckbox">
                                    <input type="checkbox" name="best_rated" value="1">
                                    <span>Best Rated=</span>
                                    <strong style="color:green;"><?php echo$row['best_rated'] ?></strong>

                                </label>

                            </div> <!-- col-4 -->

                            <div class="col-lg-4">
                                <label class="ckbox">
                                    <input type="checkbox" name="hot_deal" value="1">
                                    <span>Hot Deal=</span>
                                    <strong style="color:green;"><?php echo$row['hot_deal'] ?></strong>

                                </label>

                            </div> <!-- col-4 -->

                            <div class="col-lg-4">
                                <label class="ckbox">
                                    <input type="checkbox" name="mid_slider" value="1">
                                    <span>Mid Slider=</span>
                                    <strong style="color:green;"><?php echo$row['mid_slider'] ?></strong>

                                </label>

                            </div>
                            <div class="col-lg-4">
                                <label class="ckbox">
                                    <input type="checkbox" name="main_slider" value="1">
                                    <span>Main Slider=</span>
                                    <strong style="color:green;"><?php echo$row['main_slider'] ?></strong>

                                </label>

                            </div>
                            <div class="col-lg-4">
                                <label class="ckbox">
                                    <input type="checkbox" name="trend_products" value="1">
                                    <span>trend Products=</span>
                                    <strong style="color:green;"><?php echo$row['trend_products'] ?></strong>

                                </label>

                            </div>
                            <div class="col-lg-4">
                                <label class="ckbox">
                                    <input type="checkbox" name="status" value="1">
                                    <span>Status=</span>
                                    <strong style="color:green;"><?php echo$row['status'] ?></strong>
                                </label>

                            </div>

                        </div><!-- end row -->
                        <br>


                        <div class="form-layout-footer">
                            <button class="btn btn-info mg-r-5" type="submit" name="save">Submit Form</button>
                            <button class="btn btn-secondary">Cancel</button>
                        </div><!-- form-layout-footer -->
                    </div><!-- form-layout -->
            </div><!-- card -->

            </form>

            <?php
}?>

            <footer class="sl-footer">
                <div class="footer-left">
                    <div class="mg-b-2">Copyright &copy; 2017. Starlight. All Rights Reserved.</div>
                    <div>Made by ThemePixels.</div>
                </div>
                <div class="footer-right d-flex align-items-center">
                    <span class="tx-uppercase mg-r-10">Share:</span>
                    <a target="_blank" class="pd-x-5"
                        href="https://www.facebook.com/sharer/sharer.php?u=http%3A//themepixels.me/starlight"><i
                            class="fa fa-facebook tx-20"></i></a>
                    <a target="_blank" class="pd-x-5"
                        href="https://twitter.com/home?status=Starlight,%20your%20best%20choice%20for%20premium%20quality%20admin%20template%20from%20Bootstrap.%20Get%20it%20now%20at%20http%3A//themepixels.me/starlight"><i
                            class="fa fa-twitter tx-20"></i></a>
                </div>
            </footer>
        </div><!-- sl-mainpanel -->
        <!-- ########## END: MAIN PANEL ########## -->
        <script src="../../adminMenu/lib/jquery/jquery.js"></script>
        <script src="../../adminMenu/lib/popper.js/popper.js"></script>
        <script src="../../adminMenu/lib/bootstrap/bootstrap.js"></script>
        <script src="../../adminMenu/lib/jquery-ui/jquery-ui.js"></script>
        <script src="../../adminMenu/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
        <script src="../../adminMenu/lib/jquery.sparkline.bower/jquery.sparkline.min.js"></script>
        <script src="../../adminMenu/lib/d3/d3.js"></script>
        <script src="../../adminMenu/lib/rickshaw/rickshaw.min.js"></script>
        <script src="../../adminMenu/lib/chart.js/Chart.js"></script>
        <script src="../../adminMenu/lib/Flot/jquery.flot.js"></script>
        <script src="../../adminMenu/lib/Flot/jquery.flot.pie.js"></script>
        <script src="../../adminMenu/lib/Flot/jquery.flot.resize.js"></script>
        <script src="../../adminMenu/lib/flot-spline/jquery.flot.spline.js"></script>

        <script src="../../adminMenu/js/starlight.js"></script>
        <script src="../../adminMenu/js/ResizeSensor.js"></script>
        <script src="../../adminMenu/js/dashboard.js"></script>
        <script src="../../adminMenu/js/starlight.js"></script>
        <script>
        $("#category").change(function() {
            const id = $(this).val();
            $.get('get_sub_category.php?id=' + id, function(data) {
                data = JSON.parse(data);

                $("#subCategory").html("");
                data.forEach(function(subCategory) {
                    $("#subCategory").append("<option value='" + subCategory.sub_id +
                        "'>" + subCategory.sub_name +
                        "</option>")
                })
            });
        })
        $(function() {
            'use strict';

            $('#datatable1').DataTable({
                responsive: true,
                language: {
                    searchPlaceholder: 'Search...',
                    sSearch: '',
                    lengthMenu: '_MENU_ items/page',
                }
            });

            $('#datatable2').DataTable({
                bLengthChange: false,
                searching: false,
                responsive: true
            });

            // Select2
            $('.dataTables_length select').select2({
                minimumResultsForSearch: Infinity
            });

        });
        </script>
</body>

</html>