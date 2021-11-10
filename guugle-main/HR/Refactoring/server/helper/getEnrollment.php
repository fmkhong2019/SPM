<?php
    //include '../controller/AssignEngineer.php';
    require_once "../model/EnrollmentDAO.php";
    require_once "../model/Enrollment.php";
    require_once "../model/ConnectionManager.php";
    $assignEngineerCtr = new EnrollmentDAO();
    $result = $assignEngineerCtr->getEnrollment(1, 111);
    
    echo json_encode($result->getcompleted()); 
    echo '<br>';
    //echo '<br>';
    //$result2 = $employeeView->getEmployee(1);
    //echo json_encode($result2); 
?>