<?php
require '../../includes/db_connect.php';

$cat_id=$_GET['id'];

$query=$connection->query("SELECT sub_name,sub_id from `sub_categories` where `cat_id`='$cat_id'");
$result=array();

while ($row=$query->fetch_assoc()) {
    array_push($result, $row);
}

echo json_encode($result);