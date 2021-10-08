<?php

class Viewing {
    public $engineerId;
    public $materialId;
    public $completed;
    public $latest;
    
    public function __construct($engineerId, $materialId, $completed, $latest) {
        $this->engineerId =$engineerId;
        $this->materialId = $materialId;
        $this->completed = $completed;
        $this->latest = $latest;
        }

    public function getEngineerId() {
        return $this->engineerId;
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