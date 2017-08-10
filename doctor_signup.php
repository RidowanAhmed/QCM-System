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
$name= $_POST['dname'];
$username=$_POST['uname'];
$password=$_POST['psw'];
$bday=$_POST['bdate'];
$pcode=$_POST['dpcode'];
$poffice = $_POST['dpoffice'];
$district=$_POST['ddistrict'];
$village = $_POST['dvillage'];
$phone=$_POST['dpnumber'];
$fee=$_POST['dserfee'];
$esperience=$_POST['dexp'];
$pyear=$_POST['dpyear'];
$institution=$_POST['dinstitute'];

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

$sql4= "INSERT INTO `doctor_info`(doctor_username,doctor_password,personal_id,service_id,hiring_customer_username,hiring_owner_username)values('$username','$password','$personal_id','$service_id',null,null)";

if ($conn->query($sql4) === TRUE) {
    //echo "New record created successfully.";
} else {
    echo "Error: " . $sql4 . "<br>" . $conn->error;
}

$sql5= "INSERT INTO `post_office_info`(post_code,post_office_name)VALUES('$pcode','$poffice')";
if ($conn->query($sql5) === TRUE) {
    //echo "New record created successfully.";
} else {
    echo "Error: " . $sql5 . "<br>" . $conn->error;
}

$sql6= "INSERT INTO `doctor_degree`(doctor_username,passing_year,institution_name)VALUES('$username','$pyear','$institution')";
if ($conn->query($sql6) === TRUE) {
    header("Location: index.html"); die;
} else {
    echo "Error: " . $sql6 . "<br>" . $conn->error;
}

header("Location: index.html"); die;
?>