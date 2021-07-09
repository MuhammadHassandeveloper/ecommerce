<?php
session_start();
if (isset($_SESSION['admin_id'])) {
    session_destroy();
    session_start();
    $_SESSION['successmsg']="successfully logout";
    
    header("Location:http://localhost/ecommerce/admin/login.php");
} else {
    header("Location:http://localhost/ecommerce/admin/index.php");
}