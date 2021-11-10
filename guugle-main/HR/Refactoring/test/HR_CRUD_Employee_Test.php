<?php // must include if tests are for non OOP code
use PHPUnit\Framework\TestCase;
$upOne = dirname(__DIR__, 1);
include($upOne."/server/controller/EmployeeView.php");

class HR_CRUD_Employee_Test extends Testcase {

    /*
     * Testing the addition function
     */
    public function test_createEmployee(){
        $employeeView = new EmployeeView();
        $status = $employeeView->addEmployee(100, "testName", "testDesign", "testDept", "testUsername", 12345678, "2021-09-16", "testaddress", "test123");
        $testEmp = $employeeView->getEmployee(100);
        $this->assertEquals(true, $status);
        $this->assertEquals("testName", $testEmp->getName());
    }

    public function test_readEmployee(){
        $employeeView = new EmployeeView();
        $testEmp = $employeeView->getEmployee(1);
        $this->assertEquals("Mike Cheow", $testEmp->getName());
    }

    public function test_updateEmployee(){
        $employeeView = new EmployeeView();
        $status = $employeeView->updateEmployee(100, "testUpdatedName", "testDesign", "testDept", "testUsername", 12345678, "2021-09-16", "testaddress", "test123");
        $testEmp = $employeeView->getEmployee(100);
        $this->assertEquals(true, $status);
        $this->assertEquals("testUpdatedName", $testEmp->getName());
    }

    public function test_deleteEmployee(){
        $employeeView = new EmployeeView();
        $status = $employeeView->deleteEmployee(100);
        $testEmp = $employeeView->getEmployee(100);
        $this->assertEquals(true, $status);
        $this->assertEquals(null, $testEmp);
    }
}
?>