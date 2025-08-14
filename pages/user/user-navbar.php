<?php
// Active States
  $currentPage = basename($_SERVER['PHP_SELF']);
  // Set Session
session_start();
$session = $_SESSION['user_id'];
$username = $_SESSION['username'];

if(!isset($session)){
  header("location: ../index.php");
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
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

  <style>
    @font-face {
        font-family: "Manrope";
        src: url("../../assets/fonts/MANROPE-VARIABLEFONT_WGHT.TTF");
    }
    *{
        font-family: "Manrope", sans-serif;
    }
    body {
      background: #f8fafc;
      padding-bottom: 80px; /* Space for bottom nav */
      transition: all 0.3s ease;
    }

    /* Desktop Navbar */
    .top-navbar {
      background: linear-gradient(to right, #1e293b, #3b82f6);
      padding: 0.75rem 2rem;
      border-bottom-left-radius: 1rem;
      border-bottom-right-radius: 1rem;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .nav-logo {
      color: white;
      font-weight: 700;
      font-size: 1.3rem;
      margin-right: 2rem;
      white-space: nowrap;
    }

    .nav-logo i {
      margin-right: 0.3rem;
    }

    .desktop-nav {
      display: flex;
      gap: 1.5rem;
      margin: 0;
      padding: 0;
      list-style: none;
    }

    .desktop-nav .nav-link {
      color: #e2e8f0;
      font-weight: 500;
      padding: 0.5rem 1.2rem;
      display: flex;
      align-items: center;
      gap: 0.5rem;
      border-radius: 2rem;
      position: relative;
      transition: all 0.3s ease-in-out;
      background-color: transparent;
      white-space: nowrap;
      text-decoration: none;
    }

    .desktop-nav .nav-link:hover{
      background-color: rgba(255, 255, 255, 0.2);
      color: white;
      border: 1.5px solid #fcd34d;
    }

    .desktop-nav .nav-link.active {
      background-color: rgba(255, 255, 255, 0.2);
      color: white;
      border: 2px solid #fcd34d;
    }

    .nav-user {
      display: flex;
      align-items: center;
      gap: 0.5rem;
      color: #fff;
      font-weight: 500;
      white-space: nowrap;
      position: relative;
    }

    .nav-user img {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      border: 3px solid #fcd34d;
      object-fit: cover;
      cursor: pointer;
    }

    .user-dropdown {
      display: none;
      position: absolute;
      top: 100%;
      right: 0;
      background: white;
      border-radius: 0.5rem;
      box-shadow: 0 4px 12px rgba(0,0,0,0.15);
      min-width: 200px;
      z-index: 1000;
      overflow: hidden;
    }

    .user-dropdown.show {
      display: block;
    }

    .user-dropdown a {
      display: block;
      padding: 0.75rem 1rem;
      color: #334155;
      text-decoration: none;
      transition: background 0.2s;
    }

    .user-dropdown a:hover {
      background: #f1f5f9;
    }

    .user-dropdown a i {
      margin-right: 0.5rem;
      width: 20px;
      text-align: center;
    }

    /* Mobile Bottom Navbar */
    .bottom-navbar {
      display: none;
      position: fixed;
      bottom: 0;
      left: 0;
      right: 0;
      background: linear-gradient(to right, #1e293b, #3b82f6);
      padding: 0.5rem 0;
      z-index: 1000;
      box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.1);
    }

    .mobile-nav {
      display: flex;
      justify-content: space-around;
      list-style: none;
      margin: 0;
      padding: 0;
    }

    .mobile-nav-item {
      flex: 1;
      text-align: center;
      position: relative;
    }

    .mobile-nav-link {
      color: #e2e8f0;
      display: flex;
      flex-direction: column;
      align-items: center;
      padding: 0.5rem;
      text-decoration: none;
      font-size: 0.7rem;
      transition: all 0.3s ease;
    }

    .mobile-nav-link i {
      font-size: 1.2rem;
      margin-bottom: 0.3rem;
    }

    .mobile-nav-link.active {
      color: #fcd34d;
    }

    .mobile-nav-link.active i {
      color: #fcd34d;
    }

    /* Mobile dropdown menu */
    .mobile-dropdown {
      display: none;
      position: absolute;
      bottom: 100%;
      left: 50%;
      transform: translateX(-50%);
      background: white;
      border-radius: 0.5rem;
      box-shadow: 0 -4px 12px rgba(0,0,0,0.15);
      min-width: 160px;
      z-index: 1001;
      margin-bottom: 10px;
    }

    .mobile-dropdown.show {
      display: block;
    }

    .mobile-dropdown a {
      display: flex;
      align-items: center;
      padding: 0.75rem 1rem;
      color: #334155;
      text-decoration: none;
      font-size: 0.8rem;
    }

    .mobile-dropdown a i {
      margin-right: 0.5rem;
      font-size: 1rem;
    }

    /* Responsive styles */
    @media (max-width: 992px) {
      .top-navbar {
        padding: 0.75rem 1rem;
      }
      
      .nav-logo {
        margin-right: 1rem;
      }
      
      .desktop-nav {
        gap: 0.75rem;
      }
    }

    @media (max-width: 968px) {
      .top-navbar {
        display: none;
      }
      
      .bottom-navbar {
        display: block;
      }
      
      body {
        padding-bottom: 70px;
      }
    }

    @media (max-width: 480px) {
      .mobile-nav-link {
        font-size: 0.6rem;
      }
      
      .mobile-nav-link i {
        font-size: 1rem;
      }
    }
  </style>
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
      <a class="mobile-nav-link active" href="home.php">
        <i class="fas fa-home"></i>
        <span>Home</span>
      </a>
    </li>
    <li class="mobile-nav-item">
      <a class="mobile-nav-link" href="#">
        <i class="fas fa-book"></i>
        <span>Collection</span>
      </a>
    </li>
    <li class="mobile-nav-item">
        <a class="mobile-nav-link" href="#">
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
        <a class="mobile-nav-link" href="">
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