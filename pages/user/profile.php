<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SkyBook - Digital Library</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    /* ===== CUSTOM VARIABLES ===== */
    :root {
      --primary: #3B82F6;
      --primary-dark: #2563EB;
      --secondary: #1E293B;
      --accent: #FCD34D;
      --light: #F8FAFC;
      --white: #FFFFFF;
      --text: #1E293B;
      --text-light: #64748B;
      --success: #10B981;
      --warning: #F59E0B;
      --danger: #EF4444;
      
      --radius: 12px;
      --shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
      --transition: all 0.3s ease;
    }

    /* ===== BASE STYLES ===== */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Segoe UI', system-ui, sans-serif;
      background-color: var(--light);
      color: var(--text);
      line-height: 1.6;
    }

    a {
      text-decoration: none;
      color: inherit;
    }

    img {
      max-width: 100%;
      display: block;
    }

    .container {
      width: 100%;
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 20px;
    }

    /* ===== NAVIGATION ===== */
    .navbar {
      background: linear-gradient(135deg, var(--secondary) 0%, var(--primary-dark) 100%);
      padding: 15px 0;
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      z-index: 100;
      border-radius: 0 0 20px 20px;
      box-shadow: var(--shadow);
    }

    .nav-container {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .logo {
      display: flex;
      align-items: center;
      gap: 10px;
      color: white;
      font-weight: 600;
      font-size: 1.25rem;
    }

    .logo i {
      font-size: 1.5rem;
    }

    .nav-links {
      display: flex;
      gap: 5px;
    }

    .nav-link {
      color: rgba(255, 255, 255, 0.85);
      padding: 10px 20px;
      border-radius: 50px;
      font-weight: 500;
      transition: var(--transition);
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .nav-link:hover {
      background: rgba(255, 255, 255, 0.1);
      color: white;
    }

    .nav-link.active {
      background: rgba(255, 255, 255, 0.15);
      color: white;
      font-weight: 600;
    }

    .user-menu {
      display: flex;
      align-items: center;
      gap: 15px;
    }

    .credit-badge {
      background-color: var(--accent);
      color: var(--secondary);
      padding: 5px 10px;
      border-radius: 50px;
      font-weight: 600;
      font-size: 0.85rem;
    }

    .user-avatar {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      object-fit: cover;
      border: 2px solid var(--accent);
      cursor: pointer;
    }

    /* ===== MAIN CONTENT ===== */
    main {
      padding-top: 80px;
      padding-bottom: 40px;
    }

    .section {
      margin-bottom: 40px;
    }

    .section-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 20px;
    }

    .section-title {
      font-size: 1.5rem;
      font-weight: 700;
      color: var(--secondary);
      position: relative;
      padding-bottom: 8px;
    }

    .section-title:after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 0;
      width: 40px;
      height: 3px;
      background: var(--accent);
      border-radius: 2px;
    }

    .btn {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      padding: 8px 16px;
      border-radius: 8px;
      font-weight: 500;
      transition: var(--transition);
      border: none;
      cursor: pointer;
    }

    .btn-primary {
      background: var(--primary);
      color: white;
    }

    .btn-primary:hover {
      background: var(--primary-dark);
    }

    .btn-outline {
      background: transparent;
      border: 1px solid var(--primary);
      color: var(--primary);
    }

    .btn-outline:hover {
      background: rgba(59, 130, 246, 0.1);
    }

    .btn-danger {
      background: var(--danger);
      color: white;
    }

    .btn-sm {
      padding: 6px 12px;
      font-size: 0.85rem;
    }

    /* ===== BOOK GRID ===== */
    .book-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
      gap: 20px;
    }

    .book-card {
      background: var(--white);
      border-radius: var(--radius);
      overflow: hidden;
      box-shadow: var(--shadow);
      transition: var(--transition);
    }

    .book-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
    }

    .book-cover {
      height: 200px;
      width: 100%;
      object-fit: cover;
      transition: transform 0.5s ease;
    }

    .book-card:hover .book-cover {
      transform: scale(1.05);
    }

    .book-badges {
      position: absolute;
      top: 10px;
      left: 10px;
      display: flex;
      gap: 5px;
    }

    .badge {
      padding: 4px 8px;
      border-radius: 4px;
      font-size: 0.75rem;
      font-weight: 600;
    }

    .badge-primary {
      background: var(--primary);
      color: white;
    }

    .badge-success {
      background: var(--success);
      color: white;
    }

    .badge-warning {
      background: var(--warning);
      color: var(--secondary);
    }

    .book-info {
      padding: 15px;
    }

    .book-title {
      font-weight: 600;
      margin-bottom: 5px;
    }

    .book-author {
      color: var(--text-light);
      font-size: 0.85rem;
      margin-bottom: 15px;
    }

    .book-actions {
      display: flex;
      gap: 8px;
    }

    /* ===== PROFILE PAGE ===== */
    .profile-container {
      display: grid;
      grid-template-columns: 300px 1fr;
      gap: 30px;
    }

    .profile-sidebar {
      background: var(--white);
      border-radius: var(--radius);
      padding: 30px;
      box-shadow: var(--shadow);
      text-align: center;
    }

    .profile-avatar {
      width: 120px;
      height: 120px;
      border-radius: 50%;
      object-fit: cover;
      border: 4px solid var(--accent);
      margin: 0 auto 20px;
    }

    .profile-name {
      font-size: 1.25rem;
      font-weight: 700;
      margin-bottom: 5px;
    }

    .profile-meta {
      color: var(--text-light);
      margin-bottom: 20px;
    }

    .profile-stats {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 15px;
      margin-bottom: 30px;
    }

    .stat-card {
      background: var(--light);
      border-radius: var(--radius);
      padding: 15px;
      text-align: center;
    }

    .stat-number {
      font-size: 1.5rem;
      font-weight: 700;
      color: var(--primary);
      line-height: 1;
      margin-bottom: 5px;
    }

    .stat-label {
      font-size: 0.85rem;
      color: var(--text-light);
    }

    .profile-content {
      background: var(--white);
      border-radius: var(--radius);
      padding: 30px;
      box-shadow: var(--shadow);
    }

    .form-group {
      margin-bottom: 20px;
    }

    .form-label {
      display: block;
      margin-bottom: 8px;
      font-weight: 500;
    }

    .form-control {
      width: 100%;
      padding: 10px 15px;
      border: 1px solid #ddd;
      border-radius: 8px;
      font-family: inherit;
      transition: var(--transition);
    }

    .form-control:focus {
      outline: none;
      border-color: var(--primary);
      box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.2);
    }

    /* ===== SETTINGS PAGE ===== */
    .settings-container {
      display: grid;
      grid-template-columns: 250px 1fr;
      gap: 30px;
    }

    .settings-menu {
      background: var(--white);
      border-radius: var(--radius);
      box-shadow: var(--shadow);
    }

    .settings-menu-item {
      padding: 15px 20px;
      border-bottom: 1px solid #eee;
      font-weight: 500;
      transition: var(--transition);
    }

    .settings-menu-item:hover {
      background: var(--light);
    }

    .settings-menu-item.active {
      background: var(--primary);
      color: white;
    }

    .settings-content {
      background: var(--white);
      border-radius: var(--radius);
      padding: 30px;
      box-shadow: var(--shadow);
    }

    /* ===== RESPONSIVE ADJUSTMENTS ===== */
    @media (max-width: 992px) {
      .profile-container,
      .settings-container {
        grid-template-columns: 1fr;
      }
      
      .nav-links {
        display: none;
      }
      
      .mobile-menu-btn {
        display: block;
        color: white;
        font-size: 1.5rem;
      }
    }

    @media (max-width: 768px) {
      .book-grid {
        grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
      }
      
      .section-title {
        font-size: 1.25rem;
      }
    }

    @media (max-width: 576px) {
      .book-grid {
        grid-template-columns: 1fr 1fr;
      }
      
      .profile-stats {
        grid-template-columns: 1fr;
      }
    }
  </style>
</head>
<body>

  <?php include("user-navbar.php"); ?>

  <!-- Main Content -->
  <main class="container">
    <!-- Profile Page -->
    <div class="profile-container">
      <!-- Profile Sidebar -->
      <div class="profile-sidebar">
        <img src="https://via.placeholder.com/150" class="profile-avatar" alt="Profile">
        <h3 class="profile-name">John Doe</h3>
        <p class="profile-meta">Member since June 2023</p>
        
        <div class="profile-stats">
          <div class="stat-card">
            <div class="stat-number">24</div>
            <div class="stat-label">Books Read</div>
          </div>
          <div class="stat-card">
            <div class="stat-number">8</div>
            <div class="stat-label">Favorites</div>
          </div>
          <div class="stat-card">
            <div class="stat-number">15</div>
            <div class="stat-label">Credits</div>
          </div>
        </div>
        
        <button class="btn btn-primary" style="width: 100%;">
          <i class="fas fa-camera"></i> Change Photo
        </button>
      </div>
      
      <!-- Profile Content -->
      <div class="profile-content">
        <div class="section">
          <h2 class="section-title">Profile Information</h2>
          
          <form>
            <div class="form-group">
              <label class="form-label">First Name</label>
              <input type="text" class="form-control" value="John">
            </div>
            
            <div class="form-group">
              <label class="form-label">Last Name</label>
              <input type="text" class="form-control" value="Doe">
            </div>
            
            <div class="form-group">
              <label class="form-label">Email Address</label>
              <input type="email" class="form-control" value="john.doe@example.com">
            </div>
            
            <div class="form-group">
              <label class="form-label">Phone Number</label>
              <input type="tel" class="form-control" value="+237 6XX XXX XXX">
            </div>
            
            <div class="form-group">
              <label class="form-label">Address</label>
              <textarea class="form-control" rows="3">123 Book Street, Yaoundé, Cameroon</textarea>
            </div>
            
            <button type="submit" class="btn btn-primary">
              <i class="fas fa-save"></i> Save Changes
            </button>
          </form>
        </div>
        
        <div class="section">
          <h2 class="section-title">Account Settings</h2>
          
          <div class="settings-container">
            <!-- Settings Menu -->
            <div class="settings-menu">
              <a href="profile.html" class="settings-menu-item active">
                <i class="fas fa-user-circle"></i> Profile
              </a>
              <a href="settings.html" class="settings-menu-item">
                <i class="fas fa-cog"></i> Preferences
              </a>
              <a href="security.html" class="settings-menu-item">
                <i class="fas fa-lock"></i> Security
              </a>
              <a href="notifications.html" class="settings-menu-item">
                <i class="fas fa-bell"></i> Notifications
              </a>
              <a href="payment.html" class="settings-menu-item">
                <i class="fas fa-credit-card"></i> Payment
              </a>
            </div>
            
            <!-- Settings Content -->
            <div class="settings-content">
              <h3 class="section-title">Change Password</h3>
              
              <form>
                <div class="form-group">
                  <label class="form-label">Current Password</label>
                  <input type="password" class="form-control">
                </div>
                
                <div class="form-group">
                  <label class="form-label">New Password</label>
                  <input type="password" class="form-control">
                </div>
                
                <div class="form-group">
                  <label class="form-label">Confirm New Password</label>
                  <input type="password" class="form-control">
                </div>
                
                <button type="submit" class="btn btn-primary">
                  <i class="fas fa-key"></i> Update Password
                </button>
              </form>
              
              <div class="section" style="margin-top: 30px;">
                <h3 class="section-title">Account Actions</h3>
                
                <div class="form-group">
                  <button class="btn btn-outline" style="width: 100%;">
                    <i class="fas fa-download"></i> Export Data
                  </button>
                </div>
                
                <div class="form-group">
                  <button class="btn btn-outline" style="width: 100%;">
                    <i class="fas fa-trash"></i> Delete Account
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
</body>
</html>