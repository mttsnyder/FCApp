 <?php
/**
 * Created by PhpStorm.
 * User: Matt
 * Date: 2/6/2017
 * Time: 8:02 PM
 */

$servername = "localhost";
$username = "mttdb";
$password = "P@ssw0rd";
$dbname = "FC_App";
$UPID = $_POST["dID"];

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
else {

    $sql = "DELETE FROM FC_Ref_Trax WHERE id = '$UPID'";
    $result = $conn->query($sql);
    if ($conn->query($sql) === TRUE) {
        echo "Record ".$UPID."deleted successfully";
    } else {
        echo "Error deleting record: ".$UPID . $conn->error;
    }

}
?>
