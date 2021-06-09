<?php include_once ("db.php");
global $conn;
$sql = "SELECT * FROM registrations ORDER BY id";
$result = $conn->query($sql);
    if($result->num_rows > 0)
    {
        $delimiter = ",";
        $filename = "Vaccination:" . date('Y-m-d') . ".csv";
        $f = fopen('php://memory','w');
        $fields = array('Id','Name','Email','PhoneNumber','NINumber','Date','Time');
        fputcsv($f,$fields,$delimiter);
        while($row = $result->fetch_assoc())
        {
            $Data = array($row['id'],$row['name'],$row['email'],$row['phonenumber'],$row['ninumber'],$row['date'],$row['time']);
            fputcsv($f,$Data,$delimiter);
        }
        fseek($f,0);
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="' . $filename . '";');
        fpassthru($f);
    }