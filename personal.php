<?php include_once ("db.php");
session_start();
if(!isset($_SESSION['role'])){
    $location = "index.php";
    header("Location:" . $location);
}
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">    <meta http-equiv="X-UA-Compatible" content="ie=edge">

<div class="container">
    <div class="row">
        <h1 class="text-left">List of personal appointments</h1>
        <div class="col-lg-12">
            <table style="width:100%" class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">National Identification Number</th>
                    <th scope="col">Date</th>
                    <th scope="col">Time</th>
                    <th scope="col">Delete</th>
                </tr>
                </thead>
                <tbody>
                <?php
                global $conn;
                $Email = $_SESSION['email'];
                $sql = "SELECT * FROM registrations where email = '$Email'";
                $result = $conn->query($sql);
                if($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()){
                ?>
                <tr>
                    <td><a href="edit.php?id=<?php echo $row['id']?>"><?php echo $row['name']?></a></td>
                    <td><?php echo $row['email']?></td>
                    <td><?php echo $row['phonenumber']?></td>
                    <td><?php echo $row['ninumber']?></td>
                    <td><?php echo $row['date']?></td>
                    <td><?php echo $row['time']?>
                    <td><a href="delete_personal.php?id=<?=$row['id'];?>" onclick="return confirm('Are you sure you want to delete this item?');"><button class="btn btn-danger">Delete</button></a></td>
                </tr>
                <?php
                    }
                }
                ?>
                </tbody>
            </table>
            <a href="index.php"><button class="btn btn-success" type="Button">Return to main page</button></a>
            <?php
            if(isset($_SESSION['message3'])){
                ?>
                <div class="alert alert-success"><?php echo $_SESSION['message3']?></div>
            <?php } ?>
        </div>
    </div>

</div>

