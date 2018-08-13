<?php
/**
 * Created by PhpStorm.
 * User: Matt
 * Date: 8/11/2018
 * Time: 11:21 AM
 */
$servername = "localhost";
$username = "mttdb";
$password = "P@ssw0rd";
$dbname = "FC_App";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
else {

 $sql = "SELECT * FROM Therapists";
    $result=mysqli_query($conn,$sql);
    $outp = array();
    while($row = mysqli_fetch_array($result))
    {$outp[$row['Name']]=$row['Email'];}


    echo json_encode($outp);}

?>