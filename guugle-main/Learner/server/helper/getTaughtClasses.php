<?php
    require_once "./common.php";
    session_start();
    $classController = new ClassController();
    $trainerid = $_SESSION['employeeid'];

    $dao = new CourseDAO();
    $result = array("status" => array() );

    $temp = $classController->getCourse($trainerid);
    $storearray = [];
    #echo json_encode($temp['class']);
    foreach ($temp['class'] as $courseid) {
        #echo json_encode($courseid['courseid']);
        if(in_array($courseid['courseid'], $storearray)){

        }
        else{
            $classArray=$dao->getCourse($courseid['courseid']);
        
            foreach ($classArray as $class) {
            $result["status"][] = array(
                "courseid" => $class->getcourseid(),
                "coursename" => $class->getcoursename(),
                "coursedesc" => $class->getcoursedesc()
            );
        }
            array_push($storearray, $courseid['courseid']);
    }
        
    }
    #$courseid = $temp['class']['courseid'];

    

    echo json_encode($result);
    
    ?>