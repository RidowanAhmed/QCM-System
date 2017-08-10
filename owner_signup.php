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
	echo "Connected successfully<br>";

//variable declaration
$name= $_POST['oname'];
$username=$_POST['uname'];
$password=$_POST['psw'];
$bday=$_POST['bdate'];
$pcode=$_POST['opcode'];
$poffice = $_POST['opoffice'];
$district=$_POST['odistrict'];
$village = $_POST['ovillage'];
$phone=$_POST['opnumber'];

$sql = "INSERT INTO `location_info`(village_name,post_code,district_name,phone_number)VALUES('$village','$pcode','$district','$phone')";
if ($conn->query($sql) === TRUE) {
    $location_id = $conn->insert_id;
    //echo "New record created successfully. Last inserted ID is: " . $location_id;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}



$sql2= "INSERT INTO `personal_info`(name,birth_day,location_id,image)VALUES('$name','$bday','$location_id',null)";
if ($conn->query($sql2) === TRUE) {
    $personal_id = $conn->insert_id;
    //echo "New record created successfully. Last inserted ID is: " . $personal_id;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$sql3= "INSERT INTO `post_office_info`(post_code,post_office_name)VALUES('$pcode','$poffice')";
if ($conn->query($sql3) === TRUE) {
    //echo "New record created successfully.";
} else {
    echo "Error: " . $sql3 . "<br>" . $conn->error;
}

$sql4 = "INSERT INTO `owner_info`( 	owner_username,owner_password,personal_id,location_id,hired_doctor_username,owner_ranking)VALUES('$username','$password','$personal_id','$location_id',null,null)";

if ($conn->query($sql4) === TRUE) {
    //echo "New record created successfully.";
    header("Location: index.html"); die;
} else {
    echo "Error: " . $sql4 . "<br>" . $conn->error;
}

header("Location: index.html"); die;
?>