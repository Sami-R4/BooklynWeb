<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booklyn | Favorites</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="../../assets/img/myLogo.png" type="image/x-icon">
</head>
<style>
.card-title {
  color: #1E293B;
}

.btn-outline-danger {
  border-color: #F87171;
  color: #DC2626;
}

.btn-outline-danger:hover {
  background-color: #F87171;
  color: #fff;
  border-color: #F87171;
}

.card-img-top {
  height: 250px;
  object-fit: cover;
  border-top-left-radius: 0.5rem;
  border-top-right-radius: 0.5rem;
}
</style>

<body>
    
<?php
include("user-navbar.php");
?>

<?php 
// Sample cart array (replace with session/cart logic)
$cartItems = [
  [
    'title' => 'Glitch',
    'author' => 'Matt Haig',
    'cover' => 'glitch.jpg',
  ],
  [
    'title' => 'Purpose',
    'author' => 'Samuel Wilkinson',
    'cover' => 'purpose.jpeg',
  ]
];
//checking if cart is empty
$isEmpty = count($cartItems) === 0; 
?>

<div class="container py-5">
  <h2 class="mb-4 fw-bold">Your Cart</h2>

  <?php if ($isEmpty): ?>
    <div class="custom-alert">
      Your cart is empty. Browse books to add some!
    </div>
  <?php else: ?>
    <div class="row gy-4">
      <?php foreach ($cartItems as $item): ?>
        <div class="col-md-6 col-lg-4">
          <div class="card shadow-sm border-0 h-50">
            <img src="../../assets/img/<?= $item['cover'] ?>" class="card-img-top" alt="<?= $item['title'] ?>">
            <div class="card-body">
              <h5 class="card-title"><?= $item['title'] ?></h5>
              <p class="card-text text-muted">by <?= $item['author'] ?></p>
            </div>
            <div class="card-footer bg-white border-top-0 d-flex justify-content-between align-items-center">
                <span class="d-flex gap-3">
               <button class="btn btn-sm btn-outline-danger">Remove <i class="fa-solid fa-heart-crack"></i></button>
               <button class="btn btn-sm btn-success">Buy Now <i class="fa-solid fa-download"></i></button>
                </span>
            </div>

          </div>
        </div>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>
</div>
</body>
</html>