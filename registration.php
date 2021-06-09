<?php  include "db.php";
include ("functions.php");
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
    global $conn;
    $date = mysqli_real_escape_string($conn,$_POST['Date']);
    $name = mysqli_real_escape_string($conn,$_POST['Name']);
    $email = mysqli_real_escape_string($conn,$_POST['Emails']);
    $password = mysqli_real_escape_string($conn,$_POST['Password']);
    $error = [
        'Name'=> '',
        'Emails'=> '',
        'Password'=>''
    ];
    if(strlen($name) < 4 ){
        $error['Name'] = 'Name needs to be longer';
    }
    if($name == '' ){
        $error['Name'] = 'Name cannot be empty';
    }
    if($email == '' ){
        $error['Emails'] = 'Email cannot be empty';
    }
    if(email_exists($email)){
        $error['Emails'] = 'Email already exists';
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error['Emails'] = "Invalid email format";
    }
    if($password == ''){
        $error['Password'] = 'Password cannot be empty';
    }
    foreach($error as $key => $value){
        if(empty($value)){
            unset($error[$key]);
        }
    }
    if(empty($error)){
        user_register($name,$email,$password);
        login_user($email, $password);
    }
}
?>
<div class="container">
    <div class="row">
        <h1>Account Registration</h1>
        <form action="registration.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="Name">Name</label>
                <input type="text" name="Name" class="form-control" placeholder="Enter Your Name" >
                <p><?php echo isset($error['Name']) ? $error['Name'] : '' ?></p>
            </div>
            <div class="form-group">
                <label for="Emails">Email</label>
                <input type="email" name="Emails" class="form-control" placeholder="somebody@example.com">
                <p><?php echo isset($error['Emails']) ? $error['Emails'] : '' ?></p>
            </div>
            <div class="form-group">
                <label for="Password">Password</label>
                <input type="password" name="Password" class="form-control" placeholder="Password" >
                <p><?php echo isset($error['Password']) ? $error['Password'] : '' ?></p>
            </div>
            <button type="Submit" name="Submit" class="btn btn-primary">Register</button>
            <a href="index.php"><button class="btn btn-success" type="Button">Return to main page</button></a>
        </form>
    </div>
</div>
    <hr>