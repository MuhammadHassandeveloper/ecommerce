<?php
require_once("admin/includes/db_connect.php");
session_start();
$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';
switch ($action) {
    case 'add':
        addUser();
        break;
        case 'edit':
        editProfile();
        break;
    case 'login':
    doLogin();
        break;
}
function addUser()
{
    global $connection;
    if (isset($_POST['save'])) {
        $valid = true;
        $name  = $phone = $email = $password = "";
        //name validation
        if ($_POST['name'] == '') {
            $valid = false;
            $_SESSION['nameErr']= "Name Fieled is required";
        } else {
            if (preg_match("/^[a-zA-Z-' ]*$/", $_POST['name'])) {
                $name = $_POST['name'];
            } else {
                $valid = false;
                $_SESSION['nameErr'] = "Only letters or characetrs are allowed";
            }
        }
        
        //email validation
        if ($_POST['email'] == '') {
            $valid = false;
            $_SESSION['emailErr'] = "Email Fieled is required";
        } else {
            if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
                $email = $_POST['email'];
                $query = "SELECT * from users where email='$email'";
                $res = mysqli_query($connection, $query);
                $result = mysqli_num_rows($res);
                if ($result > 0) {
                    $valid = false;
                    $_SESSION['emailErr'] = "Email already Exist";
                } else {
                    $email = $_POST['email'];
                }
            } else {
                $valid = false;
                $_SESSION['emailErr'] = "Enter a valid email";
            }
        }
        //phone validation

        if ($_POST['phone'] == '') {
            $_SESSION['phoneErr'] = "Phone  Fieled is required";
        } else {
            if (strlen($_POST['phone']) == 11) {
                $phone = $_POST['phone'];
                $query = "SELECT * from users where phone='$phone'";
                $res = mysqli_query($connection, $query);
                $result = mysqli_num_rows($res);
                if ($result > 0) {
                    $valid = false;
                    $_SESSION['phoneErr'] = "Contact Number already Exist";
                } else {
                    $phone = $_POST['phone'];
                }
            } else {
                $valid = false;
                $_SESSION['phoneErr'] = "Must Enter 11 integers";
            }
        }
        //password validation
        if ($_POST['password'] == '') {
            $_SESSION['passwordErr'] = "password Fieled is required";
        } else {
            if (strlen($_POST['password'])> 4) {
                $password = $_POST['password'];
            } else {
                $_SESSION['passwordErr'] = "Enter at least 5 characters";
                $valid = false;
            }
        }
        if ($valid) {
            $query = "INSERT INTO `users`(`name`,`phone`,`email`,`password`) VALUES('$name','$phone','$email','$password')";
            $result = mysqli_query($connection, $query);
            header("Location:u_login.php");
            $_SESSION['successmsg']="User Successfully Signup";
        } else {
            header("Location:u_signup.php");
        }
    }
}

function editProfile()
{
    if (isset($_POST['save'])) {
        global $connection;
        $id=$_POST['u_id'];
        $name=$_POST['name'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $sql="UPDATE users SET name='$name',email='$email',password='$password' where u_id='$id'";
        $result=mysqli_query($connection, $sql);
        header("Location:u_login.php");
        $_SESSION['successmsg']="Profile  Successfully Updated";
    }
}


function doLogin()
{
    global $connection;
    if (isset($_POST['save'])) {
        $valid = true;
        //   $email=$_POST['email'];
        //   $password=$_POST['password'];

        //email validation
        if ($_POST['email'] == '') {
            $_SESSION['emailErr']  = "Email Fieled is required";
        } else {
            if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
                $email = $_POST['email'];
            } else {
                $_SESSION['emailErr']  = "Enter a valid email";
                $valid = false;
            }
        }

        //password validation
        if ($_POST['password'] == '') {
            $_SESSION['passwordErr']  = "password Fieled is required";
        } else {
            if (strlen($_POST['password']) >4) {
                $password = $_POST['password'];
            } else {
                $_SESSION['passwordErr']  = "Enter at least 5 characters";
                $valid = false;
            }
        }
        if ($valid) {
            $query = "SELECT u_id,name FROM users  WHERE email='$email' && password='$password'";
            $result = mysqli_query($connection, $query);
            $res =  mysqli_num_rows($result);
            echo $res;
            if ($res > 0) {
                $id = mysqli_fetch_array($result);
                $_SESSION['u_id'] = $id[0];
                $_SESSION['name'] = $id[1];
                header("Location:index.php");
                $_SESSION['successmsg']="User Successfully Login";
            } else {
                header("Location:u_login.php");
                $_SESSION['errormsg']="Email or password wrong";
            }
        }
    }
}