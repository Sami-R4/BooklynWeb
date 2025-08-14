<?php
// books.php - Library Dashboard
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Dashboard</title>
    <link rel="stylesheet" href="../../assets/css/bootstrap.css">
    <style>
        :root {
            --sidebar-width: 250px;
        }
        body {
            background-color: #f5f7fa;
        }
        .sidebar {
            width: var(--sidebar-width);
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            background: linear-gradient(180deg, #2c3e50, #1a252f);
            color: white;
            padding-top: 20px;
        }
        .main-content {
            margin-left: var(--sidebar-width);
            padding: 20px;
        }
        .stat-card {
            border-radius: 10px;
            border: none;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            transition: transform 0.3s;
        }
        .stat-card:hover {
            transform: translateY(-5px);
        }
        .stat-card.books {
            background: linear-gradient(45deg, #3498db, #2980b9);
            color: white;
        }
        .stat-card.members {
            background: linear-gradient(45deg, #2ecc71, #27ae60);
            color: white;
        }
        .stat-card.loans {
            background: linear-gradient(45deg, #e74c3c, #c0392b);
            color: white;
        }
        .stat-card.overdue {
            background: linear-gradient(45deg, #f39c12, #e67e22);
            color: white;
        }
        .book-card {
            border: none;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            transition: all 0.3s;
        }
        .book-card:hover {
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        .book-cover {
            height: 180px;
            object-fit: cover;
        }
        .nav-link {
            color: rgba(255,255,255,0.8);
            margin-bottom: 5px;
            border-radius: 5px;
        }
        .nav-link:hover, .nav-link.active {
            background-color: rgba(255,255,255,0.1);
            color: white;
        }
        .nav-link i {
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar d-none d-lg-block">
        <div class="text-center mb-4">
            <h4>Library Dashboard</h4>
        </div>
        <ul class="nav flex-column px-3">
            <li class="nav-item">
                <a class="nav-link active" href="#">
                    <i class="bi bi-house-door"></i> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="bi bi-book"></i> Books Catalog
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="bi bi-people"></i> Members
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="bi bi-arrow-left-right"></i> Loans
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="bi bi-clock-history"></i> Overdue
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="bi bi-gear"></i> Settings
                </a>
            </li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Top Bar -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Dashboard</h2>
            <div class="d-flex">
                <div class="input-group me-3" style="width: 300px;">
                    <input type="text" class="form-control" placeholder="Search...">
                    <button class="btn btn-primary" type="button">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
                <div class="dropdown">
                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                        <i class="bi bi-person-circle"></i> Admin
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
        
        <!-- Stats Cards -->
        <div class="row mb-4">
            <div class="col-md-6 col-lg-3 mb-4">
                <div class="card stat-card books">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="card-subtitle mb-2">Total Books</h6>
                                <h3 class="card-title">1,248</h3>
                                <p class="card-text small"><i class="bi bi-arrow-up"></i> 12% from last month</p>
                            </div>
                            <i class="bi bi-book fs-1 opacity-50"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 mb-4">
                <div class="card stat-card members">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="card-subtitle mb-2">Active Members</h6>
                                <h3 class="card-title">542</h3>
                                <p class="card-text small"><i class="bi bi-arrow-up"></i> 8% from last month</p>
                            </div>
                            <i class="bi bi-people fs-1 opacity-50"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 mb-4">
                <div class="card stat-card loans">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="card-subtitle mb-2">Active Loans</h6>
                                <h3 class="card-title">287</h3>
                                <p class="card-text small"><i class="bi bi-arrow-down"></i> 3% from last month</p>
                            </div>
                            <i class="bi bi-arrow-left-right fs-1 opacity-50"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 mb-4">
                <div class="card stat-card overdue">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="card-subtitle mb-2">Overdue Books</h6>
                                <h3 class="card-title">34</h3>
                                <p class="card-text small"><i class="bi bi-arrow-down"></i> 15% from last month</p>
                            </div>
                            <i class="bi bi-exclamation-triangle fs-1 opacity-50"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Recent Books Section -->
        <div class="card mb-4">
            <div class="card-header bg-white">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Recently Added Books</h5>
                    <a href="#" class="btn btn-sm btn-outline-primary">View All</a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <?php
                    $recentBooks = [
                        ["title" => "The Psychology of Money", "author" => "Morgan Housel", "category" => "Finance", "added" => "2 days ago"],
                        ["title" => "Clean Code", "author" => "Robert C. Martin", "category" => "Programming", "added" => "1 week ago"],
                        ["title" => "Dune", "author" => "Frank Herbert", "category" => "Sci-Fi", "added" => "1 week ago"],
                        ["title" => "Atomic Habits", "author" => "James Clear", "category" => "Self-Help", "added" => "2 weeks ago"],
                        ["title" => "Sapiens", "author" => "Yuval Noah Harari", "category" => "History", "added" => "2 weeks ago"],
                        ["title" => "The Midnight Library", "author" => "Matt Haig", "category" => "Fiction", "added" => "3 weeks ago"]
                    ];
                    
                    foreach ($recentBooks as $book) {
                        echo '
                        <div class="col-md-6 col-lg-4 col-xl-3 mb-4">
                            <div class="card book-card h-100">
                                <img src="https://via.placeholder.com/300x400/e9ecef/6c757d?text='. substr($book['title'], 0, 12) .'" class="book-cover w-100">
                                <div class="card-body">
                                    <h5 class="card-title">'. $book['title'] .'</h5>
                                    <p class="card-text text-muted small">by '. $book['author'] .'</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="badge bg-light text-dark">'. $book['category'] .'</span>
                                        <small class="text-muted">'. $book['added'] .'</small>
                                    </div>
                                </div>
                            </div>
                        </div>';
                    }
                    ?>
                </div>
            </div>
        </div>
        
        <!-- Popular Books Section -->
        <div class="card">
            <div class="card-header bg-white">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Most Popular Books</h5>
                    <a href="#" class="btn btn-sm btn-outline-primary">View All</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Category</th>
                                <th>Loans This Month</th>
                                <th>Total Loans</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>The Silent Patient</td>
                                <td>Alex Michaelides</td>
                                <td>Thriller</td>
                                <td>24</td>
                                <td>156</td>
                                <td><button class="btn btn-sm btn-outline-primary">Manage</button></td>
                            </tr>
                            <tr>
                                <td>Where the Crawdads Sing</td>
                                <td>Delia Owens</td>
                                <td>Fiction</td>
                                <td>19</td>
                                <td>132</td>
                                <td><button class="btn btn-sm btn-outline-primary">Manage</button></td>
                            </tr>
                            <tr>
                                <td>Atomic Habits</td>
                                <td>James Clear</td>
                                <td>Self-Help</td>
                                <td>17</td>
                                <td>98</td>
                                <td><button class="btn btn-sm btn-outline-primary">Manage</button></td>
                            </tr>
                            <tr>
                                <td>The Midnight Library</td>
                                <td>Matt Haig</td>
                                <td>Fiction</td>
                                <td>15</td>
                                <td>87</td>
                                <td><button class="btn btn-sm btn-outline-primary">Manage</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>