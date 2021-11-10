<?php
use PHPUnit\Framework\TestCase;
$upOne = dirname(__DIR__, 1);
include($upOne."/server/controller/ClassView.php");

class HR_CRUD_Class_Test extends Testcase {

    /*
     * Testing the addition function
     */
    public function test_createClass(){
        $classView = new ClassView();
        $status = $classView->addClass(103, 99, "2000-01-01", "2000-03-01", 3, 100);
        $testClass = $classView->getClass(99);
        $this->assertEquals(true, $status);
        $this->assertEquals(103, $testClass->getCourseId());
    }

    public function test_readCourse(){
        $classView = new ClassView();
        $testClass = $classView->getClass(99);
        $this->assertEquals(100, $testClass->getClassSize());
    }

    public function test_updateCourse(){
        $classView = new ClassView();
        $status = $classView->updateClass(103, 99, "2000-01-01", "2000-03-01", 3, 50);
        $testClass = $classView->getClass(99);
        $this->assertEquals(true, $status);
        $this->assertEquals(50, $testClass->getClassSize());
    }

    public function test_deleteEmployee(){
        $classView = new ClassView();
        $status = $classView->deleteClass(99);
        $testClass = $classView->getClass(99);
        $this->assertEquals(true, $status);
        $this->assertEquals(null, $testClass);
    }
}
?>