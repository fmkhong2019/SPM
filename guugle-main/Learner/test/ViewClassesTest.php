<?php
    // require '../vendor/autoload.php';
   #Authored by Jeffvinder Singh (jeffvinders.2019)

    use PHPUnit\Framework\TestCase;

    class ViewClassesTest extends TestCase
    {
        public function test()
        {
            include('../server/model/ClassController.php');
            $classController = new ClassController();
            $class = $classController->getClass('101');
            
            $test['class'][] = array(
                "classid" => '1',
                "startdate" => '2021-10-06 12:00:00',
                "enddate"=> '2021-10-13 15:00:00',
                "trainerid"=> '2',
                "classsize"=> '5'
            );

            $this->assertEquals($test, $class);
        }
    }

?>