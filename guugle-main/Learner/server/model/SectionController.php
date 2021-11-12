<?php
    // require './common.php';
    include_once 'EnrollmentDAO.php';
    include_once 'SectionDAO.php';
    include_once 'QuizDAO.php';
    class SectionController {
        function getSection($employeeId, $classId) {
            $dao = new SectionDAO();
            $dao1 = new EnrollmentDAO();
            $quiz = new QuizDAO();

            $enroll = $dao1->getProgress($employeeId,$classId);
            $result1 = array();
            $section = $dao->getSection($classId);
            $result = array();
            $progress = 0;

            foreach ($section as $s) {
                $result1["section"][] = array(
                    "classId" => $s->getclassid(),
                    "sectionId" => $s->getsectionid(),
                    "name" => $s->getname(),
                    "description" => $s->getdescription()
                );
            }

            // This is for users who have completed all sections
            $gradedQuizAccess = false;
            foreach ($enroll as $e){
                $progress= $e->getprogress(); 
                if($progress < 0) {
                    $progress = count($result1['section']) -1;
                    $gradedQuizAccess = true; 
                };
                // $result1 = array(
                //     "progress" => $e->getprogress()
                // );
            }

             for ($i = 0; $i<($progress + 1); $i++){
                // for ($i = 0; $i<2; $i++){
                $result["section"][] = array(
                    "classId" => $result1["section"][$i]["classId"],
                    "sectionId" => $result1["section"][$i]["sectionId"],
                    "name" => $result1["section"][$i]["name"],
                    "description" => $result1["section"][$i]["description"]
                );
                
            }

            $response = array("allSections" =>$result, "gradedQuizAccess" => $gradedQuizAccess);

            return $response;
        }


        function getAllSection($classId){
            $dao = new SectionDAO();
            $section = $dao->getSection($classId);

            foreach ($section as $s) {
                $result1["section"][] = array(
                    "classId" => $s->getclassid(),
                    "sectionId" => $s->getsectionid(),
                    "name" => $s->getname(),
                    "description" => $s->getdescription()
                );
            }

            return $result1;
        }
    }

    // $section = new SectionController();
    // $result = $section->getSection(1,1);
    // var_dump($result);

?>