<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "qurbani";


// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

session_start();
$doctor_username = $_SESSION['doc_username'];
$own_username = $_SESSION['o_username'];

$sql = "UPDATE cow_info SET attented_doctor_username='$doctor_username' WHERE owner_username LIKE '$own_username'";
if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}
$sql1 = "UPDATE doctor_info SET hiring_owner_username='$own_username' WHERE doctor_username LIKE '$doctor_username'";
if ($conn->query($sql1) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
echo $doctor_username;

header("Location: owner_dashboard.html");



?>