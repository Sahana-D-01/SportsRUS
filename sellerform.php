<?php
    session_start();
    $connect = mysqli_connect("localhost", "root", "", "sportsrus");
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>SportsRUs</title>
    <link href="style.css" rel="stylesheet" type="text/css" />
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Catamaran:wght@600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Zen+Dots&display=swap" rel="stylesheet">
    <script src="https://www.dukelearntoprogram.com/course1/common/js/image/SimpleImage.js"></script>
</head>

<body>
<script>
    var image = null;
    function upload() {
    //Get input from file input
    var fileinput = document.getElementById("prod_img");
    //Make new SimpleImage from file input
    image = new SimpleImage(fileinput);
    //Get canvas
    var canvas = document.getElementById("can");
    image.drawTo(canvas);
    }
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

<!--SELLER FORM-->
<section class="text-gray-600 body-font relative">
    <div class="container px-5 py-10 mx-auto">
        <div class="flex flex-col text-center w-full mb-12">
            <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Got Something to Sell?</h1>
            <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Fill up this form and get started on your online business.</p>
        </div>
        <form action="product.php" enctype="multipart/form-data" method="POST">
            <div class="lg:w-1/2 md:w-2/3 mx-auto">
                <div class="flex flex-wrap -m-5">
                    <div class="p-2 w-1/2">
                        <div class="relative">
                            <label for="prod_name" class="block text-base font-medium leading-relaxed text-gray-700">Product Name</label>
                            <input type="text" name="prod_name" id="prod_name" placeholder="Product Name " class="w-full px-4 py-2 mt-2 text-base transition duration-500 ease-in-out transform bg-gray-100 border-transparent rounded-lg focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ext-black focus:border-gray-500" autofocus autocomplete required>
                        </div>
                    </div>
                    <div class="p-2 w-1/2">
                        <div class="relative">
                            <label for="prod_price" class="block text-base font-medium leading-relaxed text-gray-700">Product Price</label>
                            <input type="number" pattern="^\d{0,8}(\.\d{1,4})?$" name="prod_price" id="prod_price" placeholder="Price in INR " class="w-full px-4 py-2 mt-2 text-base transition duration-500 ease-in-out transform bg-gray-100 border-transparent rounded-lg focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ext-black focus:border-gray-500" autofocus autocomplete required>
                        </div>
                    </div>
                    <div class="p-2 w-full">
                        <div class="relative">
                            <label for="prod_desc" class="block text-base font-medium leading-relaxed text-gray-700">Product Description</label>
                            <textarea name="prod_desc" id="prod_desc" placeholder="A quick description of your product" class="w-full px-3 py-1 mt-2 text-base transition duration-500 ease-in-out transform bg-gray-100 border-transparent rounded-lg focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ext-black focus:border-gray-500 resize-none h-30" autofocus autocomplete required></textarea>
                        </div>
                    </div>
                    <div class="pr-2 pl-2 pb-2 w-full">
                        <div class="relative">
                            <label for="prod_ctg" class="block text-base font-medium leading-relaxed text-gray-700">Product Category</label>
                            <input type="radio" id="bb" name="prod_ctg" value="200001">
                            <label for="bb">Basketball</label><br>
                            <input type="radio" id="tennis" name="prod_ctg" value="200002">
                            <label for="tennis">Tennis</label><br>
                            <input type="radio" id="yoga" name="prod_ctg" value="200003">
                            <label for="yoga">Yoga</label><br>
                            <input type="radio" id="swimming" name="prod_ctg" value="200004">
                            <label for="swimming">Swimming</label><br>
                            <input type="radio" id="tandf" name="prod_ctg" value="200005">
                            <label for="tandf">Track and Field</label><br>
                            <input type="radio" id="cricket" name="prod_ctg" value="200006">
                            <label for="cricket">Cricket</label><br>
                            <input type="radio" id="football" name="prod_ctg" value="200007">
                            <label for="football">Football</label><br>
                            <input type="radio" id="cardio" name="prod_ctg" value="200008">
                            <label for="cardio">Cardio and Calisthenics</label><br>
                        </div>
                    </div>
                    <div class="p-2 w-full">
                        <div class="relative">
                            <label for="prod_img" class="block text-base font-medium leading-relaxed text-gray-700">Product Image</label>
                            <p>
                                <button  class="mx-auto border-0 py-2 focus:outline-none font-semibold text-black transition duration-500 ease-in-out transform rounded-lg bg-gradient-to-r" type="button">
                                    <input type="file" name="prod_img" id="prod_img" multiple="false" accept="image/*" onchange="upload()" required>
                                </button>
                            </p>
                            <div>
                                <canvas id="can" class = "lg:w-2/6 md:w-3/6 w-5/6 mb-10 object-cover object-center rounded">
                                </canvas>
                            </div>
                        </div>
                    </div>
                    <div class="p-2 w-full">
                        <button name="submit" type="submit" class="flex mx-auto border-0 py-2 px-8 focus:outline-none font-semibold text-white transition duration-500 ease-in-out transform rounded-lg bg-gradient-to-r from-black hover:from-black to-black focus:outline-none hover:to-black">Submit</button>
                    </div>
                </div>
            </div>
        </form>
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