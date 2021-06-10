<?php include_once ("db.php");
include ("functions.php");
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
    global $conn;
    $name = mysqli_real_escape_string($conn,$_POST['Name']);
    $email = mysqli_real_escape_string($conn,$_POST['Email']);
    $pnumber = mysqli_real_escape_string($conn,$_POST['PNumber']);
    $ninumber = mysqli_real_escape_string($conn,$_POST['NINumber']);
    $date = mysqli_real_escape_string($conn,$_POST['Date']);
    $time = mysqli_real_escape_string($conn,$_POST['Time']);
    $error = [
        'Name'=> '',
        'Email'=> '',
        'PNumber'=>'',
        'NINumber'=>''
    ];
    if(strlen($name) < 4 ){
        $error['Name'] = 'Name needs to be longer';
    }
    if($name == '' ){
        $error['Name'] = 'Name cannot be empty';
    }
    if($email == '' ){
        $error['Email'] = 'Email cannot be empty';
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error['Email'] = "Invalid email format";
    }
    if($pnumber == ''){
        $error['PNumber'] = 'Phone number cannot be empty';
    }
    if(strlen($pnumber) < 9){
        $error['NINumber'] = 'Phone number have to be 9 characters length';
    }
    if(strlen($ninumber) < 11){
        $error['NINumber'] = 'National identification number have to be 11 characters length';
    }
    if(strlen($ninumber) == ''){
        $error['NINumber'] = 'National identification number cannot be empty';
    }
    foreach($error as $key => $value){
        if(empty($value)){
            unset($error[$key]);
        }
    }
    if(empty($error)){
        update_user($name,$email,$pnumber,$ninumber,$date,$time);
        $_SESSION['message2'] =  "You successfully updated registration for vaccination";
    }
}
?>
<?php
if(isset($_SESSION['message2'])){
    ?>
    <div class="alert alert-success"><?php echo $_SESSION['message2']?></div>
<?php } ?>
<div class="container">
    <div class="row">
        <h1 class="text-center">Update registration for Vaccination</h1>
        <form method="post" action="edit.php?id=<?php echo $_GET['id']?>" enctype="multipart/form-data">
<?php
            global $conn;
            $id = mysqli_real_escape_string($conn, $_GET['id']);
            $sql = "SELECT * FROM registrations where id = '$id'";
            $result = $conn->query($sql);
            while($row = $result->fetch_assoc()){
?>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="Name" class="form-control" placeholder="Name" value="<?php echo $row['name']; ?>">
                <p><?php echo isset($error['Name']) ? $error['Name'] : '' ?></p>
            </div>
            <div class="form-group">
                <label for="name">Email</label>
                <input type="text" name="Email" class="form-control" placeholder="example@gmail.com" value="<?php echo $row['email']; ?>" readonly>
                <p><?php echo isset($error['Email']) ? $error['Email'] : '' ?></p>
            </div>
            <div class="form-group">
                <label for="name">Phone Number</label>
                <input type="text" name="PNumber" class="form-control" placeholder="86xxxxxxx" value="<?php echo $row['phonenumber']; ?>">
                <p><?php echo isset($error['PNumber']) ? $error['PNumber'] : '' ?></p>
            </div>
            <div class="form-group">
                <label for="name">National identification number</label>
                <input type="text" name="NINumber" class="form-control" placeholder="xxxxxxxxxxx" value="<?php echo $row['ninumber']; ?>">
                <p><?php echo isset($error['NINumber']) ? $error['NINumber'] : '' ?></p>
            </div>
            <div class="row">
                <div class="form-group col-lg-6">
                    <label for="Time">Choose your time</label>
                    <input type="time" name="Time" class="form-control" value="<?php echo $row['time']; ?>">
                </div>
                <div class="form-group col-lg-6">
                    <label for="Date">Choose your date</label>
                    <input type="date"  name="Date"  class="form-control" value="<?php echo $row['date']; ?>">
                </div>
            </div>
            <?php } ?>
                <div class="form-group mt-2">
                    <button type="Submit" name="Submit" class="btn btn-primary">Update</button>
                    <a href="index.php"><button class="btn btn-success" type="Button">Return to main page</button></a>
                </div>
        </form>
</div>
