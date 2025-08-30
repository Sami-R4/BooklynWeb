<?php 
include ('dbconfig.php');
session_start();

if(!isset($_SESSION['user_id'])){
    echo '<script>alert("User not logged in")</script>';
    header("Location: ../pages/login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$book_id = $_GET['book_id'];

// checking if book already in cart
$check = mysqli_query($conn, "SELECT * FROM cart WHERE user_id='$user_id' AND book_id='$book_id'");
if(mysqli_num_rows($check) > 0){
    echo '<script>alert("Book already in cart!! Redirecting...")</script>';
    header("Location: ../pages/user/cart.php");
    exit();
}

// Get book details
$book_query = "SELECT `book_title`, `author` FROM books WHERE `book_id`='$book_id'";
$result = mysqli_query($conn, $book_query);

if($result && mysqli_num_rows($result)){
    $book_result = mysqli_fetch_assoc($result);
    $book_title = $book_result['book_title'];
    $author_name = $book_result['author'];
}
    
// Inserting to cart
$sql = "INSERT INTO cart `user_id`, `book_id` VALUES '$user_id','$book_id'";
$qry = mysqli_query($conn, $sql);
if($qry){
    echo '<script>alert("Book succesfully added to cart")</script>';
}

?>