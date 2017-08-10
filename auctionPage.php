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
	echo "Connected successfully";

$auction = $_POST['auction_id'];


	$sql = "SELECT `auction_id`, `customer_username`, `owner_username`, `owner_price`, `customer_price`, `sold_price`, `auction_status` FROM `auction_info` WHERE auction_id = '$auction'";

	$result = $conn->query($sql);

	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			echo "Auction Id : ".$row['auction_id']."<br>";
			echo "Owner username : ".$row['owner_username']."<br>";
			echo "Expected Price : ".$row['owner_price']."<br>";
			echo "Last Bitted username : ".$row['customer_username']."<br>";
			echo "Last Bitted price : ".$row['customer_price']."<br>";
			$bit = $row['customer_price'];
		}

	}
			$bit = $bit + 1;
			echo "<form action = 'update bit.php' method = 'post'>";
			echo "<input type='number' name='upBit' min='$bit'>";
			echo "<input type='hidden' name='auction_id' value='$auction'>";
			echo "<input type='submit' value='Update Bit'>";
			echo "</form>";

?>