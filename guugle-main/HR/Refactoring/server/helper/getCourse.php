<?php
    include '../controller/CourseView.php';
    $courseView = new CourseView();
    $result = $courseView->getCourses();
    echo json_encode($result); 
    echo '<br>';
    //echo '<br>';
    //$result2 = $employeeView->getEmployee(1);
    //echo json_encode($result2); 
?>