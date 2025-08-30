<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Author Profile - Booklyn</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">
  <!-- Favicon -->
  <link rel="shortcut icon" href="../../assets/img/myLogo.png" type="image/x-icon">

  <style>
    body {
      background-color: #F8FAFC;
      font-family: "Segoe UI", sans-serif;
    }

    .profile-sidebar {
      background: #fff;
      border-radius: 12px;
      padding: 2rem 1.5rem;
      box-shadow: 0 2px 6px rgba(0,0,0,0.08);
      text-align: center;
    }

    .profile-sidebar img {
      width: 120px;
      height: 120px;
      object-fit: cover;
      border-radius: 50%;
      margin-bottom: 1rem;
      border: 3px solid #3B82F6;
    }

    .profile-sidebar h3 {
      font-weight: 600;
      color: #1E293B;
      margin-bottom: 0.5rem;
    }

    .profile-sidebar p.bio {
      font-size: 0.95rem;
      color: #6B7280;
      margin-bottom: 1rem;
    }

    .profile-stats {
      display: flex;
      justify-content: space-around;
      margin-top: 1rem;
    }

    .profile-stats div {
      text-align: center;
    }

    .profile-stats div span {
      display: block;
      font-weight: 600;
      color: #3B82F6;
    }

    .sidebar-links a {
      display: block;
      margin: 0.5rem 0;
      font-weight: 500;
      color: #3B82F6;
      text-decoration: none;
    }
    .sidebar-links a:hover {
      text-decoration: underline;
    }

    .main-content .card {
      border-radius: 12px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.08);
      margin-bottom: 1.5rem;
    }

    .main-content h4 {
      color: #1E293B;
      font-weight: 600;
      margin-bottom: 1rem;
    }

    .book-card {
      border-radius: 12px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.08);
      overflow: hidden;
      transition: transform 0.2s ease, box-shadow 0.2s ease;
      background: #fff;
    }

    .book-card:hover {
      transform: scale(1.02);
      box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    }

    .book-card img {
      width: 100%;
      height: 180px;
      object-fit: cover;
    }

    .book-card-body {
      padding: 1rem;
    }

    .book-card-body h5 {
      font-weight: 600;
      margin-bottom: 0.5rem;
      color: #1E293B;
    }

    .book-card-body p {
      font-size: 0.9rem;
      color: #6B7280;
      margin-bottom: 0.5rem;
    }

    .book-card-body button {
      background-color: #3B82F6;
      color: #fff;
      border: none;
      border-radius: 8px;
      padding: 0.4rem 1rem;
      font-size: 0.85rem;
    }

    .book-card-body button:hover {
      background-color: #2563EB;
    }

    .recent-activity li {
      margin-bottom: 0.75rem;
      font-size: 0.9rem;
      color: #6B7280;
    }

    @media (max-width: 992px) {
      .profile-sidebar {
        margin-bottom: 2rem;
        text-align: center;
      }
    }
  </style>
</head>
<body>

<?php include("user-navbar.php"); ?>

<div class="container py-5">
  <div class="row">
    <!-- Left Sidebar -->
    <div class="col-lg-3">
      <div class="profile-sidebar">
        <img src="../../app/<?php echo $profile_pic?>" alt="Author Profile">
        <h3>John Doe</h3>
        <p class="bio">Author, storyteller, and lover of fantasy books. Sharing stories with the world.</p>
        <div class="profile-stats">
          <div>
            <span>12</span>
            Books
          </div>
          <div>
            <span>1.2k</span>
            Followers
          </div>
          <div>
            <span>XAF 50k</span>
            Earnings
          </div>
        </div>
        <div class="sidebar-links mt-3">
          <a href="#"><i class="fa-solid fa-pen me-1"></i> Edit Profile</a>
          <a href="#"><i class="fa-solid fa-star me-1"></i> Achievements</a>
          <a href="#"><i class="fa-solid fa-bell me-1"></i> Notifications</a>
        </div>
      </div>
    </div>

    <!-- Main Content -->
    <div class="col-lg-9 main-content">
      <!-- My Books -->
      <h4>Latest Books</h4>
      <div class="row g-3 mb-4">
        <div class="col-md-6 col-lg-4">
          <div class="book-card">
            <img src="../../assets/img/glitch.jpg" alt="Book Cover">
            <div class="book-card-body">
              <h5>Glitch</h5>
              <p>Science fiction novel exploring a futuristic world...</p>
              <button>View</button>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4">
          <div class="book-card">
            <img src="../../assets/img/immortals.jpg" alt="Book Cover">
            <div class="book-card-body">
              <h5>Immortals</h5>
              <p>A thrilling mystery uncovering hidden secrets...</p>
              <button>View</button>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4">
          <div class="book-card">
            <img src="../../assets/img/redwolf.jpeg" alt="Book Cover">
            <div class="book-card-body">
              <h5>Red Wolves</h5>
              <p>A thrilling mystery uncovering hidden secrets...</p>
              <button>View</button>
            </div>
          </div>
        </div>
      </div>

      <!-- Recent Activity -->
      <div class="card p-4 mb-4">
        <h4>Recent Activity</h4>
        <ul class="recent-activity list-unstyled">
          <li><i class="fa-solid fa-book me-2"></i> Published "Glitch"</li>
          <li><i class="fa-solid fa-book me-2"></i> Received 50 new followers</li>
          <li><i class="fa-solid fa-comment me-2"></i> Commented on reader feedback</li>
          <li><i class="fa-solid fa-wallet me-2"></i> Earned XAF 10k from sales</li>
        </ul>
      </div>

      <!-- Additional Info -->
      <div class="card p-4">
        <h4>Author Info</h4>
        <p><strong>Email:</strong> johndoe@example.com</p>
        <p><strong>Joined:</strong> Jan 2023</p>
        <p><strong>Location:</strong> Douala, Cameroon</p>
        <p><strong>Genres:</strong> Sci-Fi, Mystery, Fantasy</p>
        <p><strong>Social:</strong> 
          <a href="#" class="text-decoration-none me-2"><i class="fa-brands fa-twitter"></i></a>
          <a href="#" class="text-decoration-none me-2"><i class="fa-brands fa-facebook"></i></a>
          <a href="#" class="text-decoration-none me-2"><i class="fa-brands fa-instagram"></i></a>
        </p>
      </div>

    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
