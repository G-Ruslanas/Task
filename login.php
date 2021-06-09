<?php  include "db.php";
include ("functions.php");
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">    <meta http-equiv="X-UA-Compatible" content="ie=edge">

<div class="container">
        <div class="row">
            <h2 class="text-center">Login to the System</h2>
                <form method="post">
                    <div class="form-group">
                        <label for="Email">Email</label>
                        <input name="Emails" type="text" class="form-control" placeholder="Enter Email">
                    </div>
                    <div class="form-group">
                        <label for="Password">Password</label>
                        <input name="Password" type="password" class="form-control" placeholder="Enter Password">
                    </div>
                    <div class="form-group mt-2">
                        <button type="Submit" name="Submit" class="btn btn-primary">Login</button>
                        <a href="index.php"><button class="btn btn-success" type="Button">Return to main page</button></a>
                    </div>
                </form>
        </div>
</div>
    <hr>
</div>

<?php
if(isset($_POST['Emails']) && isset($_POST['Password'])){
    global $conn;
    $Emails = mysqli_real_escape_string($conn,$_POST['Emails']);
    $Password = mysqli_real_escape_string($conn,$_POST['Password']);
    login_user($Emails,$Password);
}
?>