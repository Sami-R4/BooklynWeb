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
</head>
<style>
    *{
        padding: 0;
        margin: 0;
        box-sizing: border-box;
        font-family: "Manrope", sans-serif;
    }
    :root{
    --primary-clr: #3B82F6;
    --secondary-clr: #000068;
    --accent-gold: #FCD34D;
    --bg-clr: #F8FAFC;
    --pure-white: #FFFFFF;
}
@font-face {
    font-family: "Manrope";
    src: url('../fonts/MANROPE-VARIABLEFONT_WGHT.TTF');
}
nav{
    background: var(--secondary-clr);
    display: flex;
    justify-content: center;
    box-shadow: 0px 0px 12px 3px rgba(0, 0, 0, 0.1);
    position: fixed;
    width: 100%;
    top: 0;
    z-index: 1000;
}
nav h2{
    color: var(--pure-white);
    text-shadow: 2px 2px 8px var(--accent-gold);
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
    overflow: hidden;
    transition: text-shadow 0.3s ease, color 0.3s ease;
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
    text-shadow: 0 0 8px #3b82f6, 0 0 12px gold;
    transform: scale(1.05);
}
ul li a:hover::before,
ul li a:hover::after{
    width: 100%;
}
nav .start-btn{
    padding: 7px 10px;
    border: none;
    color: #000;
    background: var(--accent-gold);
}
nav .start-btn:hover{
    transform: scale(1.1);
    transition: 0.3s ease-in-out;
    box-shadow: 0 2px 12px 5px gold;
}
   
ul li a.active{
    color: var(--accent-gold);
    font-weight: 700;
    text-shadow: 0 0 8px #3b82f6, 0 0 12px gold;
    transform: scale(1.05);
}
ul li a.active::before,
ul li a.active::after{
    width: 100%;
}
.login-btn{
    text-decoration: none;
    background: transparent;
    color: #fff;
    padding: 5px 12px;
    border: 2px solid var(--accent-gold);
    transition: all 0.2s ease;
}
.login-btn:hover{
    background: var(--accent-gold);
    color: #000;
}
.dropdown-menu{
  display: none;
  flex-direction: column;
  gap: 0.3em;
  background: rgba(0,0,0,0.5);
  min-width: 160px;
  overflow: hidden;
  padding: 0;
  margin-top: 10em;
  margin-left: 1.5em;
  overflow: hidden;
}
.dropdown-menu a{
  text-decoration: none;
  display: block;
  color: #fff;
  padding: 12px 16px;
}
.dropdown-menu a:hover{
  background: rgba(0,0,0,0.8);
}
.dropdown-menu.show{
  display: flex;
}
</style>
<body>
    <!-- Modify your nav section -->
<nav class="py-2">
    <!-- Logo -->
    <h2 class="fs-1 me-auto mx-3 mt-3 fw-bold">Booklyn</h2>
    
    <!-- Navigation Links -->
    <ul class="mt-3">
        <li><a href="../pages/index.php" class="<?php echo $currentPage == 'index.php'? 'active': ''?>">Home</a></li>
        <li><a href="../pages/books.php" class="<?php echo $currentPage == 'books.php'? 'active': ''?>">Books</a></li>
        <li><a href="../pages/library.php" class="<?php echo $currentPage == 'library.php'? 'active': ''?>">Authors</a></li>
    </ul>
    
    <!-- Auth Buttons -->
    <div class="ms-auto my-3 d-flex align-items-center gap-3">
        <button class="login-btn mx-2 rounded" id="dropdownBtn">Login</button>
        <!-- Dropdown Menu -->
         <div class="dropdown-menu" id="dropDown">
          <a href="../pages/loginUser.php">As Reader</a>
          <a href="../pages/loginAuthor.php">As Author</a>
         </div>
        <a href="../pages/register.php">
            <button class="start-btn mx-2 rounded">Get Started</button>
        </a>
    </div>
</nav>

<script>
  const btn = document.getElementById('dropdownBtn');
  const dropDown = document.getElementById('dropDown');
  
  // show dropdown on click
  btn.addEventListener('click', (e) => {
    e.stopPropagation();
    dropDown.classList.toggle('show');
  });

   // remove dialogue on click out
  document.addEventListener('click', (event) => {
    if(dropDown) dropDown.classList.remove('show');
  });
</script>
</body>
</html>