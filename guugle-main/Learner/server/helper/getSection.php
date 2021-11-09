<?php
    session_start();
    require_once "./common.php";
    $classId = $_GET['classId'];
    $finalQuiz = false;
    $employeeId = $_SESSION['employeeId'];
    $gradedQuizAccess = false;

    $sectionController = new SectionController();
    
    $response = $sectionController->getSection($employeeId, $classId);
    
    echo json_encode($response);
        
    

?>