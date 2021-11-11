<?php
    include 'EnrollmentDAO.php';
    include 'AttemptDAO.php';
    include 'SectionDAO.php';

    class AttemptController{

        function updateProgress($classid,$sectionId,$employeeId,$score) {
            $dao = new EnrollmentDAO();
            $dao2 = new AttemptDAO();
            $dao3 = new SectionDAO();
    
            $attempt = $dao2->getAttempt($classid, $sectionId, $employeeId);
            // $sections = $dao3->getSection($classid);
        
            // echo(count($sections[0]));
            // var_dump($attempt);        
        
            if(!$attempt) {
                $add = $dao2->addAttempt($classid,$sectionId,$employeeId,$score);
                $progress = $dao->getProgress($employeeId, $classid);
                var_dump($progress);
                $numOfSections = $dao3->numberOfSections($classid);
                var_dump($numOfSections);
                if($progress >= ($numOfSections-1)) {
                    // So individuals whp have cleared the last chapter will be shown final quiz
                    $result=$dao->setProgress($employeeId, $classid, -1);
                }
                else {
                    $result=$dao->updateProgress($employeeId, $classid);
                }
                
            }
        }
    }


?>