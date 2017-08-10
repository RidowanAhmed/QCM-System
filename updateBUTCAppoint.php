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
$butcher_username = $_SESSION['buc_username'];
$customer_username = $_SESSION['c_username'];

$sql = "UPDATE customer_info SET hired_butcher_username ='$butcher_username' WHERE  	customer_username LIKE '$customer_username'";
if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}
$sql1 = "UPDATE butcher_info SET hiring_customer_username='$customer_username' WHERE butcher_username LIKE '$butcher_username'";
if ($conn->query($sql1) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
echo $butcher_username;

header("Location: customer_dashboard.html");



?>