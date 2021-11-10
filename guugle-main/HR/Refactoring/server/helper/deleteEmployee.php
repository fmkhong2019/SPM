<?php
    include '../controller/EmployeeView.php';
    $employeeView = new EmployeeView();
    $result = $employeeView->deleteEmployee(10);
    echo json_encode($result); 
    echo '<br>';
?>