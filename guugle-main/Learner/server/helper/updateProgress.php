<?php
    session_start();
    require_once "./common.php";

    $attemptController = new AttemptController();


    $classid = $_SESSION['classId'];
    $employeeId = $_SESSION['employeeId'];
    $sectionId = $_SESSION['sectionId'];
    
    
    // For ungraded score = 0
    // To  check for score  if graded           
    // $score = $_SESSION['score'];
    $score = 0;

    // $employeeId = 1;
    // $classid = 1;
    // $sectionId = 1;

    $attemptController-> updateProgress($classid,$sectionId,$employeeId,$score);
    
    header("Location: ../../quiz.php" );
?>