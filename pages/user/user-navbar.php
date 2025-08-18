<?php
// Active States
  $currentPage = basename($_SERVER['PHP_SELF']);
  // Set Session
session_start();
$session = $_SESSION['user_id'];
$username = $_SESSION['username'];

if(!isset($session)){
  echo '<script>
        if(window.confirm("You have to login!!!")){
        window.location.href = "../index.php";
}
  </script>';
}

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
      <i class="fas fa-book-open"></i> Booklyn
    </div>
    <ul class="desktop-nav">
      <li>
        <a class="nav-link <?php echo $currentPage == 'home.php' ? 'active': '' ?>" href="home.php"><i class="fas fa-home"></i> Home</a>
      </li>
      <li>
        <a class="nav-link <?php echo $currentPage == 'collections.php' ? 'active': '' ?>" href="communities.php"><i class="fa-solid fa-users"></i> My Communities</a>
      </li>
      <li>
        <a class="nav-link <?php echo $currentPage == 'favorites.php' ? 'active': '' ?>" href="favorites.php"><i class="fas fa-heart"></i> Favorites</a>
      </li>
      <li class="position-relative">
  <a class="nav-link <?php echo $currentPage == 'cart.php' ? 'active' : '' ?>" href="cart.php">
    <i class="fas fa-shopping-cart"></i> Cart
    <?php $cartCount = count($_SESSION['cart'] ?? []); ?>
    <?php if ($cartCount > 0): ?>
      <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill" style="background-color: #fcd34d; color: #000; font-size: 0.65rem;">
        <?php echo $cartCount; ?>
      </span>
    <?php endif; ?>
  </a>
</li>

      <li>
        <a class="nav-link <?php echo $currentPage == 'settings.php' ? 'active' : '' ?>" href="settings.php"><i class="fas fa-cog"></i> Settings</a>
      </li>
    </ul>
  </div>

  <div class="nav-user">
      <span><?php echo htmlspecialchars($username); ?></span>
    <span class="d-flex gap-1">
    <img src="../../assets/img/placeholder.jpg" alt="User Profile" id="userDropdownToggle"><i class="fa-solid fa-caret-down mt-2"></i>
    </span>
    <div class="user-dropdown" id="userDropdown">
      <a href="../index.php"><i class="fa-solid fa-arrow-rotate-left"></i> Return to Home</a>
      <a href="#"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </div>
  </div>
</nav>

<!-- Mobile Bottom Navigation -->
<nav class="bottom-navbar">
  <ul class="mobile-nav">
    <li class="mobile-nav-item">
      <a class="mobile-nav-link" href="home.php">
        <i class="fas fa-home"></i>
        <span>Home</span>
      </a>
    </li>
    <li class="mobile-nav-item">
      <a class="mobile-nav-link" href="communities.php">
        <i class="fas fa-book"></i>
        <span>Communities</span>
      </a>
    </li>
    <li class="mobile-nav-item">
        <a class="mobile-nav-link" href="favorites.php">
            <i class="fas fa-heart"></i>
            <span>Favorites</span>
        </a>
    </li>
    <li class="mobile-nav-item position-relative">
  <a class="mobile-nav-link <?php echo $currentPage == 'cart.php' ? 'active' : '' ?>" href="cart.php">
    <i class="fas fa-shopping-cart position-relative">
      <?php if ($cartCount > 0): ?>
        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill" style="background-color: #fcd34d; color: #000; font-size: 0.55rem;">
          <?php echo $cartCount; ?>
        </span>
      <?php endif; ?>
    </i>
    <span>Cart</span>
  </a>
</li>

    <li class="mobile-nav-item">
        <a class="mobile-nav-link" href="settings.php">
            <i class="fas fa-cog"></i>
            <span>Settings</span>
        </a>
    </li>
    <li class="mobile-nav-item">
      <div class="mobile-nav-link" id="mobileUserDropdownToggle">
        <img src="../../assets/img/placeholder.jpg" alt="User" style="width: 24px; height: 24px; border-radius: 50%; border: 2px solid #fcd34d; object-fit: cover;">
        <span>Account</span>
      </div>
      <div class="mobile-dropdown" id="mobileUserDropdown">
      <a href="../index.php"><i class="fa-solid fa-arrow-rotate-left"></i> Return to Home</a>
        <a href="#"><i class="fas fa-sign-out-alt"></i> Logout</a>
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