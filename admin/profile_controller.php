<?php
require_once("includes/db_connect.php");
session_start();
$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';
switch ($action) {
    case 'login':
        doLogin();
        break;
        case 'edit':
        profileedit();
            break;
}

function doLogin()
{
    $emailErr = $passwordErr = $wrongErr = "";
    $errors = array();
    $valid = true;

    //email validation
    if ($_POST['email'] == '') {
        $emailErr = "Email Fieled is required";
        $errors['email'] = $emailErr;

        $valid = false;
    } else {
        if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            $email = $_POST['email'];
        } else {
            $emailErr = "Enter a valid email";
            $errors['email'] = $emailErr;
            $valid = false;
        }
    }

    //password validation
    if ($_POST['password'] == '') {
        $passwordErr = "password Fieled is required";
        $errors['password'] = $passwordErr;

        $valid = false;
    } else {
        if (strlen($_POST['password']) > 4) {
            $password =$_POST['password'];
        } else {
            $passwordErr = "Enter at least 5 character";
            $errors['password'] = $passwordErr;
            $valid = false;
        }
    }
    if ($valid) {
        $errors = array();
        global $connection;
        $query = "SELECT id,name FROM `admin`  WHERE email='$email' && password='$password'";
        $result = mysqli_query($connection, $query);
        $res =  mysqli_num_rows($result);
        if ($res > 0) {
            $errors = 0;
            $id = mysqli_fetch_array($result);
            $_SESSION['admin_id'] = $id[0];
            $_SESSION['name'] = $id[1];
            $_SESSION['successmsg']="successfully Login";
        } else {
            $wrongErr = "wrong email or password!";
            $errors['u_error'] = $wrongErr;
        }
    }

    echo json_encode($errors);
}

function profileedit()
{
    global $connection;
    if (isset($_POST['save'])) {
        $id=$_POST["id"];
        $name=$_POST["name"];
        $email=$_POST["email"];
        $sql="UPDATE `admin` SET `name`='$name' ,`email`='$email' where id='$id'";
        $result=mysqli_query($connection, $sql);
        header("Location:login.php");
        $_SESSION['successmsg']="Profile Successfully Updated";
    }
}