<?php
    include 'common.php';

    $id = $_GET['id'];
    $name = $_GET['name'];
    $phone = $_GET['phone'];
    $date = $_GET['date'];
    $address = $_GET['address'];
    $defaultpw = "123";

    $EmpDAO = new EmployeeDAO();
    $EmpDAO->addEmployee($id, $name, $phone, $date, $address, $defaultpw);
    $newURL = "home.php";
    header('Location: '.$newURL);
?>