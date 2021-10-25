<?php
    include 'connection.php';

    $id = $_GET['id'];
    $name = $_GET['name'];
    $phone = $_GET['phone'];
    $date = $_GET['date'];
    $category = $_GET['category'];
    $address = $_GET['address'];

    $status="";
    $sql = "INSERT INTO employee (employeeId, name, phoneNumber, dateJoined, address) VALUES ($id, '$name', $phone, '$date', '$address')";
    if ($conn->query($sql) === TRUE) {
      $status="New record created successfully";
    } else {
      $status= "Error: " . $sql . "<br>" . $conn->error;
    }
    echo $status;
?>