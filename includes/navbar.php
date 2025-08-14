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
nav{
    background: var(--secondary-clr);
    display: flex;
    justify-content: center;
    box-shadow: 0px 0px 12px 3px rgba(0, 0, 0, 0.1);
    position: fixed;
    width: 100%;
    top: 0;
    z-index: 1000;
}
nav h2{
    color: var(--pure-white);
    text-shadow: 2px 2px 8px var(--accent-gold);
}
ul{
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 3em;
}
ul li{
    list-style: none;
}
ul li a{
    position: relative;
    text-decoration: none;
    color: var(--pure-white);
    font-size: 25px;
    overflow: hidden;
    transition: text-shadow 0.3s ease, color 0.3s ease;
}
ul li a::before,
ul li a::after{
    content: '';
    position: absolute;
    width: 0;
    height: 3px;
    background: var(--accent-gold);
    transition: width 0.3s ease;
}
ul li a::before{
    top: -1px;
    left: 0;
}
ul li a::after{
    bottom: -5px;
    right: 0;
}
ul li a:hover{
    color: var(--accent-gold);
    font-weight: 700;
    text-shadow: 0 0 8px #3b82f6, 0 0 12px gold;
    transform: scale(1.05);
}
ul li a:hover::before,
ul li a:hover::after{
    width: 100%;
}
nav .start-btn{
    padding: 7px 10px;
    border: none;
    background: var(--accent-gold);
}
nav .start-btn:hover{
    transform: scale(1.1);
    transition: 0.3s ease-in-out;
    box-shadow: 0 2px 12px 5px gold;
}
   
ul li a.active{
    color: var(--accent-gold);
    font-weight: 700;
    text-shadow: 0 0 8px #3b82f6, 0 0 12px gold;
    transform: scale(1.05);
}
ul li a.active::before,
ul li a.active::after{
    width: 100%;
}
button {
    text-decoration: none;
    color: #000000;
}
/* Login Styling  */
.login-btn {
    padding: 7px 15px;
    border: 2px solid var(--accent-gold);
    background: transparent;
    color: var(--pure-white);
    transition: all 0.3s ease;
}

.login-btn:hover {
    background: var(--accent-gold);
    color: var(--secondary-clr);
    transform: scale(1.05);
}
/* Bottom Sheet Modal Styles */
.gold-glow {
  color: var(--accent-gold);
  text-shadow: 0 0 8px rgba(252, 211, 77, 0.5);
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 1px;
  position: relative;
  display: inline-block;
}
.gold-glow::after {
  content: '';
  position: absolute;
  bottom: -8px;
  left: 0;
  width: 100%;
  height: 2.5px;
  background: linear-gradient(90deg, transparent, var(--accent-gold), transparent);
}
.modal.bottom-sheet {
  padding: 0 !important;
  align-items: flex-end;
}

.modal.bottom-sheet .modal-dialog {
  margin: 0;
  max-width: 100%;
  width: 100%;
  transform: translateY(100%);
}

.modal.bottom-sheet .modal-dialog-bottom {
  margin-top: auto;
  margin-bottom: 0;
}

.modal.bottom-sheet .modal-content {
  border-radius: 1rem 1rem 0 0;
  border: none;
  background: linear-gradient(to bottom, #3168c2ff, var(--secondary-clr));
  color: var(--pure-white);
}

.modal.bottom-sheet.show .modal-dialog {
  transform: translateY(0);
}

/* Custom button style */
.btn-gold {
  color: var(--secondary-clr);
  font-weight: 600;
  transition: all 0.3s ease;
}

.btn-gold:hover {
  box-shadow: 0 0 15px rgba(252, 211, 77, 0.5);
  color: var(--accent-gold);
}

/* Form input styling */
.modal-body{
    display: flex;
    justify-content: center;
}

.modal-body .form-control {
  background: rgba(255, 255, 255, 0.1);
  border: 1px solid rgba(255, 255, 255, 0.2);
  color: var(--pure-white);
}

.modal-body .form-control::placeholder{
    color: rgba(255, 255, 255, 0.2);
    font-style: italic;
}

.modal-body .form-control:focus {
  background: rgba(255, 255, 255, 0.15);
  border-color: var(--accent-gold);
  box-shadow: 0 0 0 0.25rem rgba(252, 211, 77, 0.25);
  color: var(--pure-white);
}

.modal-body .form-check-input:checked {
  background-color: var(--accent-gold);
  border-color: var(--accent-gold);
}
.formLibrary{
  postion: relative;
}
.formLibrary::after{
  content: "";
  position: absolute;
  height: 22.8em;
  width: 1.5px;
  background: linear-gradient(90deg, transparent, var(--accent-gold), transparent);
  top: 0;
  left: 50%;
}
form .fs-4{
  color: var(--accent-gold);
}
</style>
<body>
    <!-- Modify your nav section -->
<nav class="py-2">
    <!-- Logo -->
    <h2 class="fs-1 me-auto mx-3 mt-3 fw-bold">Booklyn</h2>
    
    <!-- Navigation Links -->
    <ul class="mt-3">
        <li><a href="../pages/index.php" class="<?php echo $currentPage == 'index.php'? 'active': ''?>">Home</a></li>
        <li><a href="../pages/books.php" class="<?php echo $currentPage == 'books.php'? 'active': ''?>">Books</a></li>
        <li><a href="../pages/library.php" class="<?php echo $currentPage == 'library.php'? 'active': ''?>">Authors</a></li>
    </ul>
    
    <!-- Auth Buttons -->
    <div class="ms-auto my-3 d-flex align-items-center gap-3">
        <button class="login-btn rounded" data-bs-toggle="modal" data-bs-target="#loginModal">
            Login
        </button>
        <a href="../pages/register.php">
            <button class="start-btn mx-2 rounded">Get Started</button>
        </a>
    </div>
</nav>

<!-- Bottom Sheet Modal -->
<div class="modal bottom-sheet fade" id="loginModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-bottom row">
    <div class="modal-content">
      <div class="modal-header">
       <h5 class="modal-title text-center w-100">
    <span class="gold-glow">Welcome Back</span>
       </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <!-- User Login Form -->
        <form action="../app/processlog.php" method="post" class="col-5 mx-3">
          <h3 class="fs-4 text-center">Login as Reader</h3>
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
          <button type="submit" name="loginUser" class="btn btn-gold w-50 text-white d-block mx-auto py-2 mb-3">Sign In</button>
          <div class="text-center">
            <p class="mb-0">Don't have an account? <a href="../pages/register.php" class="text-decoration-none">Sign up</a></p>
          </div>
        </form>

        <!-- Library Login Form-->

        <form action="../app/processlog.php" method="post" class="col-5 mx-3 formLibrary">
          <h3 class="fs-4 text-center">Login as Library</h3>
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
          <button type="submit" name="loginLib" class="btn btn-gold w-50 text-white d-block mx-auto py-2 mb-3">Sign In</button>
          <div class="text-center">
            <p class="mb-0">Don't have an account? <a href="../pages/register.php" class="text-decoration-none">Sign up</a></p>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</body>
</html>