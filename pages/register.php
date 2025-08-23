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
    if ($user_type === 'reader' || $user_type === 'author') {
        $_SESSION['user_type'] = $user_type;
    } else {
        $error = "Please select an account type.";
    }
}

// Step 2 submission
if (isset($_POST['step2_submit'])) {

    $registered_type = $_SESSION['user_type'] ?? 'reader';
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

  <!-- Favicon -->
    <link rel="shortcut icon" href="../assets/img/myLogo.png" type="image/x-icon">

  <!-- SweetAlert CSS -->
<link rel="stylesheet" href="../assets/css/sweetalert.css">
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
        <p class="p">Create account as an author or a reader.</p>
<select name="user_type" id="user_type" class="my-3" required>
  <option value="" disabled selected>Select account type</option>
  <option value="reader">Register as Reader</option>
  <option value="author">Register as Author</option>
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
    <!-- Reader Form -->
<?php if ($_SESSION['user_type'] === 'reader'): ?>
    <form id="registerForm" method="POST" action="../app/process.php">

        <!-- Username-->
        <div class="input-group">
            <label for="name">Username <span class="required">*</span></label>
            <i class="fa-solid fa-circle-user icon"></i>
            <input id="username" name="username" placeholder="Your Username" type="text" />
            <span class="error" id="usernameError"></span>
        </div>

        <!-- Email -->
        <div class="input-group">
            <label for="email">Email <span class="required">*</span></label>
            <i class="fa-solid fa-envelopes-bulk icon"></i>
            <input id="email" name="email" placeholder="Your Email" type="email" />
            <span class="error" id="emailError"></span>
        </div>

        <!-- Password -->
        <div class="input-group">
            <label for="pwd">Password <span class="required">*</span></label>
            <i class="fa-solid fa-lock icon"></i>
            <input id="pwd" name="pwd" placeholder="Your Password" type="password" />
            <i id="togglePassword" class="fa-solid fa-eye toggle-icon"></i>
            <span class="error" id="pwdError"></span>
        </div>

        <!-- Confirm Password -->
        <div class="input-group">
            <label for="cpwd">Confirm Password <span class="required">*</span></label>
            <i class="fa-solid fa-house-lock icon"></i>
            <input id="cpwd" name="cpwd" placeholder="Confirm Password" type="password" />
            <i id="toggleConfirmPassword" class="fa-solid fa-eye toggle-icon"></i>
            <span class="error" id="cpwdError"></span>
        </div>

        <div>
            <button type="button" onclick="window.location.href='back.php'" class="back-btn">Back</button>
            <button type="submit" name="step2_submit">Register</button>
        </div>
    </form>
<?php elseif ($_SESSION['user_type'] === 'author'): ?>
    <form id="registerForm" method="POST" action="../app/process.php" enctype="multipart/form-data">

        <!-- Username -->
        <div class="input-group">
            <label for="username">Username <span class="required">*</span></label>
            <i class="fa-solid fa-circle-user icon"></i>
            <input id="username" name="username" placeholder="Your Username" type="text" />
            <span class="error" id="usernameError"></span>
        </div>

        <!-- Pen Name -->
        <div class="input-group">
            <label for="pen_name">Pen Name <span class="required">*</span></label>
            <i class="fa-solid fa-signature icon"></i>
            <input id="penName" name="penName" placeholder="Your Pen Name" type="text" />
            <span class="error" id="penNameError"></span>
        </div>

        <!-- Email -->
        <div class="input-group">
            <label for="email">Email <span class="required">*</span></label>
            <i class="fa-solid fa-envelopes-bulk icon"></i>
            <input id="email" name="email" placeholder="Your Email" type="email" />
            <span class="error" id="emailError"></span>
        </div>

        <!-- Profile Picture -->
        <div class="input-group file-upload">
            <label for="profile_pic">Profile Picture <span class="required">*</span></label>
            <i class="fa-solid fa-cloud-arrow-up icon"></i>
            <input id="profile_pic" name="profile_pic" class="file-input" type="file" />
        </div>

        <!-- Short Bio -->
        <div class="input-group bio">
            <label for="bio">Short Bio</label>
            <i class="fa-solid fa-feather icon-f"></i>
            <textarea name="bio" id="bio" rows="5" placeholder="Write a short bio about yourself"></textarea>
        </div>

        <!-- Password -->
        <div class="input-group">
            <label for="password">Password <span class="required">*</span></label>
            <i class="fa-solid fa-lock icon"></i>
            <input id="pwd" name="password" placeholder="Your Password" type="password" />
            <i id="togglePassword" class="fa-solid fa-eye toggle-icon"></i>
            <span class="error" id="pwdError"></span>
        </div>

        <!-- Confirm Password -->
        <div class="input-group">
            <label for="cpwd">Confirm Password <span class="required">*</span></label>
            <i class="fa-solid fa-house-lock icon"></i>
            <input id="cpwd" name="cpwd" placeholder="Confirm Password" type="password" />
            <i id="toggleConfirmPassword" class="fa-solid fa-eye toggle-icon"></i>
            <span class="error" id="cpwdError"></span>
        </div>

        <div>
            <button type="button" onclick="window.location.href='back.php'" class="back-btn">Back</button>
            <button type="submit" name="step2_submit">Register</button>
        </div>
    </form>
<?php endif; ?>
        
        <?php endif; ?>
    </div>
</section>
<script src="../assets/js/register.js"></script>

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

 


</body>
</html>
