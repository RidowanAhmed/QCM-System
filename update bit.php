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
$customer=$_SESSION['c_username'];
$auction = $_POST['auction_id'];
$price = $_POST['upBit'];
$sql = "UPDATE auction_info SET customer_price ='$price',  	customer_username = '$customer' WHERE auction_id = '$auction'";

if ($conn->query($sql) === FALSE) {
    echo "Record not updated";
}
else{
	header("Location: customer_dashboard.html"); die;
}

?>