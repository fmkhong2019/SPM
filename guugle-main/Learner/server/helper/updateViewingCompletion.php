<?php
    session_start();
    require_once "./common.php";
    $viewingController= new ViewingController();

    $materialId = $_GET['materialId'];
    $employeeId = $_SESSION['employeeId'];
    $sectionId = $_GET['sectionId'];
    $classId = $_GET['classId'];
    // $materialId = 2;
    // $engineerId = 4;

    $update = $viewingController->updateViewingCompletion($materialId, $employeeId);
    // $update = $viewingController->updateViewingCompletion(1,1);


    header("Location: ../../materials.php?sectionId=$sectionId&classId=$classId" );
?>