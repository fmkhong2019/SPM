<?php
// DONE BY : KHONG FARN MUN BENJAMIN
require "./vendor/autoload.php";
use PHPUnit\Framework\TestCase;
 
class SectionTest extends TestCase
{
    

    // assertGreaterThan : To ensure that a user's progress is not more than the number of sections a class has
    // assertEquals : Ensure that the sections shown to user is correct E.g. if user's progress is 0, it should only return 1 sections.
    public function testgetSection()
    {

        require_once "./guugle-main/Learner/server/model/EnrollmentController.php";
        require_once "./guugle-main/Learner/server/model/SectionController.php";
        $classId = 2;
        $employeeId = 1;
        $enrollmentController = new EnrollmentController();
        $sectionController = new SectionController();

        $progress = $sectionController->getSection($employeeId,$classId);
        $noOfSection = count($progress["allSections"]['section']); //this returns the number of sections in a class
        $enrollment = $enrollmentController->getEnrollment($employeeId); // get enrollment records for employeeID = 1
        
        for ($i =0; $i < sizeof ($enrollment["classes"]); $i++){
            if($enrollment["classes"][$i]["classId"] == $classId){
                $user_progress = $enrollment["classes"][$i]["progress"];

            }
        };
 
        $this->assertGreaterThan($user_progress,$noOfSection); // Ensure that user progress would never exceed the number of sections in the class he is enrolled in 
        $this->assertEquals($noOfSection, $user_progress+1); // Ensure that user can only see the next section based on his progress
    }
    # this function test that when the user's progress = -1, he is able to see all sections for the class as he has already view all materials
    public function testgetAllSection(){

        require_once "./guugle-main/Learner/server/model/EnrollmentController.php";
        require_once "./guugle-main/Learner/server/model/SectionController.php";
        $classId2 = 4;
        $employeeId2 = 1;  
        
        $enrollmentController = new EnrollmentController();
        $sectionController = new SectionController();

        $progress = $sectionController->getSection($employeeId2,$classId2);
        $noOfSection = count($progress["allSections"]['section']); //this returns the number of sections in a class
        var_dump($noOfSection);
        $enrollment = $enrollmentController->getEnrollment($employeeId2); // get enrollment records for employeeID = 1
        
        for ($i =0; $i < sizeof ($enrollment["classes"]); $i++){
            if($enrollment["classes"][$i]["classId"] == $classId2){
                $user_progress = $enrollment["classes"][$i]["progress"];

            }
        };
        if ($user_progress == "-1"){
            $expectedSections = $noOfSection; // $expectedSections -> should be the same as total no. of sections
        }
        $this->assertEquals($expectedSections,$noOfSection);

        
    }
   
}
?>