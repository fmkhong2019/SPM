<?php

use Aws\Result;

include 'EnrollmentDAO.php';
include 'ClassDAO.php';
include 'CourseDAO.php';
class EnrollmentController{

    function getEnrollment($employeeId) {
        $dao = new EnrollmentDAO();
        $dao1 = new ClassDAO();
        $dao2 = new CourseDAO();
        
            $class = $dao->getClass($employeeId);
            $coursetocname = array();
            $classtocourse = array();
            $employee = array();
            $ccname = array();
            $finalresult = array();
            
            foreach ($class as $c) {
                $classes = $dao1->getClasses($c->getclassid()); // get class info based on class id
                foreach($classes as $cs){
                    $courses = $dao2->getCourse($cs->getcourseid()); // in the class table, get courseid based on classid
                    $classtocourse  = array(
                        $cs->getclassid() => $cs->getcourseid()  // Match classid to courseid
                    );
                }
                foreach($courses as $course){
                    #$result["classes"][] = array(
                    $coursetocname =array(                    
                        $course->getcourseid() =>$course->getcoursename(),    // Match courseid to coursename
                        
                    );
                }
                foreach ($coursetocname as $courseid=>$coursename){
                    //echo"Key = ", $courseid, "Value = ", $coursename;
                    
                    foreach ($classtocourse as $classid=>$courseid1){ 
                        if ($courseid1 == $courseid){
                            $ccname = array ($classid => $coursename); //  outer loop courseid to coursename , inner loop : course 
                        }
                    }
                }
                foreach ($ccname as $classid1=>$coursename1){ // link classid to coursename
                    #echo"Key = ", $classid1, ", Value = ", $coursename1, "</br>";
                }
                
                //echo($c->getclassid());
                //echo(1);
                foreach ($ccname as $cid=>$cname){
                    //echo($cid);
                    //if ($c->getclassid() == $cid){
                        //echo(2);
                        $finalresult["classes"][] = array(
                        "classId" =>$c->getclassid(),
                        "courseName" => $cname,
                        "enrolledDate" => $c->getenrolleddate());
                    //}
                }
                
                
            }
            
        return $finalresult;
    }

    
}

// $enrollment = new EnrollmentController;
// $result = $enrollment->getEnrollment(1);
// var_dump($result);
?>