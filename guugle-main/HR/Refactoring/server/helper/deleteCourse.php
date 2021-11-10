<?php
    include '../controller/CourseView.php';
    $courseView = new CourseView();
    $result = $courseView->deleteCourse(3);
    echo json_encode($result); 
    echo '<br>';
?>