<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Register - BioMedical Wearable Device</title>
  <link href="./style.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <style>
    .success {
        background-color: #86efac; /* Light red background color */
        color: #15803d; /* Dark red text color */
        padding: 15px; /* Padding around the content */
        border: 1px solid #86efac; /* Border color */
        border-radius: 5px; /* Rounded corners */
        margin-bottom: 15px; /* Margin at the bottom to separate from other elements */
    }
    .message {
        text-align: center;
        background: #f9eded;
        padding: 15px 0px;
        border:1px solid #699053;
        border-radius: 5px;
        margin-bottom: 10px;
        color: red;
    }
    .message p {
        margin: 0; /* Remove default margin for the paragraph inside the message div */
    }
  </style>
</head>

<body class="font-Poppins h-screen">
<?php   
  include("config.php");
  if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    //verifying the unique email
    $verify_query = mysqli_query($connection,"SELECT email FROM register WHERE email='$email'");

    if(mysqli_num_rows($verify_query) !=0 ){
      echo "<div class='message'>
                <p>This email is used, Try another One Please!</p>
            </div> <br>";
      // echo "<a href='javascript:self.history.back()'><button>Go Back</button></a>";
    } else {
      mysqli_query($connection,"INSERT INTO register(name,email,username,password) VALUES('$name','$email','$username','$password')") or die("Error Occured");

      echo "<div class='success'>
                <p>Registration successfully!</p>
            </div> <br>";
      //echo "<a href='login.php'><button class='btn'>Login Now</button>";
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
          How it works
        </button>
      </ul>
      <div class="flex sm:hidden flex-1 justify-end">
        <i class="text-xl fa-solid fa-bars"></i>
      </div>
    </nav>
  </header>
  <!--Form-->
  <form method="post" action="register.php">
    <section class="relative flex items-center justify-center">
      <div class="container flex flex-col items-center gap-12 mt-14 lg:mt-28">
        <div class="flex flex-1 flex-col items-center lg:items-start">
          <div class="btn btn-white flex flex-col items-center gap-6">
            <h2 class="text-dark-blue text-lg md:text-4 lg:text-5xl text-center lg:text-left mb-6">
              Create Account
            </h2>
              <input type="text" name="name" id="name" placeholder="Name" class="btn btn-white" />
              <input type="email" name="email" id="email" placeholder="Email" class="btn btn-white" />
              <input type="text" name="username" id="username" placeholder="Username" class="btn btn-white" />
              <input type="password" name="password" id="password" placeholder="Password" class="btn btn-white" />
              <input type="submit" name="submit" value="Create Account" class="btn btn-blue hover:bg-white hover:text-black text-center" />
            <p>
              Already have an accounnt?
              <a href="login.php" class="text-sky-blue">Sign In</a>
            </p>
          </div>
        </div>
      </div>
    </section>
  </form>
</body>
<script>
  var logoContainer = document.getElementById("logoContainer");
  // Add a click event listener to the logo container
  logoContainer.addEventListener("click", function () {
    // Navigate to the home page
    window.location.href = "index.php";
  });
</script>

</html>
