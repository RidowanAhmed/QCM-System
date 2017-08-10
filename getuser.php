<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
$q = strval($_GET['q']);

$con = mysqli_connect('localhost','root','','qurbani');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"appoint_doctor");
$sql="SELECT distinct name, D.doctor_username AS DOCUSER, service_fee, phone_number, district_name, village_name , post_code   FROM `location_info` AS L,`doctor_info` AS D,`personal_info` AS P,`doctor_degree` AS DD, `service_info`AS SI WHERE D.personal_id = P.personal_id AND D.service_id = SI.service_id AND P.  location_id = L.loaction_id AND P.name LIKE '".$q."'";
//$result = mysqli_query($con,$sql);
$result = $con->query($sql);

echo "<table>
<tr>
<th>Firstname</th>
<th>Lastname</th>
<th>Age</th>
<th>Hometown</th>
<th>Job</th>
</tr>";

//while($row = mysqli_fetch_row($result)) {
while($row = $result->fetch_assoc()){
    session_start();
    $_SESSION['doc_username'] = $row['DOCUSER'];
    echo "<tr>";
    echo "<td>" . $row["name"] . "</td>";
    echo "<td>" . $row['service_fee'] . "</td>";
    echo "<td>" . $row['phone_number'] . "</td>";
    echo "<td>" . $row['district_name'] . "</td>";
    echo "<td>" . $row['village_name'] . "</td>";
    echo "</tr>";
    echo "name :".$_SESSION['doc_username'];
}
echo "</table>";
mysqli_close($con);
?>

<form action="updateAppoint.php" method="POST">
    <input type="submit" value="APPOINT">
</form>

</body>
</html>