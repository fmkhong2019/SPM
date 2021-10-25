<?php

class Course {
    public $courseid;
    public $coursename;

    
    public function __construct($courseid, $coursename,$coursedesc) {
        $this->courseid = $courseid;
        $this->coursename = $coursename;
        $this->coursedesc = $coursedesc;
        
        }

    public function getcourseid() {
        return $this->courseid;
    }

    public function getcoursename() {
        return $this->coursename;
    }
    public function getcoursedesc() {
        return $this->coursedesc;
    }

}

?>