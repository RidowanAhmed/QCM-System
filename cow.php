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


//variable declaration
$color= $_POST['ccolor'];
$age=$_POST['cage'];
$height=$_POST['cheight'];
$weight=$_POST['cweight'];
$price=$_POST['cprice'];
$breed = $_POST['cbreed'];

//$data = file_get_contents($_FILES['pic']['tmp_name']);



session_start();
$owner_username = $_SESSION['o_username'];

$sql1= "INSERT INTO `auction_info`(`customer_username`, `owner_username`, `owner_price`, `customer_price`, `sold_price`, `auction_status`)VALUES(null,'$owner_username','$price',null,null,'Unsold')";
if ($conn->query($sql1) === TRUE) {
    $auction_id = $conn->insert_id;
    //echo "New record created successfully. Last inserted ID is: " . $personal_id;
} else {
    echo "Error: " . $sql1 . "<br>" . $conn->error;
}

$sql = "INSERT INTO `cow_info`(owner_username,attented_doctor_username,treatment_id,breed,  color,birth_place,weight,height,auction_id,image)VALUES('$owner_username',null,null,'$breed','$color','Bangladesh','$weight','$height','$auction_id',null)";
//$stmt = mysqli_prepare($conn,$sql);

//mysqli_stmt_bind_param($stmt, "s",$data);
//mysqli_stmt_execute($stmt);
if ($conn->query($sql) === TRUE) {
    //$location_id = $conn->insert_id;
    //echo "New record created successfully. Last inserted ID is: " . $location_id;
    echo"Added successfully.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
echo "<form action = 'add cow.html'>";
echo "<input type='submit' value='Add Cow'>";
echo "</form>";
echo "<form action = 'owner_dashboard.html'>";
echo "<input type='submit' value='Dashboard'>";
echo "</form>";

?>