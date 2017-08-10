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
$name= $_POST['cname'];
$username=$_POST['uname'];
$password=$_POST['psw'];
$bday=$_POST['bdate'];
$pcode=$_POST['cpcode'];
$poffice = $_POST['cpname'];
$district=$_POST['cdistrict'];
$village = $_POST['cvillage'];
$phone=$_POST['cpnumber'];

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

$sql4= "INSERT INTO `customer_info`(customer_username,customer_password,personal_id,location_id ,hired_butcher_username,hired_doctor_username )values('$username','$password','$personal_id','$location_id',null,null)";

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