<?php
    // session_start();
    require_once "./common.php";
    $viewingController= new ViewingController();

    $materialId = $_GET['materialId'];
    $employeeId = $_GET['employeeId'];
    // $materialId = 2;
    // $engineerId = 4;

    $update = $viewingController->updateViewingCompletion($materialId, $employeeId);


    header("Location: ../../materials.php" );
?>