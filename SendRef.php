<?php
/**
 * Created by PhpStorm.
 * User: Matt
 * Date: 8/10/2018
 * Time: 9:58 AM
 */

$ther = $_POST["ther"];
$nme = $_POST["nme"];
$pn = $_POST["pn"];
$servername = "localhost";
$username = "mttdb";
$password = "P@ssw0rd";
$dbname = "FC_App";

$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
else {
    echo "success";
    $sql = "SELECT * FROM Therapists WHERE Name = '$ther'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        while($row = $result->fetch_assoc()) {
                $themail = $row["Email"];
    }}}

// the message
$msg = "Hey ".$ther." "."Here is a referral for you!"." "."Name: ".$nme." Contact: "." ".$pn;
echo $msg;
echo "Referral sent to:".$themail;
// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,70);
$headers = "From: matt@fullcirclewnc.org" . "\r\n" .
    "CC: matt@fullcirclewnc.org";
// send email
$sent=mail($themail,"referral for you",$msg,$headers);
if (!$sent)
{echo "mail not sent";}
else
{echo "mail sent";}
?>