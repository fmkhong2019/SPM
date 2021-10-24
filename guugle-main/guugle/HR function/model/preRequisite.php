<?php

class preRequisite{
    public $courseId;
    public $preRequisiteId;

    public function __construct($courseId, $preRequisiteId) {
        $this->courseId = $courseId;
        $this->preRequisiteId = $preRequisiteId;
    }

    public function getCourseID() {
        return $this->courseId;
    }

    public function getpreRequisiteId() {
        return $this->preRequisiteId;
    }
}

?>


