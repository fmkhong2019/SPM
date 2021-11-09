<?php
    session_start();
    require_once "./common.php";
    $materialView = new MaterialView();
    $employeeId = $_SESSION['employeeId'];
    $classId = $_GET['classId'];
    $sectionId = $_GET['sectionId'];

    $result = $materialView->getMaterials($classId, $sectionId, $employeeId);
    echo json_encode($result); 
?>