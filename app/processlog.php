<?php
session_start();
include("dbconfig.php");

// Data sanitization
function filterData($value) {
    return stripslashes(htmlspecialchars(trim($value)));
}

// =======================================================
// ============ Reader Login =============================
// =======================================================
if(isset($_POST['loginReader'])){
    $email = filterData($_POST['readerEmail']);
    $pwd = filterData($_POST['readerPassword']);

    // Checking if user exists
    $sql = "SELECT * FROM `users` WHERE useremail='$email' LIMIT 1";
    $result = mysqli_query($conn, $sql);

    if($result && mysqli_num_rows($result) == 1){
        $user = mysqli_fetch_assoc($result);
        $pwdlog = $user['password'];

        // Verifying Pwd
        if(password_verify($pwd, $pwdlog)){
            // setting session variables
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['user_type'] = 'reader'; // Add user type
            $alert = '<script>
            if(window.confirm("Login Succesfull!!!")){
            window.location.href = "../pages/user/home.php";
        }
            </script>';
            echo $alert;
        }else{
            $alert = '<script>
            if(window.confirm("Incorrect Login Credentials!!! Try Again.")){
            window.location.href = "../pages/loginAuthor.php";
        }
            </script>';
            echo $alert;
        }
    }
}

// =======================================================
// ============ Author Login =============================
// =======================================================
if(isset($_POST['loginAuthor'])){
    $email = filterData($_POST['authorEmail']);
    $pwd = filterData($_POST['authorPassword']);

    // Checking if user exists
    $sql = "SELECT * FROM `users` WHERE useremail='$email' LIMIT 1";
    $result = mysqli_query($conn, $sql);

    if($result && mysqli_num_rows($result) == 1){
        $user = mysqli_fetch_assoc($result);
        $pwdlog = $user['password'];

        // Verifying Pwd
        if(password_verify($pwd, $pwdlog)){
            // setting session variables
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['user_type'] = $user['user_type']; // Store user type
            
            // Get author ID if user is author
            if($user['user_type'] == 'author'){ // Fixed: use $user array
                $author_sql = "SELECT * FROM authors WHERE email = '$email'";
                $author_qry = mysqli_query($conn, $author_sql);
                if($author_qry && mysqli_num_rows($author_qry) == 1){
                    $author = mysqli_fetch_assoc($author_qry);
                    $_SESSION['author_id'] = $author['author_id'];
                    $_SESSION['pen_name'] = $author['pen_name']; // Store pen name
                }
            }
            $alert = '<script>
            if(window.confirm("Login Succesfull!!!")){
            window.location.href = "../pages/author/user-navbar.php";
        }
            </script>';
            echo $alert;
        }else{
            $alert = '<script>
            if(window.confirm("Incorrect Login Credentials!!! Try Again.")){
            window.location.href = "../pages/loginAuthor.php";
        }
            </script>';
            echo $alert;
        }
    } else {
        $alert = '<script>
        if(window.confirm("User not found!!! Try Again.")){
        window.location.href = "../pages/loginAuthor.php";
    }
        </script>';
        echo $alert;
    }
}
?>