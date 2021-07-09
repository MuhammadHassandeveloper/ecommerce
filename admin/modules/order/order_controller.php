<?php
require_once("../../includes/db_connect.php");
session_start();
$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';
switch ($action) {
    case 'acceptpayment':
        accept_payment();
        break;
    case 'cancelorder':
        cancel_order();
        break;
    case 'deliveryprocess':
        delivery_process();
        break;
    case 'delieverydone':
        delievery_done();
        break;
}
function accept_payment()
{
    global $connection;
    $id = $_GET['id'];
    $status = 1;
    $sql = "UPDATE `orders` set `order_status`='$status' where `id`='$id'";
    $res = mysqli_query($connection, $sql);
    if ($res) {
        $_SESSION['successmsg'] = "Payment Accepted";
        header("Location:index.php");
    }
}

function cancel_order()
{
    global $connection;
    $id = $_GET['id'];
    $status = 4;
    $sql = "UPDATE `orders` set `order_status`='$status' where `id`='$id'";
    $res = mysqli_query($connection, $sql);
    if ($res) {
        $_SESSION['successmsg'] = "Order Cancel";
        header("Location:index.php");
    }
}
function delivery_process()
{
    global $connection;
    $id = $_GET['id'];
    $status = 2;
    $sql = "UPDATE `orders` set `order_status`='$status' where `id`='$id'";
    $res = mysqli_query($connection, $sql);
    if ($res) {
        $_SESSION['successmsg'] = "Send to Delievry";
        header("Location:index.php");
    }
}
function delievery_done()
{
    global $connection;
    $id = $_GET['id'];
    $status = 3;
    $sql = "UPDATE `orders` set `order_status`='$status' where `id`='$id'";
    $res = mysqli_query($connection, $sql);
    if ($res) {
        $_SESSION['successmsg'] = "Delievry Done";
        header("Location:index.php");
    }
}
