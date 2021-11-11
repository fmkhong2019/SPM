<?php
    // require '../vendor/autoload.php';
   #Authored by Jeffvinder Singh (jeffvinders.2019)

    use PHPUnit\Framework\TestCase;

    class GetEnrollmentTest extends TestCase
    {
        public function test()
        {
            include('../server/model/EnrollmentController.php');
            $EnrollmentController = new EnrollmentController();
            $class = $EnrollmentController->getCompletion('1', '101');
            
            $test['status'][] = array(
                "completed"=> '1'
            );

            $this->assertEquals($test, $class);
        }
    }

?>