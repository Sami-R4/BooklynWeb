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
    }

    .navbar {
      background: linear-gradient(to right, #1e293b, #3b82f6);
      padding: 0.75rem 2rem;
      border-bottom-left-radius: 1rem;
      border-bottom-right-radius: 1rem;
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

    .nav {
      gap: 1.5rem; /* more spacing between nav links */
      margin: 0;
      padding: 0;
    }

    .nav-item .nav-link {
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
    }

    .nav-item .nav-link::after {
      content: '';
      position: absolute;
      left: 0;
      bottom: -4px;
      width: 0%;
      height: 3px;
      background-color: #fcd34d;
      border-radius: 2px;
      transition: width 0.3s ease-in-out;
    }

    .nav-item .nav-link:hover {
      background-color: rgba(255, 255, 255, 0.1);
      color: #ffffff;
    }

    .nav-item .nav-link:hover::after {
      width: 97%;
    }

    .nav-item .nav-link.active {
      background-color: rgba(255, 255, 255, 0.2);
      color: white;
    }

    .nav-item .nav-link.active::after {
      width: 100%;
    }

    .nav-user {
      display: flex;
      align-items: center;
      gap: 0.5rem;
      color: #fff;
      font-weight: 500;
      white-space: nowrap;
    }

    .nav-user img {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      border: 3px solid #fcd34d;
      object-fit: cover;
    }

    /* Mobile menu button */
    .navbar-toggler {
      display: none;
      background: none;
      border: none;
      color: white;
      font-size: 1.5rem;
      cursor: pointer;
      padding: 0.5rem;
    }

    /* Responsive styles */
    @media (max-width: 992px) {
      .navbar {
        flex-wrap: wrap;
        padding: 0.75rem 1rem;
      }
      
      .nav-logo {
        margin-right: 1rem;
      }
      
      .nav {
        gap: 0.75rem;
      }
    }

    @media (max-width: 768px) {
      .navbar-toggler {
        display: block;
        order: 1;
      }
      
      .nav-logo {
        order: 0;
        margin-right: auto;
      }
      
      .nav-user {
        order: 2;
      }
      
      .nav {
        order: 3;
        flex-direction: column;
        width: 100%;
        display: none;
        padding: 1rem 0;
      }
      
      .nav.show {
        display: flex;
      }
      
      .nav-item .nav-link {
        padding: 0.75rem 1.5rem;
        border-radius: 0.5rem;
      }
      
      .nav-item .nav-link::after {
        bottom: 0;
        height: 100%;
        width: 4px !important;
        left: 0;
        border-radius: 0;
      }
      
      .nav-item .nav-link:hover::after,
      .nav-item .nav-link.active::after {
        width: 4px !important;
      }
    }

    @media (max-width: 480px) {
      .nav-user span {
        display: none;
      }
      
      .nav-logo {
        font-size: 1.1rem;
      }
    }
  </style>
</head>
<body>

<?php
session_start();
$username = $_SESSION['username'] ?? 'Guest';
?>


<nav class="navbar d-flex align-items-center">
  <button class="navbar-toggler" id="navbarToggle">
    <i class="fas fa-bars"></i>
  </button>
  
  <div class="d-flex align-items-center gap-3">
    <div class="nav-logo">
      <i class="fas fa-book-open"></i> Booklyn
    </div>
  </div>

  <ul class="nav" id="mainNav">
    <li class="nav-item">
      <a class="nav-link active" href="home.php"><i class="fas fa-home"></i> Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#"><i class="fas fa-book"></i> My Collection</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#"><i class="fas fa-heart"></i> Favorites</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#"><i class="fas fa-bookmark"></i> Saved</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#"><i class="fas fa-building-columns"></i> Libraries</a>
    </li>
  </ul>

  <div class="nav-user">
    <img src="../../assets/img/placeholder.jpg" alt="User Profile">
    <span><?php echo htmlspecialchars($username); ?></span>
  </div>
</nav>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const navbarToggle = document.getElementById('navbarToggle');
    const mainNav = document.getElementById('mainNav');
    
    navbarToggle.addEventListener('click', function() {
      mainNav.classList.toggle('show');
      
      // Change icon based on state
      const icon = this.querySelector('i');
      if (mainNav.classList.contains('show')) {
        icon.classList.remove('fa-bars');
        icon.classList.add('fa-times');
      } else {
        icon.classList.remove('fa-times');
        icon.classList.add('fa-bars');
      }
    });
    
    // Close menu when clicking on a nav link
    document.querySelectorAll('.nav-link').forEach(link => {
      link.addEventListener('click', function() {
        if (window.innerWidth <= 768) {
          mainNav.classList.remove('show');
          navbarToggle.querySelector('i').classList.remove('fa-times');
          navbarToggle.querySelector('i').classList.add('fa-bars');
        }
      });
    });
  });
</script>

</body>
</html>