<?php
// Active States
  $currentPage = basename($_SERVER['PHP_SELF']);
session_start();
if(isset($_SESSION['error'])){
    echo "<p style='color:red;'>".$_SESSION['error']."</p>";
    unset($_SESSION['error']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.css">  
</head>
<style>
    *{
        padding: 0;
        margin: 0;
        box-sizing: border-box;
        font-family: "Manrope";
    }
    :root{
    --primary-clr: #3B82F6;
    --secondary-clr: #000068;
    --accent-gold: #FCD34D;
    --bg-clr: #F8FAFC;
    --pure-white: #FFFFFF;
}
@font-face {
    font-family: "Manrope";
    src: url('../fonts/MANROPE-VARIABLEFONT_WGHT.TTF');
}

body{
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

/* Form input styling */
.form-container{
    width: 40em;
}

.form-container .form-control {
  background: rgba(255, 255, 255, 0.1);
  border: 1px solid rgba(255, 255, 255, 0.2);
  color: var(--pure-white);
}

.form-container .form-control::placeholder{
    color: rgba(255, 255, 255, 0.2);
    font-style: italic;
}

.form-container .form-control:focus {
  background: rgba(255, 255, 255, 0.15);
  border-color: var(--accent-gold);
  box-shadow: 0 0 0 0.25rem rgba(252, 211, 77, 0.25);
  color: var(--pure-white);
}

.form-container .form-check-input:checked {
  background-color: var(--accent-gold);
  border-color: var(--accent-gold);
}
form .fs-4{
  color: var(--accent-gold);
}
.btn-gold{
    box-shadow: inset 0 0 10px var(--accent-gold);
    background: var(--primary-color);
  }
  .btn-gold:hover{
    box-shadow: inset 0 0 10px 2px var(--accent-gold);
    transition: box-shadow 0.3s ease;
}
.form{
    background: #000068;
    padding: 50px 35px;
    color: #fff;
    border-radius: 8px;
}
</style>
<body>

<?php
include ("../includes/navbar.php");
?>

<div class="form-container mt-5">
    <!-- Author Login Form -->
        <form action="../app/processlog.php" method="post" class="mx-3 form">
          <h3 class="fs-4 text-center">Login as Author</h3>
          <div class="mb-3">
            <label for="loginEmail" class="form-label">Email address</label>
            <input type="email" class="form-control" name="loginEmail" id="loginEmail" placeholder="name@example.com">
          </div>
          <div class="mb-3">
            <label for="loginPassword" class="form-label">Password</label>
            <input type="password" class="form-control" name="loginPassword" id="loginPassword" placeholder="••••••••">
          </div>
          <div class="d-flex justify-content-between align-items-center mb-3">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="rememberMe">
              <label class="form-check-label" for="rememberMe">Remember me</label>
            </div>
            <a href="#" class="text-decoration-none">Forgot password?</a>
          </div>
          <button type="submit" name="loginAuthor" class="btn btn-gold w-50 text-white d-block mx-auto py-2 mb-3">Sign In</button>
          <div class="text-center">
            <p class="mb-0">Don't have an account? <a href="../pages/register.php" class="text-decoration-none">Sign up</a></p>
          </div>
</form>
</div>


</body>
</html>