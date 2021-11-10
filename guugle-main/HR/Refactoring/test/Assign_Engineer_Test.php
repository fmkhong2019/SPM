<?php // must include if tests are for non OOP code
use PHPUnit\Framework\TestCase;
$upOne = dirname(__DIR__, 1);
include($upOne."/server/controller/AssignEngineer.php");

class Assign_Engineer_Test extends Testcase {

    /*
     * Testing the addition function
     */
    public function test_AssignEngineer(){

        $assignEngineerController = new AssignEngineer();
        $status1 = $assignEngineerController->assignEngineerInto(5, 101, 1);
        $status2 = $assignEngineerController->assignEngineerInto(5, 102, 5);

        $this->assertEquals(true, $status1);
        $this->assertEquals(false, $status2);
    }

    
}
?>