<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booklyn | Home</title>
    <!-- AOS CSS -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>
<style>
    .dashboard-hero {
  background: #f8f9fa;
  border-bottom: 1px solid #ddd;
}

.dashboard-link {
  display: flex;
  flex-direction: column;
  align-items: center;
  padding: 1.2rem;
  border: 2px solid transparent;
  border-radius: 12px;
  background: #fff;
  text-decoration: none;
  transition: all 0.3s ease;
  box-shadow: 0 2px 6px rgba(0,0,0,0.05);
  color: #000;
}

.dashboard-link i {
  font-size: 1.8rem;
  color: #3B82F6; /* Skybook Primary */
  margin-bottom: 0.5rem;
}

.dashboard-link:hover {
  border-color: #ffd700;
  background: #fffbea;
  color: #000;
  box-shadow: 0 4px 12px rgba(0,0,0,0.08);
}

.dashboard-link:hover i {
  color: #000;
}

.dashboard-link span {
  font-weight: 500;
  font-size: 1rem;
}
</style>
<body>


    <?php 
       include("user-navbar.php");
     ?>
    <section class="dashboard-hero py-5 text-center">
  <div class="container">
    <div data-aos="fade-down">
      <h2 class="fw-bold"><i class="fas fa-hand-wave"></i> Hello, <?php echo $username; ?></h2>
      <blockquote class="fst-italic mt-3">“A room without books is like a body without a soul.”</blockquote>
    </div>

    <div class="row justify-content-center mt-5 g-3" data-aos="fade-up">
      <div class="col-6 col-md-3" data-toggle="tooltip" data-placement="top" title="Tooltip on top">
        <a href="collections.php" class="dashboard-link" >
            <i class="fas fa-book"></i>
            <span>My Collections</span>
            <span class="number fs-2 mt-2">25</span>
        </a>
      </div>
      <div class="col-6 col-md-3">
        <a href="favorites.php" class="dashboard-link" title="Click to see Favorites">
          <i class="fas fa-heart"></i>
          <span>Favorites</span>
          <span class="number fs-2 mt-2">50</span>
        </a>
      </div>
      <div class="col-6 col-md-3">
        <a href="cart.php" class="dashboard-link" title="Click to see Cart">
          <i class="fas fa-shopping-cart"></i>
          <span>Cart</span>
          <span class="number fs-2 mt-2">7</span>
        </a>
      </div>
      <div class="col-6 col-md-3">
        <a href="libraries.php" class="dashboard-link" title="Click to see Libraries">
          <i class="fas fa-building-columns"></i>
          <span>Libraries</span>
          <span class="number fs-2 mt-2">2</span>
        </a>
      </div>
    </div>
  </div>
</section>

<!-- AOS Script -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="../../assets/js/bootstrap.js"></script>
<script src="../../assets/js/bootstrapPopper.js"></script>
<script>
  AOS.init({ once: true });
</script>
</body>
</html>