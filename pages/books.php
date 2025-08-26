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
include ("../includes/navbar.php");
  include("../includes/loader.php");
?>
    
    <!-- Hero section with parallax -->
    <section class="hero-section">
        <div class="hero-bg"></div>
        <div class="container hero-content text-center animate__animated animate__fadeIn">
            <h1 class="display-4 fw-bold mb-4">Discover Your Next Favorite Book</h1>
            <p class="lead mb-5">Explore our collection of thousands of books across all genres</p>
            
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
        <!-- Filter chips -->
        <div class="mb-5 text-center animate__animated animate__fadeIn animate__delay-2s">
            <div class="mb-3">
                <h4 class="d-inline-block me-3">Filter by:</h4>
                <div class="d-inline-block">
                    <span class="filter-chip active">All</span>
                    <span class="filter-chip">Fiction</span>
                    <span class="filter-chip">Non-Fiction</span>
                    <span class="filter-chip">Science</span>
                    <span class="filter-chip">Biography</span>
                    <span class="filter-chip">History</span>
                    <span class="filter-chip">Fantasy</span>
                </div>
            </div>
        </div>
        
        <!-- Books grid -->
          <section class="container my-5">
    <h2 class="section-title" data-aos="fade-down-left" data-aos-delay="100" data-aos-duration="1000">Featured Books</h2>
    <div class="grid">
      <?php
        $books = [
          ['id' => 1,
          'library' => 'Public Library',
          'title' => 'The Alchemist', 
          'author' => 'Paulo Coelho', 
          'img' => 'alchemist.jpeg', 
          'price' => 'XAF 5000', 
          'rating' => 4.5,
          'publishedYear' => '2020', 
          'pages' => '300',
          'descTitle' => 'Red Wolf is a dark, action-packed fantasy about a girl who will do anything to protect the ones she loves—even if it means becoming a monster herself.',
          'descBody' => 'When Adeles village is attacked by werewolves, she discovers she has the power to transform into a wolf. Now she must learn to control her new abilities before she loses herself to the beast within. This book will help you identify your strengths, align your actions with your values, and create a life of fulfillment and purpose.',
          'tags' => ['Horror']
        ],
          ['id' => 2,
          'library' => 'Public Library',
          'title' => 'Red Wolf', 
          'author' => 'Rachel Vincent', 
          'img' => 'redwolf.jpeg', 
          'price' => 'XAF 10000', 
          'rating' => 4.5,
          'publishedYear' => '2020', 
          'pages' => '300',
          'descTitle' => 'Red Wolf is a dark, action-packed fantasy about a girl who will do anything to protect the ones she loves—even if it means becoming a monster herself.',
          'descBody' => 'When Adeles village is attacked by werewolves, she discovers she has the power to transform into a wolf. Now she must learn to control her new abilities before she loses herself to the beast within. This book will help you identify your strengths, align your actions with your values, and create a life of fulfillment and purpose.',
          'tags' => ['Horror', 'Fiction']
        ],
          ['id' => 3,
          'library' => 'Public Library',
          'title' => 'Purpose', 
          'author' => 'Samuel Wilkinson', 
          'img' => 'purpose.jpeg', 
          'price' => 'XAF 2000', 
          'rating' => 2.5,
          'publishedYear' => '2020', 
          'pages' => '300',
          'descTitle' => 'Red Wolf is a dark, action-packed fantasy about a girl who will do anything to protect the ones she loves—even if it means becoming a monster herself.',
          'descBody' => 'When Adeles village is attacked by werewolves, she discovers she has the power to transform into a wolf. Now she must learn to control her new abilities before she loses herself to the beast within. This book will help you identify your strengths, align your actions with your values, and create a life of fulfillment and purpose.',
          'tags' => ['Self Building']
        ],
          ['id' => 4,
          'library' => 'Public Library',
          'title' => 'How to Focus', 
          'author' => 'Adam Lee', 
          'img' => 'howtofocus.jpeg', 
          'price' => 'XAF 8000', 
          'rating' => 3.5,
          'publishedYear' => '2020', 
          'pages' => '300',
          'descTitle' => 'Red Wolf is a dark, action-packed fantasy about a girl who will do anything to protect the ones she loves—even if it means becoming a monster herself.',
          'descBody' => 'When Adeles village is attacked by werewolves, she discovers she has the power to transform into a wolf. Now she must learn to control her new abilities before she loses herself to the beast within. This book will help you identify your strengths, align your actions with your values, and create a life of fulfillment and purpose.',
          'tags' => ['Motivation']
        ],
          ['id' => 5,
          'library' => 'Public Library',
          'title' => 'Black Hearts', 
          'author' => 'Jenna Wood', 
          'img' => 'blackhearts.jpeg', 
          'price' => 'XAF 9000', 
          'rating' => 4.0,
          'publishedYear' => '2020', 
          'pages' => '300',
          'descTitle' => 'Red Wolf is a dark, action-packed fantasy about a girl who will do anything to protect the ones she loves—even if it means becoming a monster herself.',
          'descBody' => 'When Adeles village is attacked by werewolves, she discovers she has the power to transform into a wolf. Now she must learn to control her new abilities before she loses herself to the beast within. This book will help you identify your strengths, align your actions with your values, and create a life of fulfillment and purpose.',
          'tags' => ['Fiction']
        ],
          ['id' => 6,
          'library' => 'Public Library',
          'title' => 'The Psychology of Money', 
          'author' => 'Morgan Housel', 
          'img' => 'psychologyofmoney.jpeg', 
          'price' => 'XAF 7000', 
          'rating' => 4.5,
          'publishedYear' => '2020', 
          'pages' => '300',
          'descTitle' => 'Red Wolf is a dark, action-packed fantasy about a girl who will do anything to protect the ones she loves—even if it means becoming a monster herself.',
          'descBody' => 'When Adeles village is attacked by werewolves, she discovers she has the power to transform into a wolf. Now she must learn to control her new abilities before she loses herself to the beast within. This book will help you identify your strengths, align your actions with your values, and create a life of fulfillment and purpose.',
          'tags' => ['Motivation', 'Self Building']
        ],
        ['id' => 7,
        'library' => 'Public Library',
        'title' => 'Glitch', 
          'author' => 'Unknown', 
          'img' => 'glitch.jpg', 
          'price' => 'XAF 10000', 
          'rating' => 4.5,
          'publishedYear' => '2020', 
          'pages' => '300',
          'descTitle' => 'Red Wolf is a dark, action-packed fantasy about a girl who will do anything to protect the ones she loves—even if it means becoming a monster herself.',
          'descBody' => 'When Adeles village is attacked by werewolves, she discovers she has the power to transform into a wolf. Now she must learn to control her new abilities before she loses herself to the beast within. This book will help you identify your strengths, align your actions with your values, and create a life of fulfillment and purpose.',
          'tags' => ['Action']
        ],
        ['id' => 8,
        'library' => 'Public Library',
        'title' => 'Beyond the Terra', 
          'author' => 'Unknown', 
          'img' => 'beyondtheterra.jpg', 
          'price' => 'XAF 10000', 
          'rating' => 4.5,
          'publishedYear' => '2020', 
          'pages' => '300',
          'descTitle' => 'Red Wolf is a dark, action-packed fantasy about a girl who will do anything to protect the ones she loves—even if it means becoming a monster herself.',
          'descBody' => 'When Adeles village is attacked by werewolves, she discovers she has the power to transform into a wolf. Now she must learn to control her new abilities before she loses herself to the beast within. This book will help you identify your strengths, align your actions with your values, and create a life of fulfillment and purpose.',
          'tags' => ['Adventure']
        ],
        ['id' => 9,
        'library' => 'Public Library',
        'title' => 'The Clock Shifter', 
          'author' => 'Unknown', 
          'img' => 'clockshifter.jpg', 
          'price' => 'XAF 15000', 
          'rating' => 4.5,
          'publishedYear' => '2020', 
          'pages' => '300',
          'descTitle' => 'Red Wolf is a dark, action-packed fantasy about a girl who will do anything to protect the ones she loves—even if it means becoming a monster herself.',
          'descBody' => 'When Adeles village is attacked by werewolves, she discovers she has the power to transform into a wolf. Now she must learn to control her new abilities before she loses herself to the beast within. This book will help you identify your strengths, align your actions with your values, and create a life of fulfillment and purpose.',
          'tags' => ['Mystery']
        ],
        ];
        foreach ($books as $book) {
          echo '<div class="card" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000">
            <img src="../assets/img/' . $book['img'] . '" class="card-img-top" alt="Book Image">
            <div class="card-body">
              <div class="mb-2">';
                foreach ($book['tags'] as $tag) {
                  echo '<span class="category-badge me-1 px-2 py-1">' . ucfirst($tag) . '</span>';
                }
          echo '</div>
              <h5 class="card-title">' . $book['title'] . '</h5>
              <p class="card-text text-muted">By ' . $book['author'] . '</p>
              <div class="d-flex justify-content-between align-items-center">
                <span class="fw-bold h6">'.$book['price'].'</span>
                <div class="text-warning">';
                  $fullStars = floor($book['rating']);
                  $half = $book['rating'] - $fullStars >= 0.5;
                  for ($i = 0; $i < $fullStars; $i++) echo '<i class="fa fa-star"></i>';
                  if ($half) echo '<i class="fa fa-star-half-alt"></i>';
                  echo ' <small class="text-muted">(' . $book['rating'] . ')</small>
                </div>
              </div>
            </div>
            <div class="card-footer d-flex justify-content-between bg-light">
            <span class="d-flex gap-2 btn-flex">
              <button class="btn btn-sm add-btn">Add to Cart</button>
              <button class="btn btn-sm view-btn" data-bs-toggle="modal" data-bs-target="#bookModal'.$book['id'].'">Details</button>
            </span>
              <button class="btn btn-sm btn-fav" id="btn-like"><i class="fa-regular fa-heart"></i></button>
              
            </div>
          </div>';

          echo '            <div class="modal fade" id="bookModal'.$book['id'].'" tabindex="-1" aria-labelledby="bookModalLabel'.$book['id'].'" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="bookModal">'.$book['title'].'</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-4">
            <img src="../assets/img/'.$book['img'].'" class="img-fluid" alt="Red Wolf cover">
          </div>
          <div class="col-md-8">
            <p><strong>Library:</strong> '.$book['library'].'</p>
            <p><strong>Author:</strong> '.$book['author'].'</p>
            <p><strong>Price:</strong> '.$book['price'].'</p>
            <p><strong>Published:</strong> '.$book['publishedYear'].'</p>
            <p><strong>Pages:</strong> '.$book['pages'].'</p>
            <hr>
            <p><strong>Description:</strong></p>
            <p>'.$book['descTitle'].'</p>
            <p>'.$book['descBody'].'</p>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Add to Cart</button>
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