<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "sportsrus") or die("Could not connect to DB"); 
$pid = $_GET['varname']; 
$q1 = "DELETE FROM product WHERE product_id = '{$pid}'";
$uid = mysqli_query($conn, $q1);
header('location: my_items_on_sale.php');
echo "Deleted";
?>