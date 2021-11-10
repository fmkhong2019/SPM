<?php // must include if tests are for non OOP code
use PHPUnit\Framework\TestCase;
$upOne = dirname(__DIR__, 1);
include($upOne."/server/controller/AssignEngineer.php");

class Meet_PreRequisite_Test extends Testcase {

    /*
     * Testing the addition function
     */
    public function test_meetPreRequisite(){

        $assignEngineerController = new AssignEngineer();
        $status1 = $assignEngineerController->meetPreRequisite(2, 102);
        $status2 = $assignEngineerController->meetPreRequisite(2, 101);
        $this->assertEquals(false, $status1);
        $this->assertEquals(true, $status2);
    }

    
}
?>