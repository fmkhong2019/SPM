<?php
    include '../controller/ClassView.php';
    $classView = new ClassView();
    $result = $classView->addClass(104,5, "2021-09-01", "2021-12-01",1, 100);
    echo json_encode($result); 
    echo '<br>';
?>