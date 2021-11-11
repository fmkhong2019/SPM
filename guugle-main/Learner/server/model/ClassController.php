<?php
    include 'ClassDAO.php';
    class ClassController{
        function getClass($courseid) {
            $dao = new ClassDAO();
            #$courseid = $_SESSION['courseId'];
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

            return $result;
        }
    }
?>