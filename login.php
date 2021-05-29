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
$servername = "localhost";
$username = "root";
$password = "";
$db = "sportsrus";
$conn = mysqli_connect($servername, $username, $password, $db);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$email = $_POST['email'];
$pass = $_POST['password'];

$query_code = "SELECT email_id FROM user WHERE email_id='{$email}'";
$result_login = mysqli_query($conn, $query_code);
$anything_found = mysqli_num_rows($result_login);

if ($anything_found > 0) {
    $formOk = false;
    echo '<div class="min-h-screen">';
        echo '<div class="fixed h-screen w-screen flex items-center justify-center">';
            echo '<div class="absolute inset-0 bg-gray-200 z-10"> </div>';
            echo '<div class="max-w-xl w-full bg-white shadow-lg z-50 rounded-lg overflow-hidden">';
                echo '<div class="p-4 flex space-x-4 md:flex-row flex-col md:text-left text-center items-center">';
                    echo '<div>';
                        echo '<h1 class="text-xl font-semibold tracking-wide text-indigo-700">Login Successful!</h1>';
                            echo '<p class="text-gray-500"> Head to your profile by clicking the button below. </p>';
                    echo '</div>';
                echo '</div>';
                echo '<div class="p-3 bg-gray-50 text-right md:space-x-4 md:block flex flex-col-reverse">';
                    echo '<form>';
                        echo '<button formaction="index.html" class="mr-2 px-4 md:py-1.5 py-2 bg-white border-2 rounded-lg focus:ring-offset-2 focus:outline-none focus:ring-2 focus:ring-blue-800 hover:bg-gray-50"> No thanks! </button>';
                        echo '<button formaction="profile.html" class="mb-2 md:mb-0 px-4 md:py-1.5 py-2 bg-indigo-700 text-white rounded-lg focus:ring-offset-2 focus:outline-none focus:ring-2 focus:ring-indigo-800 hover:bg-indigo-800"> My Profile </button>';
                    echo '</form>';
                echo '</div>';
            echo '</div>';
        echo '</div>';
    echo '</div>';
} else {
    echo '<div class="min-h-screen">';
        echo '<div class="fixed h-screen w-screen flex items-center justify-center">';
            echo '<div class="absolute inset-0 bg-gray-200 z-10"> </div>';
            echo '<div class="max-w-xl w-full bg-white shadow-lg z-50 rounded-lg overflow-hidden">';
                echo '<div class="p-4 flex space-x-4 md:flex-row flex-col md:text-left text-center items-center">';
                    echo '<div>';
                        echo '<h1 class="text-xl font-semibold tracking-wide text-indigo-700">Have you signed up yet?</h1>';
                        echo '<p class="text-gray-500"> We can\'t seem to find you on our database. Start your journey with us by signing up! </p>';
                    echo '</div>';
                echo '</div>';
                echo '<div class="p-3 bg-gray-50 text-right md:space-x-4 md:block flex flex-col-reverse">';
                    echo '<form>';
                        echo '<button formaction="index.html" class="mr-2 px-4 md:py-1.5 py-2 bg-white border-2 rounded-lg focus:ring-offset-2 focus:outline-none focus:ring-2 focus:ring-blue-800 hover:bg-gray-50"> No thanks! </button>';
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
