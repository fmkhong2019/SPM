<?php
    session_start();
    require_once "common.php";
    $dao2 = new EnrollmentController();

    $employeeId = $_SESSION['employeeId'];
    $classId = $_GET['classId'];
    $pass = $_GET['pass'];

    if($pass) {
        $dao2->updateCompletion($employeeId, $classId);
    }

    header("Location: ../../enrolled.php" );
?>