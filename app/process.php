<?php
session_start();
include("dbconfig.php");

function filterData($value) {
    return stripslashes(htmlspecialchars(trim($value)));
}

// Step 1: store user type
if (isset($_POST['step1_submit'])) {
    $_SESSION['user_type'] = $_POST['user_type'];
    header("Location: ../pages/register.php");
    exit;
}

// Step 2: Register user or author
if (isset($_POST['step2_submit'])) {
    $user_type = $_SESSION['user_type'] ?? 'user';

    $name = filterData($_POST['name']);
    $email = filterData($_POST['email']);
    $pwd = filterData($_POST['cpwd']);
    $hash_pwd = password_hash($pwd, PASSWORD_DEFAULT);

    $success = false;

    // Insert into users table (both user types)
    $sql_user = "INSERT INTO `users`(`username`, `useremail`, `password`, `user_type`) 
                 VALUES ('$name', '$email', '$hash_pwd', '$user_type')";
    $qry_user = mysqli_query($conn, $sql_user);


    // Final response


}
?>
