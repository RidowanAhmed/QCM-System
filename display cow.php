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
else
	//echo "Connected successfully";

session_start();
$own_username = $_SESSION['o_username'];

	$sql = "SELECT cow_id,attented_doctor_username,breed,color,birth_place,weight,height,image FROM cow_info WHERE owner_username LIKE '$own_username'";
	//$sql = "SELECT customer_username,customer_password FROM customer_info";

	$result = $conn->query($sql);

	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			echo "Cow Id : ".$row["cow_id"]."<br>";
			echo "Doctor username : ".$row["attented_doctor_username"]."<br>";
			echo "Breed : ".$row["breed"]."<br>";
			echo "Color : ".$row["color"]."<br>";
			echo "Birth Place : ".$row["birth_place"]."<br>";
			echo "Weight : ".$row["weight"]." kg<br>";
			echo "Hight : ".$row["height"]." cm<br>";
			echo "Image : ".$row["image"]."<br><br><br>";
		}
	}
	else{
		echo "You Have no Cow.";
		echo $own_username;
	}




?>