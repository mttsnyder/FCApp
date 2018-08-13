<?php
/**
 * Created by PhpStorm.
 * User: Matt
 * Date: 8/13/2018
 * Time: 12:06 PM
*/
$servername = "localhost";
$username = "mttdb";
$password = "P@ssw0rd";
$dbname = "FC_App";

$ReferTo = $_POST["ReferTo"];
$UPID = $_POST["UpRid"];

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
else {

    $sql = "UPDATE FC_Ref_Trax SET ReferTo = '$ReferTo' WHERE id = '$UPID'";
    $result = $conn->query($sql);

    if ($conn->query($sql) === TRUE) {
        echo "Referral updated successfully ID:".$UPID;
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>