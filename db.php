<?php
$servername = "localhost";
$username = "root";
$password = "";
$conn = new mysqli($servername,$username,$password, "visma");

if($conn->connect_error) {
    die("Connection failed:" . $conn->connect_error);
}

$sql = "CREATE TABLE Registrations (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
email VARCHAR(30) NOT NULL UNIQUE,
phonenumber VARCHAR(15),
ninumber VARCHAR (15),
date date ,
time time
)";
$conn->query($sql);

$sqli = "CREATE TABLE Users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
email VARCHAR(30) NOT NULL UNIQUE,
password VARCHAR(60),
role VARCHAR (30) DEFAULT 'User'
)";
$conn->query($sqli);

$password = "slaptaslabai";
$password = password_hash($password, PASSWORD_BCRYPT);
$sql = "INSERT INTO users (name, email, password,role)
VALUES ('Ruslanas', 'ruslanas.g21@gmail.com','$password','Personnel')";
$conn->query($sql);