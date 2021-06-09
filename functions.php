<?php
function vaccination_register($name,$email,$pnumber,$ninumber,$date,$time){
    global $conn;
    $query = "INSERT INTO registrations(name,email,phonenumber,ninumber,date,time) values('$name','$email','$pnumber','$ninumber','$date','$time')" ;
    $run = mysqli_query($conn,$query) or die(mysqli_query());
}

function user_register($name,$email,$password){
    global $conn;
    $password = password_hash($password, PASSWORD_BCRYPT );
    $query = "INSERT INTO users(name,email,password) values('$name','$email','$password')" ;
    $run = mysqli_query($conn,$query) or die(mysqli_query());
}

function login_user($Email, $Password){
    global $conn;
    $Email = $Email;
    $Password = $Password;
    $query = "SELECT * FROM users WHERE email='$Email' ";
    $select_user_query = mysqli_query($conn, $query);
    while($row = mysqli_fetch_array($select_user_query)){
        $db_user_id = $row['id'];
        $db_name = $row['name'];
        $db_user_email = $row['email'];
        $db_user_password = $row['password'];
        $db_user_role = $row['role'];
        if(password_verify($Password, $db_user_password)){
            session_start();
            $_SESSION['id'] = $db_user_id;
            $_SESSION['name'] = $db_name;
            $_SESSION['email'] = $db_user_email;
            $_SESSION['role'] = $db_user_role;
            $location = "index.php";
            header("Location:".$location);
        }
        else {
            return false;
        }
    }
    return true;
}

function update_user($name,$email,$pnumber,$ninumber,$date,$time){
    global $conn;
    $id = $_GET['id'];
    $query = "UPDATE registrations SET name='$name',email='$email',phonenumber='$pnumber',ninumber='$ninumber',date='$date',time='$time' WHERE id =$id";
    $run = mysqli_query($conn,$query) or die(mysqli_query());
}

function email_exists($email){
    global $conn;
    $query = "SELECT email FROM registrations WHERE email = '$email'";
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) > 0){
        return true;
    } else {
        return false;
    }
}
