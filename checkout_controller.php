<?php
require_once("admin/includes/db_connect.php");
session_start();
$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';
switch ($action) {
    case 'add':
        addPayment();
        break;
        case 'addcoupon':
            addCoupon();
            break;
        case 'edit':
        editItem();
        break;
    case 'delete':
    deleteItem();
        break;
}


function addPayment()
{
    $data=array();
    global $connection;
    $data['name']=$_POST['name'];
    $data['phone']=$_POST['phone'];
    $data['email']=$_POST['email'];
    $data['address']=$_POST['address'];
    $data['city']=$_POST['city'];
    $data['payment']=$_POST['payment'];
    
    if ($data['payment']=='jazz') {
        header("Location:payment/jazz.php");
    } elseif ($data['payment']=='easypaisa') {
        header("Location:payment/easypaisa.php");
    } else {
        header("Location:payment/oncash.php");
    }
    // $sql = "INSERT INTO  `carts`(u_id,no_of_products,p_id) VALUES('$u_id',1,'$p_id')";
    // $result=mysqli_query($connection, $sql);
}