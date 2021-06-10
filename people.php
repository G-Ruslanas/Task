<?php include_once ("db.php");
session_start();
if(!isset($_SESSION['role']) && $_SESSION['role']!="Personnel"){
    $location = "index.php";
    header("Location:" . $location);
}
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">    <meta http-equiv="X-UA-Compatible" content="ie=edge">

<div class="container">
    <div class="row">
        <h1 class="text-left">List of registered people</h1>
            <div class="col-lg-3">
         <form method="post" action="people.php" enctype="multipart/form-data">
         <div class="form-group">
             <label for="Date">Choose Date</label>
             <input type="date" name="Date" class="form-control">
         </div>
         <div class="form-group mt-2">
             <button type="submit" class="btn btn-primary">Search</button>
             <a href="index.php"><button class="btn btn-success" type="Button">Return to main page</button></a>
         </div>
         </form>
    </div>
        <div class="col-lg-9">
            <h5>Table with registered people for vaccination</h5>
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
                $sql = "SELECT * FROM registrations";
                if(isset($_POST['Date'])){
                    $date = mysqli_real_escape_string($conn,$_POST['Date']);
                    $sql = "SELECT * FROM registrations WHERE date LIKE '%$date%' ORDER BY time";
                }
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
                  <td><a href="delete.php?id=<?=$row['id'];?>" onclick="return confirm('Are you sure you want to delete this item?');"><button class="btn btn-danger">Delete</button></a></td>
                      </tr>
                <?php
                    }
                }
?>
                </tbody>
            </table>
            <?php
            if(isset($_SESSION['message3'])){
                ?>
                <div class="alert alert-success"><?php echo $_SESSION['message3']?></div>
            <?php unset($_SESSION['message3']);  } ?>
            <div class="row">
            <div class="col-lg-3">
                <a href="csv_export.php"> <button class="btn btn-success">Export to .CSV file</button></a>
            </div>
            <div class="col-lg-9">
                <form action="csv_import.php" method="post" enctype="multipart/form-data">
                    <input  class="form-control" type="file" name="file"/>
                    <button type="submit" class="btn btn-primary mt-2" name="ImportCSV">Import from .CSV file</button>
                </form>
            </div>
        </div>
        </div>
    </div>

</div>
