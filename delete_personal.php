<?php include_once ("db.php");
session_start();
if(!isset($_SESSION['role'])){
    $location = "index.php";
    header("Location:" . $location);
} else {
    global $conn;
    $id = mysqli_real_escape_string($conn,$_GET['id']);
    $sql = "DELETE FROM registrations WHERE id='$id'";
    $conn->query($sql);
    $location = "personal.php";
    header("Location:" . $location);
}
