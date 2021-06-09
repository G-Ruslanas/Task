<?php include_once ("db.php");
global $conn;
$id = $_GET['id'];
$sql = "DELETE FROM registrations WHERE id=$id";
$conn->query($sql);
$location = "personal.php";
header("Location:" . $location);
