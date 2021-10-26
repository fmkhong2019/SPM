<?php

class Classes {
    public $classId;
    public $courseId;
    public $startDate;
    public $endDate;
    public $trainerId;
    public $classSize;

    public function __construct($classId, $courseId, $startDate, $endDate, $trainerId, $classSize) {
        $this->classId = $classId;
        $this->courseId = $courseId;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->trainerId = $trainerId;
        $this->classSize = $classSize;
    }

    public function getCourseId() {
        return $this->courseId;
    }

    public function getClassId() {
        return $this->classId;
    }

    public function getStartDate() {
        return $this->startDate;
    }

    public function getEndDate() {
        return $this->endDate;
    }

    public function getTrainerId() {
        return $this->trainerId;
    }

    public function getClassSize() {
        return $this->classSize;
    }

    public function courseName() {
        return $this->courseName;
    }

    public function setStartDate($name){   
        $this->startDate = $startDate;
    }

    public function setEndDate($name){   
        $this->endDate = $endDate;
    }
}

?>