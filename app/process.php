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

// Step 2: Register user or library
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

    if ($user_type === 'library') {
        $libname = filterData($_POST['name']);
        $libemail = filterData($_POST['email']);
        $libpwd = filterData($_POST['cpwd']);
        $hash_pwd = password_hash($pwd, PASSWORD_DEFAULT);
        $address = filterData($_POST['address']);
        $openHrs = filterData($_POST['open-hours']);
        $desc = filterData($_POST['desc']);

        // Logo Upload
        $img = $_FILES['logo'];
        $imgName = basename($img['name']);
        $tmpName = $img['tmp_name'];
        $allowed = ['png', 'jpeg', 'jpg'];
        $fileExt = strtolower(pathinfo($imgName, PATHINFO_EXTENSION));

        if (in_array($fileExt, $allowed)) {
            $logo_dir = "../assets/img/lib-logos/";
            if (!is_dir($logo_dir)) mkdir($logo_dir);
            $filePath = $logo_dir . $imgName;

            if (move_uploaded_file($tmpName, $filePath)) {
                $sql_lib = "INSERT INTO `libraries`(`library_name`, `logo`, `email`, `openHours`, `description`, `location`) 
                            VALUES ('$libname', '$filePath', '$libemail', '$openHrs', '$desc', '$address')";
                $qry_lib = mysqli_query($conn, $sql_lib);

                $success = $qry_user && $qry_lib;
            } else {
                echo "Failed to upload logo.";
                exit;
            }
        } else {
            echo "Invalid file type.";
            exit;
        }
    } else {
        // If user is a reader, only one insert needed
        $success = $qry_user;
    }

    // Final response
if ($success) {
    $redirectPage = ($user_type === 'library') ? '../pages/user/home.php' : '../pages/user/home.php';

    session_destroy();
    echo "<script>
        if (confirm('Successful Registration')) {
            window.location.href = '$redirectPage';
        }
    </script>";
    exit;
}

}
?>
