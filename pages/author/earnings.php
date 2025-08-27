<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Booklyn | Author Earnings</title>
  <!-- AOS CSS -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <!-- Favicon -->
  <link rel="shortcut icon" href="../../assets/img/myLogo.png" type="image/x-icon">
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
</head>
<style>
    .main-container{
        margin: 15px 35px;
    }
    .main-container h2{
        color: #3B82F6;
    }

    /* Cards Section */
    .earning-cards{
        display: grid;
        grid-template-columns: repeat(3, minmax(100px, 1fr));
        gap: 18px;
        margin-top: 20px;
    }
    .card{
        background: #fff;
        border-radius: 12px;
        padding: 20px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        gap: 8px;
        transition: all 0.2s ease;
    }
    .card:hover{
        transform: scale(1.02);
        box-shadow: 0 4px 10px rgba(59,130,246,0.3);
    }
    .card i{
        font-size: 25px;
        color: #3B82F6;
        background: #e8f0fe;
        padding: 10px;
        border-radius: 10px;
    }
    .card h4{
        font-size: 16px;
        margin: 0;
        color: #333;
    }
    .card p{
        font-size: 18px;
        font-weight: bold;
        margin: 0;
        color: #111;
    }

    /* Filter and Search */
    .filter{
        display: grid;
        grid-template-columns: 45% 35% 15%;
        gap: 10px;
        margin-top: 30px;
    }
    .search-bar{
        display: flex;
        gap: 5px;
        align-items: center;
        border: 1px solid #3b82f6;
        background: #fff;
        border-radius: 30px;
        padding: 4px 8px;
    }
    .search-bar input{
        border: none;
        background: #fff; 
        border-radius: 30px;
        width: 100%;
        outline: none;
    }
    .search-bar input::placeholder{
        font-size: 15px;
    }
    .search-bar i{
        margin-left: auto;
        background: #3b82f6;
        color: white;
        padding: 10px;
        border-radius: 50%;
        cursor: pointer;
        transition: all 0.2s ease;
    }
    .search-bar i:hover{
        transform: scale(1.05);
    }
    .search-bar:focus-within{
        box-shadow: 0 0 6px #3b82f6;
    }
    .filter select{
        border-radius: 30px;
        padding: 10px;
        background: #fff;
        border: 1px solid #3b82f6;
        outline: none;
    }
    .filter select:focus{
        box-shadow: 0 0 6px #3b82f6;
    }
    .filter button{
        border-radius: 30px;
        background: #3b82f6;
        border: none;
        color: #fff;
        cursor: pointer;
    }

    /* Table */
    table{
        margin-top: 20px;
        width: 100%;
        border-collapse: collapse;
    }
    table thead{
        background: linear-gradient(to right, #1e293b, #3b82f6);
        color: #fff;
    }
    table thead th{
        padding: 10px 0;
    }
    table thead th:first-child{
        padding-left: 15px;
    }
    table td{
        background: #fff;
        padding: 10px 15px;
    }
    table tr:hover td{
        background: whitesmoke;
    }
</style>
<body>

<?php include ("user-navbar.php") ?>

<div class="main-container">
    <h2>My Earnings</h2>

    <!-- Cards -->
    <div class="earning-cards">
        <div class="card">
            <i class="fas fa-coins"></i>
            <h4>Total Earnings</h4>
            <p>XAF 12,000</p>
        </div>
        <div class="card">
            <i class="fas fa-shopping-cart"></i>
            <h4>Units Sold</h4>
            <p>120</p>
        </div>
        <div class="card">
            <i class="fas fa-wallet"></i>
            <h4>Account Balance</h4>
            <p>XAF 10,000</p>
        </div>
    </div>

    <!-- Filter -->
    <div class="filter">
        <div class="search-bar">
            <input type="text" name="search" id="search" placeholder="Search by title, date...">
            <i class="fas fa-search"></i>
        </div>
        <select name="filterStatus" id="filterStatus">
            <option value="" hidden>Filter By Status</option>
            <option value="active">Active</option>
            <option value="inactive">Inactive</option>
            <option value="archived">Archived</option>
        </select>
        <button>Filter <i class="fas fa-filter"></i></button>
    </div>

    <!-- Table -->
    <table>
        <thead>
            <th>Book Title</th>
            <th>Date Added</th>
            <th>Units Sold</th>
            <th>Earnings</th>
            <th>Status</th>
        </thead>
        <tbody>
            <tr>
                <td>Glitch</td>
                <td>August, 27 2025</td>
                <td>30</td>
                <td>XAF 2000</td>
                <td>Active</td>
            </tr>
        </tbody>
    </table>

</div>

</body>
</html>
