<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booklyn | Home</title>
    <!-- AOS CSS -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet"></head>
<!-- Favicon -->
    <link rel="shortcut icon" href="../../assets/img/myLogo.png" type="image/x-icon">
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
  color: #3B82F6; 
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
.home-actions{
  border-bottom: 1px solid #ddd;
}
.quick-actions{
  margin: 2em 4em;
}
.actions-grid{
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 20px;
}
.actions-grid a{
  text-decoration: none;
  color: #000;
  font-size: 1.2em;
}
.action-card{
  display: flex;
  gap: 1rem;
  align-items: center;
  height: 120px;
  padding: 0 20px;
  border-radius: 8px;
  box-shadow: 0 0 12px rgba(0,0,0,0.2);
}
.action-card i{
  font-size: 2rem;
  color: #3B82F6;
  background: #9cc1fcff;
  padding: 15px;
  border-radius: 50%;
  position: relative;
  overflow: hidden;
  cursor: pointer;
}
.action-card i::after{
  content: "";
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%,-50%) scale(0);
  width: 100%;
  height: 100%;
  background: radial-gradient(circle, rgba(255,255,255,0.9) 10%, transparent 70%);
  border-radius: 50%;
  opacity: 0;
}
.action-card i:hover::after{
  animation: wave 1s ease-in-out;
}
@keyframes wave {
  0%{
    transform: translate(-50%, -50%) scale(0.2);
    opacity: 1;
  }
  50%{
    transform: translate(-50%, -50%) scale(0.9);
    opacity: 0.6;
  }
  100%{
    transform: translate(-50%, -50%) scale(1.05);
    opacity: 0.1;
  }
  
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
    </div>

    <div class="row justify-content-center mt-5 g-3 w-100" data-aos="fade-up">
      <div class="col-6 col-md-3" data-toggle="tooltip" data-placement="top" title="Click to see communities">
        <a href="communities.php" class="dashboard-link" >
            <i class="fas fa-book"></i>
            <span>My Comunites</span>
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
    </div>
  </div>
</section>

<section class="home-actions">
  <div class="quick-actions">
    <h3>Quick Actions</h3>
    <div class="actions-grid">
      <a href="continue.php" class="action-card"><i class="fas fa-book"></i> Continue Reading</a>
      <a href="add.php" class="action-card"><i class="fas fa-plus"></i> Add Book</a>
      <a href="saved.php" class="action-card"><i class="fas fa-floppy-disk"></i> View Saved</a>
      <a href="notes.php" class="action-card"><i class="fas fa-newspaper"></i> Notes</a>
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