<?php
require_once("../../includes/db_connect.php");
session_start();
$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';
switch ($action) {
    case 'add':
        insertBrand();
        break;
        case 'edit':
        editBrand();
        break;
    case 'delete':
    deleteBrand();
        break;
}

function insertBrand()
{
    global $connection;
    if (isset($_POST['save'])) {
        if ($_POST["b_name"]=="") {
            header("Location:index.php");
            $_SESSION['errormsg']="All fields are required";
        } else {
            $b_name = $_POST["b_name"];
            $img = $_FILES['b_logo'];
            $target_dir = "../../media/brands/";
            $target_file = $target_dir   . basename($img["name"]);
    
            $uploadOk = 1;
            $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
            if (
                $imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpeg"
                || $imageFileType == "gif"
            ) {
                $file = time() . "-" . basename($img["name"]);
                $target_file = $target_dir  . $file;
                move_uploaded_file($img['tmp_name'], $target_file);
                $file = str_replace("'", "''", "$file");
            }
            $sql = "INSERT INTO  `brands`(`b_name`,`b_logo`) VALUES('$b_name','$file')";
            $data=mysqli_query($connection, $sql);
            header("Location:index.php");
            $_SESSION['successmsg']="Brand Successfully Added";
        }
    }
}

function editBrand()
{
    global $connection;
    if (isset($_POST['save'])) {
        $id=$_POST["b_id"];
        $name=$_POST["b_name"];
        // edit image
        if ($_FILES['b_logo']['name']) {
            $sql="SELECT `b_logo` FROM `brands` where `b_id`='$id'";
            $img=mysqli_query($connection, $sql);
            $img=mysqli_fetch_object($img);
            $filename = $img->b_logo;
            $path ="../../media/brands/". $filename;

            if (file_exists($path) && is_readable($path)) {
                unlink($path);
            }
            $img = $_FILES['b_logo'];
            $target_dir = "../../media/brands/";
            $target_file = $target_dir   . basename($img["name"]);
            $uploadOk = 1;
            $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

            if (
            $imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpeg"
            || $imageFileType == "gif"
        ) {
                $file = time() . "-" . basename($img["name"]);
                $target_file = $target_dir  . $file;
                move_uploaded_file($img['tmp_name'], $target_file);
            }
            $file = str_replace("'", "''", "$file");
            $sql="UPDATE `brands` set `b_name`='$name',`b_logo`='$file' where b_id='$id'";
            $res=mysqli_query($connection, $sql);
        } else {
            $sql="UPDATE `brands` SET `b_name`='$name' where b_id='$id'";
            $result=mysqli_query($connection, $sql);
            header("Location:index.php");
            $_SESSION['successmsg']="Brand Successfully Updated";
        }
    }
}

function deleteBrand()
{
    global $connection;
    if (isset($_GET['id'])) {
        $id=$_GET['id'];
        $sql="SELECT `b_logo` FROM `brands` where `b_id`='$id'";
        $img=mysqli_query($connection, $sql);
        $img=mysqli_fetch_object($img);
        $filename = $img->b_logo;
        $path ="../../media/brands/". $filename;
        if (file_exists($path) && is_readable($path)) {
            unlink($path);
        }
        $sql="DELETE b_logo FROM brands WHERE b_id='$id'";
        $data=mysqli_query($connection, $sql);

        $sql="DELETE FROM brands WHERE b_id='$id'";
        $data=mysqli_query($connection, $sql);
        header("Location:index.php");
        $_SESSION['successmsg']="Brand Successfully Deleted";
    }
}









function dateSearch()
{
    global $conn;
    if (isset($_POST['date1']) && isset($_POST['date2'])) {
        $min = $_POST['date1'];
        $max = $_POST['date2'];
        $sql = "SELECT * FROM products WHERE pro_date BETWEEN '{$min}' AND '{$max}'";
    } else {
        $sql = "SELECT * FROM products ORDER  BY p_id asc";
    }
    $result = mysqli_query($conn, $sql);
    $output = "";
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $dateset = date('d M, Y', strtotime($row['pro_date']));
            $output .= "<tr>
            <td align='center'>{$row['name']}</td> 
            <td align='center'>{$row['price']}</td>   
              <td align='center'>{$row['quantity']}</td>
              <td align='center'>{$dateset}</td>
              </tr>";
        }
        echo $output;
    } else {
        echo "result not found";
    }
}

function slidersearch()
{
    global $conn;
    if (isset($_POST['range1']) && isset($_POST['range2'])) {
        $min = $_POST['range1'];
        $max = $_POST['range2'];
        $sql = "SELECT * FROM rangeslider WHERE age  BETWEEN '{$min}' AND '{$max}'";
    } else {
        $min = '';
        $max = '';
        $sql = "SELECT * FROM rangeslider ORDER  BY id asc";
    }
    $result = mysqli_query($conn, $sql);
    $output = "";
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $output .= "<tr>
            <td align='center'>{$row['name']}</td> 
            <td align='center'>{$row['age']}</td>   
              <td align='center'>{$row['city']}</td>
              </tr>";
        }
        echo $output;
    } else {
        echo "result not found";
    }
}
function autocityload()
{
    global $conn;
    if (isset($_POST['city'])) {
        $search_term = $_POST['city'];
        $sql = "SELECT distinct(city) FROM rangeslider WHERE city LIKE '%{$search_term}' ";
        $result = mysqli_query($conn, $sql);
        $output = "<ul>";
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $output .= "<li align='center'>{$row['city']}</li>";
            }
        } else {
            $output .= "<li>result not found</li>";
        }
        $output = "</ul>";
        echo $output;
    }
}