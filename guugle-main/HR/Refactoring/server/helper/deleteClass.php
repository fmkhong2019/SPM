<?php
    include '../controller/ClassView.php';
    $classView = new ClassView();
    $result = $classView->deleteClass(5);
    echo json_encode($result); 
    echo '<br>';
?>