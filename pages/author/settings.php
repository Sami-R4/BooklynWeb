<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Author Settings - Booklyn</title>

  <!-- Favicon -->
    <link rel="shortcut icon" href="../../assets/img/myLogo.png" type="image/x-icon">
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">

  <style>
    body {
      background-color: #F8FAFC;
      font-family: "Segoe UI", sans-serif;
    }
    .settings-header {
      margin-bottom: 2rem;
    }
    .settings-header h2 {
      color: #1E293B;
      font-weight: 600;
    }
    .card {
      border: none;
      border-radius: 12px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.08);
      margin-bottom: 1.5rem;
    }
    .card-header {
      background-color: transparent;
      font-weight: 600;
      font-size: 1.1rem;
      color: #3B82F6;
      border-bottom: 1px solid #eee;
    }
    .card-profile{
        display: flex;
    }
    .form-control, .form-select {
      border-radius: 8px;
    }
    .btn-save {
      background-color: #3B82F6 !important;
      border: none;
      border-radius: 8px;
      padding: 0.5rem 1.5rem;
      color: white !important;
    }
    .btn-save:hover {
      background-color: #2563EB;
    }
    .danger-zone {
      border: 1px solid #FCA5A5;
    }
    .btn-danger {
      border-radius: 8px;
      padding: 0.5rem 1.5rem;
    }
    /* Tabs styling */
    .nav-tabs .nav-link.active {
      background-color: #3B82F6;
      color: #000 !important;
      border-radius: 8px 8px 0 0;
    }
    .nav-tabs .nav-link {
      color: #1E293B;
      font-weight: 500;
    }
    @media (max-width: 768px) {
      /* On mobile, remove tabs and show all cards stacked */
      .nav-tabs {
        display: none;
      }
      .tab-content>.tab-pane {
        display: block !important;
        opacity: 1;
      }
    }
  </style>
</head>
<body>

<?php include ("user-navbar.php") ?>

<div class="container py-5">
  <!-- Page Header -->
  <div class="settings-header text-center">
    <h2><i class="fa-solid fa-gear me-2"></i> Settings</h2>
    <p class="text-muted">Manage your account preferences and security</p>
  </div>

  <!-- Tabs -->
  <ul class="nav nav-tabs mb-3" id="settingsTabs" role="tablist">
    <li class="nav-item"><button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile"><i class="fa-solid fa-user me-1"></i> Profile</button></li>
    <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#security"><i class="fa-solid fa-lock me-1"></i> Security</button></li>
    <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#payment"><i class="fa-solid fa-wallet me-1"></i> Payments</button></li>
    <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#notifications"><i class="fa-solid fa-bell me-1"></i> Notifications</button></li>
    <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#privacy"><i class="fa-solid fa-shield-halved me-1"></i> Privacy</button></li>
    <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#danger"><i class="fa-solid fa-triangle-exclamation me-1"></i> Danger</button></li>
  </ul>

  <!-- Tab Content -->
  <div class="tab-content">

    <!-- Profile Settings -->
<div class="tab-pane fade show active" id="profile">
  <div class="card card-profile">
    <div class="card-header">
      <i class="fa-solid fa-user me-2"></i> Profile Settings
    </div>
    <div class="card-body">
      
      <!-- Profile Picture Upload -->
      <div class="mb-4 text-center">
        <div class="position-relative d-inline-block">
          <!-- Circle Avatar -->
          <img id="profilePreview" src="../../app/<?php echo $profile_pic?>" 
               class="rounded-circle border border-2" 
               style="width: 120px; height: 120px; object-fit: cover;" alt="Profile">

          <!-- Upload Icon Overlay -->
          <label for="profilePicUpload" class="position-absolute bottom-0 end-0 bg-primary text-white rounded-circle p-2 shadow"
                 style="cursor:pointer; padding: 10px 20px;">
            <i class="fa-solid fa-upload"></i>
          </label>
          <input type="file" id="profilePicUpload" class="d-none" accept="image/*" onchange="previewProfile(event)">
        </div>
        <p class="text-muted mt-2">Upload a profile picture</p>
      </div>

      <!-- Display Name -->
       <div>
      <div class="mb-3">
        <label class="form-label">Display Name</label>
        <input type="text" class="form-control" placeholder="Your pen name">
      </div>

      <!-- Bio -->
      <div class="mb-3">
        <label class="form-label">Bio</label>
        <textarea class="form-control" rows="3" placeholder="Tell readers about yourself"></textarea>
      </div>
      </div>

      <button class="btn btn-save">Save</button>
    </div>
  </div>
</div>

    <!-- Account Security -->
    <div class="tab-pane fade" id="security">
      <div class="card">
        <div class="card-header"><i class="fa-solid fa-lock me-2"></i> Account Security</div>
        <div class="card-body">
          <div class="mb-3">
            <label class="form-label">Change Email</label>
            <input type="email" class="form-control" placeholder="newemail@example.com">
          </div>
          <div class="mb-3">
            <label class="form-label">Change Password</label>
            <input type="password" class="form-control" placeholder="New password">
          </div>
          <button class="btn btn-save">Update</button>
        </div>
      </div>
    </div>

    <!-- Payment & Earnings -->
    <div class="tab-pane fade" id="payment">
      <div class="card">
        <div class="card-header"><i class="fa-solid fa-wallet me-2"></i> Payment & Earnings</div>
        <div class="card-body">
          <div class="mb-3">
            <label class="form-label">Payout Method</label>
            <select class="form-select">
              <option>Bank Transfer</option>
              <option>PayPal</option>
              <option>Mobile Money</option>
            </select>
          </div>
          <button class="btn btn-save">Save</button>
        </div>
      </div>
    </div>

    <!-- Notifications -->
    <div class="tab-pane fade" id="notifications">
      <div class="card">
        <div class="card-header"><i class="fa-solid fa-bell me-2"></i> Notifications</div>
        <div class="card-body">
          <div class="form-check form-switch mb-2">
            <input class="form-check-input" type="checkbox" checked>
            <label class="form-check-label">Email Notifications</label>
          </div>
          <div class="form-check form-switch mb-2">
            <input class="form-check-input" type="checkbox">
            <label class="form-check-label">New Feedback Alerts</label>
          </div>
          <div class="form-check form-switch mb-2">
            <input class="form-check-input" type="checkbox" checked>
            <label class="form-check-label">Sales Updates</label>
          </div>
          <button class="btn btn-save">Update</button>
        </div>
      </div>
    </div>

    <!-- Privacy -->
    <div class="tab-pane fade" id="privacy">
      <div class="card">
        <div class="card-header"><i class="fa-solid fa-shield-halved me-2"></i> Privacy & Preferences</div>
        <div class="card-body">
          <div class="form-check mb-2">
            <input class="form-check-input" type="checkbox" checked>
            <label class="form-check-label">Show profile publicly</label>
          </div>
          <div class="form-check mb-2">
            <input class="form-check-input" type="checkbox">
            <label class="form-check-label">Allow messages from readers</label>
          </div>
          <button class="btn btn-save">Save</button>
        </div>
      </div>
    </div>

    <!-- Danger Zone -->
    <div class="tab-pane fade" id="danger">
      <div class="card danger-zone">
        <div class="card-header text-danger"><i class="fa-solid fa-triangle-exclamation me-2"></i> Danger Zone</div>
        <div class="card-body">
          <p class="text-muted">Be careful — these actions cannot be undone.</p>
          <button class="btn btn-danger me-2">Deactivate Account</button>
          <button class="btn btn-outline-danger">Delete Account</button>
        </div>
      </div>
    </div>

  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Script for Preview -->
<script>
function previewProfile(event) {
  const reader = new FileReader();
  reader.onload = function(){
    document.getElementById('profilePreview').src = reader.result;
  };
  reader.readAsDataURL(event.target.files[0]);
}
</script>
</body>
</html>
