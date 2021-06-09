<?php session_start(); ?>
<?php
$_SESSION['id'] = null;
$_SESSION['name'] = null;
$_SESSION['email'] = null;
$_SESSION['role'] = null;
$location = "login.php";
header("Location:" . $location);
?>
