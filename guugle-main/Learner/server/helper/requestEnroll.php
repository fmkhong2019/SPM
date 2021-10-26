<?php
    include 'common.php';

    $courseId = $_GET['courseId'];
    $classId = $_GET['classId'];
    $employeeId = $_GET['employeeId'];

    $EmpDAO = new WaitlistDAO();
    $EmpDAO->addWaitlist($courseId, $classId, $employeeId);
    $newURL = "../../../main_page/View_Classes.php?id={$courseId}";
    header('Location: '.$newURL);
?>