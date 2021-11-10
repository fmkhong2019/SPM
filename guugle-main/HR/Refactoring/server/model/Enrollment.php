<?php

class Enrollment {
    private $employeeId;
    private $classId;
    private $courseId;
    private $completedDate;
    private $completed;
    private $enrolledDate;
    private $progress;



    public function __construct($employeeId, $classId, $courseId, $completedDate, $completed, $enrolledDate,$progress) {
        $this->employeeId = $employeeId;
        $this->classId = $classId;
        $this->courseId = $courseId;
        $this->completedDate = $completedDate;
        $this->completed = $completed;
        $this->enrolledDate = $enrolledDate;
        $this-> progress = $progress;

    }

    public function getEmployeeId() {
        return $this->employeeId;
    }

    public function getclassId() {
        return $this->classId;
    }

    public function getcourseId() {
        return $this->courseId;
    }

    public function getcompleteddate() {
        return $this->completedDate;
    }

    public function getcompleted() {
        return $this->completed;
    }

    public function getenrolleddate() {
        return $this->enrolledDate;
    }

    public function getprogress() {
        return $this->progress;
    }


}

?>