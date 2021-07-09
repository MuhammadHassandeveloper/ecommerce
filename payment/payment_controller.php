<?php
require_once("../admin/includes/db_connect.php");
session_start();
$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';
switch ($action) {
    case 'add':
        addPayment();
        break;
        case 'addshipping':
            addShipping();
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
    var_dump($data);
    if ($data['payment']=='jazz') {
        header("Location:jazz.php");
    } elseif ($data['payment']=='easypaisa') {
        header("Location:easypaisa.php");
    } else {
        header("Location:oncash.php");
    }
    // $sql = "INSERT INTO  `carts`(u_id,no_of_products,p_id) VALUES('$u_id',1,'$p_id')";
    // $result=mysqli_query($connection, $sql);
}
function addShipping()
{
    echo " add shipping" ;
}