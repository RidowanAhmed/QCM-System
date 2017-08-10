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
$bucUsername = $_SESSION['b_username'];

	$sql1 = "SELECT `name`,`customer_username`, `village_name`, `post_code`, `district_name`, `phone_number` FROM `customer_info` AS C,`butcher_info` AS B,`personal_info` AS P,`location_info` AS L WHERE B.hiring_customer_username LIKE C.customer_username AND C.personal_id = P.personal_id AND C.location_id = L.loaction_id  AND B.butcher_username LIKE '$bucUsername'";

	$result = $conn->query($sql1);

	if($result->num_rows > 0){
		echo "Customer Appointment: <br><br>";
		while($row = $result->fetch_assoc()){
			echo "Customer Name : ".$row['name']."<br>";
			echo "Customer username : ".$row['customer_username']."<br>";
			echo "Village : ".$row['village_name']."<br>";
			echo "Post-Code : ".$row['post_code']."<br>";
			echo "District : ".$row['district_name']."<br>";
			echo "Phone : ".$row['phone_number']."<br><br>";
		}
		echo "<hr><hr>";

	}

?>