<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>repl.it</title>
    <link href="style.css" rel="stylesheet" type="text/css"/>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Catamaran:wght@600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Zen+Dots&display=swap" rel="stylesheet">
</head>

<body>
<?php

session_start();
$errors = array();
$conn = mysqli_connect("localhost", "root", "", "sportsrus") or die("Could not connect to DB"); 
$confirm = "";

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
$confirm = $_REQUEST['confirm'];

//check if password = confirm password
if($password != $confirm){
	array_push($errors, "Passwords do not match");
	echo '<div class="min-h-screen">';
        echo '<div class="fixed h-screen w-screen flex items-center justify-center">';
            echo '<div class="absolute inset-0 bg-gray-200 z-10"> </div>';
            echo '<div class="max-w-xl w-full bg-white shadow-lg z-50 rounded-lg overflow-hidden">';
                echo '<div class="p-4  space-x-4 md:flex-row flex-col md:text-left text-center items-center">';
                    echo '<div>';
                        echo '<h1 class="text-xl font-semibold tracking-wide text-indigo-700 text-center">The passwords do not match. Try again.</h1>';
                    echo '</div>';
                echo '</div>';
                echo '<div class="p-3 bg-gray-50 text-center md:space-x-4 md:block flex flex-col-reverse">';
                    echo '<form>';
                        echo '<button formaction="signup.html" class="mr-2 px-4 md:py-1.5 py-2 bg-white border-2 rounded-lg focus:ring-offset-2 focus:outline-none focus:ring-2 focus:ring-blue-800 hover:bg-gray-50"> OK </button>';						
                    echo '</form>';
                echo '</div>';
            echo '</div>';
        echo '</div>';
    echo '</div>';
}

//check if user already exists in the db
$check_query = "select * from user where email_id = '$email' or phno = '$phone' limit 1";

$result = mysqli_query($conn, $check_query);
$user = mysqli_fetch_assoc($result);

if($user)
{
	if(($user['email_id'] === $email) or ($user['phno'] === $phone)){
		array_push($errors, "This email has arleady been registered with us.");
		echo '<div class="min-h-screen">';
        echo '<div class="fixed h-screen w-screen flex items-center justify-center">';
            echo '<div class="absolute inset-0 bg-gray-200 z-10"> </div>';
            echo '<div class="max-w-xl w-full bg-white shadow-lg z-50 rounded-lg overflow-hidden">';
                echo '<div class="p-4  space-x-4 md:flex-row flex-col md:text-left text-center items-center">';
                    echo '<div>';
                        echo '<h1 class="text-xl font-semibold tracking-wide text-indigo-700 text-center">This email ID or phone number already exists</h1>';
                        echo '<p class="text-gray-500 text-center">What do you want to do?</p>';
                    echo '</div>';
                echo '</div>';
                echo '<div class="p-3 bg-gray-50 text-center md:space-x-4 md:block flex flex-col-reverse">';
                    echo '<form>';
                        echo '<button formaction="signup.html" class="mr-2 px-4 md:py-1.5 py-2 bg-white border-2 rounded-lg focus:ring-offset-2 focus:outline-none focus:ring-2 focus:ring-blue-800 hover:bg-gray-50">Go Back</button>';
						echo '<button formaction="login.html" class="mr-2 px-4 md:py-1.5 py-2 bg-white border-2 rounded-lg focus:ring-offset-2 focus:outline-none focus:ring-2 focus:ring-blue-800 hover:bg-gray-50">Log In</button>';
                    echo '</form>';
                echo '</div>';
            echo '</div>';
        echo '</div>';
    echo '</div>';
	}
}

// register if email or phno does no already exists
if(count($errors) === 0)
{
	$pw = password_hash($password, PASSWORD_DEFAULT);
	$sql = "INSERT INTO user(f_name, l_name, phno, email_id, city, password) VALUES ('$first_name', '$last_name', '$phone', '$email', '$city', '$pw')";
	if (mysqli_query($conn, $sql)) 
	{
		$_SESSION['first_name'] = $first_name;
		$_SESSION['email_id'] = $email;
		$_SESSION['db'] = $conn;
		$_SESSION['success'] = "Successfully logged in after sign up!";	
		header('location: index.php');
	} 
}
?>
</body>
</html>