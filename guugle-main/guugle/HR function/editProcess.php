<?php
    include 'common.php';

    $id = $_GET['id'];
    $name = $_GET['name'];
    $phone = $_GET['phone'];
    $date = $_GET['date'];
    $address = $_GET['address'];

    $EmpDAO = new EmployeeDAO();
    $EmpDAO->updateEmployee($id, $name, $phone, $date, $address);
    $newURL = "home.php";
    header('Location: '.$newURL);
?>