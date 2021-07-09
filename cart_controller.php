<?php
require_once("admin/includes/db_connect.php");
session_start();
$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';
switch ($action) {
    case 'add':
        addCart();
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

function addCart()
{
    if (isset($_SESSION['u_id'])) {
        global  $connection;
        $u_id=$_SESSION['u_id'];
        $p_id=$_POST['id'];
        $sql="SELECT cart_id FROM `carts` where p_id='$p_id' && u_id='$u_id'";
        $result=mysqli_query($connection, $sql);
        $res =  mysqli_num_rows($result);
        if ($res > 0) {
            $id =mysqli_fetch_assoc($result);
            $cart_id = $id['cart_id'];
            $update= "UPDATE `carts` SET `no_of_products`=`no_of_products`+1 where cart_id='$cart_id'";
            $data=mysqli_query($connection, $update);
            echo 2;
        } else {
            $p_id=$_POST['id'];
            $u_id=$_SESSION['u_id'];
            $sql = "INSERT INTO  `carts`(u_id,no_of_products,p_id) VALUES('$u_id',1,'$p_id')";
            $result=mysqli_query($connection, $sql);
            $mydb="SELECT cart_id FROM carts WHERE u_id='$u_id'";
            $res =mysqli_query($connection, $mydb);
            $num =mysqli_num_rows($res);
            echo $num;
        }
        $update2= "UPDATE `products` SET `pro_quantity`=`pro_quantity`-1 where p_id='$p_id'";
        $result=mysqli_query($connection, $update2);
    } else {
        echo 0;
    }
}
function deleteItem()
{
    global $connection;
    $p_id = $_POST['id'];
    $quantity=$_POST['no_of_products'];
    $sql="DELETE  from `carts` where  p_id='$p_id'";
    $del=mysqli_query($connection, $sql);
    $mydb="UPDATE products SET pro_quantity=pro_quantity+$quantity where p_id='$p_id'";
    $update2=mysqli_query($connection, $mydb);
    echo 3;
}
function editItem()
{
    $p_id = $_POST['id'];
    $pro_quantity = $_POST['quty'];
    global $connection;
    $update3= "UPDATE `carts` SET `no_of_products`='$pro_quantity' where cart_id='$p_id'";
    $result=mysqli_query($connection, $update3);
    echo 4;
}
function addCoupon()
{
    if (isset($_SESSION['u_id'])) {
        global  $connection;
        $u_id=$_SESSION['u_id'];
        $coupon=    $_POST['coupon'];
        $sql="SELECT * FROM `coupon` where coupon_name='$coupon'";
        $result=mysqli_query($connection, $sql);
        $res =  mysqli_num_rows($result);
        if ($res > 0) {
            echo 5;
        } else {
            $p_id=$_POST['id'];
            $u_id=$_SESSION['u_id'];
            $sql = "INSERT INTO  `wishlists`(u_id,p_id) VALUES('$u_id','$p_id')";
            $result=mysqli_query($connection, $sql);
            echo 1;
        }
    } else {
        echo 0;
    }
}




function showData()
{
    global $conn;
    $sql = "SELECT * from products";
    $result = mysqli_query($conn, $sql);
    $ouput = "";
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $date = date('d M, Y', strtotime(
                $row['pro_date']
            ));
            $ouput .= "<tr class='text-center border-dark'>
             <td>{$row["name"]}</td> 
             <td>{$row["price"]}</td>   
               <td>{$row["quantity"]}
               <td>{$date}
             <td><button class='edit-btn btn-sm bg-success text-light' style='border-radius:10px;padding:6px;' data-eid='{$row["p_id"]}'>Edit</button></td> 
            <td><button class='delete-btn btn-sm bg-danger text-light' style='border-radius:10px;padding:6px;' data-id='{$row["p_id"]}'>Delete</button></td>    
            </td>      
             </tr>";
        }
        $ouput .= '</table>';
        echo $ouput;
    } else {
        echo "result no found";
    }
}