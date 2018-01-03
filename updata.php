<?php
/**
 * Created by PhpStorm.
 * User: Matt
 * Date: 8/12/2017
 * Time: 10:53 AM
 */
$servername = "localhost";
$username = "mttdb";
$password = "P@ssw0rd";
$dbname = "FC_App";

$update = $_POST["date"];
$CLN = $_POST["CLN"];
$Req = $_POST["Requested"];
$RF = $_POST["RefSrc"];
$BKD = $_POST["Booked"];
$CI = $_POST["ConInf"];
$EBY = $_POST["EntBy"];
$Oth = $_POST["Other"];
$INS = $_POST["UpIns"];
$WL = $_POST["UPWL"];
$UPID = $_POST["UPID"];

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
else {

    $sql = "UPDATE FC_Ref_Trax SET Date = '$update', Client_Name = '$CLN', Ref_Source = '$RF', Requested = '$Req', Booked = '$BKD', Contact = '$CI', Entered_By = '$EBY', Other_Info = '$Oth', Insurance = '$INS', Waitlist = '$WL' WHERE id = '$UPID'";
    $result = $conn->query($sql);

    if ($conn->query($sql) === TRUE) {
        echo "<script> res = 'Record updated successfully'</script>";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>