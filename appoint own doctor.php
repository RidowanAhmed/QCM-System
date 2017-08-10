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

$sql = "SELECT distinct P.name, SI.service_fee, L.phone_number, L.district_name, L.village_name , L.post_code   FROM `location_info` AS L,`doctor_info` AS D,`personal_info` AS P,`doctor_degree` AS DD, `service_info`AS SI WHERE D.personal_id = P.personal_id AND D.service_id = SI.service_id AND P. 	location_id = L.loaction_id";

$result1 = mysqli_query($conn,$sql);


?>

<!DOCTYPE html>
<html>
<head>
	<title>PHP SELECT OPTIONS FROM DATABASE</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<script>
function showUser(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","getOWNDoctoruser.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>?>
</head>
<body>

	
	<select name="users" onchange="showUser(this.value)">
		<option value="">Select a person:</option>;
		<?php while ($row = mysqli_fetch_array($result1)):;?> 
		<option value="<?php echo $row[0];?>"><?php echo $row[0];?></option>
		<?php endwhile;?>
		
	</select>
	<div id="txtHint"><b>Person info will be listed here...</b></div>

</body>
</html>