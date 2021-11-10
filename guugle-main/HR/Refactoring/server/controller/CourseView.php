<?php

require_once "server/model/CourseDAO.php";
require_once "server/model/ConnectionManager.php";
require_once "server/model/Course.php";

class CourseView {
    public function getCourses() {
        $dao = new CourseDAO();
        $courses = $dao->getAll();
        $result = array("courses" => array() );
    
        foreach ($courses as $course) {
            $courseId = $course->getCourseID();
            

            $result["courses"][] = array(
                "courseId" => $courseId,
                "name" => $course->getCourseName(),
                "courseDesc" => $course->getDescription(),
                "selfEnrollPeriod" => $course->getSelfEnrollPeriod()
                
            );

        }

        return $result;
    }

    public function getCourse($courseId) {
        $dao = new CourseDAO();
        $course = $dao->getCourse($courseId);
    
        

        return $course;
    }

    public function deleteCourse($courseId){
        $dao = new CourseDAO();
        $status = $dao->delete($courseId);

        return $status;
    }

    public function updateCourse($id, $name, $desc, $selfEnrollPeriod) {
        $dao = new CourseDAO();
        $status = $dao->updateCourse($id, $name, $desc, $selfEnrollPeriod);
        return $status;
        
    }

    public function addCourse($id, $name, $desc, $selfEnrollPeriod){
        $dao = new CourseDAO();
        $status = $dao->add($id, $name, $desc, $selfEnrollPeriod);
        return $status;
    }
}

//$test = new EmployeeView();
//$test->getEmployees();
?>