<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libraries</title>
    
    <!-- CSS -->
    <link rel="stylesheet" href="../assets/css/library.css">
</head>
<body>

<?php
 include ("../includes/navbar.php");
 include ("../includes/loader.php");
  ?>


<!-- Header -->
<section class="header mx-5">
    <h2 class="display-6 fw-bold mt-5">Find Libraries</h2>
    <p>Find the best libraries with your favorite books</p>
</section>

<!-- Libraries -->
<section class="my-5">
    <div class="find-library mx-5 my-3">
        <!-- Search Bar -->
        <div class="search-bar">
            <input type="text" placeholder="Search by Library Name" />
            <button class="search-btn">Search <i class="fa-solid fa-magnifying-glass"></i></button>
        </div>
        
        <!-- Filter Panel -->
        <select name="user_type" id="user_type" class="py-1 px-2" required>
            <option value="" disabled selected>Filter By Location</option>
            <option value="location">Bamenda</option>
            <option value="genre">Yaounde</option>
            <option value="rating">Buea</option>
        </select>
        <select name="user_type" id="user_type" class="py-1 px-2" required>
            <option value="" disabled selected>Filter By Genre</option>
            <option value="location">Horror</option>
            <option value="genre">Fairy Tale</option>
            <option value="rating">Educational</option>
        </select>
        <button class="btn-filter rounded-pill">Filter<i class="fa-solid fa-filter"></i></button>
    </div>

    <div class="d-flex flex-column gap-4 mt-4 mx-5">
        <?php
        $libraries = [
            [
                'id' => 1,
                'name' => 'Online Library', 
                'location' => 'Virtual', 
                'img' => 'library4.jpeg', 
                'totalBooks' => '320', 
                'favCount' => '5', 
                'openingHours' => '8AM-5PM',
                'desc' => 'A modern library that operates online and can serve users who love to stay at home',
                'dateAdded' => '27-09-24',
                'email' => 'example1@gmail.com',
                'address' => 'Bonaberi, Douala'
            ],
            ['id' => 2,
                'name' => 'Public Library', 
                'location' => 'Yaoundé', 
                'img' => 'library2.jpeg', 
                'totalBooks' => '30', 
                'favCount' => '0', 
                'openingHours' => '8AM-1PM',
                'desc' => 'The government library in Yaounde with the best books you can find in Cameroon',
                'dateAdded' => '27-10-24',
                'email' => 'example2@gmail.com',
                'address' => 'Palacio Hotel, Yde'
            ],
            ['id' => 3,
                'name' => 'NBL Library', 
                'location' => 'Bonaberi', 
                'img' => 'library3.jpeg', 
                'totalBooks' => '200', 
                'favCount' => '8', 
                'openingHours' => '6AM-6PM',
                'desc' => 'A unique and new library that brings something different having tons of different       genres on books on many different topics',
                'dateAdded' => '1-09-25',
                'email' => 'example3@gmail.com',
                'address' => 'Commercial Avenue, Bamenda'
            ],
        ];
        
        foreach ($libraries as $lib) {
            echo '
            <div class="library-card">
                <img src="../assets/img/' . $lib['img'] . '" alt="Library Image">
                <div class="info">
                    <h5 class="fw-bold">' . $lib['name'] . '</h5>
                    <p class="text-muted"><i class="fa-solid fa-location-dot"></i> ' . $lib['location'] . '</p>
                    <p class="text-muted"><i class="fa-solid fa-book"></i> ' . $lib['totalBooks'] . '</p>
                </div>
                <div class="btns">
                    <button class="btn btn-outline-primary btn-sm ms-5 modal-trigger" 
                            data-modal-id="libraryModal'.$lib['id'].'">
                        See More
                    </button>
                </div>
            </div>';
            
            // Modal HTML (hidden by default)
            echo '
            <div class="modal fade" id="libraryModal'.$lib['id'].'" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">'.$lib['name'].'</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img src="../assets/img/'.$lib['img'].'" alt="'.$lib['name'].'">
                
                <div class="modal-info-grid">
                    <div class="modal-info-item">
                        <div class="modal-info-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div>
                            <small class="text-muted">Location</small>
                            <p class="mb-0">'.$lib['location'].'</p>
                        </div>
                    </div>
                    
                    <div class="modal-info-item">
                        <div class="modal-info-icon">
                            <i class="fas fa-book"></i>
                        </div>
                        <div>
                            <small class="text-muted">Total Books</small>
                            <p class="mb-0">'.$lib['totalBooks'].'</p>
                        </div>
                    </div>
                    
                    <div class="modal-info-item">
                        <div class="modal-info-icon">
                            <i class="fas fa-star"></i>
                        </div>
                        <div>
                            <small class="text-muted">Favorites</small>
                            <p class="mb-0">'.$lib['favCount'].'</p>
                        </div>
                    </div>
                    
                    <div class="modal-info-item">
                        <div class="modal-info-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div>
                            <small class="text-muted">Opening Hours</small>
                            <p class="mb-0">'.$lib['openingHours'].'</p>
                        </div>
                    </div>
                </div>
                
                <div class="mt-3">
                    <small class="text-muted">Description</small>
                    <p class="mb-0">'.$lib['desc'].'</p>
                </div>
                
                <div class="mt-3">
                    <small class="text-muted">Contact</small>
                    <p class="mb-1"><i class="fas fa-envelope me-2"></i>'.$lib['email'].'</p>
                    <p class="mb-0"><i class="fas fa-map-marked-alt me-2"></i>'.$lib['address'].'</p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="modal-btn modal-btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="modal-btn modal-btn-primary">
                    <i class="fas fa-heart me-2"></i> Add to Favorites
                </button>
            </div>
        </div>
    </div>
</div>';
        }
        ?>
    </div>
</section>

<!-- JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Stable modal initialization
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize Bootstrap modals with stability fixes
        const modals = document.querySelectorAll('.modal');
        modals.forEach(modal => {
            modal.addEventListener('show.bs.modal', function(e) {
                e.stopImmediatePropagation();
            });
        });

        // Alternative trigger handler (optional)
        document.querySelectorAll('.modal-trigger').forEach(trigger => {
            trigger.addEventListener('click', function() {
                const modalId = this.getAttribute('data-modal-id');
                const modal = new bootstrap.Modal(document.getElementById(modalId));
                modal.show();
            });
        });
    });
</script>

<?php include ("../includes/footer.php"); ?>
</body>
</html>