<?php

class Viewing {
    public $employeeId;
    public $materialId;
    public $completed;
    public $latest;
    
    public function __construct($employeeId, $materialId, $completed, $latest) {
        $this->employeeId =$employeeId;
        $this->materialId = $materialId;
        $this->completed = $completed;
        $this->latest = $latest;
        }

    public function getEmployeeId() {
        return $this->employeeId;
    }

    public function getMaterialId() {
        return $this->materialId;
    }

    public function getCompleted() {
        return $this->completed;
    }

    public function getLatest() {
        return $this->latest;
    }

}

?>