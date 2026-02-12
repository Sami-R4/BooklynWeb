<?php
// Active States
  $currentPage = basename($_SERVER['PHP_SELF']);
// session_start();
// if(isset($_SESSION['error'])){
//     echo "<p style='color:red;'>".$_SESSION['error']."</p>";
//     unset($_SESSION['error']);
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.css">  
    <!-- Google Fonts: DM Sans -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@300;400;500;700&display=swap">
</head>
<style>
    *{
        padding: 0;
        margin: 0;
        box-sizing: border-box;
        font-family: "DM Sans", sans-serif;
    }
    :root{
        --primary-clr: #3B82F6;
        --secondary-clr: #1E293B;
        --accent-gold: #FCD34D;
        --bg-clr: #F8FAFC;
        --pure-white: #FFFFFF;
    }

    nav{
        background: linear-gradient(135deg, #1e293b, #2569d6);
        display: flex;
        justify-content: center;
        box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
        position: fixed;
        width: 100%;
        top: 0;
        z-index: 1000;
    }
    
    nav h2{
        color: var(--pure-white);
        text-shadow: 2px 2px 8px rgba(252, 211, 77, 0.3);
    }
    
    ul{
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 3em;
    }
    
    ul li{
        list-style: none;
    }
    
    ul li a{
        position: relative;
        text-decoration: none;
        color: var(--pure-white);
        font-size: 25px;
        font-weight: 500;
        overflow: hidden;
        transition: all 0.3s ease;
    }
    
    ul li a::before,
    ul li a::after{
        content: '';
        position: absolute;
        width: 0;
        height: 3px;
        background: var(--accent-gold);
        transition: width 0.3s ease;
    }
    
    ul li a::before{
        top: -1px;
        left: 0;
    }
    
    ul li a::after{
        bottom: -5px;
        right: 0;
    }
    
    ul li a:hover{
        color: var(--accent-gold);
        font-weight: 700;
        transform: scale(1.05);
    }
    
    ul li a:hover::before,
    ul li a:hover::after{
        width: 100%;
    }
    
    nav .start-btn{
        padding: 10px 20px;
        border: none;
        color: var(--secondary-clr);
        background: var(--accent-gold);
        font-weight: 700;
        cursor: pointer;
        transition: all 0.3s ease;
    }
    
    nav .start-btn:hover{
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(252, 211, 77, 0.4);
    }
    
    ul li a.active{
        color: var(--accent-gold);
        font-weight: 700;
        transform: scale(1.05);
    }
    
    ul li a.active::before,
    ul li a.active::after{
        width: 100%;
    }
    
    .login-btn{
        text-decoration: none;
        background: transparent;
        color: var(--pure-white);
        padding: 8px 20px;
        border: 2px solid var(--accent-gold);
        transition: all 0.3s ease;
        font-weight: 600;
        cursor: pointer;
    }
    
    .login-btn:hover{
        background: var(--accent-gold);
        color: #000;
        border-color: none;
    }
</style>
<body>
    <!-- Navigation -->
    <nav class="py-2">
        <!-- Logo -->
        <h2 class="fs-1 me-auto mx-3 mt-3 fw-bold">Booklyn</h2>
        
        <!-- Navigation Links -->
        <ul class="mt-3">
            <li><a href="../pages/index.php" class="<?php echo $currentPage == 'index.php'? 'active': ''?>">Home</a></li>
            <li><a href="../pages/books.php" class="<?php echo $currentPage == 'books.php'? 'active': ''?>">Books</a></li>
            <li><a href="../pages/blogs.php" class="<?php echo $currentPage == 'blogs.php'? 'active': ''?>">Blogs</a></li>
        </ul>
        
        <!-- Auth Buttons -->
        <div class="ms-auto my-3 d-flex align-items-center gap-2">
            <a href="../pages/login.php">
                <button class="login-btn mx-2 rounded">Login</button>
            </a>
            
            <a href="../pages/register.php">
                <button class="start-btn mx-2 rounded">Get Started</button>
            </a>
        </div>
    </nav>
</body>
</html>