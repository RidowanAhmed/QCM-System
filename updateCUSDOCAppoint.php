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
$cus_username = $_SESSION['c_username'];


$sql1 = "UPDATE doctor_info SET hiring_customer_username='$cus_username' WHERE doctor_username LIKE '$doctor_username'";
if ($conn->query($sql1) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$sql = "UPDATE customer_info SET hired_doctor_username='$doctor_username' WHERE customer_username LIKE '$cus_username'";
if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
echo $doctor_username;

header("Location: customer_dashboard.html");



?>