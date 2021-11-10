<?php
    include '../controller/EmployeeView.php';
    $employeeView = new EmployeeView();
    $result = $employeeView->updateEmployee(10, "Mike", "Junior Engineer", "Engineering", "Mike123", 12345678, "2021-03-03", "Jurong East");
    echo json_encode($result); 
    echo '<br>';
?>