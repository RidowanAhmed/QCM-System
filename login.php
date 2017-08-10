<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "qurbani";


$user_type= $_POST['type'];
$uusername = $_POST['uname'];
$upassword = $_POST['psw'];

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
else
	echo "Connected successfully";

if($user_type === 'customer'){
	$sql = "SELECT customer_username,customer_password FROM customer_info";

	$result = $conn->query($sql);

	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			if($row["customer_username"] ===$uusername and $row["customer_password"]=== $upassword){
				session_start();
				$_SESSION['c_username'] = $uusername;
				header("Location: customer_dashboard.html"); die;
			}
			else{
				echo  "INValid username/ password!";;
			}
		}
	}
}
elseif ($user_type === 'doctor') {
	$sql = "SELECT doctor_username,doctor_password FROM doctor_info";

	$result = $conn->query($sql);

	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			if($row["doctor_username"] ===$uusername and $row["doctor_password"]=== $upassword){
				session_start();
				$_SESSION['d_username'] = $uusername;
				header("Location: doctor_dashboard.html"); die;
			}
			else{
				echo  "INValid username/ password!";
			}
		}
	}
}
elseif ($user_type === 'butcher') {
	$sql = "SELECT butcher_username,butcher_password FROM butcher_info";

	$result = $conn->query($sql);

	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			if($row["butcher_username"] ===$uusername and $row["butcher_password"]=== $upassword){
				session_start();
				$_SESSION['b_username'] = $uusername;
				header("Location: butcher_dashboard.html"); die;
			}
			else{
				echo  "INValid username/ password!";
			}
		}
	}
}
else{
	$sql = "SELECT owner_username,owner_password FROM owner_info";

	$result = $conn->query($sql);

	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			if($row["owner_username"] ===$uusername and $row["owner_password"]=== $upassword){
				session_start();
				$_SESSION['o_username'] = $uusername;
				header("Location: owner_dashboard.html"); die;
			}
			else{
				echo "INValid username/ password!";
			}
		}
	}
}



?>