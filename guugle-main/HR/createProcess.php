<?php
    include 'common.php';

    $id = $_GET['id'];
    $name = $_GET['name'];
    $designation = $_GET['designation'];
    $dept = $_GET['dept'];
    $username = $_GET['username'];
    $phone = $_GET['phone'];
    $date = $_GET['date'];
    $address = $_GET['address'];
    $category = $_GET['category'];
    $defaultpw = "123";

    $EmpDAO = new EmployeeDAO();
    $EmpDAO->addEmployee($id, $name, $designation, $dept, $username, $phone, $date, $address, $defaultpw);
    $roleDAO = new RoleDAO();
    $roleDAO->addRole($id, $category);
    $newURL = "home.php";
    header('Location: '.$newURL);
?>