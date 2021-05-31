<?php
session_start();

$db = "sportsrus";

$conn = mysqli_connect("localhost", "root", "", "sportsrus");

// Check connection
if ($conn === false) {
    die("ERROR: Could not connect. "
        . mysqli_connect_error());
}
//Taking all 5 values from the form data(input)
$prod_name = $_REQUEST['prod_name'];
$prod_price = $_REQUEST['prod_price'];
$prod_desc= $_REQUEST['prod_desc'];
$prod_img = $_REQUEST['prod_img'];
$prod_ctg = $_REQUEST['prod_ctg'];
$user_id = "SELECT user_id FROM user WHERE email_id='{$_SESSION['email_id']}'";
$user_result = mysqli_query($conn, $user_id);
$uid = mysqli_fetch_assoc($user_result)["user_id"];

//$msg = '';
//if($_SERVER['REQUEST_METHOD']=='POST') {
//    $image = $_FILES['prod_img']['tmp_name'];
//    $img = file_get_contents($image);
//    $con = mysqli_connect('localhost', 'root', '', 'sportsrus') or die('Unable To connect');
//    $sql = "insert into product (p_image) values(?)";
//
//    $stmt = mysqli_prepare($con, $sql);
//
//    mysqli_stmt_bind_param($stmt, "s", $img);
//    mysqli_stmt_execute($stmt);
//
//    $check = mysqli_stmt_affected_rows($stmt);
//    if ($check == 1) {
//        $msg = 'Image Successfully Uploaded';
//    } else {
//        $msg = 'Error uploading image';
//    }
//}

//$prod_img = $_REQUEST['prod_img'];
//$image = $_FILES['prod_img'];
//$fileName = basename($image);
//$fileType = pathinfo($fileName, PATHINFO_EXTENSION);
//$imgContent = addslashes(file_get_contents($fileType));

// Performing insert query execution
$sql = "INSERT INTO product (p_name, p_details, p_price, user_id, category_id) VALUES ('$prod_name', '$prod_desc', '$prod_price', '$uid', '$prod_ctg');";

if (mysqli_query($conn, $sql)) {
    header('location: index.php');
} else {
    echo "ERROR: Hush! Sorry $sql. "
        . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
