<?php

require_once "server/model/EmployeeDAO.php";
require_once "server/model/ConnectionManager.php";
require_once "server/model/Employee.php";
require_once "server/model/preRequisiteDAO.php";
require_once "server/model/preRequisite.php";
require_once "server/model/EnrollmentDAO.php";
require_once "server/model/Enrollment.php";
require_once "server/model/ClassDAO.php";
require_once "server/model/Classes.php";




class AssignEngineer {
    public function getPreRequisite($courseId) {
        $dao = new preRequisiteDAO();
        $preRequisite = $dao->getPreReqByCid($courseId);
        

        return $preRequisite;
    }

    public function meetPreRequisite($employeeId, $courseId) {
        $dao = new EnrollmentDAO();
        $preRequisite = $this->getPreRequisite($courseId);
        
        if($preRequisite==null){
            return true;
        }else{
            $enrol_obj = $dao->getEnrollment($employeeId, $preRequisite->getcourseId());
            if($enrol_obj==null){
                return false;
            }else if($enrol_obj->getcompleted()==1){
                return true;
            }
        }
    
    }

    public function isClassSizeEnough($courseId, $classId){
        //retrieve classSize of the given classId
        $classdao = new ClassDAO();
        $class = $classdao->getClassbyClassId($classId);
        if($class==null){
            return false;
        }else{
            $classSize = $class->getClassSize();

            //retrieve the current size of the class 
            $enroldao = new EnrollmentDAO();
            $currentSize = $enroldao->getNumberOfStudents($classId);
            if($currentSize < $classSize){
                return true;
            }else{
                return false;
            }
        }
        
    }

    public function assignEngineerInto($employeeId, $courseId, $classId){
        $dao = new EnrollmentDAO();
        if($this->meetPreRequisite($employeeId, $courseId)&&$this->isClassSizeEnough($courseId, $classId)){
            $dao->addEmployee($employeeId, $classId, $courseId, 0, date("Y-m-d",time()), null, 0);
            return true;
        }else{
            return false;
        }
    }
}

//$test = new EmployeeView();
//$test->getEmployees();
?>