<?php
session_start();
include_once("db.php");
global $conn;
if(isset($_POST['ImportCSV']))
{
    if(is_uploaded_file($_FILES['file']['tmp_name']))
    {
        $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
        fgetcsv($csvFile);
        while (($line = fgetcsv($csvFile)) !== FALSE)
        {
            $name = $line[1];
            $email = $line[2];
            $pnumber = $line[3];
            $ninumber = $line[4];
            $date = date('Y-m-d',strtotime($line[5]));
            $time = $line[6];
            $select = "SELECT id FROM registrations where email = '$line[2]'";
            $result = $conn->query($select);
            if($result->num_rows >0)
            {
                $query = "UPDATE registrations SET name='$name',phonenumber='$pnumber',ninumber='$ninumber',date='$date',time='$time' WHERE email ='$email'";
                $conn->query($query);
                $_SESSION['message3'] =  "You successfully imported data from .CSV file";
            } else
                {
                $sql = "INSERT INTO registrations(name,email,phonenumber,ninumber,date,time) values('$name','$email','$pnumber','$ninumber','$date','$time')";
                $conn->query($sql);
                $_SESSION['message3'] =  "You successfully imported data from .CSV file";

                }
        }
        fclose($csvFile);
    }

}
header("Location: people.php");