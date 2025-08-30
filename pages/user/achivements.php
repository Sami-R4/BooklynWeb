<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Achievements - Booklyn</title>
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
    h2 {
      color: #1E293B;
      font-weight: 600;
      margin-bottom: 1rem;
    }
    .text-blue{
      color: #3B82F6;
    }
    .achievement-container {
      display: flex;
      flex-wrap: wrap;
      gap: 1rem;
      justify-content: center;
    }
    .badge-card {
      width: 150px;
      height: 150px;
      background: #FFFFFF;
      border-radius: 12px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.08);
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      transition: transform 0.2s;
      text-align: center;
      padding: 1rem;
    }
    .badge-card:hover {
      transform: translateY(-5px);
    }
    .badge-icon {
      font-size: 2.5rem;
      color: #3B82F6;
      margin-bottom: 0.5rem;
    }
    .badge-title {
      font-weight: 600;
      font-size: 0.95rem;
      color: #1E293B;
    }
    .badge-count {
      font-size: 0.8rem;
      color: #6B7280;
    }
    /* Recommended books/authors */
    .recommend-section {
      margin-top: 2rem;
    }
    .recommend-section h4 {
      font-weight: 600;
      margin-bottom: 1rem;
      color: #1E293B;
    }
    .recommend-container {
      display: flex;
      gap: 1rem;
      overflow-x: auto;
      padding-bottom: 0.5rem;
    }
    .recommend-card {
      min-width: 150px;
      background: #FFFFFF;
      border-radius: 12px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.08);
      padding: 0.5rem;
      text-align: center;
      flex-shrink: 0;
      cursor: pointer;
      transition: transform 0.2s;
    }
    .recommend-card:hover {
      transform: translateY(-5px);
    }
    .recommend-card img {
      width: 100%;
      height: 120px;
      border-radius: 8px;
      object-fit: cover;
      margin-bottom: 0.5rem;
    }
    .recommend-card-title {
      font-size: 0.9rem;
      font-weight: 600;
      color: #1E293B;
    }
  </style>
</head>
<body>

<?php include("user-navbar.php"); ?>

<div class="container py-5">
  <h2><i class="fa-solid fa-award me-2 text-blue"></i> Achievements</h2>
  <p class="text-muted">Celebrate your reading milestones! Click on badges to learn more.</p>

  <div class="achievement-container">
    <!-- Bookworm Badge -->
    <div class="badge-card" data-bs-toggle="modal" data-bs-target="#badgeBookworm">
      <i class="fa-solid fa-book-open badge-icon"></i>
      <div class="badge-title">Bookworm</div>
      <div class="badge-count">10 Books</div>
    </div>

    <!-- Night Owl Badge -->
    <div class="badge-card" data-bs-toggle="modal" data-bs-target="#badgeNightOwl">
      <i class="fa-solid fa-moon badge-icon"></i>
      <div class="badge-title">Night Owl</div>
      <div class="badge-count">Late Night Reads</div>
    </div>

    <!-- Speed Reader Badge -->
    <div class="badge-card" data-bs-toggle="modal" data-bs-target="#badgeSpeedReader">
      <i class="fa-solid fa-bolt badge-icon"></i>
      <div class="badge-title">Speed Reader</div>
      <div class="badge-count">Fast Finish</div>
    </div>

    <!-- Genre Explorer Badge -->
    <div class="badge-card" data-bs-toggle="modal" data-bs-target="#badgeGenreExplorer">
      <i class="fa-solid fa-globe badge-icon"></i>
      <div class="badge-title">Genre Explorer</div>
      <div class="badge-count">5 Genres</div>
    </div>

    <!-- Top Reviewer Badge -->
    <div class="badge-card" data-bs-toggle="modal" data-bs-target="#badgeTopReviewer">
      <i class="fa-solid fa-pen-nib badge-icon"></i>
      <div class="badge-title">Top Reviewer</div>
      <div class="badge-count">5 Reviews</div>
    </div>
  </div>

  <!-- Recommended Books Section -->
  <div class="recommend-section">
    <h4>Discover More Books</h4>
    <div class="recommend-container">
      <div class="recommend-card">
        <img src="https://via.placeholder.com/150x120" alt="Book Cover">
        <div class="recommend-card-title">The Mystery Novel</div>
      </div>
      <div class="recommend-card">
        <img src="https://via.placeholder.com/150x120" alt="Book Cover">
        <div class="recommend-card-title">Adventure Tales</div>
      </div>
      <div class="recommend-card">
        <img src="https://via.placeholder.com/150x120" alt="Book Cover">
        <div class="recommend-card-title">Sci-Fi Journey</div>
      </div>
      <div class="recommend-card">
        <img src="https://via.placeholder.com/150x120" alt="Book Cover">
        <div class="recommend-card-title">Fantasy World</div>
      </div>
    </div>
  </div>
</div>

<!-- Recommended Authors Section -->
  <div class="recommend-section container">
    <h4>Discover More Authors</h4>
    <div class="recommend-container">
      <div class="recommend-card">
        <img src="https://via.placeholder.com/150x120" alt="Book Cover">
        <div class="recommend-card-title">The Mystery Novel</div>
      </div>
      <div class="recommend-card">
        <img src="https://via.placeholder.com/150x120" alt="Book Cover">
        <div class="recommend-card-title">Adventure Tales</div>
      </div>
      <div class="recommend-card">
        <img src="https://via.placeholder.com/150x120" alt="Book Cover">
        <div class="recommend-card-title">Sci-Fi Journey</div>
      </div>
      <div class="recommend-card">
        <img src="https://via.placeholder.com/150x120" alt="Book Cover">
        <div class="recommend-card-title">Fantasy World</div>
      </div>
    </div>
  </div>
</div>

<!-- Badge Modals -->
<!-- Bookworm Modal -->
<div class="modal fade" id="badgeBookworm" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content rounded-4">
      <div class="modal-header">
        <h5 class="modal-title"><i class="fa-solid fa-book-open me-2"></i> Bookworm</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <p>Congrats! You've read 10 books. Keep up the momentum and explore more genres!</p>
      </div>
    </div>
  </div>
</div>

<!-- Night Owl Modal -->
<div class="modal fade" id="badgeNightOwl" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content rounded-4">
      <div class="modal-header">
        <h5 class="modal-title"><i class="fa-solid fa-moon me-2"></i> Night Owl</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <p>You love reading after dark! Keep enjoying late-night adventures.</p>
      </div>
    </div>
  </div>
</div>

<!-- Speed Reader Modal -->
<div class="modal fade" id="badgeSpeedReader" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content rounded-4">
      <div class="modal-header">
        <h5 class="modal-title"><i class="fa-solid fa-bolt me-2"></i> Speed Reader</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <p>Impressive! You finished a book quickly. Challenge yourself to beat your own record!</p>
      </div>
    </div>
  </div>
</div>

<!-- Genre Explorer Modal -->
<div class="modal fade" id="badgeGenreExplorer" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content rounded-4">
      <div class="modal-header">
        <h5 class="modal-title"><i class="fa-solid fa-globe me-2"></i> Genre Explorer</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <p>You’ve explored 5 different genres! Keep discovering new worlds and stories.</p>
      </div>
    </div>
  </div>
</div>

<!-- Top Reviewer Modal -->
<div class="modal fade" id="badgeTopReviewer" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content rounded-4">
      <div class="modal-header">
        <h5 class="modal-title"><i class="fa-solid fa-pen-nib me-2"></i> Top Reviewer</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <p>Great job! You’ve written 5 reviews. Your feedback helps the community grow!</p>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
