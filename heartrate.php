<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Heart Rate - BioMedical Wearable Device</title>
  <link href="./style.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        /* Modal Styling */
    .modal {
      display: none;
      position: fixed;
      z-index: 1;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: rgba(0, 0, 0, 0.5);
      backdrop-filter: blur(5px);
    }
    .modal-content {
      background-color: white;
      margin: 15% auto;
      padding: 20px;
      border: 1px solid #888;
      width: 30%;
    }
    .close {
      color: red;
      float: right;
      font-size: 28px;
      font-weight: bold;
    }
    .close:hover,
    .close:focus {
      color: black;
      text-decoration: none;
      cursor: pointer;
    }
    .success {
        background-color: #86efac; /* Light red background color */
        color: #15803d; /* Dark red text color */
        padding: 15px; /* Padding around the content */
        border: 1px solid #86efac; /* Border color */
        border-radius: 5px; 
        text-align: center;
        width: 25%;
        margin: auto;
    }
    .message {
        text-align: center;
        background: #f9eded;
        padding: 15px;
        border:1px solid #699053;
        border-radius: 5px;
        color: red;
        width: 100%;
        margin: auto;
    }
    </style>
</head>

<body class="font-Poppins h-screen">
<?php
  include("config.php");
  $displayModal = false; // Variable to control the modal display
  $successMessage = false; // Variable to control the success message display

  if (isset($_POST['submit'])) {
      $heart = $_POST['heart'];
      $category = $_POST['category'];

      if (empty($heart) || empty($category)) {
          echo "<div class='required-message'>
                  <p>Fields are required</p>
                </div><br>";
      } else {
          mysqli_query($connection, "INSERT INTO user_heart_data (heart, category) VALUES ('$heart', '$category')");

          // Perform validation to decide whether to display the modal
          if (
            ($category === "Newborns (0-1 month old)" && ($heart < 70 || $heart > 190)) ||
            ($category === "Infants (1-12 months old)" && ($heart < 80 || $heart > 160)) ||
            ($category === "Toddlers (1-2 years old)" && ($heart < 80 || $heart > 130)) ||
            ($category === "Preschoolers (3-5 years old)" && ($heart < 80 || $heart > 120)) ||
            ($category === "School-age children (6-12 years old)" && ($heart < 70 || $heart > 110)) ||
            ($category === "For teenagers aged 13-15 years old" && ($heart < 60 || $heart > 100)) ||
            ($category === "For teenagers aged 16-19 years old" && ($heart < 60 || $heart > 100)) ||
            ($category === "For most adults (aged 18 and older)" && ($heart < 60 || $heart > 100))
          ) {
              $displayModal = true; // Set to true to display the modal
          }

          $successMessage = true; // Always set success message to true
      }
  }
  ?>
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
  <form action="heartrate.php" method="POST" id="heartRateForm">
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
          <input type="number" id="rate" name="heart" placeholder="Heart Rate" class="btn btn-white"/>
          <select id="rateCategory" name="category"class="btn btn-white" placeholder="--Select Age Range--">
            <option value="">Select Age Range</option>
            <option value="Newborns (0-1 month old)">Newborns (0-1 month old)</option>
            <option value="Infants (1-12 months old)">Infants (1-12 months old)</option>
            <option value="Toddlers (1-2 years old)">Toddlers (1-2 years old)</option>
            <option value="Preschoolers (3-5 years old)">Preschoolers (3-5 years old)</option>
            <option value="School-age children (6-12 years old)">School-age children (6-12 years old)</option>
            <option value="For teenagers aged 13-15 years old">For teenagers aged 13-15 years old</option>
            <option value="For teenagers aged 16-19 years old">For teenagers aged 16-19 years old</option>
            <option value="For most adults (aged 18 and older)">For most adults (aged 18 and older)</option>
          </select>
          <input type="submit" name="submit" value="Check Heart Rate"
            class="btn btn-blue hover:bg-white hover:text-black text-center" />
        </div>
        
      </div>
    </div>
  </section>
  </form>

  <!-- Modal Box -->
  <div id="myModal" class="modal" style="<?php if ($displayModal) echo 'display: block'; ?>">
    <div class="modal-content">
      <span class="close" onclick="closeModal()">&times;</span>
      <p id="modalText">
        <?php
        if ($displayModal) {
            echo 'Heart rate is not normal for the selected age range. Please consult a doctor.';
        } else {
            echo 'Heart rate is within the normal range.';
        }
        ?>
      </p>
    </div>
  </div>

  <?php if ($successMessage && $displayModal) : ?>
  <div id="successMessage" class="success" style="display: none;">
    <p>Save Successfully</p>
  </div>
<?php endif; ?>


  <script>
    function closeModal() {
        document.querySelector('.modal').style.display = 'none';
        document.getElementById('successMessage').style.display = 'block'; // Show the success message
    }
  </script>
</body>
</html>