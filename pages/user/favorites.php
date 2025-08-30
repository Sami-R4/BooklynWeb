<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Booklyn | Favorites</title>
  <link rel="stylesheet" href="../../assets/css/boostrap.css">
  <!-- Favicon -->
    <link rel="shortcut icon" href="../../assets/img/myLogo.png" type="image/x-icon">
</head>
<style>
  .nav-tabs .nav-link.active {
    background-color: #1E293B;
    color: #000;
    border-color: #FCD34D #FCD34D #fff;
  }
  .nav-tabs .nav-link:hover {
    background-color: #1e293b;
    color: #fff;
  }
  .book-card {
    border: 1px solid #e5e7eb;
    border-radius: 1rem;
    box-shadow: 0 4px 12px rgba(0,0,0,0.05);
    transition: transform 0.2s;
  }

  .book-card:hover {
    transform: translateY(-5px);
  }

  .book-cover {
    width: 100px;
    height: 140px;
    object-fit: cover;
    border-radius: 0.5rem;
  }

  .custom-alert {
  background-color: rgba(255, 104, 16, 0.15); /* Soft gold tint */
  border: 1px solid #FCD34D;
  color: #1E293B;
  padding: 1rem;
  border-radius: 0.75rem;
  text-align: center;
  font-weight: 500;
  }


  .remove-btn {
    background-color: #1E293B;
    color: #fff;
    border: none;
    padding: 6px 14px;
    border-radius: 0.5rem;
    transition: background-color 0.3s ease;
  }

  .remove-btn:hover {
    background-color: #FCD34D;
    color: #000;
  }
</style>
<body>

<?php include("user-navbar.php"); ?>

<div class="container py-4">
  <h2 class="mb-4">Your Favorites</h2>

  <!-- Tabs -->
  <ul class="nav nav-tabs" id="favoritesTab" role="tablist">
    <li class="nav-item" role="presentation">
      <button class="nav-link active" id="books-tab" data-bs-toggle="tab" data-bs-target="#books" type="button" role="tab">Books</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="libraries-tab" data-bs-toggle="tab" data-bs-target="#libraries" type="button" role="tab">Authors</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="libraries-tab" data-bs-toggle="tab" data-bs-target="#libraries" type="button" role="tab">Saved</button>
    </li>
     <li class="nav-item" role="presentation">
      <button class="nav-link" id="libraries-tab" data-bs-toggle="tab" data-bs-target="#libraries" type="button" role="tab">Following</button>
    </li>
  </ul>

  <!-- PHP: Dummy Favorites -->
  <?php
    $favBooks = [
      [
        'title' => 'Glitch',
        'author' => 'Rolf Dobelli',
        'cover' => 'glitch.jpg'
      ]
    ];

    $favLibs = [
      [
        'logo' => 'library3.jpeg',
        'name' => 'NBL',
        'location' => 'Bamenda'
      ]
    ];
  ?>

  <!-- Tab Content -->
  <div class="tab-content border border-top-0 p-4 bg-white" id="favoritesTabContent">

    <!-- Books Tab -->
    <div class="tab-pane fade show active" id="books" role="tabpanel">
      <?php if (empty($favBooks)): ?>
        <div class="custom-alert mb-4">
           No favorite books yet.
       </div>

      <?php else: ?>
        <?php foreach ($favBooks as $book): ?>
          <div class="book-card d-flex align-items-center p-3 mb-3 bg-white">
            <img src="../../assets/img/<?= $book['cover'] ?>" alt="Book Cover" class="book-cover me-3">
            <div class="flex-grow-1">
              <h5 class="mb-1"><?= htmlspecialchars($book['title']) ?></h5>
              <p class="text-muted mb-2">by <?= htmlspecialchars($book['author']) ?></p>
              <button class="remove-btn">Remove</button>
            </div>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>

    <!-- Libraries Tab -->
    <div class="tab-pane fade" id="libraries" role="tabpanel">
      <?php if (empty($favLibs)): ?>
       <div class="custom-alert mb-4">
           No favorite libraries yet.
       </div>

      <?php else: ?>
        <?php foreach ($favLibs as $lib): ?>
          <div class="book-card d-flex align-items-center p-3 mb-3 bg-white">
            <img src="../../assets/img/<?= $lib['logo'] ?>" alt="Library Logo" class="book-cover me-3">
            <div class="flex-grow-1">
              <h5 class="mb-1"><?= htmlspecialchars($lib['name']) ?></h5>
              <p class="text-muted mb-2">at <?= htmlspecialchars($lib['location']) ?></p>
              <button class="remove-btn">Remove</button>
            </div>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>

    
  </div>
</div>

<script src="../../assets/js/bootstrap.js"></script>
</body>
</html>
