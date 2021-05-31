<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>SportsRUs</title>
    <link href="style.css" rel="stylesheet" type="text/css"/>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Catamaran:wght@600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Zen+Dots&display=swap" rel="stylesheet">
</head>

<body>

<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "sportsrus") or die("Could not connect to DB"); 

$email = $_POST['email'];
$pass = $_POST['password'];

$query_code = "SELECT * FROM user WHERE email_id='{$email}'";
$result_login = mysqli_query($conn, $query_code);
$row = mysqli_fetch_assoc($result_login);
$verify = password_verify($pass, $row["password"]);

if ((mysqli_num_rows($result_login) > 0)) {
	if($verify) 
	{	
		$_SESSION['first_name'] = $row["f_name"];
		$_SESSION['email_id'] = $row["email_id"];
		$_SESSION['db'] = $conn;
		$_SESSION['success'] = "Successfully logged in!";	
		header('location: index.php');
	}	
	else {
    echo '<div text-center class="min-h-screen">';
        echo '<div class="fixed h-screen w-screen flex items-center justify-center">';
            echo '<div class="absolute inset-0 bg-gray-200 z-10"> </div>';
            echo '<div text-center items-center class="max-w-xl w-full bg-white shadow-lg z-50 rounded-lg overflow-hidden">';
                echo '<div class="p-4  space-x-4 md:flex-row flex-col md:text-center text-center items-center">';
                    echo '<div text-center>';
                        echo '<h1 class="text-xl font-semibold tracking-wide text-indigo-700 text-center">Your password seems to be incorrect</h1>';
                        echo '<p class="text-gray-500 text-center">Try logging in again maybe?</p>';
                    echo '</div>';
                echo '</div>';
                echo '<div class="p-3 bg-gray-50 text-center md:space-x-4 md:block flex flex-col-reverse">';
                    echo '<form>';
                        echo '<button formaction="index.php" class="mr-2 px-4 md:py-1.5 py-2 bg-white border-2 rounded-lg focus:ring-offset-2 focus:outline-none focus:ring-2 focus:ring-blue-800 hover:bg-gray-50"> No thanks! </button>';
						echo '<button formaction="login.html" class="mr-2 px-4 md:py-1.5 py-2 bg-white border-2 rounded-lg focus:ring-offset-2 focus:outline-none focus:ring-2 focus:ring-blue-800 hover:bg-gray-50"> Log In Again </button>';
                    echo '</form>';
                echo '</div>';
            echo '</div>';
        echo '</div>';
    echo '</div>';
}
} else {
    echo '<div class="min-h-screen">';
        echo '<div class="fixed h-screen w-screen flex items-center justify-center">';
            echo '<div class="absolute inset-0 bg-gray-200 z-10"> </div>';
            echo '<div class="max-w-xl w-full bg-white shadow-lg z-50 rounded-lg overflow-hidden">';
                echo '<div class="p-4  space-x-4 md:flex-row flex-col md:text-left text-center items-center">';
                    echo '<div>';
                        echo '<h1 class="text-xl font-semibold tracking-wide text-indigo-700 text-center">Have you signed up yet?</h1>';
                        echo '<p class="text-gray-500 text-center"> We can\'t seem to find you on our database. Start your journey with us by signing up! </p>';
                    echo '</div>';
                echo '</div>';
                echo '<div class="p-3 bg-gray-50 text-center md:space-x-4 md:block flex flex-col-reverse">';
                    echo '<form>';
                        echo '<button formaction="index.php" class="mr-2 px-4 md:py-1.5 py-2 bg-white border-2 rounded-lg focus:ring-offset-2 focus:outline-none focus:ring-2 focus:ring-blue-800 hover:bg-gray-50"> No thanks! </button>';
						echo '<button formaction="login.html" class="mr-2 px-4 md:py-1.5 py-2 bg-white border-2 rounded-lg focus:ring-offset-2 focus:outline-none focus:ring-2 focus:ring-blue-800 hover:bg-gray-50"> Log In Again </button>';
                        echo '<button formaction="signup.html" class="mb-2 md:mb-0 px-4 md:py-1.5 py-2 bg-indigo-700 text-white rounded-lg focus:ring-offset-2 focus:outline-none focus:ring-2 focus:ring-indigo-800 hover:bg-indigo-800"> Sign Up </button>';
                    echo '</form>';
                echo '</div>';
            echo '</div>';
        echo '</div>';
    echo '</div>';
}
?>

</body>
</html>
