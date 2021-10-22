<?php
    include 'common.php';

    $employeeId = $_GET['employeeId'];
    $name = $_GET['name'];
    $courseId = $_GET['courseId'];
    $courseName = $_GET['course'];
    $category = $_GET['category'];

    $classDAO = new ClassDAO();
    $EnrolDAO = new EnrollmentDAO();
    if(isset($courseId)){
        $classes = $classDAO->getAllClasses($courseId);
        //var_dump($classes);
        foreach($classes as $class){
            $timestamp = date("Y/m/d");
            $EnrolDAO->addEmployee($employeeId, $class->classId, '0', $timestamp, null, '0');
        }
        $newURL = "home.php";
        header('Location: '.$newURL);
    }
    //
    //$EnrolDAO->addEmployee($employeeId, $phone, $date, $address);
    //$newURL = "home.php";
    //header('Location: '.$newURL);
?>