<?php

class Role{
    public $employeeId;
    public $role;

    
    public function __construct($employeeId,$role) {
        $this->employeeId = $employeeId;
        $this->role = $role;
    }

    public function getEmployeeId() {
        return $this->employeeId;
    }

    public function getRole() {
        return $this->role;
    }
}

?>