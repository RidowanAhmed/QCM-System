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
$name= $_POST['bname'];
$username=$_POST['uname'];
$password=$_POST['psw'];
$bday=$_POST['bdate'];
$pcode=$_POST['bpcode'];
$poffice = $_POST['bpoffice'];
$district=$_POST['bdistrict'];
$village = $_POST['bvillage'];
$phone=$_POST['bpnumber'];
$fee=$_POST['bsfee'];
$esperience=$_POST['bexp'];

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

$sql3= "INSERT INTO `service_info`(service_fee,year_of_experience,location_id,available_time_id ) VALUES ('$fee','$esperience','$location_id',null)";

if ($conn->query($sql3) === TRUE) {
    $service_id = $conn->insert_id;
    //echo "New record created successfully. Last inserted ID is: " . $service_id;
} else {
    echo "Error: " . $sql3 . "<br>" . $conn->error;
}

$sql4= "INSERT INTO `butcher_info`(butcher_username,butcher_password,personal_id,service_id,hiring_customer_username)values('$username','$password','$personal_id','$service_id',null)";

if ($conn->query($sql4) === TRUE) {
    //echo "New record created successfully.";
} else {
    echo "Error: " . $sql4 . "<br>" . $conn->error;
}

$sql5= "INSERT INTO `post_office_info`(post_code,post_office_name)VALUES('$pcode','
$poffice')";
if ($conn->query($sql5) === TRUE) {
    //echo "New record created successfully.";
    
} else {
    echo "Error: " . $sql5 . "<br>" . $conn->error;
}
header("Location: index.html"); die;

?>