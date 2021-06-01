<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "sportsrus") or die("Could not connect to DB"); 
$pid = $_GET['varname']; 
?>

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

    echo '<div text-center class="min-h-screen">';
        echo '<div class="fixed h-screen w-screen flex items-center justify-center">';
            echo '<div class="absolute inset-0 bg-gray-200 z-10"> </div>';
            echo '<div text-center items-center class="max-w-xl w-full bg-white shadow-lg z-50 rounded-lg overflow-hidden">';
                echo '<div class="p-4  space-x-4 md:flex-row flex-col md:text-center text-center items-center">';
                    echo '<div text-center>';
                        echo '<h1 class="text-xl font-semibold tracking-wide text-indigo-700 text-center">Yay! We\'re glad to have been of help!</h1>';
                        echo '<p class="text-gray-500 text-center">Now that you\'ve sold your product, we\'ll be deleting the product from our database. Can we continue?</p>';
                    echo '</div>';
                echo '</div>';
                echo '<div class="p-3 bg-gray-50 text-center md:space-x-4 md:block flex flex-col-reverse">';
                    echo '<form method="get" action="delete.php">';  
					?>
						<input type="hidden" name="varname" value="<?php echo $row['product_id'] ?>">
						<?php
                        echo '<button formaction="my_items_on_sale.php" class="mr-2 px-4 md:py-1.5 py-2 bg-white border-2 rounded-lg focus:ring-offset-2 focus:outline-none focus:ring-2 focus:ring-blue-800 hover:bg-gray-50">Go Back</button>';
						echo '<button type="submit" class="mr-2 px-4 md:py-1.5 py-2 bg-white border-2 rounded-lg focus:ring-offset-2 focus:outline-none focus:ring-2 focus:ring-blue-800 hover:bg-gray-50">Delete Product</button>';
                    echo '</form>';
                echo '</div>';
            echo '</div>';
        echo '</div>';
    echo '</div>';
	
	
?>
</body>
</html>