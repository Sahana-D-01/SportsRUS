<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "sportsrus") or die("Could not connect to DB"); 
$pid = $_GET['varname'];
echo"hello";
$q1 = "DELETE FROM request WHERE product_id = '{$pid}'";
$uid = mysqli_query($conn, $q1);
$q2 = "DELETE FROM product WHERE product_id = '{$pid}'";
$uid = mysqli_query($conn, $q2);
header('location: my_items_on_sale.php');
echo "Deleted";
?>