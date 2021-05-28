<?php
$conn = mysqli_connect("localhost", "root", "", "sportsrus");

// Check connection
if ($conn === false) {
    die("ERROR: Could not connect. "
        . mysqli_connect_error());
}

// Taking all 5 values from the form data(input)
$first_name = $_REQUEST['first_name'];
$last_name = $_REQUEST['last_name'];
$city = $_REQUEST['city'];
$phone = $_REQUEST['phone'];
$email = $_REQUEST['email'];
$password = $_REQUEST['password'];

// Performing insert query execution
$sql = "INSERT INTO user(f_name, l_name, phno, email_id, city, password) VALUES ('$first_name', '$last_name', '$phone', '$email', '$city', '$password')";

if (mysqli_query($conn, $sql)) {
    echo "<h3>data stored in a database successfully."
        . " Please browse your localhost php my admin"
        . " to view the updated data</h3>";
} else {
    echo "ERROR: Hush! Sorry $sql. "
        . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
?>
