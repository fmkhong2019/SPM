<?php
    include '../controller/CourseView.php';
    $courseView = new CourseView();
    $result = $courseView->addCourse(3, "test", "this is courseView test", null);
    echo json_encode($result); 
    echo '<br>';
?>