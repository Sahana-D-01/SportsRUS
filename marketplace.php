<?php
    session_start();
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
            <a class="mr-5 hover:text-gray-900">Marketplace</a>
			<a href="contact.php" class="mr-5 hover:text-gray-900">Contact Us</a>
        </nav>
        <a href="index.php" style ="font-family: 'Zen Dots', cursive;" class="order-first lg:order-none lg:w-1/5 title-font font-medium items-center text-gray-900 lg:items-center lg:justify-center mb-4 md:mb-0"> <span style="font-size: 40px;" class="ml-3 text-xl">SportsRUs</span>
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
</header>

<!--CATEGORIES-->
<section class="text-gray-600 body-font">
    <div class="container px-5 py-10 mx-auto">
        <div class="flex flex-wrap -m-4">
            <div class="lg:w-1/4 md:w-1/2 p-4 w-full">
                <a href="bb.php" class="block relative h-48 rounded overflow-hidden">
                    <img alt="ecommerce" class="object-cover object-center w-full h-full block" src="https://images.unsplash.com/photo-1563127556-f6ac5f6a3646?ixid=MnwxMjA3fDB8MHxzZWFyY2h8OTV8fGJhc2tldGJhbGx8ZW58MHx8MHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60">
                </a>
                <div class="mt-4">
                    <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1">CATEGORY</h3>
                    <h2 class="text-gray-900 title-font text-lg font-medium">Basketball</h2>
                </div>
            </div>
            <div class="lg:w-1/4 md:w-1/2 p-4 w-full">
                <a href="tennis.php" class="block relative h-48 rounded overflow-hidden">
                    <img alt="ecommerce" class="object-cover object-center w-full h-full block" src="https://images.unsplash.com/photo-1602211847326-dd96f7c45f10?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MzN8fHRlbm5pc3xlbnwwfHwwfHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60">
                </a>
                <div class="mt-4">
                    <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1">CATEGORY</h3>
                    <h2 class="text-gray-900 title-font text-lg font-medium">Tennis</h2>
                </div>
            </div>
            <div class="lg:w-1/4 md:w-1/2 p-4 w-full">
                <a href="yoga.php" class="block relative h-48 rounded overflow-hidden">
                    <img alt="ecommerce" class="object-cover object-center w-full h-full block" src="https://images.unsplash.com/photo-1603988363607-e1e4a66962c6?ixid=MnwxMjA3fDB8MHxzZWFyY2h8NHx8eW9nYXxlbnwwfHwwfHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60">
                </a>
                <div class="mt-4">
                    <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1">CATEGORY</h3>
                    <h2 class="text-gray-900 title-font text-lg font-medium">Yoga and Aerobics</h2>
                </div>
            </div>
            <div class="lg:w-1/4 md:w-1/2 p-4 w-full">
                <a href="cardio.php" class="block relative h-48 rounded overflow-hidden">
                    <img alt="ecommerce" class="object-cover object-center w-full h-full block" src="https://images.unsplash.com/photo-1571902943202-507ec2618e8f?ixid=MnwxMjA3fDB8MHxzZWFyY2h8M3x8Z3ltfGVufDB8fDB8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60">
                </a>
                <div class="mt-4">
                    <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1">CATEGORY</h3>
                    <h2 class="text-gray-900 title-font text-lg font-medium">Cardio & Calisthenics</h2>
                </div>
            </div>
            <div class="lg:w-1/4 md:w-1/2 p-4 w-full">
                <a href="tandf.php" class="block relative h-48 rounded overflow-hidden">
                    <img alt="ecommerce" class="object-cover object-center w-full h-full block" src="https://images.unsplash.com/photo-1474546652694-a33dd8161d66?ixid=MnwxMjA3fDB8MHxzZWFyY2h8M3x8dHJhY2slMjBhbmQlMjBmaWVsZHxlbnwwfHwwfHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60">
                </a>
                <div class="mt-4">
                    <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1">CATEGORY</h3>
                    <h2 class="text-gray-900 title-font text-lg font-medium">Track and Field</h2>
                </div>
            </div>
            <div class="lg:w-1/4 md:w-1/2 p-4 w-full">
                <a href="cricket.php" class="block relative h-48 rounded overflow-hidden">
                    <img alt="ecommerce" class="object-cover object-center w-full h-full block" src="https://images.unsplash.com/photo-1587385789097-0197a7fbd179?ixid=MnwxMjA3fDB8MHxzZWFyY2h8NXx8Y3JpY2tldHxlbnwwfHwwfHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60">
                </a>
                <div class="mt-4">
                    <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1">CATEGORY</h3>
                    <h2 class="text-gray-900 title-font text-lg font-medium">Cricket</h2>
                </div>
            </div>
            <div class="lg:w-1/4 md:w-1/2 p-4 w-full">
                <a href="football.php" class="block relative h-48 rounded overflow-hidden">
                    <img alt="ecommerce" class="object-cover object-center w-full h-full block" src="https://images.unsplash.com/photo-1552318965-6e6be7484ada?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTN8fGZvb3RiYWxsfGVufDB8fDB8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60">
                </a>
                <div class="mt-4">
                    <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1">CATEGORY</h3>
                    <h2 class="text-gray-900 title-font text-lg font-medium">Football</h2>
                </div>
            </div>
            <div class="lg:w-1/4 md:w-1/2 p-4 w-full">
                <a href="swimming.php" class="block relative h-48 rounded overflow-hidden">
                    <img alt="ecommerce" class="object-cover object-center w-full h-full block" src="https://images.unsplash.com/photo-1576610616656-d3aa5d1f4534?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MjJ8fHN3aW1taW5nfGVufDB8fDB8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60">
                </a>
                <div class="mt-4">
                    <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1">CATEGORY</h3>
                    <h2 class="text-gray-900 title-font text-lg font-medium">Swimming</h2>
                </div>
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
