<?php 
	session_start();
	$conn = mysqli_connect("localhost", "root", "", "sportsrus") or die("Could not connect to DB");
	$pid = $_GET['varname'];
	$_SESSION['pid']=$pid;
	//echo $_SESSION['pid'];
	$query = "SELECT * FROM user WHERE email_id='{$_SESSION['email_id']}'";
	//$query = "SELECT * FROM user WHERE user_id='{$_SESSION['sid']}'"
	$r = mysqli_query($conn, $query);
	$ro = mysqli_fetch_assoc($r);
	$q= "SELECT * FROM request where product_id= '$pid' and user_id = '{$ro['user_id']}'";
	$ru=mysqli_query($conn,$q);
	$exist = mysqli_fetch_assoc($ru);
?>
 
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <title>SportRUs</title>
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
			<path d="M5 12h14M12 5l7 7-7 7"></path>
          </button>
			</div>
	</header>
    
	<?php
	$product_id = "SELECT * FROM product WHERE product_id='{$pid}'";
	$product_result = mysqli_query($conn, $product_id);
	$row = mysqli_fetch_assoc($product_result);
	$_SESSION['sid']=$row['user_id'];
	$seller_id="SELECT * FROM user WHERE user_id='{$_SESSION['sid']}'";
	$seller_result=mysqli_query($conn, $seller_id);
	$sow=mysqli_fetch_assoc($seller_result);
	$uid = $_SESSION['user_id'];
	//$query = "SELECT * FROM user WHERE user_id='{$_SESSION['sid']}'"
	//$r = mysqli_query($conn, $query);
	//$ro = mysqli_fetch_assoc($r);
	?>
    <section class="text-gray-600 body-font overflow-hidden">
      <div class="container px-5 py-24 mx-auto">
        <div class="lg:w-4/5 mx-auto flex flex-wrap">
		
          <div class="lg:w-1/2 w-full lg:pr-10 lg:py-6 mb-6 lg:mb-0">
		  
			<h1 class="text-gray-900 text-3xl title-font font-medium mb-1"><?php echo $row['p_name']; ?></h1>
            <h2 class="text-sm title-font text-gray-500 tracking-widest mb-4"><?php echo $row['category_id']; ?></h2>
            <div class="flex mb-4">
              <a id="descheader" class="flex-grow text-black border-b-2 border-black py-2 text-lg px-1" href="#" onclick="descfunc()">Description</a>
              <a id="sellheader" class="flex-grow border-b-2 border-gray-300 py-2 text-lg px-1" href="#" onclick="sellfunc()">Seller Info</a>
              <!--<a class="flex-grow border-b-2 border-gray-300 py-2 text-lg px-1">Details</a>-->
            </div>
            <p id="sell"><?php echo $row['p_details']; ?></p>
            <br>
            <br>
            <script>
                function sellfunc()
                {
                    document.getElementById("sellheader").style.color="black";
                    document.getElementById("descheader").style.color="gray";
					fn='<?php echo $sow['f_name']; ?>';
                    //document.getElementById("sell").innerHTML=pstr;
					ln='<?php echo $sow['l_name']; ?>';
					shity='<?php echo $sow['city']; ?>';
					pho='<?php echo $sow['phno']; ?>';
					ed='<?php echo $sow['email_id']; ?>';
					var pstr= 'Seller Name: ' + fn + ' ' + ln + '<br>' + 'Phone Number: ' + pho + '<br>' + 'Email Id: ' + ed + '<br>' + 'City: ' + shity;
                    document.getElementById("sell").innerHTML=pstr;
                    document.getElementById("sellheader").style.borderColor="black";
                    document.getElementById("descheader").style.borderColor="#e2e8f0";
                }
                function descfunc()
                {
                    document.getElementById("sellheader").style.color="gray";
                    document.getElementById("descheader").style.color="black";
					pstr='<?php echo $row['p_details']; ?>';
                    document.getElementById("sell").innerHTML=pstr;
                    document.getElementById("sellheader").style.borderColor="#e2e8f0";
                    document.getElementById("descheader").style.borderColor="black";
                }
            </script>
                
            <!--<div class="flex border-t border-gray-200 py-2">
              <span class="text-gray-500">Color</span>
              <span class="ml-auto text-gray-900">Blue</span>
            </div>
            <div class="flex border-t border-gray-200 py-2">
              <span class="text-gray-500">Size</span>
              <span class="ml-auto text-gray-900">Medium</span>
            </div>
            <div class="flex border-t border-b mb-6 border-gray-200 py-2">
              <span class="text-gray-500">Quantity</span>
              <span class="ml-auto text-gray-900">4</span>
            </div>-->
            
            <div class="flex">
              <span class="title-font font-medium text-2xl text-gray-900">Price: <?php echo $row['p_price']; ?></span>
			  <?php if($exist['user_id']) { ?>
              <button class="flex ml-auto font-semibold text-white bg-black hover:text-blackborder-0 py-2 px-6 items-center justify-center focus:outline-none rounded" href="request.php">
              <a id="req" href="#" onclick="func()">Requested</a></button>
			  <?php } else { ?>
			  <button class="flex ml-auto font-semibold text-white bg-black hover:text-blackborder-0 py-2 px-6 items-center justify-center focus:outline-none rounded" href="request.php">
              <a id="req" href="#" onclick="func()">Request</a></button>
			  <?php } ?>
			  <script>
				function func()
				{
					//document.getElementById("req").innerHTML="Requested";
				  <?php
					$sqli="INSERT INTO request(user_id,product_id) VALUES ($uid,$pid)";
					mysqli_query($conn,$sqli);
					?>
	}</script>
              <!--<button class="rounded-full w-10 h-10 bg-gray-200 p-0 border-0 inline-flex items-center justify-center text-gray-500 ml-4">
                <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                  <path d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z"></path>
                </svg>
              </button>-->
			  
            </div>
          </div>
		  
		  <?php /*while ($ro=mysqli_fetch_array($r))
		  {
			 
			?> 
			 <?php
			 //echo $ro['p_image'];
			/*?><img src="<?php echo $ro['p_image']; ?>" height="400" width="400"><?php
		  }?>*/
		  //echo '<img src="data:image/jpg;base64,'.base64_encode($ro['p_image']).'">';}*/
		  ?>
		  <?php echo '<img class="lg:w-1/2 w-full lg:h-auto h-6 object-cover object-center rounded" alt="hero" src="data:image/jpeg;base64,'.base64_encode($row['p_image']).'"/>'; ?>
         </div>
      </div>
    </section>
    
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
