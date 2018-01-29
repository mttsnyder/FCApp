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

$crit=$_POST['crit'];
$cyear=$_POST['cyear'];
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
else {

    $sql = "SELECT * FROM FC_Ref_Trax WHERE YEAR(Date) = '$cyear' AND MONTH(Date) = '$crit'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<thead>><tr><th>Date</th><th>Name</th><th>Requested</th><th>Referral Source</th><th>Booked?</th><th>Contact Info</th><th>Entered By:</th><th>Other Info</th><th>Insurance</th><th>Waitlist?</th><th>Id</th></tr></thead>";
        // output data of each row
        echo "<tbody>";
        while($row = $result->fetch_assoc()) {
            $date = $row["Date"];
            $d = date_parse_from_format("Y-m-d", $date);

            echo "<tr><td contenteditable='true' onClick='showEdit(this);'>".$row["Date"]."</td><td contenteditable='true' onClick='showEdit(this);'>".$row["Client_Name"]."</td><td contenteditable='true' onClick='showEdit(this);'>".$row["Requested"]."</td><td contenteditable='true' onClick='showEdit(this);'>".$row["Ref_Source"]."</td><td contenteditable='true' onClick='showEdit(this);'>".$row["Booked"]."</td><td contenteditable='true' onClick='showEdit(this);'>".$row["Contact"]."</td><td contenteditable='true' onClick='showEdit(this);'>".$row["Entered_By"]."</td><td contenteditable='true' onClick='showEdit(this);'>".$row["Other_Info"]."</td><td contenteditable='true' onClick='showEdit(this);'>".$row["Insurance"]."</td><td contenteditable='true' onClick='showEdit(this);'>".$row["Waitlist"]."</td><td style='display:';>".$row["id"]."</td><td id="delete">Delete</td></tr>";
        };
        echo "</tbody>";
    }

}
?>
