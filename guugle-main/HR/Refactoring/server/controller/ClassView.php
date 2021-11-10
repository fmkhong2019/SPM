<?php

require_once "server/model/ClassDAO.php";
require_once "server/model/ConnectionManager.php";
require_once "server/model/Classes.php";

class ClassView {
    public function getClasses() {
        $dao = new ClassDAO();
        $classes = $dao->getAll();
        $result = array("classes" => array() );
    
        foreach ($classes as $class) {
            $classId = $class->getClassId();
            

            $result["classes"][] = array(
                "courseId" => $class->getCourseId(),
                "classId" => $classId,
                "startDate" => $class->getStartDate(),
                "endDate" => $class->getEndDate(),
                "trainerId" => $class->getTrainerId(),
                "classSize" => $class->getClassSize(),
                
            );

        }

        return $result;
    }

    public function getClass($classId) {
        $dao = new ClassDAO();
        $class = $dao->getClassbyClassId($classId);
    
        

        return $class;
    }

    public function deleteClass($classId){
        $dao = new ClassDAO();
        $status = $dao->delete($classId);

        return $status;
    }

    public function updateClass($courseId, $classId, $startDate, $endDate, $trainerId, $classSize) {
        $dao = new ClassDAO();
        $status = $dao->update($courseId, $classId, $startDate, $endDate, $trainerId, $classSize);
        return $status;
        
    }

    public function addClass($courseId, $classId, $startDate, $endDate, $trainerId, $classSize){
        $dao = new ClassDAO();
        $status = $dao->add($courseId, $classId, $startDate, $endDate, $trainerId, $classSize);
        return $status;
    }
}

//$test = new EmployeeView();
//$test->getEmployees();
?>