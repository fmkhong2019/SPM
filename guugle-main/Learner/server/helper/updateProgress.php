<?php
    session_start();
    require_once "./common.php";

    $attemptController = new AttemptController();


    $classid = $_GET['classId'];
    $employeeId = $_SESSION['employeeId'];
    $sectionId = $_GET['sectionId'];
    
    
    // For ungraded score = 0
    // To  check for score  if graded           
    // $score = $_SESSION['score'];
    $score = 100;

    // $employeeId = 1;
    // $classid = 1;
    // $sectionId = 1;

    $result = $attemptController-> updateProgress($classid,$sectionId,$employeeId,$score);

    var_dump($result);
    
    header("Location: ../../sections.php?classId=" . strval($classid));
?>