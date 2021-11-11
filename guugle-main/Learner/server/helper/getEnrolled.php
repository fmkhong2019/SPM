<?php
    session_start();
    require_once "common.php";

    $enrollmentController = new EnrollmentController();
    $engineerid = $_SESSION['employeeid'];
    $courseid = $_SESSION['courseId'];

    $result = $enrollmentController->getCompletion($engineerid, $courseid);
    // $dao = new EnrollmentDAO();
    //     if($courseid != 0){
    //         $classArray=$dao->getCompletion($engineerid, $courseid);
    //         $result = array("status" => array() );
    //         foreach ($classArray as $class) {
    //             $result["status"][] = array(
    //                 "completed" => $class->getcompleted()
    //             );
    //         }
    //     }

    echo json_encode($result);
 
    ?>