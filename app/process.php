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

// Step 2: User Registration

?>
