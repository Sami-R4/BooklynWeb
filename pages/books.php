<?php
// books.php - Animated Book Catalog
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Catalog</title>
     <!-- CSS File -->
    <link href="../assets/css/books.css" rel="stylesheet">

       <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>

<?php
include("../includes/navbar.php");
  include("../includes/loader.php");
?>
    
    <!-- Hero section with parallax -->
    <section class="hero-section">
        <div class="hero-bg"></div>
        <div class="container hero-content text-center animate__animated animate__fadeIn">
            <h1 class="display-4 fw-bold mb-4">Discover Your Favorite Book</h1>
            <p class="lead mb-5">Explore our collection of thousand books across the genre</p>
            
            <div class="search-box animate__animated animate__fadeInUp animate__delay-1s">
                <div class="input-group">
                    <input type="text" class="form-control form-control-lg" placeholder="Search by title, author or ISBN...">
                    <button class="btn btn-primary btn-lg" type="button">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <div class="container py-5">
       
        <!-- Books grid -->
          <section class="container my-5">
    <h2 class="section-title" data-aos="fade-down-left" data-aos-delay="100" data-aos-duration="1000">Featured Books</h2>
    <div class="grid">
      <?php
include ("../app/dbconfig.php");
$sql = "SELECT * FROM books";
$qry = mysqli_query($conn, $sql);

while($book = mysqli_fetch_assoc($qry)){
    $tags = explode(",", $book['genre']); // turn tags into array
    $price = 'XAF ' . $book['price'];

    echo '
    <div class="card" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000">
        <img src="../app/' . $book['cover_image'] . '" class="card-img-top" alt="Book Image">
        <div class="card-body">
            <div class="mb-2">';
                foreach ($tags as $tag) {
                    echo '<span class="category-badge me-1 px-2 py-1">' . ucfirst(trim($tag)) . '</span>';
                }
    echo '  </div>
            <h5 class="card-title">' . $book['book_title'] . '</h5>
            <p class="card-text text-muted">By ' . $book['author'] . '</p> <!-- If you join authors, replace author_id with name -->
            <div class="d-flex justify-content-between align-items-center">
                <span class="fw-bold h6">'.$price.'</span>
                <div class="text-warning">';
                    $rating = 4.5; // placeholder for now
                    $fullStars = floor($rating);
                    $half = $rating - $fullStars >= 0.5;
                    for ($i = 0; $i < $fullStars; $i++) echo '<i class="fa fa-star"></i>';
                    if ($half) echo '<i class="fa fa-star-half-alt"></i>';
                    echo ' <small class="text-muted">(' . $rating . ')</small>
                </div>
            </div>
        </div>
        <div class="card-footer d-flex justify-content-between bg-light">
            <span class="d-flex gap-2 btn-flex">
                <button class="btn btn-sm add-btn" data-bs-toggle="modal" data-bs-target="#buyModal'.$book['book_id'].'">Buy Now</button>
                <button class="btn btn-sm view-btn" data-bs-toggle="modal" data-bs-target="#bookModal'.$book['book_id'].'">Details</button>
            </span>
            <button class="btn btn-sm btn-fav"><i class="fa-regular fa-heart"></i></button>
        </div>
    </div>
    

    <!-- Modal -->
    <div class="modal fade" id="bookModal'.$book['book_id'].'" tabindex="-1" aria-labelledby="bookModalLabel'.$book['book_id'].'" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="bookModalLabel'.$book['book_id'].'">'.$book['book_title'].'</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-4">
                <img src="../app/'.$book['cover_image'].'" class="img-fluid" alt="Book cover">
              </div>
              <div class="col-md-8">
                <p><strong>Author:</strong> '.$book['author'].'</p>
                <p><strong>Price:</strong> '.$price.'</p>
                <p><strong>Published:</strong> '.$book['published_year'].'</p>
                <p><strong>Pages:</strong> '.$book['pages'].'</p>
                <hr>
                <p><strong>Description:</strong></p>
                <p>'.$book['description'].'</p>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <a href="../app/add_to_cart.php?book_id=<?php echo $row["book_id"]; ?>"><button type="button" class="btn btn-primary">Add to Cart</button></a>
            <button type="button" class="btn btn-success">Buy Now</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Read Preview</button>
          </div>

          
        </div>
      </div>
    </div>
    ';
    echo '<!-- Modal -->
    <div class="modal fade" id="buyModal'.$book['book_id'].'" tabindex="-1" aria-labelledby="buyModalLabel'.$book['book_id'].'" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="buyModalLabel'.$book['book_id'].'">Enter Account Details</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-4">
                <img src="../app/'.$book['cover_image'].'" class="img-fluid" alt="Book cover">
              </div>
              <div class="col-md-8">
                <div class="mb-3 input-group">
                        <label class="text-yellow">Amount (FCFA)</label>
                        <input type="text" class="form-control bg-dark text-white" 
                               name="amount" required value="'.$book['price'].'">
                    </div>
                    
                    <div class="mb-3 input-group flex">
                        <label class="text-yellow">Payment Method</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="method" 
                                   id="mtn" value="mtn" style="background: #fff;" required>
                            <label class="form-check-label" for="mtn">
                                MTN Mobile Money
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="method" 
                                   id="orange" value="orange">
                            <label class="form-check-label" for="orange">
                                Orange Money
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="method" 
                                   id="visa-card" value="visa-card">
                            <label class="form-check-label" for="visa-card">
                                Visa Card
                            </label>
                        </div>
                    </div>
                    <div class="mb-3 input-group">
                        <label class="text-yellow">Enter Phone/Account Number</label>
                        <input type="text" class="form-control bg-dark text-white" 
                               name="amount" required placeholder="XXXXXXXX">
                    </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success">Buy '.$book['book_title'].'</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>

          
        </div>
      </div>
    </div>';
}
?>

    </div>
  </section>
        
        <!-- Pagination -->
        <span class="mt-5 animate__animated animate__fadeIn">
            <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">
                        <i class="fas fa-chevron-left"></i>
                    </a>
                </li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">
                        <i class="fas fa-chevron-right"></i>
                    </a>
                </li>
            </ul>
        </span>
    </div>

   <?php
   include ("../includes/footer.php");
   ?>
    <script>
      document.querySelectorAll('.btn-fav').forEach(btn =>{
        btn.addEventListener('click', function(){
          this.style.backgroundColor = "#4895ef";
          this.style.color = "#fff";
        })
      })
    </script>
    <script src="../assets/js/bootstrap.js"></script>
    <script src="../assets/js/bootstrapPopper.js"></script>
</body>
</html>