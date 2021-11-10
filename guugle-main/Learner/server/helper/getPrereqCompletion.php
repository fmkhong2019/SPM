<?php
    session_start();
    require_once "common.php";

    $dao = new EnrollmentDAO();
    $engineerid = $_SESSION['employeeid'];
    $courseid = $_SESSION['prereqid'];
    if($courseid != 0){
        $classArray=$dao->getCompletion($engineerid, $courseid);
        $result = array("status" => array() );
        foreach ($classArray as $class) {
            $result["status"][] = array(
                "completed" => $class->getcompleted()
            );
        }
    }

    echo json_encode($result);
    ?>