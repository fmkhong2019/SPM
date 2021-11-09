<?php
    require_once "./common.php";
    $sectionId = $_GET['sectionId'];
    $classId = $_GET['classId'];

    // $sectionId = $_SESSION['sectionId'];
    // $classId = $_SESSION['classId'];

    $quizController = new QuizController();
    $response = $quizController->displayQuiz($sectionId,$classId);
    echo json_encode($response);
?>