<?php
    include '../controller/EmployeeView.php';
    $employeeView = new EmployeeView();
    $result = $employeeView->getEmployees();
    echo json_encode($result); 
    echo '<br>';
    //echo '<br>';
    //$result2 = $employeeView->getEmployee(1);
    //echo json_encode($result2); 
?>