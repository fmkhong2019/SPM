<?php // must include if tests are for non OOP code
use PHPUnit\Framework\TestCase;
$upOne = dirname(__DIR__, 1);
include($upOne."/server/controller/CourseView.php");

class HR_CRUD_Course_Test extends Testcase {

    /*
     * Testing the addition function
     */
    public function test_createCourse(){
        $courseView = new CourseView();
        $status = $courseView->addCourse(104, "testCourse", "testDescription", "1999-09-09");
        $testCourse = $courseView->getCourse(104);
        $this->assertEquals(true, $status);
        $this->assertEquals("testCourse", $testCourse->getCourseName());
    }

    public function test_readCourse(){
        $courseView = new CourseView();
        $testCourse = $courseView->getCourse(104);
        $this->assertEquals("testCourse", $testCourse->getCourseName());
    }

    public function test_updateCourse(){
        $courseView = new CourseView();
        $status = $courseView->updateCourse(104, "testUpdatedCourseName", "updatedDesc", "2011-11-11");
        $testCourse = $courseView->getCourse(104);
        $this->assertEquals(true, $status);
        $this->assertEquals("testUpdatedCourseName", $testCourse->getCourseName());
    }

    public function test_deleteEmployee(){
        $courseView = new CourseView();
        $status = $courseView->deleteCourse(104);
        $testCourse = $courseView->getCourse(104);
        $this->assertEquals(true, $status);
        $this->assertEquals(null, $testCourse);
    }
}
?>