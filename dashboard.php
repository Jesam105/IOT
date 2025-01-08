<?php
session_start();
include("config.php");

// Check if the user is logged in, otherwise redirect to login page
if (!isset($_SESSION['valid'])) {
    header("Location: login.php");
    exit();
}

// Fetch user data based on the stored session information
$email = $_SESSION['valid'];
$query = mysqli_query($connection, "SELECT * FROM register WHERE email='$email'");
$userData = mysqli_fetch_assoc($query);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
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

<style>
.btn-container {
  display: flex;
  justify-content: space-around; /* Adjust as needed */
  align-items: center; /* Vertically center align if needed */
}

.btn .center-image {
  display: flex;
  justify-content: center;
  align-items: center;
  margin-bottom: 10px; /* Optional: add margin-bottom for spacing */
}
.popup-form {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background: #fff;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    z-index: 1000;
    visibility: visible;
    text-align: center;
    transition: transform 0.4s;
}
/* Style for the overlay/background when form is displayed */
.overlay {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    z-index: 999;
    display: none;
}

</style>

<body>
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
            id="logout"
            class="bg-sky-blue text-white rounded-md px-7 py-3 font-semibold uppercase"
            onclick="navigateToLogout()"
          >
            Logout
          </button>
        </ul>
        <div class="flex sm:hidden flex-1 justify-end">
          <i class="text-xl fa-solid fa-bars"></i>
        </div>
      </nav>
    </header>
    <!--Section-->
    <section class="relative">
    <div class="container flex flex-col lg:flex-row items-center justify-center gap-12 mt-14 lg:mt-28">
        <div class="flex flex-1 flex-col items-center lg:items-start">
        <div>
            <h1 class="btn btn-white ga">User Dashboard</h1>    
        </div>
        <h2 class="text-dark-blue text-xl lg:text-left mb-6">Welcome, <?php echo $userData['name']; ?></h2>
        <div class="btn-container gap-1">
        <div class="btn btn-white">
            <div class="center-image">
            <img src="./images/hr.gif" alt="heart rate" />
            </div>
            <button
            type="button" 
            id="checkHeartRate"
            class="bg-sky-blue text-white rounded-md px-7 py-3 font-semibold uppercase"
            onclick=""
            >
            Check Heart Rate
            </button>
        </div>
        <div class="btn btn-white">
            <div class="center-image">
            <img src="./images/bp.gif" alt="blood pressure" />
            </div>
            <button
            type="button"
            id="checkBloodPressure"
            class="bg-sky-blue text-white rounded-md px-7 py-3 font-semibold uppercase"
            onclick=""
            >
            Check Blood Pressure
            </button>
        </div>
        <div class="btn btn-white">
            <div class="center-image">
            <img src="./images/temp.gif" alt="blood pressure" />
            </div>
            <button
            type="button"
            id="checkTemperature"
            class="bg-sky-blue text-white rounded-md px-7 py-3 font-semibold uppercase"
            onclick=""
            >
            Check Temperature
            </button>
        </div>
        <div class="btn btn-white">
            <div class="center-image">
            <img src="./images/spo2.gif" alt="spo2" />
            </div>
            <button
            type="button"
            id="checkSpo2"
            class="bg-sky-blue text-white rounded-md px-7 py-3 font-semibold uppercase"
            onclick=""
            >
            Check SPO2
            </button>
        </div>
        </div>
        </div>
        </div>
        </section>
</body>
<script>
  var checkHeartRate= document.getElementById("checkHeartRate");
  var checkBloodPressure = document.getElementById("checkBloodPressure");
  var checkTemperature = document.getElementById("checkTemperature");
  // Add a click event listener to the logo container
  checkHeartRate.addEventListener("click", function () {
    // Navigate to the home page
    window.location.href = "heartrate.php";
  });
  checkBloodPressure.addEventListener("click", function () {
    // Navigate to the home page
    window.location.href = "bloodpressure.php";
  });
  checkTemperature.addEventListener("click", function () {
    // Navigate to the home page
    window.location.href = "temperature.php";
  });
  var logout = document.getElementById("logout");
  // Add a click event listener to the logo container
  logout.addEventListener("click", function () {
    // Navigate to the home page
    window.location.href = "login.php";
  });
</script>

</html>
