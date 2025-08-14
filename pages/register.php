<?php
session_start();

// Reset form if user clicks Back
if (isset($_POST['back'])) {
    unset($_SESSION['user_type']);
    header("Location: register.php");
    exit;
}

// Step 1 submission: save user_type in session and move to step 2
if (isset($_POST['step1_submit'])) {
    $user_type = $_POST['user_type'] ?? null;
    if ($user_type === 'user' || $user_type === 'library') {
        $_SESSION['user_type'] = $user_type;
    } else {
        $error = "Please select an account type.";
    }
}

// Step 2 submission: here you’d handle full registration processing
if (isset($_POST['step2_submit'])) {
    // Normally validate and process registration here
    // For demo, just clear session and show success
    $registered_type = $_SESSION['user_type'] ?? 'user';
    session_destroy();
    exit;
}

// Determine which step to show
$show_step1 = !isset($_SESSION['user_type']);
$show_step2 = isset($_SESSION['user_type']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Register</title>
    <link rel="stylesheet" href="../assets/css/register.css">
    <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>

        .error { color: rgb(255, 0,0); }
        .back-btn { background: #888; margin-right: 1rem; }
    </style>
</head>
<body>
    <?php
     include ("../includes/navbar.php");
     include ("../includes/loader.php");
    ?>
<section class="body">
    <div class="form-content">
    <video autoplay loop muted plays-inline class="back-vid">
        <source src="../assets/img/bg-vid.mp4" type="video/mp4">
    </video>
    <div class="video-overlay"></div>
    <div class="choose-user my-5 me-auto py-5 px-4">
        
        <?php if ($show_step1): ?>
            <!-- Step 1: Choose User Type -->
            <?php if (!empty($error)): ?>
                <p class="error"><?= htmlspecialchars($error) ?></p>
                <?php endif; ?>
                <form method="POST" action="../app/process.php">
        <h1 class="h1">Register To Begin.</h1>
        <p class="p">Create account as a library or a reader.</p>
<select name="user_type" id="user_type" class="my-3" required>
  <option value="" disabled selected>Select account type</option>
  <option value="user">Register as User</option>
  <option value="library">Register as Library</option>
</select>

        <button type="submit" class="px-5 rounded-pill" name="step1_submit">Next</button>
    </form>
    </div>
    </div>

<?php elseif ($show_step2): ?>
    <!-- Step 2: Registration Form -->
<section class="step2">
    <!-- Left column -->
     <div class="left-side">
         <h1 class="display-6">Welcome to Booklyn 📚</h1>
             <?php if ($_SESSION['user_type'] === 'user'): ?>
            <p class="fs-4">Join the reading revolution.<br>Fill the form to get started as a reader.</p>
            <ul style="margin-top: 20px; display: block;">
                <li class="my-4 fs-5"><i class="fa-solid fa-check-double"></i> Easy Library Access</li>
                <li class="my-4 fs-5"><i class="fa-solid fa-book"></i> Personalized Book Recs</li>
                <li class="my-4 fs-5"><i class="fa-solid fa-server"></i> Track Reading History</li>
            </ul>
         <?php else: ?>
            <p class="fs-4">Join our network of libraries.<br>Fill the form to register your library.</p>
            <ul style="margin-top: 20px; display: block;">
                <li class="my-4 fs-5"><i class="fa-solid fa-check-double"></i> Reach More Readers</li>
                <li class="my-4 fs-5"><i class="fa-solid fa-book"></i> Manage Your Collection</li>
                <li class="my-4 fs-5"><i class="fa-solid fa-server"></i> Track Loans & Inventory</li>
            </ul>
         <?php endif; ?>
     </div>
     <div class="right-side">
    <?php if ($_SESSION['user_type'] === 'user'): ?>
        <form method="POST" action="../app/process.php">
            <h2>User Registration</h2>

            <!-- Username-->
            <div class="input-group">
            <i class="fa-solid fa-circle-user icon"></i>
            <input id="name" name="name" placeholder="Your Username" type="text" required />
            </div>

            <!-- Email -->
            <div class="input-group">
            <i class="fa-solid fa-envelopes-bulk icon"></i>
            <input id="email" name="email" placeholder="Your Email" type="email" required />
            </div>

            <!-- Password -->
            <div class="input-group">
            <i class="fa-solid fa-lock icon"></i>
            <input id="pwd" name="password" placeholder="Your Password" type="password" required />
            </div>

            <!-- Confirm Password -->
            <div class="input-group">
            <i class="fa-solid fa-house-lock icon"></i>
            <input id="cpwd" name="cpwd" placeholder="Confirm Password" type="password" required />
            </div>

            <div>
                <button type="submit" name="back" class="back-btn">Back</button>
                <button type="submit" name="step2_submit">Register</button>
            </div>
        </form>
        <?php elseif ($_SESSION['user_type'] === 'library'): ?>
            <form method="POST" action="../app/process.php" enctype="multipart/form-data">
                <h2>Library Registration</h2>
                <!-- Username-->
            <div class="input-group">
            <i class="fa-solid fa-house-user icon"></i>
            <input id="name" name="name" placeholder="Name of Library" type="text" required />
            </div>

            <!-- Logo-->
            <div class="input-group file-upload">
                <i class="fa-solid fa-cloud-arrow-up icon"></i>
            <input id="logo" name="logo" class="file-input" type="file" title="Click to upload" required />
            </div>

            <!-- Email -->
            <div class="input-group">
            <i class="fa-solid fa-envelopes-bulk icon"></i>
            <input id="email" name="email" placeholder="Contact Email" type="email" required />
            </div>
            
            <!-- Address -->
            <div class="input-group">
                <i class="fa-solid fa-map-location-dot icon"></i>
                <input id="address" name="address" placeholder="Address" type="text" required />
            </div>
            
            <!-- Open Hours-->
            <div class="input-group">
                <i class="fa-solid fa-clock icon"></i>
                <input id="open-hours" name="open-hours" placeholder="Open Hours(eg: 8AM-5PM)" type="text" required />
            </div>
            
            <!-- Description -->
            <div class="input-group">
                <i class="fa-solid fa-clock icon-1"></i>
                <textarea name="desc" id="desc" cols="30" rows="10" class="ps-4" placeholder="Describe your Library"></textarea>
            </div>
            
            <!-- Password -->
            <div class="input-group">
                <i class="fa-solid fa-lock icon"></i>
                <input id="password" name="password" placeholder="Set a Password" type="password" required />
                <span id="passwordError" class="error" style="font-size:11px;color:red">Your password must be 8 and above characters long,must contain letter, number and special characters</span>
            </div>
            
            <!-- Confirm Password -->
            <div class="input-group">
            <i class="fa-solid fa-house-lock icon"></i>
            <input id="cpwd" name="cpwd" placeholder="Confirm your Password" type="password" required />
            <span id="confirmPasswordError" style="font-size:11px;" class="error"></span>
            </div>


            <div>
                <button type="submit" name="back" class="back-btn">Back</button>
                <button type="submit" name="step2_submit">Register</button>
            </div>
            </div>
        </form>
        <?php endif; ?>
        
        <?php endif; ?>
    </div>
</section>

<script src="../assets/js/jquery.js"></script>
<script>
    $(document).ready(function(){

   
$("#pwd").on("keyup", function() {
var number = /([0-9])/;
var alphabets = /([a-zA-Z])/;
var special_characters = /([~,!,@,#,$,%,^,&,*,.,-,_,+,=,?,>,<])/;
var password = $('#pwd').val().trim();

if (password.length < 8) {
  $('#passwordError').text("Your password must be 8 and above characters long,must contain letter, number and special characters").css("color", "red");
} else {
if (password.match(number) && password.match(alphabets) && password.match(special_characters)) {	
  $("#passwordError").text("Strong password ✓✓✓").css("color", "green");
       
}
else {
  
  $('#passwordError').text("Password should contain alphabets, numbers and special characters.").css("color", "red");
}
}
      
});


    });
    // checking comfirm password

$("#cpwd").on("keyup", function() {
var number = /([0-9])/;
var alphabets = /([a-zA-Z])/;
var special_characters = /([~,!,@,#,$,%,^,&,*,.,-,_,+,=,?,>,<])/;
var password = $('#pwd').val().trim();
var cpassword = $('#cpwd').val().trim();

if (password.match(number) && password.match(alphabets) && password.match(special_characters)) {	
  $("#passwordError").text("");
}

$("#confirmPasswordError").text("Checking if comfirm Password matches with Password").css("color", "red");

if(cpassword === password){
    $("#confirmPasswordError").text("Password Matches ✓✓✓").css("color", "green");
  
}


});
</script>

</body>
</html>
