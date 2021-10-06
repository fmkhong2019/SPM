<?php

class enrollment {
    private $engineerId;
    private $classId;
    private $completedDate;
    private $completed;
    private $enrolledDate;
    private $progress;



    public function __construct($engineerId, $classId, $completedDate, $completed, $enrolledDate,$progress) {
        $this->engineerId = $engineerId;
        $this->classId = $classId;
        $this->completedDate = $completedDate;
        $this->completed = $completed;
        $this->enrolledDate = $enrolledDate;
        $this-> progress = $progress;

    }

    public function getengineerid() {
        return $this->engineerId;
    }

    public function getclassid() {
        return $this->classId;
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