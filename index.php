<?php session_start(); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vaccination</title>
</head>
<body>
<div class="container text-center">
    <h1>Welcome to Vaccination Center <?php if(isset($_SESSION['name'])) echo $_SESSION['name']?></h1>
    <img src="https://www.pya.org/Content/Image/NewsBlog/Covid19%20vaccine.jpg" alt="">
    <hr>
    <div class="row">
        <div class="col-lg-12">
            <?php
            if(!isset($_SESSION['name'])){ ?>
            <a href="registration.php"><button type="button" class="btn btn-primary">Account Registration</button></a>
            <a href="login.php"><button type="button" class="btn btn-primary">Login to the System</button></a>
           <?php }
            else { ?>
                <a href="register.php"><button type="button" class="btn btn-primary">Register for Vaccination</button></a>
                <a href="logout.php"><button type="button" class="btn btn-primary">Logout</button></a>
            <?php }            ?>
            <?php if(isset($_SESSION['role']) && $_SESSION['role'] == 'Personnel'){ ?>
            <a href="people.php"><button type="button" class="btn btn-primary">See list of registered people</button></a>
            <?php } else if(isset($_SESSION['role'])){ ?>
                <a href="personal.php"><button type="button" class="btn btn-primary">See personal appointments</button></a>
            <?php } ?>
        </div>
    </div>
</div>
<?php
?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</html>
