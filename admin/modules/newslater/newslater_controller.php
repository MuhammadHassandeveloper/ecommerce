<?php
require_once("../../includes/db_connect.php");
session_start();
$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';
switch ($action) {
    case 'add':
        insertNews();
        break;
    case 'delete':
    delete();
        break;
}

function insertNews()
{
    global $connection;
    if (isset($_POST['save'])) {
        {
            $valid = true;
            $email= "";
  //email validation
  if ($_POST['email'] == '') {
      $_SESSION['emailErr'] = "Email Fieled is required";
      header("Location:../../../index.php");
  } else {
      if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
          $email = $_POST['email'];
          $query = "SELECT * from newslater where email='$email'";
          $res = mysqli_query($connection, $query);
          $result = mysqli_num_rows($res);
          if ($result > 0) {
              $_SESSION['emailErr'] = "You Already Describe";
              header("Location:../../../index.php");

              $valid = false;
          } else {
              $email = $_POST['email'];
          }
      } else {
          $_SESSION['emailErr'] = "Enter a valid email";
          header("Location:../../../index.php");
          $valid = false;
      }
  }
  if ($valid) {
      $sql = "INSERT INTO  `newslater`(`email`) VALUES('$email')";
      $data=mysqli_query($connection, $sql);
      header("Location:../../../index.php");
      $_SESSION['successmsg']="Thanks For Subscribing";
  }
        }
    }
}


function delete()
{
    global $connection;
    if (isset($_GET['id'])) {
        $id=$_GET['id'];
        $sql="DELETE FROM newslater WHERE n_id='$id'";
        $data=mysqli_query($connection, $sql);
        header("Location:index.php");
        $_SESSION['successmsg']="Successfully Deleted";
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