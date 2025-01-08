<?php 
   session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Temperature - BioMedical Wearable Device</title>
  <link href="./style.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    
</head>

<body class="font-Poppins h-screen">
  <!--Header-->
  <header>
    <nav class="container flex items-center py-4 mt-0 sm:mt-12">
      <div class="py-1 flex items-center mr-10" id="logoContainer">
        <img src="./images/logo3.svg" width="70px" height="70px" alt="" />
        <h1 class="font-semibold text-xl">Bio</h1>
        <h1 class="text-sky-blue font-bold text-xl">Medics</h1>
      </div>
      <ul class="hidden sm:flex flex-1 justify-end items-center gap-12 text-black uppercase text-xs">
        <li class="cursor-pointer">Features</li>
        <li class="cursor-pointer">Brands</li>
        <li class="cursor-pointer">Category</li>
        <button type="button" class="bg-sky-blue text-white px-7 py-3 font-semibold uppercase rounded-md">
          How it Works
        </button>
      </ul>
      <div class="flex sm:hidden flex-1 justify-end">
        <i class="text-xl fa-solid fa-bars"></i>
      </div>
    </nav>
  </header>
  <!--Form-->
  <form action="" method="post">
  <section class="relative flex items-center justify-center">
    <div class="container flex flex-col items-center gap-12 mt-14 lg:mt-28">
    <div class="mt-6">
            <a href="dashboard.php" class="text-sky-blue hover:underline">Back</a>
          </div>
      <div class="flex flex-1 flex-col items-center lg:items-start">
        <div class="btn btn-white flex flex-col items-center gap-6">
          <!-- <h2 class="text-dark-blue text-lg md:text-4 lg:text-5xl text-center lg:text-left mb-6">
            Login
          </h2> -->
          <input type="text" id="temp" name="rate" placeholder="Temperature" class="btn btn-white" />
          <input type="submit" name="submit" value="Check Temprature"
            class="btn btn-blue hover:bg-white hover:text-black text-center" />
        </div>
      </div>
    </div>
  </section>
  </form>
</body>
</html>