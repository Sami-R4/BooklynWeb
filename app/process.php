<?php
session_start();
include("dbconfig.php");

function sanitizeData($value) {
    return stripslashes(htmlspecialchars(trim($value)));
}

// Step 1: store user type
if (isset($_POST['step1_submit'])) {
    $user_type = $_POST['user_type'];
    if($user_type == 'reader' || $user_type == 'author'){
        $_SESSION['user_type'] = $user_type;
        header("Location: ../pages/register.php");
        exit;
    }
}

// Step 2: Register user or author
if(isset($_POST['step2_submit'])){
    $username = sanitizeData($_POST['username']);
    $email = sanitizeData($_POST['email']);
    $pwd = sanitizeData($_POST['cpwd']);
    $pwd = password_hash($pwd, PASSWORD_DEFAULT);
    $user_type = $_SESSION['user_type'];

    $reader_sql = "INSERT INTO `users`(`username`, `useremail`, `password`, `user_type`) VALUES ('$username','$email','$pwd','$user_type')";
    $reader_result = mysqli_query($conn, $reader_sql);
    if($reader_result){
        $_SESSION['alert'] = [
            'type' => 'success',
            'title' => 'Success!!',
            'message' => 'Registration Successful!!!',
            'redirect' => '../pages/user/home.php'  // Add this line
        ];
        header("Location: ../pages/register.php");  // Redirect back to register.php
        exit;
    }else{
        $_SESSION['error'] = [
            'type' => 'error',
            'title' => 'Error!!',
            'message' => 'Registration Failed!!! Please try again.'
        ];
        header("Location: ../pages/register.php");
        exit;
    }
}

?>
