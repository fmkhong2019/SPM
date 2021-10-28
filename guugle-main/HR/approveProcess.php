<?php
    include 'common.php';

    $enrolDAO = new EnrollmentDAO();

    $lists = $_POST['lists'];
    foreach($lists as $list){
        $arr = explode(" ",$list);
        $courseId = $arr[0];
        $classId = $arr[1];
        $empId = $arr[2];
        $timestamp = date("Y/m/d");
        if($enrolDAO->addEmployee($empId, $classId, '0', $timestamp, null, '0')){
            echo "Successfully approved";
        };
    }

    //$EmpDAO = new EmployeeDAO();
    //$EmpDAO->updateEmployee($id, $name, $phone, $date, $address);
    //$newURL = "home.php";
    //header('Location: '.$newURL);
?>