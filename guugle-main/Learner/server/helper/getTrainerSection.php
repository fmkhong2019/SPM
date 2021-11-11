<?php
    session_start();
    require_once "./common.php";
    $classId = $_GET['classId'];

    $sectionController = new SectionController();
    
    $response = $sectionController->getAllSection($classId);
    
    echo json_encode($response);
        
    

?>