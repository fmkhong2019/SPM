<?php
    session_start();
    require_once "common.php";
    $dao = new EnrollmentDAO();
    $dao1 = new ClassDAO();
    $dao2 = new CourseDAO();
        $class = $dao->getClass(2);
        $coursetocname = array();
        $classtocourse = array();
        $employee = array();
        $ccname = array();
        $finalresult = array();
        // foreach ($class as $c) {
        //     $classes = $dao1->getClasses($c->getclassid());
        //     foreach($classes as $cs){
        //         $courses = $dao2->getCourse($cs->getcourseid());
        //     }
        //     foreach($courses as $course){
        //         #$result["classes"][] = array(
        //         $result []=array(                    
        //             "courseName" =>$course->getcoursename(),    
        //             "courseId" => $course->getcourseid()
        //         );
        //     }
        
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
               
            
            
          // $result["classes"][] = array(
            //          "classId" => $c->getclassid(),
            //          "engineerId" => $c->getengineerid(),
            //          "startDate" => $cs->getstartdate()
            //          //"courseName"=> $courses-  >getcoursename()
                    
        // );
        

            
            

       // echo json_encode($result1);
        #MANAGED TO PULL OUT COURSES NAME THAT THE EMPLOYEE IS IN, BUT THEN COLUMNS SHOW DIFFERENT
        // foreach ($class as $c) {
        //     $result["classes"][] = array(
        //         "classId" => $c->getclassid(),
        //         "engineerId" => $c->getengineerid()

        //     );
        // }


        //  $classes = $dao1->getClasses();
        //      foreach ($classes as $cs){
        //          {
        //          $result["classesDetails"][] = array(
        //              "courseId" =>$cs->getcourseid(),
        //              "startDate" => $cs->getstartdate(),
        //              "classId" => $cs-> getclassid()
        //          );
                
        //      }
        //  }
        //  $courses = $dao2->getCourse();
        //      foreach ($courses as $course){
                 
        //              $result["courses"][]= array(
        //                  "courseName"=> $course->getcoursename(),
        //                  "courseId" => $course->getcourseid()
        //              );
                 
        //      }
        
        

    #$_SESSION["cid"
    // $class = $dao->getClass(1);
    // $result = array("enrollment" => array());

    
    // $result["enrollment"] = array(
    //     "engineerId" => $enrollment->getengineerid(),
    //     "classId" => $enrollment->getclassid(),
    //     "completed" => $enrollment-> getcompleted(),
    //     "completionDate" => $enrollment->getcompletiondate(),
    //     "enrolledDate" => $enrollment->getenrolleddate(),
    //     "progress" => $enrollment->getprogress(),
    // );

    echo json_encode($finalresult);
?>