<?php
    include '../controller/ClassView.php';
    $classView = new ClassView();
    $result = $classView->updateClass(104, 5, "2021-09-01", "2021-12-01", 1, 50);
    echo json_encode($result); 
    echo '<br>';
?>