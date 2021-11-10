<?php
    include '../controller/CourseView.php';
    $courseView = new CourseView();
    $result = $courseView->updateCourse(3, "test2", "this is the test for updating course", "2021-11-11");
    echo json_encode($result); 
    echo '<br>';
?>