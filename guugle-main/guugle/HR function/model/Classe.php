<?php

class Classe {
    public $classid;
    public $startDate;
    public $endDate;
    public $trainerId;
    public $classSize;
    public $courseName;

    public function __construct($classid, $startDate, $endDate, $trainerId, $classSize, $courseName) {
        $this->classid = $classid;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->trainerId = $trainerId;
        $this->classSize = $classSize;
        $this->courseName = $courseName;
    }

    public function getID() {
        return $this->classid;
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