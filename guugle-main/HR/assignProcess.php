<?php
    include 'common.php';

        $employeeId = $_POST['employeeId']; 
        $name = $_POST['name']; 
        $courseId = $_POST['courseId']; 
        $courseName = $_POST['courseName']; 
        $category = $_POST['category']; 
        $classIdAssign = $_POST['classIdAssign']; 
        
        $enrolDAO = new EnrollmentDAO();
        $classDAO = new ClassDAO();
        $preReqDAO = new preRequisiteDAO();

        $int_classId = intval($classIdAssign);
        
        if(isset($category)){
            if($category=="trainer"){
                $classDAO->updateTrainer($classIdAssign, $employeeId);     
            }
        }
        
        if(isset($courseId)){
            $class_obj = ($classDAO->getClassbyClassId($int_classId));
            $preReq = $preReqDAO->getPreReqByCid($courseId);

            $enrol_objs = $enrolDAO->getClass($employeeId);
            $progress = 0;
            foreach($enrol_objs as $enrol_obj){
                if($enrol_obj->getclassid()==$classIdAssign){
                    $progress = $enrol_obj->getcompleted();
                }
            }
            if($preReqDAO->getPreReqByCid($courseId)==null){
                if($class_obj->getClassSize()>$enrolDAO->getNumberOfStudents($class_obj->getClassId())){
                    //add engineer into the class
                    $timestamp = date("Y/m/d");
                    $enrolDAO->addEmployee($employeeId, $int_classId, $courseId, '0', $timestamp, null, '0');
                    echo "Successfully added Engineer!";
                }else{
                    echo "Task Failure: Class is fullly occupied!";
                }
            }else if($preReqDAO->getPreReqByCid($courseId)!=null&&$progress==1){
                if($class_obj->getClassSize()>$enrolDAO->getNumberOfStudents($class_obj->getClassId())){
                    //add engineer into the class
                    $timestamp = date("Y/m/d");
                    $enrolDAO->addEmployee($employeeId, $int_classId, '0', $timestamp, null, '0');
                    echo "Successfully added Engineer!";
                }else{
                    echo "Task Failure: Class is fullly occupied!";
                }
            }else{
                echo "PreRequisites Are Not Met";
            }
                
        }
        
        $newURL = "home.php";
        //header('Location: '.$newURL);
    

    
    
        
?>