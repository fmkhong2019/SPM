<?php
    session_start();
    require_once "./common.php";

    // require_once "../model/EnrollmentController.php";
    $enrollmentController = new EnrollmentController();
    $employeeId = $_SESSION['employeeId'];
    // $employeeId = 1;

    $finalresult = $enrollmentController->getEnrollment($employeeId);
    echo json_encode($finalresult);
?>