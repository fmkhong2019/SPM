<?php

class Classes{
    public $courseid;
    public $classid;
    public $startdate;
    public $enddate;
    public $trainerid;
    
    public function __construct($courseid,$classid,$startdate,$enddate,$trainerid) {
        $this->courseid = $courseid;
        $this->classid = $classid;
        $this->startdate = $startdate;
        $this->enddate = $enddate;
        $this->trainerid=$trainerid;    
    }

    public function getcourseid() {
        return $this->courseid;
    }

    public function getclassid() {
        return $this->classid;
    }

    public function getstartdate() {
        return $this->startdate;
    }

    public function getenddate() {
        return $this->enddate;
    }
    public function gettrainerid(){
        return $this->trainerid;
    }    
    }



?>