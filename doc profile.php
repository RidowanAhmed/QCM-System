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
$username = $_SESSION['d_username'];


	$sql = "SELECT `doctor_username`, `doctor_password`, `name`, `birth_day`, `service_fee`, `year_of_experience`,`village_name`, `post_code`, `district_name`, `phone_number`, `hiring_customer_username`, `hiring_owner_username` FROM `doctor_info` AS D,`personal_info` AS P, `location_info`AS L, `service_info` AS S WHERE D.personal_id = P.personal_id AND P.location_id = L.loaction_id AND D.service_id = S.service_id  ";

	$result = $conn->query($sql);

	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			echo "<center>";
			echo "<b>User-name : </b>".$row['doctor_username']."<br>";
			echo "<b>Password : </b>".$row['doctor_password']."<br>";
			echo "<b>Name : </b>".$row['name']."<br>";
			echo "<b>Birthday : </b>".$row['birth_day']."<br>";
			echo "<b>Service Fee : </b>".$row['service_fee']."<br>";
			echo "<b>Experience : </b>".$row['year_of_experience']." year<br>";
			echo "<b>Village : </b>".$row['village_name']."<br>";
			echo "<b>Post-code : </b>".$row['post_code']."<br>";
			echo "<b>District : </b>".$row['district_name']."<br>";
			echo "<b>Phone : </b>".$row['phone_number']."<br>";
			echo "<b>Hiring Customer username : </b>".$row['hiring_customer_username']."<br>";
			echo "<b>Hiring Owner username : </b>".$row['hiring_owner_username']."<br>";
			echo "</center>";
		}

	}

?>