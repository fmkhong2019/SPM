<?php
    include 'common.php';

    $courseId = $_GET['courseId'];
    $classId = $_GET['classId'];
    $employeeId = $_GET['employeeId'];

    $EmpDAO = new WaitlistDAO();
    $EmpDAO->addWaitlist($courseId, $classId, $employeeId);
    $newURL = "../../../Trainer/View_Classes.php?id={$courseId}&prereqid=0";
    header('Location: '.$newURL);
?>