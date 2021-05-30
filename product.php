<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "sportsrus");

// Check connection
if ($conn === false) {
    die("ERROR: Could not connect. "
        . mysqli_connect_error());
}

// Taking all 5 values from the form data(input)
$prod_name = $_REQUEST['prod_name'];
$prod_price = $_REQUEST['prod_price'];
$prod_desc= $_REQUEST['prod_desc'];
$prod_img = $_REQUEST['prod_img'];
$prod_ctg = $_REQUEST['prod_ctg'];
$user_id = "SELECT user_id FROM user WHERE email_id='{$_SESSION['email_id']}'";
$user_result = mysqli_query($conn, $user_id);
$uid = mysqli_fetch_assoc($user_result)["user_id"];


// Performing insert query execution
$sql = "INSERT INTO product(p_name, p_price, p_details, p_image, user_id, category_id) VALUES ('$prod_name', '$prod_price', '$prod_desc','$prod_img', '$uid', '$prod_ctg')";

if (mysqli_query($conn, $sql)) {
    header('location: index.php');
} else {
    echo "ERROR: Hush! Sorry $sql. "
        . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
?>
