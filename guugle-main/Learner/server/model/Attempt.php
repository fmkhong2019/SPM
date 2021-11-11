<?php

class Attempt{
    public $attemptNo;
    public $classId;
    public $sectionId;
    public $employeeId;
    public $score;
   
    
    public function __construct($attemptNo,$classId,$sectionId,$employeeId,$score) {
        $this->attemptNo = $attemptNo;
        $this->classId = $classId;
        $this->sectionId = $sectionId;
        $this->employeeId = $employeeId;
        $this->score=$score;   
     
    }

    public function getAttemptNoattemptNo() {
        return $this->attemptNo;
    }

    public function getclassId() {
        return $this->classId;
    }

    public function getSectionId() {
        return $this->sectionId;
    }

    public function getEmployeeId() {
        return $this->employeeId;
    }
    public function getScore(){
        return $this->score;
    }   
     
    }



?>