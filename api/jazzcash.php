<?php
session_start();
// require_once("../payment/jazz.php");
// $form_data['cnic']=$_POST['jazzCnic'];



require_once("../includes/config.php");

$form_data['phone'] = $_POST['jazzPhone'];
$total = $_POST['total'];
$name = $_POST['name'];
$phone = $_POST['phone'];
$city = $_POST['city'];
$address = $_POST['address'];

$form_data['paymentMethod'] = 'jazzcash';
$form_data['total'] = $total;

$u_id = $_SESSION['u_id'];

$cart_items = json_decode($_POST['cartItems']);





$res = mysqli_query($connection, "select id from shipping where u_id='$u_id'");
$shipping_id = '';
if (mysqli_num_rows($res) <= 0) {

    mysqli_query($connection, "INSERT INTO `shipping`(`u_id`,`name`,`number`,`address`,`city`) VALUES('$u_id','$name','$phone','$address','$city')");
    $shipping_id = mysqli_insert_id($connection);
} else {
    $shipping_id = mysqli_fetch_object($res)->id;

    mysqli_query($connection, "UPDATE `shipping` set `name`='$name',`number`='$phone',`address`='$address',`city`='$city' where u_id='$u_id'");
}
$code = 0;
$jc_api = new Jazz();
$response = $jc_api->createCharge($form_data);
// print_r($response);
if ($response->pp_ResponseCode == 000) {
    $payment_id = $response->pp_TxnRefNo;
    $amount = $response->pp_Amount;
    //insert data in orders
    $order = "INSERT  into orders  (`payment_type`, `u_id`, `payment_id`, `paying_amount`, `balance_transaction`, `total`, `status`,shipping_id) values('jazzcash','$u_id','$payment_id','$total','$amount','$amount','success','$shipping_id')";
    mysqli_query($connection, $order);
    $order_id = mysqli_insert_id($connection);
    //delte carts items
    $sql = "DELETE FROM carts WHERE u_id='$u_id'";
    $res = mysqli_query($connection, $sql);
    //fetch all carts products
    $query_values = "";
    foreach ($cart_items as $index => $item) {
        $query_values = $query_values . "('$order_id','$item->pro_id','$item->pro_name','$item->color','$item->size','$item->quantity','$item->total')";
        if ($index < count($cart_items) - 1) {
            $query_values .= ",";
        }
    }
    //insert all cart pro in oredre details
    $query = "INSERT INTO orders_details(order_id,pro_id,pro_name,size,color,quantity,total) values" . $query_values;
    mysqli_query($connection, $query);
}
$response = array('message' => $response->pp_ResponseMessage, 'code' => $code);
echo json_encode($response);
