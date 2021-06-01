<?php 
	session_start();
	$conn = mysqli_connect("localhost", "root", "", "sportsrus") or die("Could not connect to DB");
	$pid = $_GET['varname']; 
	$q_pname = "SELECT * FROM product WHERE product_id = '{$pid}'";
	$g_pname = mysqli_query($conn, $q_pname);
	$pname = mysqli_fetch_assoc($g_pname);
	$q1 = "SELECT * FROM user WHERE email_id = '{$_SESSION['email_id']}'";
	$uid = mysqli_query($conn, $q1);
	$row = mysqli_fetch_assoc($uid);
	$q2 = "SELECT b.* FROM product p, request b WHERE p.product_id = '{$pid}' and p.product_id = b.product_id and p.user_id = '{$row['user_id']}'";
	$bid = mysqli_query($conn, $q2);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <title>sportsRus</title>
        <link href="style.css" rel="stylesheet" type="text/css" />
        <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Catamaran:wght@600&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Zen+Dots&display=swap" rel="stylesheet">
    </head>
    
    <body>
	<!--HEADER-->
	<header class="text-gray-600 body-font">
		<div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
			<nav class="flex lg:w-2/5 flex-wrap items-center text-base md:ml-auto"> <a href="index.php" class="mr-5 hover:text-gray-900">Our Vision</a> <a href="team.php" class="mr-5 hover:text-gray-900">Our Team</a> <a href="marketplace.php" class="mr-5 hover:text-gray-900">Marketplace</a> <a href="contact.php" class="mr-5 hover:text-gray-900">Contact Us</a> </nav>
			<a href="index.php" style ="font-family: 'Zen Dots', cursive;" class="flex order-first lg:order-none lg:w-1/5 title-font font-medium items-center text-gray-900 lg:items-center lg:justify-center mb-4 md:mb-0"> <span style="font-size: 40px;" class="ml-3 text-xl">SportsRUs</span> </a>
			<div class="lg:w-2/5 inline-flex lg:justify-end ml-5 lg:ml-0">
			<?php if(isset($_SESSION['first_name'])) { ?>
			<button class="inline-flex items-center bg-gray-100 border-0 mr-1 py-1 px-3 focus:outline-none hover:bg-gray-200 text-base mt-4 md:mt-0 rounded"><a href="sellerform.php">Sell Some Stuff!</a>
            <path d="M5 12h14M12 5l7 7-7 7"></path>
            </button>
			<button class="inline-flex items-center bg-gray-100 border-0 py-1 px-3 focus:outline-none hover:bg-gray-200 text-base mt-4 md:mt-0 rounded"><a href="profile.php"><?php echo $_SESSION['first_name'] ?>'s Profile</a>
			<?php } else { ?>
            <button class="inline-flex items-center bg-gray-100 border-0 py-1 px-3 focus:outline-none hover:bg-gray-200 text-base mt-4 md:mt-0 rounded"><a href="signup.html">Login | Sign Up</a>
            <?php } ?>
			<? endif; ?>
			<path d="M5 12h14M12 5l7 7-7 7"></path>
          </button>
			</div>
	</header>
	<h2 style="font-size: 30px;" class="lg:text-center mt-8 mb-3 text-xl font-semibold tracking-widest text-black uppercase title-font">Requests for <?php echo $pname['p_name'] ?></h2>
	
<?php
//$conn = mysqli_connect("localhost","root","","sportsrus");

{
	while($r = mysqli_fetch_assoc($bid))
	{  
		$query = "SELECT * FROM user WHERE user_id = '{$r['user_id']}'";
		$result = mysqli_query($conn, $query);  
		$row = mysqli_fetch_assoc($result);    ?>  
		<section class="text-gray-600 body-font">
  <div class="container px-5 py-5 mx-auto flex items-center md:flex-row flex-col">
    <div class="flex flex-col md:pr-10 md:mb-0 mb-6 pr-0 w-full md:w-auto md:text-left text-center">
      <h1 class="md:text-4xl text-2xl font-medium title-font text-gray-900"><?php echo $row['f_name'] . " " . $row['l_name']?></h1>
	  <h1 class="md:text-2xl text-1xl text-xs text-indigo-500 tracking-widest font-medium title-font mb-1"><?php echo $row['phno'] ?></h1>
	  <h1 class="md:text-2xl text-1xl text-xs text-indigo-500 tracking-widest font-medium title-font mb-1"><?php echo $row['email_id'] ?></h1>
	  <h1 class="md:text-2xl text-1xl text-xs text-indigo-500 tracking-widest font-medium title-font mb-1"><?php echo $row['city'] ?></h1>
    </div>
  </div>
</section>
	<?php }
}
mysqli_close($conn);
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
        <p class="text-sm text-gray-500 sm:ml-4 sm:pl-4 sm:border-l-2 sm:border-gray-200 sm:py-2 sm:mt-0 mt-4">© 2020 SportsRUs —
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