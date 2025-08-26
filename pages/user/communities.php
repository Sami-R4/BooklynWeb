<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard | My Communities</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="../../assets/img/myLogo.png" type="image/x-icon">
</head>
<style>
    .container{
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 12px;
        margin-top: 30px;
    }
    .card{
        position: relative;
        box-shadow: 0 0 10px rgba(0,0,0,0.3);       
        display: flex;
        flex-direction: column;
        padding: 150px 10px;
        justify-content: center;
        align-items: center;
        border: 2px dashed #007bff;
        border-radius: 12px;
    }
    .card i{
        position: absolute;
        font-size: 3rem;
        margin-bottom: 10px;
        top: 30%;
        padding: 10px;
    }
    .card p{
        position: relative;
        font-size: 1.5rem;
        font-weight: bold;
        top: 35%;
    }
    .view-comm{
        background-image: linear-gradient(rgba(13, 121, 236, 0.8), rgba(79, 150, 226, 0.8)), url('../../assets/img/comm-bg.jpeg');
        background-size: cover;
        background-repeat: no-repeat;
        color: white;
        cursor: pointer;
    }
    .view-comm:hover, .create-comm:hover{
        box-shadow: 0 0 15px rgba(0,0,0,0.5);
        transform: scale(1.02);
        transition: all 0.3s ease;
    }
    .view-comm:active,.create-comm:active{
        transform: scale(0.97);
    }
    .view-comm:hover i{
        color: #0058b6ff;
        transition: color 0.3 ease;
    }
    .view-comm:hover p{
        color: #0058b6ff;
    }
    .create-comm:hover i{
        color: #ffd700;
        border-radius: 50%;
        transition: all 0.3s ease;
    }
    .create-comm:hover p{
        color: #ffd700;
    }
    .create-comm{
        background-image: linear-gradient(rgba(0, 0, 0, 0.5)), url('../../assets/img/create-comm.jpeg');
        background-size: cover;
        background-repeat: no-repeat;
        color: white;
        cursor: pointer;
    }
</style>
<body>

<?php
include("user-navbar.php");
?>

<div class="container">
    <div class="card view-comm">
        <i class="fas fa-users"></i>
        <p>My Communities</p>
    </div>
    <div class="card create-comm">
        <i class="fas fa-plus"></i>
        <p>Create Community</p>
    </div>
</div>
   
</body>
</html>