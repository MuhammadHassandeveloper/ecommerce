<?php
require_once("admin/includes/db_connect.php");
session_start();
if (isset($_SESSION['u_id'])) {
    session_destroy();
    session_start();
    header("Location:u_login.php");
    $_SESSION['successmsg']="User Successfully Logout";
} else {
    header("Location:index.php");
}