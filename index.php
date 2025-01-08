<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>BioMedical Wearable Device</title>
    <link href="./style.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.5/dist/tailwind.min.css" rel="stylesheet">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
      integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer" 
    />
  </head>
  <body class="font-Poppins">
    <!--Header-->
    <header>
      <nav class="container flex items-center py-4 mt-0 sm:mt-12">
        <div class="py-1 flex items-center mr-10" id="logoContainer">
          <img src="./images/logo3.svg" width="70px" height="70px" alt="" />
          <h1 class="font-semibold text-xl">Bio</h1>
          <h1 class="text-sky-blue font-bold text-xl">Medics</h1>
        </div>
        <ul
          class="hidden sm:flex flex-1 justify-end items-center gap-12 text-black uppercase text-xs"
        >
          <li class="cursor-pointer">Features</li>
          <li class="cursor-pointer">Brands</li>
          <li class="cursor-pointer">Category</li>
          <button
            type="button"
            class="bg-sky-blue text-white rounded-md px-7 py-3 font-semibold uppercase"
            onclick="navigateToLogin()"
          >
            Login
          </button>
        </ul>
        <div class="flex sm:hidden flex-1 justify-end">
          <i class="text-xl fa-solid fa-bars"></i>
        </div>
      </nav>
    </header>
    <!--Section-->
    <section class="relative">
      <div
        class="container flex flex-col lg:flex-row items-center justify-center gap-12 mt-14 lg:mt-28"
      >
        <div class="flex flex-1 flex-col items-center lg:items-start">
          <h2
            class="text-dark-blue text-3xl md:text-4 lg:text-5xl text-center lg:text-left mb-6"
          >
            Revolutionizing Healthcare with Biomedical Wearable Devices
          </h2>
          <p class="text-dark-blue text-lg text-center lg:text-left mb-6">
            These innovative devices seamlessly integrate cutting-edge
            technology with healthcare solutions, offering a myriad of
            possibilities for monitoring, diagnosis, and personalized health
            management.
          </p>
          <div class="flex justify-center flex-wrap gap-6">
            <button
              type="button"
              onclick="checkHeartRate()"
              class="btn btn-blue hover:bg-white hover:text-black"
            >
              Check Heart Rate
            </button>
            <button
              type="button"
              class="btn btn-white hover:bg-sky-blue hover:text-white"
            >
              Join Us
            </button>
          </div>
        </div>
        <div class="flex justify-center flex-1 mb-10 md:mb-16 lg:mb-0 z-10">
          <img
            class="w-5/6 h-5/6 sm:w-3/4 sm:h-3/4 md:w-full md:h-full rounded-md"
            src="./images/bg.jpg"
            alt=""
          />
        </div>
      </div>
    </section>
  </body>
  <script>
    function navigateToLogin() {
      window.location.href = "login.php"; // Replace with the actual URL or path
    }

    function checkHeartRate() {
      window.location.href = "login.php"; // Replace with the actual URL or path
    }

    var logoContainer = document.getElementById("logoContainer");

    // Add a click event listener to the logo container
    logoContainer.addEventListener("click", function () {
      // Navigate to the home page
      window.location.href = "index.php";
    });
  </script>
</html>
