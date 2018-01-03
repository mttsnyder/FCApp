<?php
/**
 * Created by PhpStorm.
 * User: Matt
 * Date: 2/4/2017
 * Time: 10:57 AM
 */
header("Access-Control-Allow-Origin: *");
$servername = "localhost";
$username = "mttdb";
$password = "P@ssw0rd";
$dbname = "FC_App";

$date=$_POST['date'];
$CLN=$_POST['CLN'];
$RefSrc=$_POST['RefSrc'];
$Other=$_POST['Other'];
$Requested=$_POST['Requested'];
$Booked=$_POST['Booked'];
$Contact=$_POST['Contact'];
$EnteredBy=$_POST['EnteredBy'];
$OtherInfo=$_POST['OtherInfo'];
$INS = $_POST["Ins"];
$WL = $_POST["Wait"];

/*echo $date.$CLN.$RefSrc.$Other.$Requested.$Booked.$EnteredBy.$OtherInfo;*/
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
else {
    echo "connection successful";

    $sql = "INSERT INTO FC_Ref_Trax (Date, Client_Name, Ref_Source, Other,	Requested, Booked, Contact, Entered_By, Other_Info, Insurance, Waitlist) VALUES ('$date','$CLN','$RefSrc','$Other','$Requested','$Booked','$Contact','$EnteredBy','$OtherInfo', '$INS','$WL')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>