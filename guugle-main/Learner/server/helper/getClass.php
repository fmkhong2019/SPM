<?php
    session_start();
    require_once "common.php";

    $dao = new ClassDAO();
    $courseid = $_SESSION['courseId'];
    $classArray=$dao->getAllClasses($courseid);
    $result = array("class" => array() );
    foreach ($classArray as $class) {
        $result["class"][] = array(
            "classid" => $class->getclassid(),
            "startdate" => $class->getstartdate(),
            "enddate"=> $class->getenddate(),
            "trainerid"=> $class->gettrainerid(),
            "classsize"=> $class->getclasssize()
        );
    }

    echo json_encode($result);
 
    ?>