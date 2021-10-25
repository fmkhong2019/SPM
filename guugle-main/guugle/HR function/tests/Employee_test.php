<?php
use PHPUnit\Framework\TestCase;
include('./model/Employee.php'); // must include if tests are for non OOP code

class Employee_Test extends Testcase {

    /*
     * Testing the addition function
     */

    public function testEmpName(){
        
        $emp1 = new Employee(1, "Mike", "12345678", "2021-10-22", "Punggol");
		$emp1_name = $emp1->getName();
        $this->assertEquals("Mike", $emp1_name);
    }

    public function testEmpId(){
        
        $emp2 = new Employee(2, "Ian", "12345678", "2021-10-22", "Punggol");
		$emp2_id = $emp2->getId();
        $this->assertEquals(2, $emp2_id);
    }

    public function testSetId(){
      
        $emp3 = new Employee(2, "Ian", "12345678", "2021-10-22", "Punggol");
		$emp3->setId(5);
        $emp3_id = $emp3->getId();
        $this->assertEquals(5, $emp3_id);
    }

    public function testSetName(){
        $emp4 = new Employee(2, "Ian", "12345678", "2021-10-22", "Punggol");
        $emp4->setName("Fang");
		$emp4_name = $emp4->getName();
        $this->assertNotEquals("Ian", $emp4_name);
        $this->assertEquals("Fang", $emp4_name);
    }
}
?>