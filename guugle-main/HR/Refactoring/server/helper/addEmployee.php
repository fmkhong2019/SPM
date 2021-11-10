<?php
    include '../controller/EmployeeView.php';
    $employeeView = new EmployeeView();
    $result = $employeeView->addEmployee(10, "Mike", "Senior Engineer", "Engineering", "Mike123", 12345678, "2021-03-03", "Jurong East","123");
    echo json_encode($result); 
    echo '<br>';
?>