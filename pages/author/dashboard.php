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
    @media (max-width: 576px){
        .grid{
            flex-direction: column;
            gap: 10px;
        }
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
                <i class="fas fa-users"></i>
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
                <button><i class="fas fa-plus"></i> New Book</button>
            </div>
            <div class="card-div">
                <h3>Community Updates</h3>
                <p>See what your readers are discussing</p>
                <button><i class="fas fa-message"></i> View Communities</button>
            </div>
        </div>
    </div>
</div>

</body>
</html>
