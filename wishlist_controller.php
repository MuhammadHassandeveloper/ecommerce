<?php
require_once("admin/includes/db_connect.php");
session_start();
$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';
switch ($action) {
    case 'add':
        addWhishlist();
        break;
        case 'edit':
        editCat();
        break;
    case 'delete':
    deleteCart();
        break;
}

function addWhishlist()
{
    if (isset($_SESSION['u_id'])) {
        global  $connection;
        $u_id=$_SESSION['u_id'];
        $p_id=$_POST['id'];
        $sql="SELECT w_id FROM `wishlists` where p_id='$p_id' && u_id='$u_id'";
        $result=mysqli_query($connection, $sql);
        $res =  mysqli_num_rows($result);
        if ($res > 0) {
            echo 22;
        } else {
            $p_id=$_POST['id'];
            $u_id=$_SESSION['u_id'];
            $sql = "INSERT INTO  `wishlists`(u_id,p_id) VALUES('$u_id','$p_id')";
            $result=mysqli_query($connection, $sql);
            $mydb="SELECT w_id FROM wishlists WHERE u_id='$u_id'";
            $res =mysqli_query($connection, $mydb);
            $num =mysqli_num_rows($res);
            echo $num;
        }
    } else {
        echo 0;
    }
}

function deleteCart()
{
    global $connection;
    $id = $_POST['id'];
    $u_id=$_SESSION['u_id'];
    $sql="DELETE  FROM  `wishlists` where  p_id='$id' && u_id='$u_id'";
    $res=mysqli_query($connection, $sql);
    $mydb="SELECT w_id FROM wishlists WHERE u_id='$u_id'";
    $data =mysqli_query($connection, $mydb);
    $num2=mysqli_num_rows($data);
    echo $num2;
}