<?php
// Start session first
session_start();

// Check if user is logged in
if(!isset($_SESSION['user_id'])){
  echo '<script>
        if(window.confirm("You have to login!!!")){
        window.location.href = "../login.php";
        }
  </script>';
  exit();
}

include("../../app/dbconfig.php");

// Get username based on user type
if(isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'author' && isset($_SESSION['pen_name'])) {
    $username = $_SESSION['pen_name'];
} else {
    $username = $_SESSION['username'] ?? 'User';
}

// Get profile picture
$profile_pic = '../../assets/img/placeholder.jpg'; // Default image


if(isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'author' && isset($_SESSION['author_id'])) {
    $author_id = $_SESSION['author_id'];
    $author_sql = "SELECT pic_path FROM authors WHERE author_id = '$author_id'";
    $author_qry = mysqli_query($conn, $author_sql);
    
    if($author_qry && mysqli_num_rows($author_qry) == 1){
        $author_result = mysqli_fetch_assoc($author_qry);
        if(!empty($author_result['pic_path'])) {
            $profile_pic = $author_result['pic_path'];
        }
    }
} 

// Active States
$currentPage = basename($_SERVER['PHP_SELF']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>SkyBook Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS -->
  <link href="../../assets/css/bootstrap.css" rel="stylesheet">
  <link href="../../assets/css/user_navbar.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
</head>
<body>

<!-- Desktop Navigation -->
<nav class="top-navbar">
  <div class="d-flex align-items-center gap-3">
    <div class="nav-logo">
      <img src="../../assets/img/myLogo.png" alt="logo" style="border-radius: 50%;" width="30" height="30"> Booklyn
    </div>
    <ul class="desktop-nav">
      <li>
        <a class="nav-link <?php echo $currentPage == 'dashboard.php' ? 'active': '' ?>" href="dashboard.php"><i class="fas fa-gauge"></i> Dashboard</a>
      </li>
      <li>
        <a class="nav-link <?php echo $currentPage == 'myBooks.php' ? 'active': '' ?>" href="myBooks.php"><i class="fa-solid fa-book"></i> My Books</a>
      </li>
      <li>
        <a class="nav-link <?php echo $currentPage == 'uploads.php' ? 'active': '' ?>" href="uploads.php"><i class="fas fa-upload"></i> Uploads</a>
      </li>
      <li class="position-relative">
        <a class="nav-link <?php echo $currentPage == 'insights.php' ? 'active' : '' ?>" href="insights.php"><i class="fas fa-chart-line"></i> Insights</a>
      </li>
      <li class="position-relative">
        <a class="nav-link <?php echo $currentPage == 'feedback.php' ? 'active' : '' ?>" href="feedback.php"><i class="fas fa-comments"></i> Feedback</a>
      </li>
    </ul>
  </div>

  <div class="nav-user">
      <span><?php echo htmlspecialchars($username); ?></span>
    <span class="d-flex gap-1">
    <img src="../../app/<?php echo $profile_pic?>" alt="User Profile" id="userDropdownToggle">
    </span>
    <div class="user-dropdown" id="userDropdown">
      <a href="profile.php"><i class="fa-solid fa-cog"></i> Settings</a>
      <a href="profile.php"><i class="fa-solid fa-user"></i> View Profile</a>
      <a href="../index.php"><i class="fa-solid fa-arrow-rotate-left"></i> Return to Home</a>
      <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a> <!-- Fixed: added logout link -->
    </div>
  </div>
</nav>

<!-- Mobile Bottom Navigation -->
<nav class="bottom-navbar">
  <ul class="mobile-nav">
    <li class="mobile-nav-item">
      <a class="mobile-nav-link" href="dashboard.php">
        <i class="fas fa-gauge"></i>
        <span>Dashboard</span>
      </a>
    </li>
    <li class="mobile-nav-item">
      <a class="mobile-nav-link" href="myBooks.php">
        <i class="fas fa-book"></i>
        <span>My Books</span>
      </a>
    </li>
    <li class="mobile-nav-item">
        <a class="mobile-nav-link" href="uploads.php"> <!-- Fixed: changed href to uploads.php -->
            <i class="fas fa-upload"></i>
            <span>Uploads</span>
        </a>
    </li>
    <li class="mobile-nav-item">
        <a class="mobile-nav-link" href="insights.php">
            <i class="fas fa-chart-line"></i>
            <span>Insights</span>
        </a>
    </li>
    <!-- Dropdown -->
    <li class="mobile-nav-item">
      <div class="mobile-nav-link" id="mobileUserDropdownToggle">
        <img src="<?php echo $profile_pic;?>" alt="User" style="width: 24px; height: 24px; border-radius: 50%; border: 2px solid #fcd34d; object-fit: cover;">
        <span>Account</span>
      </div>
      <div class="mobile-dropdown" id="mobileUserDropdown">
      <a href="settings.php"><i class="fa-solid fa-cog"></i> Settings</a>
      <a href="profile.php"><i class="fa-solid fa-user"></i> View Profile</a>
      <a href="../index.php"><i class="fa-solid fa-arrow-rotate-left"></i> Return to Home</a>
        <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a> <!-- Fixed: added logout link -->
      </div>
    </li>
  </ul>
</nav>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Desktop user dropdown
    const userDropdownToggle = document.getElementById('userDropdownToggle');
    const userDropdown = document.getElementById('userDropdown');
    
    if (userDropdownToggle) {
      userDropdownToggle.addEventListener('click', function(e) {
        e.stopPropagation();
        userDropdown.classList.toggle('show');
      });
    }

    // Mobile user dropdown
    const mobileUserDropdownToggle = document.getElementById('mobileUserDropdownToggle');
    const mobileUserDropdown = document.getElementById('mobileUserDropdown');
    
    if (mobileUserDropdownToggle) {
      mobileUserDropdownToggle.addEventListener('click', function(e) {
        e.stopPropagation();
        mobileUserDropdown.classList.toggle('show');
      });
    }

    // Close dropdowns when clicking outside
    document.addEventListener('click', function() {
      if (userDropdown) userDropdown.classList.remove('show');
      if (mobileUserDropdown) mobileUserDropdown.classList.remove('show');
    });

    // Set active link in mobile nav based on current page
    const currentPage = window.location.pathname.split('/').pop();
    const mobileLinks = document.querySelectorAll('.mobile-nav-link');
    
    mobileLinks.forEach(link => {
      if (link.getAttribute('href') === currentPage) {
        link.classList.add('active');
      }
    });
  });
</script>

</body>
</html>