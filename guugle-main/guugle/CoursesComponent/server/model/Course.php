<?php

class Course {
    public $courseid;
    public $coursename;

    
    public function __construct($courseid, $coursename) {
        $this->courseid = $courseid;
        $this->coursename = $coursename;
        }

    public function getcourseid() {
        return $this->courseid;
    }

    public function getcoursename() {
        return $this->coursename;
    }

}

?>