<?php 
	session_start();
	$conn = mysqli_connect("localhost", "root", "", "sportsrus") or die("Could not connect to DB");
	$query = "SELECT * FROM user WHERE email_id='{$_SESSION['email_id']}'";
	$result_login = mysqli_query($conn, $query);
	$ro = mysqli_fetch_assoc($result_login);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <title>sportsrus</title>
        <link href="style.css" rel="stylesheet" type="text/css" />
        <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Catamaran:wght@600&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Zen+Dots&display=swap" rel="stylesheet">
		<!--<link href="imageStyles.css" rel="stylesheet" type="text/css" />-->
    </head>
    
    <body>
    <script src="script.js">

    </script>

    <!--HEADER-->
    <header class="text-gray-600 body-font">
        <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
            <nav class="flex lg:w-2/5 flex-wrap items-center text-base md:ml-auto">
                <a href="index.php" class="mr-5 hover:text-gray-900">Our Vision</a>
                <a href="team.php" class="mr-5 hover:text-gray-900">Our Team</a>
                <a href="marketplace.php" class="mr-5 hover:text-gray-900">Marketplace</a>
				<a href="contact.php" class="mr-5 hover:text-gray-900">Contact Us</a>
            </nav>
            <a href="index.html" style="font-family: 'Zen Dots', cursive;" class="order-first lg:order-none lg:w-1/5 title-font font-medium items-center text-gray-900 lg:items-center lg:justify-center mb-4 md:mb-0">
                <span style="font-size: 40px;" class="ml-3 text-xl md:text-lg">SportsRUs</span>
            </a>
            <div class="lg:w-2/5 inline-flex lg:justify-end ml-5 lg:ml-0">
			<?php if(isset($_SESSION['first_name'])) { ?>
			<button class="inline-flex items-center bg-gray-100 border-0 mr-1 py-1 px-3 focus:outline-none hover:bg-gray-200 text-base mt-4 md:mt-0 rounded"><a href="sellerform.php">Sell Some Stuff!</a>
            <path d="M5 12h14M12 5l7 7-7 7"></path>
            </button>
			<button class="inline-flex items-center bg-gray-100 border-0 py-1 px-3 focus:outline-none hover:bg-gray-200 text-base mt-4 md:mt-0 rounded"><a href="profile.php"><?php echo $_SESSION['first_name'] ?>'s Profile</a>
			<?php } else { ?>
            <button class="inline-flex items-center bg-gray-100 border-0 py-1 px-3 focus:outline-none hover:bg-gray-200 text-base mt-4 md:mt-0 rounded"><a href="signup.html">Login | Sign Up</a>
            <?php } ?>
                    <path d="M5 12h14M12 5l7 7-7 7"></path>
                </button>
            </div>
        </div>
    </header>
	
	<div class="flex flex-wrap w-full mb-20 flex-col items-center text-center">
      <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">Cardio & Calisthenics</h1>
      <p class="lg:w-1/2 w-full leading-relaxed text-gray-700">Buy second-hand cardio & calisthenics equipment here.</p>
    </div>
	
	<?php
	
	$sql = "SELECT * FROM product where category_id =200008";
	$result=$conn->query($sql);
	if($result->num_rows>0)
	{
		while($row = $result->fetch_assoc())
		{?>
			<section class="text-gray-600 body-font">
			<div class="container mx-auto flex px-5 py-24 items-center justify-center flex-col">
			<?php echo '<img width="400" height="400" class="object-cover object-center rounded" alt="hero" src="data:image/jpeg;base64,'.base64_encode($row['p_image']).'"/>'; ?>
			<div class="text-center lg:w-2/3 w-full">
			<h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900"><?php echo $row['p_name']; ?></h1>
			<p class="mb-8 leading-relaxed"><?php echo $row['p_price']; ?></p>
			<div class="flex justify-center">
				<form method="get" action="prodinfo.php">
					<input type="hidden" name="varname" value="<?php echo $row['product_id'] ?>">
					<button type="submit" name="request" class="inline-flex text-white bg-black border-0 py-2 px-6 focus:outline-none rounded text-lg">View Product</button>
				</form>
			</div>
			</div>
			</div>
			</section>
		<?php
		}?>
		<?php
	}
?>

<!--FOOTER-->
    <footer class="text-gray-600 body-font">
        <div class="container px-5 py-8 mx-auto flex items-center sm:flex-row flex-col">
            <a class="flex title-font font-medium items-center md:justify-start justify-center text-gray-900">
                <!-- <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10 text-white p-2 bg-indigo-500 rounded-full" viewBox="0 0 24 24">
                  <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
                </svg> -->
                <span class="ml-3 text-xl"></span>
            </a>
            <p class="text-sm text-gray-500 sm:ml-4 sm:pl-4 sm:border-l-2 sm:border-gray-200 sm:py-2 sm:mt-0 mt-4">?? 2020 SportsRUs ???
                <a class="text-gray-600 ml-1" rel="noopener noreferrer" target="_blank">@nodebs</a>
            </p>
            <span class="inline-flex sm:ml-auto sm:mt-0 mt-4 justify-center sm:justify-start">
            <a class="text-gray-500">
              <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
              </svg>
            </a>
            <a class="ml-3 text-gray-500">
              <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"></path>
              </svg>
            </a>
            <a class="ml-3 text-gray-500">
              <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
                <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"></path>
              </svg>
            </a>
            <a class="ml-3 text-gray-500">
              <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="0" class="w-5 h-5" viewBox="0 0 24 24">
                <path stroke="none" d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"></path>
                <circle cx="4" cy="4" r="2" stroke="none"></circle>
              </svg>
            </a>
          </span>
        </div>
    </footer>
    </body>
</html>
