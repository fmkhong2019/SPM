<?php
    require_once "common.php";
 
   
    $dao = new CourseDAO();
    $courseArray=$dao->getAllCourses();
   
    $result = array("course" => array() );
    foreach ($courseArray as $course) {
        $name="";
        $num=intval($course->getcourseid());
       
        $risk=$dao->getPreReq($num);
        if($risk==0){
        
           
        
            $result["course"][] = array(
                "courseid" => $course->getcourseid(),
                "coursename" => $course->getcoursename(),
                'coursedesc'=>$course->getcoursedesc(),
                "prereq" => 'No Pre Requisite'
       
              
            );
        }
        else{
            foreach($risk as $risks){
                $name=$risks->getcoursename();
                
            
           
        
            $result["course"][] = array(
                "courseid" => $course->getcourseid(),
                "coursename" => $course->getcoursename(),
                'coursedesc'=>$course->getcoursedesc(),
                "prereq" => $name
            
              
            );
        }

        }
      
       
    }

    echo json_encode($result);
 



    ?>