<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Settings - SkyBook</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../assets/css/bootstrap.css">
  <!-- Favicon -->
    <link rel="shortcut icon" href="../../assets/img/myLogo.png" type="image/x-icon">
  <style>
    body {
      background-color: #F8FAFC;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .nav-tabs .nav-link {
      border: none;
      color: #1E293B;
      font-weight: 500;
      position: relative;
    }
    .nav-tabs .nav-link.active {
      color: #3B82F6;
      background-color: transparent;
    }
    .nav-tabs .nav-link::after {
      content: '';
      position: absolute;
      width: 100%;
      height: 3px;
      background-color: #FCD34D;
      bottom: 0;
      left: 0;
      transform: scaleX(0);
      transform-origin: bottom left;
      transition: transform 0.3s ease;
    }
    .nav-tabs .nav-link.active::after {
      transform: scaleX(1);
    }
    .tab-content {
      background: #FFFFFF;
      border: 1px solid #dee2e6;
      border-top: none;
      border-radius: 0 0 0.5rem 0.5rem;
    }
    .form-control:focus {
      box-shadow: none;
      border-color: #3B82F6;
    }
    .btn-primary {
      background-color: #3B82F6;
      border: none;
    }
    .btn-primary:hover {
      background-color: #2563EB;
    }
    .text-gold {
      color: #FCD34D;
    }
    .bg-light-gold {
      background-color: rgba(252, 211, 77, 0.15) !important;
    }
  </style>
</head>
<body>

<?php
include("user-navbar.php");
?>

  <div class="container py-5">
    <h2 class="mb-4 fw-bold">Account Settings</h2>

    <ul class="nav nav-tabs" id="settingsTabs" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="password-tab" data-bs-toggle="tab" data-bs-target="#password" type="button" role="tab">Password</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="privacy-tab" data-bs-toggle="tab" data-bs-target="#privacy" type="button" role="tab">Privacy</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="support-tab" data-bs-toggle="tab" data-bs-target="#support" type="button" role="tab">Support</button>
      </li>
    </ul>

    <div class="tab-content p-4" id="settingsTabsContent">
      <!-- Password Tab -->
      <div class="tab-pane fade show active" id="password" role="tabpanel">
        <h5 class="fw-semibold">Update Password</h5>
        <form>
          <div class="mb-3">
            <label class="form-label">Current Password</label>
            <input type="password" class="form-control" placeholder="••••••••">
          </div>
          <div class="mb-3">
            <label class="form-label">New Password</label>
            <input type="password" class="form-control" placeholder="At least 8 characters">
          </div>
          <div class="mb-3">
            <label class="form-label">Confirm New Password</label>
            <input type="password" class="form-control" placeholder="Re-enter new password">
          </div>
          <button type="submit" class="btn btn-primary">Save Changes</button>
        </form>
      </div>

      <!-- Privacy Tab -->
      <div class="tab-pane fade" id="privacy" role="tabpanel">
        <h5 class="fw-semibold">Privacy Settings</h5>
        <form>
            <div class="form-check form-switch mb-3">
              <input class="form-check-input" type="checkbox" id="lightMode" checked>
              <label class="form-check-label" for="lightMode">Light Mode</label>
            </div>
            <div class="form-check form-switch mb-3">
              <input class="form-check-input" type="checkbox" id="darkMode">
              <label class="form-check-label" for="darkMode">Dark Mode</label>
            </div>
          <div class="form-check form-switch mb-3">
            <input class="form-check-input" type="checkbox" id="emailUpdates">
            <label class="form-check-label" for="emailUpdates">Allow email notifications</label>
          </div>
          <button type="submit" class="btn btn-primary">Update Preferences</button>
        </form>
      </div>

      <!-- Support Tab -->
      <div class="tab-pane fade" id="support" role="tabpanel">
        <h5 class="fw-semibold">Contact & Support</h5>
        <p>If you’re experiencing any issues or have questions, please contact us below:</p>
        <form>
          <div class="mb-3">
            <label class="form-label">Your Email</label>
            <input type="email" class="form-control" placeholder="you@example.com">
          </div>
          <div class="mb-3">
            <label class="form-label">Message</label>
            <textarea class="form-control" rows="4" placeholder="Type your message..."></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Send Message</button>
        </form>
      </div>

      
  </div>

  <script src="../../assets/js/bootstrap.js"></script>
</body>
</html>
