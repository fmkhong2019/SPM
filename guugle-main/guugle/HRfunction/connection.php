<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lms";


$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else{
    //echo("connected successfuly");
}

//test connection
/*
$sql = "SELECT employeeId, name, phoneNumber, dateJoined, address FROM employee";
$result = $conn->query($sql);

if($result->num_rows>0){
    while($row=$result->fetch_assoc()){
        echo "<br>Id: ".$row["employeeId"]."-Name: ".$row["name"]."-phone: ".$row["phoneNumber"]."-dateJoined: ".$row["dateJoined"]."-address: ".$row["address"];
    }
}else{
    echo "0 result";
}

$conn->close();
*/
?>

