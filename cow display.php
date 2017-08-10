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


	$sql = "SELECT `cow_id`, `owner_username`, `attented_doctor_username`, `treatment_id`, `breed`, `color`, `birth_place`, `weight`, `height`, `auction_id`, `image` FROM `cow_info`";

	$result = $conn->query($sql);

	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			echo "Cow Id : ".$row['cow_id']."<br>";
			echo "Owner username : ".$row['owner_username']."<br>";
			echo "Doctor username : ".$row['attented_doctor_username']."<br>";
			echo "Breed : ".$row['breed']."<br>";
			echo "Color : ".$row['color']."<br>";
			echo "Birth Place : ".$row['birth_place']."<br>";
			echo "Weight : ".$row['weight']."<br>";
			echo "Height : ".$row['height']."<br>";
			echo "auction id : ".$row['auction_id']."<br>";
			echo "Image : ".$row['image']."<br>";
			$auction = $row['auction_id'];
			echo "<form action = 'auctionPage.php' method = 'post'>";
			echo "<input type='hidden' name='auction_id' value='$auction'>";
			echo "<input type='submit' value='Go to Auction'>";
			echo "</form><hr>";
		}
	}

?>