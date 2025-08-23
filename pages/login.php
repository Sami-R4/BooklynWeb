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
    <title>Login Form</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.css">  
    <script src="../assets/js/jquery.js"></script>
    <!-- Favicon -->
    <link rel="shortcut icon" href="../assets/img/myLogo.png" type="image/x-icon">
     <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
    background-color: var(--bg-clr);
}

/* Form input styling */
.form-container{
    width: 40em;
    max-width: 90%;
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
.btn-wrapper {
  display: flex;
  flex-direction: row;
  gap: 10px;
  align-items: stretch;
  margin-top: 0.5em;
}
.btn-wrapper .btn-login,
.btn-wrapper .back-button {
  padding: 10px;
  border-radius: 5px;
  width: 100%;
}
.btn-wrapper .btn-login{
  background: var(--primary-clr);
}
.btn-wrapper .btn-login:hover{
  background: #2563EB;
  box-shadow: 0 0 10px var(--primary-clr);
  transition: box-shadow 0.3s ease;
}
.btn-wrapper .back-button{
  background: transparent;
  box-shadow: 0 0 10px transparent;
  border: 1.5px solid var(--primary-clr);
  color: var(--primary-clr);
}
.btn-wrapper .back-button:hover{
  box-shadow: 0 0 10px var(--primary-clr);
  color: var(--pure-white);
  transition: box-shadow 0.3s ease, color 0.3s ease;
}
.form{
    background: var(--secondary-clr);
    padding: 50px 35px;
    color: #fff;
    border-radius: 8px;
}
.form select option[value=""][disabled]{
  color: #fff;
}
.form select option{
  color: #000;
}
.reader-form, .author-form{
  display: none;
}

.error-message {
  color: #ff6b6b;
  font-size: 14px;
  margin-top: 5px;
  display: none;
}
</style>
<body>

<?php include("../includes/navbar.php") ?> 

<div class="form-container mt-5">
    <!-- User Type Selection Form -->
    <form id="userTypeForm" class="form">
        <h3 class="text-center mb-4">Login to Your Account</h3>
        <?php if(isset($_SESSION['error'])): ?>
            <div class="alert alert-danger"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></div>
        <?php endif; ?>
        
        <div class="mb-3 user-type-select">
            <label for="user_type" class="form-label">Select User Type</label>
            <select name="user_type" id="user_type" class="form-control" required>
                <option value="" hidden selected>Choose User Type</option>
                <option value="reader">Reader</option>
                <option value="author">Author</option>
            </select>
        </div>
        
        <div class="text-center">
            <p class="mb-0">Don't have an account? <a href="../pages/register.php" class="text-decoration-none" style="color: var(--accent-gold);">Sign up</a></p>
        </div>
    </form>

    <!-- Reader Login Form -->
    <form action="../app/processlog.php" method="post" id="readerForm" class="form reader-form">
        <input type="hidden" name="user_type" value="reader">
        <h3 class="text-center mb-4">Reader Login</h3>
        
        <div class="mb-3">
            <label for="readerEmail" class="form-label">Email address</label>
            <input type="email" class="form-control" name="readerEmail" id="readerEmail" placeholder="name@example.com" required>
            <div class="error-message" id="readerEmailError"></div>
        </div>
        
        <div class="mb-3">
            <label for="readerPassword" class="form-label">Password</label>
            <input type="password" class="form-control" name="readerPassword" id="readerPassword" placeholder="••••••••" required>
            <div class="error-message" id="readerPasswordError"></div>
        </div>
        
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="readerRemember">
                <label class="form-check-label" for="readerRemember">Remember me</label>
            </div>
            <a href="#" class="text-decoration-none" style="color: var(--accent-gold);">Forgot password?</a>
        </div>
        
        <div class="btn-wrapper">
          <button type="button" class="back-button"><i class="fa-solid fa-clock-rotate-left"></i> Back to User Selection</button>
          <button type="submit" name="loginReader" class="btn btn-login py-2">Sign In as Reader <i class="fa-solid fa-right-to-bracket"></i></button>
        </div>
    </form>

    <!-- Author Login Form -->
    <form action="../app/processlog.php" method="post" id="authorForm" class="form author-form">
        <input type="hidden" name="user_type" value="author">
        <h3 class="text-center mb-4">Author Login</h3>
        
        <div class="mb-3">
            <label for="authorEmail" class="form-label">Email address</label>
            <input type="email" class="form-control" name="authorEmail" id="authorEmail" placeholder="name@example.com" required>
            <div class="error-message" id="authorEmailError"></div>
        </div>
        
        <div class="mb-3">
            <label for="authorPassword" class="form-label">Password</label>
            <input type="password" class="form-control" name="authorPassword" id="authorPassword" placeholder="••••••••" required>
            <div class="error-message" id="authorPasswordError"></div>
        </div>
        
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="authorRemember">
                <label class="form-check-label" for="authorRemember">Remember me</label>
            </div>
            <a href="#" class="text-decoration-none" style="color: var(--accent-gold);">Forgot password?</a>
        </div>
        
        <div class="btn-wrapper">
       <button type="button" class="back-button"><i class="fa-solid fa-clock-rotate-left"></i> Back to User Selection</button>
        <button type="submit" name="loginAuthor" class="btn btn-login py-2">Sign In as Author <i class="fa-solid fa-right-to-bracket"></i></button>
       </div>
    </form>
</div>

<?php if(isset($_SESSION['alert'])): ?>
    <script src="../assets/js/sweetalert.js"></script>
    <script>
        Swal.fire({
            title: '<?= $_SESSION['alert']['title'] ?>',
            text: '<?= $_SESSION['alert']['message'] ?>',
            icon: '<?= $_SESSION['alert']['type'] ?>'
        }).then((result) => {
            <?php if(isset($_SESSION['alert']['redirect'])): ?>
                window.location.href = '<?= $_SESSION['alert']['redirect'] ?>';
            <?php endif; ?>
        });
    </script>
    <?php
    unset($_SESSION['alert']);
    endif;
?>
<script>
  $(document).ready(function() {
    // When user type is selected
    $('#user_type').change(function() {
        var userType = $(this).val();
        
        if(userType){
            // Hide the user type selection form
            $('#userTypeForm').hide();
            
            // Show the appropriate login form
            $('#' + userType + 'Form').show();
        }
    });
    
    
   $('.back-button').click(function(){
     // Hide all login forms
     $('.reader-form, .author-form').hide();
     
     // Show the user type selection form
     $('#userTypeForm').show();
     
     // Reset the select value
     $('#user_type').val('');

   })
});
</script>
</body>
</html>