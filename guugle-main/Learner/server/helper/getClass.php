<?php
    require_once "./common.php";
    session_start();
    $classController = new ClassController();
    $courseId = $_SESSION['courseId'];

    $result = $classController->getClass($courseId);

    echo json_encode($result);
    
    ?>