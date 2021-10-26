<?php

class Waitlist{
    public $courseid;
    public $classid;
    public $employeeid;

    
    public function __construct($courseid,$classid,$employeeid) {
        $this->courseid = $courseid;
        $this->classid = $classid;
        $this->employeeid = $employeeid;
    }

    public function getcourseid() {
        return $this->courseid;
    }

    public function getclassid() {
        return $this->classid;
    }

    public function getemployeeid() {
        return $this->employeeid;
    }
}

?>