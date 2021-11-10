<?php
    include '../controller/ClassView.php';
    $courseView = new ClassView();
    $result = $courseView->getClasses();
    echo json_encode($result); 
    echo '<br>';
    //echo '<br>';
    //$result2 = $employeeView->getEmployee(1);
    //echo json_encode($result2); 
?>