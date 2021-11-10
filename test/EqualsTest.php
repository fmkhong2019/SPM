<?php
require "./vendor/autoload.php";
use PHPUnit\Framework\TestCase;
 
class EqualsTest extends TestCase
{
    // public function setUp()
    // {
    //     $this->dbTestData();
    // }

    // User has completed all sections, passing final quiz
    public function testFailure()
    {
        require_once "./guugle-main/Learner/server/model/AttemptController.php";
        require_once "./guugle-main/Learner/server/model/EnrollmentDAO.php";
        require_once "./guugle-main/Learner/server/model/Enrollment.php";

        //Initial Progress
        $enroll_dao = new EnrollmentDAO();
        // $enrollment = new Enrollment();
        // $current_progress = $enroll_dao->getProgress(1,1).progress;
       
        
        //getprogress();

        //Update attempt, if required
        $AttemptController = new AttemptController();
        $AttemptController->updateProgress(1,1,1,100);

        


        //Check Progress
        //$new_progress = $enroll_dao->getProgress(1,1);
        $new_progress = $enroll_dao->getProgress(1,1);
        //var_dump($new_progress);

        $this->assertEquals(-1, $new_progress[0]->getprogress());
    }



    // public function tearDown()
    // {
    //     $this->dbClear();
    // }
}
?>