<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Booklyn | Author Dashboard</title>
<!-- AOS CSS -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet"></head>
<!-- Favicon -->
    <link rel="shortcut icon" href="../../assets/img/myLogo.png" type="image/x-icon">
<!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
<!-- SweetAlert -->
  <link rel="stylesheet" href="../../assets/css/sweetalert.css">
</head>
<style>
    .wrapper{
        margin-top: 20px;
    }
    .wrapper h2{
        margin-left: 20px;
    }
    .main{
        margin: 20px 25px 20px 25px;
    }
    .dash-header h2{
        color: #3B82F6;
    }
    .cards-grid{
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
        gap: 8px;
        margin: 3em 8px;
    }
    .card{
        display: flex;
        align-items: center;
        height: 100px;
        padding: 13px 0 0 0;
        border: 1px solid transparent;
        cursor: pointer;
    }
    .card h4{
        font-size: 15px;
    }
    .card p{
        font-size: 12px;
    }
    .card i{
        font-size: 16px;
        font-weight: 500;
        color: #3b82f6;
        transition: all 0.3s ease;
    }
    .card:hover{
        box-shadow: 0 3px 3px rgba(0,0,0,0.2);
        transform: translateY(-3px);
        transition: all 0.3 ease;
    }
    .grid{
        display: flex;
        gap: 10px;
        margin: 8px;
    }
    .card-div{
        width: 100%;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 8px rgba(0,0,0,0.3);
        border-left: 4px solid #3b82f6;
    }
    .card-div button{
        width: 100%;
        background: #3b82f6;
        border: none;
        border-radius:5px;
        color: #fff;
        padding: 2px 1.5px;
    }
    .card-div button:hover{
        background: #2563EB;
    }
    @media (max-width: 576px){
        .grid{
            flex-direction: column;
            gap: 10px;
        }
    }
     /* Modal Customization */
    .modal-content {
      border-radius: 1rem;
      border: none;
      box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.15);
    }

    .modal-header {
      background-color: var(--primary-color);
      color: #fff;
      border-top-left-radius: 1rem;
      border-top-right-radius: 1rem;
    }

    .btn-warning {
      background-color: var(--accent-color);
      color: #000;
      border: none;
    }

    .btn-warning:hover {
      background-color: #fbe16b;
    }

    .form-control:focus {
      border-color: var(--accent-color);
      box-shadow: 0 0 0 0.2rem rgba(252, 211, 77, 0.25);
    }

    .cover-preview-wrapper {
  width: 100%;
  max-height: 300px; 
  display: flex;
  justify-content: center;
  align-items: center;
  overflow: hidden;
  border: 1px solid #ddd;
  border-radius: 5px;
  background-color: #f8f9fa;
}
#coverPreview {
  max-height: 100%;
  max-width: 100%;
  object-fit: contain; 
}
</style>
<body>

<?php include ('user-navbar.php') ?>

<div class="wrapper">
    <div class="dash-header">
        <h2>Welcome back, <?php echo $username; ?></h2>
    </div>
    <div class="main">
        <div class="cards-grid">
            <!-- Card 1 -->
            <div class="card">
                <i class="fas fa-book"></i>
                <h4>My Books</h4>
                <p>12 publishes</p>
            </div>
            <!-- Card 2 -->
             <div class="card">
                <i class="fa-solid fa-users"></i>
                <h4>Followers</h4>
                <p>130</p>
            </div>
            <!-- Card 3 -->
             <div class="card">
                <i class="fas fa-star"></i>
                <h4>Ratings</h4>
                <p>4.5 Average</p>
            </div>
             <!-- Card 4 -->
             <div class="card">
                <i class="fas fa-bookmark"></i>
                <h4>Saves</h4>
                <p>3500</p>
            </div>
        </div>
        <div class="grid">
            <div class="card-div">
                <h3>Create New Book</h3>
                <p>Upload your next masterpiece</p>
                <button class="btn-create" data-bs-toggle="modal" data-bs-target="#addBookModal"><i class="fas fa-plus"></i> New Book</button>
            </div>
            <div class="card-div">
                <h3>Community Updates</h3>
                <p>See what your readers are discussing</p>
                <button><i class="fas fa-message"></i> View Communities</button>
            </div>
        </div>
    </div>
</div>

<!-- Add Book Modal -->
<div class="modal fade" id="addBookModal" tabindex="-1" aria-labelledby="addBookModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="addBookModalLabel">Add a New Book</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="addBookForm" action="../../app/book_upload-handler.php" method="post" enctype="multipart/form-data">
          <div class="row">
            <!-- Left column: Book Cover -->
            <div class="col-md-4 d-flex flex-column align-items-center mb-3">
              <label for="bookCover" class="form-label">Book Cover Image</label>
              <input class="form-control mb-2" type="file" name="bookCover" id="bookCover" accept="image/*">
              <div class="cover-preview-wrapper">
                <img id="coverPreview" src="../../assets/img/bookcover-placeholder.png" alt="Book Cover Preview">
              </div>
			  <label for="" class="mt-3">Upload Book</label>
			  <input class="form-control mt-2" type="file" name="bookPdf" id="bookPdf" accept=".pdf">
            </div>

            <!-- Right column: Form Fields -->
            <div class="col-md-8">
              <div class="mb-3">
                <div class="">
                  <label for="bookTitle" class="form-label">Book Title</label>
                  <input type="text" class="form-control" name="bookTitle" id="bookTitle" placeholder="Enter book title" required>
                </div>
              </div>

              <div class="row mb-3">
                <div class="col-md-4">
                  <label for="bookPrice" class="form-label">Price</label>
                  <input type="text" class="form-control" name="bookPrice" id="bookPrice" placeholder="XAF 5000" required>
                </div>
                <div class="col-md-4">
                  <label for="bookPages" class="form-label">Pages</label>
                  <input type="number" class="form-control" name="bookPages" id="bookPages" placeholder="300" required>
                </div>
                <div class="col-md-4">
                  <label for="bookYear" class="form-label">Published Year</label>
                  <input type="number" class="form-control" name="bookYear" id="bookYear" placeholder="2025" required>
                </div>
              </div>

              <div class="mb-3">
                <label for="bookTags" class="form-label">Tags / Categories</label>
                <input type="text" class="form-control" name="bookTags" id="bookTags" placeholder="Horror, Fantasy, Fiction">
                <small class="text-muted">Separate tags with commas</small>
              </div>

              <div class="mb-3">
                <label for="bookDescription" class="form-label">Description</label>
                <textarea class="form-control" name="bookDescription" id="bookDescription" rows="4" placeholder="Enter a short description"></textarea>
              </div>
            </div>
          </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Discard</button>
					<button type="submit" name="add-book" class="btn btn-primary rounded-pill" id="submit">Publish</button>
		  </div>
        </form>
      </div>
        
    </div>
  </div>
</div>

<script src="../../assets/js/jquery.js"></script>
<script>
    $(document).ready(function() {
    const defaultSrc = '../../assets/img/bookcover-placeholder.png'; // initial placeholder

    // Initially set placeholder
    $('#coverPreview').attr('src', defaultSrc);

    $('#bookCover').on('change', function() {
      const file = this.files[0];

      if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
          $('#coverPreview').attr('src', e.target.result); // replace with uploaded image
        }
        reader.readAsDataURL(file);
      } else {
        $('#coverPreview').attr('src', defaultSrc); // revert to placeholder if no file
      }
    });  
  });
</script>
<?php if(isset($_SESSION['alert'])): ?>
<script src="../../assets/js/sweetalert.js"></script>
<script>
    Swal.fire({
        title: '<?= $_SESSION['alert']['title'] ?>',
        text: '<?= $_SESSION['alert']['message'] ?>',
        icon: '<?= $_SESSION['alert']['type'] ?>'
    }).then((result) => {
        <?php if(isset($_SESSION['alert']['redirect'])): ?>
            window.location.href = '<?= $_SESSION['alert']['redirect'] ?>';
        
    });
</script>
<?php endif;
         unset($_SESSION['alert']);
        endif;
        ?>
</body>
</html>
