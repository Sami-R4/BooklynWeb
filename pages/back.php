<?php
session_start();
unset($_SESSION['user_type']);
header("Location: register.php");
exit;
?>