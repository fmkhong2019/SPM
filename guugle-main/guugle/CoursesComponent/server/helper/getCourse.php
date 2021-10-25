<?php
    require_once "common.php";

    $dao = new CourseDAO();
    $courseArray=$dao->getAllCourses();
    $result = array("course" => array() );
    foreach ($courseArray as $course) {
        $result["course"][] = array(
            "courseid" => $course->getcourseid(),
            "coursename" => $course->getcoursename(),
            'coursedesc'=>$course->getcoursedesc()
   
          
        );
    }

    echo json_encode($result);
 



    ?>