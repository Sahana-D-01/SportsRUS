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
    echo '<div class="min-h-screen">';
        echo '<div class="fixed h-screen w-screen flex items-center justify-center">';
            echo '<div class="absolute inset-0 bg-gray-200 z-10"> </div>';
            echo '<div class="max-w-xl w-full bg-white shadow-lg z-50 rounded-lg overflow-hidden">';
                echo '<div class="p-4 flex space-x-4 md:flex-row flex-col md:text-left text-center items-center">';
                    echo '<div>';
                         echo '<h1 class="text-xl font-semibold tracking-wide text-indigo-700">Yay! You\'re all Signed Up!</h1>';
                            echo '<p class="text-gray-500"> Ready to get started? Head to our log in page by clicking the button below. </p>';
                    echo '</div>';
                echo '</div>';
                echo '<div class="p-3 bg-gray-50 text-right md:space-x-4 md:block flex flex-col-reverse">';
                    echo '<form>';
                        echo '<button formaction="index.html" class="mr-2 px-4 md:py-1.5 py-2 bg-white border-2 rounded-lg focus:ring-offset-2 focus:outline-none focus:ring-2 focus:ring-blue-800 hover:bg-gray-50"> No thanks! </button>';
                        echo '<button formaction="login.html" class="mb-2 md:mb-0 px-4 md:py-1.5 py-2 bg-indigo-700 text-white rounded-lg focus:ring-offset-2 focus:outline-none focus:ring-2 focus:ring-indigo-800 hover:bg-indigo-800"> Log In </button>';
                    echo '</form>';
                echo '</div>';
            echo '</div>';
        echo '</div>';
    echo '</div>';
} else {
    echo'<div class="min-h-screen">';
        echo'<div class="fixed h-screen w-screen flex items-center justify-center">';
            echo'<div class="absolute inset-0 bg-gray-200 z-10"> </div>';
            echo'<div class="max-w-xl w-full bg-white shadow-lg z-50 rounded-lg overflow-hidden">';
                echo'<div class="p-4 flex space-x-4 md:flex-row flex-col md:text-left text-center items-center">';
                    echo'<div class="bg-indigo-50 p-3 md:self-start rounded-full">';
                        echo'<svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 fill-current text-indigo-700" width="24" height="24" viewBox="0 0 24 24">';
                        echo'<path d="M12 5.177l8.631 15.823h-17.262l8.631-15.823zm0-4.177l-12 22h24l-12-22zm-1 9h2v6h-2v-6zm1 9.75c-.689 0-1.25-.56-1.25-1.25s.561-1.25 1.25-1.25 1.25.56 1.25 1.25-.561 1.25-1.25 1.25z" /> </svg>';
                    echo'</div>';
                    echo'<div>';
                        echo'<h1 class="text-xl font-semibold tracking-wide text-indigo-700">Oops! Something went wrong!</h1>';
                        echo'<p class="text-gray-500"> Please head back to our sign up page and try submitting it again.</p>';
                    echo'</div>';
                echo'</div>';
                echo'<div class="p-3 bg-gray-50 text-right md:space-x-4 md:block flex flex-col-reverse">';
                    echo '<form>';
                        echo'<button formaction="index.html" class="mr-2 px-4 md:py-1.5 py-2 bg-white border-2 rounded-lg focus:ring-offset-2 focus:outline-none focus:ring-2 focus:ring-blue-800 hover:bg-gray-50"> No thanks! </button>';
                        echo'<button formaction="signup.html" class="mb-2 md:mb-0 px-4 md:py-1.5 py-2 bg-indigo-700 text-white rounded-lg focus:ring-offset-2 focus:outline-none focus:ring-2 focus:ring-indigo-800 hover:bg-indigo-800"> Sign Up </button>';
                    echo '</form>';
                echo'</div>';
            echo'</div>';
        echo'</div>';
    echo'</div>';
}
// Close connection
mysqli_close($conn);
?>

</body>
</html>