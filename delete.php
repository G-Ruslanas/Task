<?php include_once ("db.php");
if(!isset($_SESSION['role']) && $_SESSION['role']!="Personnel"){
    $location = "index.php";
    header("Location:" . $location);
} else {
    global $conn;
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $sql = "DELETE FROM registrations WHERE id='$id'";
    $conn->query($sql);
    $location = "people.php";
    header("Location:" . $location);
}