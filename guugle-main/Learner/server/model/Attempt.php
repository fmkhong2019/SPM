<?php

class Attempt{
    public $attemptId;
    public $classId;
    public $sectionId;
    public $employeeId;
    public $score;
   
    
    public function __construct($attemptId,$classId,$sectionId,$engineerId,$score, $dateTime) {
        $this->attemptId = $attemptId;
        $this->classId = $classId;
        $this->sectionId = $sectionId;
        $this->employeeId = $employeeId;
        $this->score=$score;   
     
    }

    public function getAttemptId() {
        return $this->attemptId;
    }

    public function getclassId() {
        return $this->classId;
    }

    public function getSectionId() {
        return $this->sectionId;
    }

    public function getEngineerId() {
        return $this->engineerId;
    }
    public function getScore(){
        return $this->score;
    }   
     
    }



?>