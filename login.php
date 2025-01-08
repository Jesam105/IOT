<?php 
   session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login - BioMedical Wearable Device</title>
  <link href="./style.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    
</head>

<body class="font-Poppins h-screen">
<?php          
  include("config.php");
  if(isset($_POST['submit'])){
    $email = mysqli_real_escape_string($connection,$_POST['email']);
    $password = mysqli_real_escape_string($connection,$_POST['password']);
    
    $result = mysqli_query($connection,"SELECT * FROM register WHERE email='$email' AND password='$password' ") or die("Error Occured");
    $row = mysqli_fetch_assoc($result);

    if(is_array($row) && !empty($row)){
        $_SESSION['valid'] = $row['email'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['id'] = $row['id'];
    }else{
        echo "<div class='message'>
          <p>Wrong Username or Password</p>
          </div> <br>";
      echo "<a href='index.php'><button class='btn'>Go Back</button>";   
    }
    if(isset($_SESSION['valid'])){
        header("Location: dashboard.php");
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
  <form action="" method="post">
  <section class="relative flex items-center justify-center">
    <div class="container flex flex-col items-center gap-12 mt-14 lg:mt-28">
      <div class="flex flex-1 flex-col items-center lg:items-start">
        <div class="btn btn-white flex flex-col items-center gap-6">
          <h2 class="text-dark-blue text-lg md:text-4 lg:text-5xl text-center lg:text-left mb-6">
            Login
          </h2>
          <input type="text" id="email" name="email" placeholder="Email" class="btn btn-white" />
          <input type="password" id="password" name="password" placeholder="Password" class="btn btn-white" />
          <input type="submit" name="submit" value="Login"
            class="btn btn-blue hover:bg-white hover:text-black text-center" />
          <p>
            Don't have an account?
            <a href="register.php" class="text-sky-blue">Create an account</a>
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