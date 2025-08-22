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
    // Initialize variables
    $result = false;
    $username = sanitizeData($_POST['username']);
    $email = sanitizeData($_POST['email']);
    $pwd = sanitizeData($_POST['cpwd']);
    $pwd = password_hash($pwd, PASSWORD_DEFAULT);
    $user_type = $_SESSION['user_type'];

    if($user_type == 'author'){
        $penName = sanitizeData($_POST['penName']);
        $bio = sanitizeData($_POST['bio']);
        $image = $_FILES['profile_pic'];
        $imageName = $image['name'];
        $tmpName = $image['tmp_name'];
        $fileExt = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));
        $allowed = ['jpg', 'jpeg', 'png'];
        $imgPath = null; // Initialize imgPath

        if(in_array($fileExt, $allowed)){
            $path = 'author_pics/';
            if(!is_dir($path)) {
                mkdir($path);
            }
            $imgPath = $path . basename($imageName);
            
            if(move_uploaded_file($tmpName, $imgPath)){
                $author_sql = "INSERT INTO `authors`(`author_name`, `pen_name`, `email`, `pic_path`, `bio`) VALUES ('$username','$penName','$email','$imgPath','$bio')";
                $author_result = mysqli_query($conn, $author_sql);
            if($author_result){
                $user_sql = "INSERT INTO `users`(`username`, `useremail`, `password`, `user_type`) VALUES ('$username','$email','$pwd','$user_type')";
                $result = mysqli_query($conn, $user_sql);
            }
            } else {
                $_SESSION['alert'] = [
                    'type' => 'error',
                    'title' => 'Error!',
                    'message' => 'File upload failed'
                ];
                header("Location: ../pages/register.php");
                exit;
            }
        } else {
            $_SESSION['alert'] = [
                'type' => 'error',
                'title' => 'Error!',
                'message' => 'Invalid file type. Only JPG, JPEG, PNG allowed'
            ];
            header("Location: ../pages/register.php");
            exit;
        }
    } else {
        $sql = "INSERT INTO `users`(`username`, `useremail`, `password`, `user_type`) VALUES ('$username','$email','$pwd','$user_type')";
        $result = mysqli_query($conn, $sql);
    }

    if($result){
        $_SESSION['alert'] = [
            'type' => 'success',
            'title' => 'Success!!',
            'message' => 'Registration Successful! Login Now.',
            'redirect' =>  '../pages/login.php'  
        ];
        header("Location: ../pages/register.php");
        exit;
    } else {
        $_SESSION['alert'] = [
            'type' => 'error',
            'title' => 'Error!',
            'message' => 'Registration failed: ' . mysqli_error($conn)
        ];
        header("Location: ../pages/register.php");
        exit;
    }
}
?>