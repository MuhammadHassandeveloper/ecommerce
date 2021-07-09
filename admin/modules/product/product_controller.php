<?php
require_once("../../includes/db_connect.php");
session_start();
$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';
switch ($action) {
    case 'add':
        insertProduct();
        break;
    case 'status':
            setStatus();
            break;
        case 'edit':
        editProduct();
        break;
    case 'delete':
    deleteProduct();
        break;
}

function setStatus()
{
    global $connection;
    $id=$_POST['id'];
    $status=$_POST['status'];
    $connection->query("UPDATE `products` set `status`='$status' where `p_id`='$id'");
}

function insertProduct()
{
    global $connection;
    if (isset($_POST['save'])) {
        if ($_POST["pro_name"]=='' || $_POST["selling_price"]=='' || $_POST["pro_color"]==''|| $_POST["pro_code"]=='' || $_POST["pro_details"]=='' || $_POST["pro_size"]=='') {
            header("Location:index.php");
            $_SESSION['errormsg']="All fields are required";
        } else {
            $cat_id = $_POST["cat_id"];
            $sub_id = $_POST["sub_id"];
            $b_id = $_POST["b_id"];
            $name = $_POST["pro_name"];
            $code = $_POST["pro_code"];
            $quantity = $_POST["pro_quantity"];
            $size = $_POST["pro_size"];
            $details = $_POST["pro_details"];
            $color = $_POST["pro_color"];
            $price = $_POST["selling_price"];
            $discount = $_POST["discount_price"];
            $link= $_POST["video_link"];
            $rated= $_POST["best_rated"];
            $deal= $_POST["hot_deal"];

            $mid= $_POST["mid_slider"];
            $main= $_POST["main_slider"];
            $trend= $_POST["trend_products"];


            $status = $_POST["status"];

            $img = $_FILES['image'];
            $target_dir = "../../media/products/";
            $target_file = $target_dir   . basename($img["name"]);
    
            $uploadOk = 1;
            $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
            if (
                $imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpeg"
                || $imageFileType == "gif"
            ) {
                $file = time() . "-" . basename($img["name"]);
                $target_file = $target_dir  . $file;
                move_uploaded_file($img['tmp_name'], $target_file);
                $file = str_replace("'", "''", "$file");
            }
            $sql ="INSERT INTO  `products`(`cat_id`,`sub_id`,`b_id`,`pro_name`,`pro_code`,`pro_quantity`,`pro_size`,`pro_details`,`pro_color`,`selling_price`,`discount_price`,`video_link`,`best_rated`,
        `hot_deal`,`mid_slider`,`main_slider`,`trend_products`,`status`,`image`) VALUES('$cat_id','$sub_id','$b_id','$name','$code','$quantity','$size','$details','$color','$price','$discount','$link','$rated','$deal','$mid','$main','$trend','$status','$file')";
            $data=mysqli_query($connection, $sql);
            header("Location:index.php");
            $_SESSION['successmsg']="Product Successfully Added";
        }
    }
}

function editProduct()
{
    global $connection;
    if (isset($_POST['save'])) {
        $p_id = $_POST["p_id"];
        $cat_id = $_POST["cat_id"];
        $sub_id = $_POST["sub_id"];
        $b_id = $_POST["b_id"];
        $name = $_POST["pro_name"];
        $code = $_POST["pro_code"];
        $quantity = $_POST["pro_quantity"];
        $size = $_POST["pro_size"];
        $details = $_POST["pro_details"];
        $color = $_POST["pro_color"];
        $price = $_POST["selling_price"];
        $discount = $_POST["discount_price"];
        $link= $_POST["video_link"];
        $rated= $_POST["best_rated"];
        $deal= $_POST["hot_deal"];
        $mid= $_POST["mid_slider"];
        $main= $_POST["main_slider"];
        $trend= $_POST["trend_products"];
        $status = $_POST["status"];
        // edit image
        if ($_FILES['image']['name']) {
            $sql="SELECT `image` FROM `products` where `P_id`='$p_id'";
            $img=mysqli_query($connection, $sql);
            $img=mysqli_fetch_object($img);
            $filename = $img->image;
            $path ="../../media/products/". $filename;

            if (file_exists($path) && is_readable($path)) {
                unlink($path);
            }
            $img = $_FILES['image'];
            $target_dir = "../../media/products/";
            $target_file = $target_dir   . basename($img["name"]);
            $uploadOk = 1;
            $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

            if (
            $imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpeg"
            || $imageFileType == "gif"
        ) {
                $file = time() . "-" . basename($img["name"]);
                $target_file = $target_dir  . $file;
                move_uploaded_file($img['tmp_name'], $target_file);
            }
            $file = str_replace("'", "''", "$file");
            $sql="UPDATE `products` set `pro_name`='$name',`pro_code`='$code',`pro_size`='$size',`pro_color`='$color',`pro_quantity`='$quantity',`pro_details`='$details',`selling_price`='$price',`discount_price`='$discount',`video_link`='$link',`best_rated`='$rated',`hot_deal`='$deal',`mid_slider`='$mid',`main_slider`='$main',`trend_products`='$trend',`status`='$status',`cat_id`='$cat_id',`sub_id`='$sub_id',`b_id`='$b_id',`image`='$file' where p_id='$p_id'";
            $res=mysqli_query($connection, $sql);
        } else {
            $sql="UPDATE `products` set `pro_name`='$name',`pro_code`='$code',`pro_size`='$size',`pro_color`='$color',`pro_quantity`='$quantity',`pro_details`='$details',`selling_price`='$price',`discount_price`='$discount',`video_link`='$link',`best_rated`='$rated',`hot_deal`='$deal',`mid_slider`='$mid',`main_slider`='$main',`trend_products`='$trend',`status`='$status',`cat_id`='$cat_id',`sub_id`='$sub_id',`b_id`='$b_id' where p_id='$p_id'";
            $result=mysqli_query($connection, $sql);
        }
        header("Location:index.php");
        $_SESSION['successmsg']="Product Successfully Updated";
    }
}

function deleteProduct()
{
    global $connection;
    if (isset($_GET['id'])) {
        $id=$_GET['id'];
        $sql="SELECT `image` FROM `products` where `p_id`='$id'";
        $img=mysqli_query($connection, $sql);
        $img=mysqli_fetch_object($img);
        $filename = $img->image;
        $path ="../../media/products/". $filename;
        if (file_exists($path) && is_readable($path)) {
            unlink($path);
        }
        $sql="DELETE image FROM products WHERE p_id='$id'";
        $data=mysqli_query($connection, $sql);

        $sql="DELETE FROM products WHERE p_id='$id'";
        $data=mysqli_query($connection, $sql);
        header("Location:index.php");
        $_SESSION['successmsg']="Product Successfully Deleted";
    }
}