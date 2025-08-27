<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Reader Settings - Booklyn</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap -->
  <link rel="stylesheet" href="../../assets/css/bootstrap.css">
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">

  <!-- Favicon -->
  <link rel="shortcut icon" href="../../assets/img/myLogo.png" type="image/x-icon">

  <style>
    body {
      background-color: #F8FAFC;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    h2 {
      color: #1E293B;
      font-weight: 600;
    }
    .settings-container {
      display: flex;
      gap: 2rem;
      margin-top: 2rem;
    }
    /* Vertical nav */
    .nav-pills .nav-link {
      border: none;
      border-radius: 0.5rem;
      color: #1E293B;
      font-weight: 500;
      padding: 0.75rem 1rem;
      text-align: left;
      transition: all 0.2s ease;
    }
    .nav-pills .nav-link:hover {
      background-color: #E2E8F0;
      color: #1E293B;
    }
    .nav-pills .nav-link.active {
      background-color: #3B82F6;
      color: #fff;
      font-weight: 600;
    }
    /* Content styling */
    .tab-content {
      flex: 1;
      background: #FFFFFF;
      border: none;
      border-radius: 12px;
      padding: 2rem;
      box-shadow: 0 2px 6px rgba(0,0,0,0.08);
    }
    /* Form elements */
    .form-control, .form-select {
      border-radius: 8px;
    }
    .form-control:focus, .form-select:focus {
      box-shadow: none;
      border-color: #3B82F6;
    }
    .btn-primary {
      background-color: #3B82F6;
      border: none;
      border-radius: 8px;
      padding: 0.5rem 1.5rem;
    }
    .btn-primary:hover {
      background-color: #2563EB;
    }
    .form-check-input:checked {
      background-color: #3B82F6;
      border-color: #3B82F6;
    }
    .text-muted {
      font-size: 0.9rem;
    }
    @media (max-width: 768px) {
      .settings-container {
        flex-direction: column;
      }
      .nav-pills {
        flex-direction: row;
        justify-content: center;
        margin-bottom: 1rem;
      }
      .nav-pills .nav-link {
        text-align: center;
      }
    }
  </style>
</head>
<body>

<?php include("user-navbar.php"); ?>

<div class="container py-5">
  <div class="settings-header mb-4">
    <h2><i class="fa-solid fa-gear me-2"></i> Settings</h2>
    <p class="text-muted">Manage your account preferences and security</p>
  </div>

  <div class="settings-container">
    <!-- Left Tabs -->
    <div class="nav flex-column nav-pills me-3" id="settingsTabs" role="tablist">
      <button class="nav-link active" id="password-tab" data-bs-toggle="pill" data-bs-target="#password" type="button" role="tab">
        <i class="fa-solid fa-lock me-2"></i> Password
      </button>
      <button class="nav-link" id="privacy-tab" data-bs-toggle="pill" data-bs-target="#privacy" type="button" role="tab">
        <i class="fa-solid fa-shield-halved me-2"></i> Privacy
      </button>
      <button class="nav-link" id="support-tab" data-bs-toggle="pill" data-bs-target="#support" type="button" role="tab">
        <i class="fa-solid fa-headset me-2"></i> Support
      </button>
    </div>

    <!-- Right Content -->
    <div class="tab-content" id="settingsTabsContent">
      
      <!-- Password Tab -->
      <div class="tab-pane fade show active" id="password" role="tabpanel">
        <h5 class="fw-semibold mb-3">Update Password</h5>
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
        <h5 class="fw-semibold mb-3">Privacy Settings</h5>
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
        <h5 class="fw-semibold mb-3">Contact & Support</h5>
        <p class="text-muted">If you’re experiencing any issues or have questions, please contact us below:</p>
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
  </div>
</div>

<script src="../../assets/js/bootstrap.js"></script>
</body>
</html>
