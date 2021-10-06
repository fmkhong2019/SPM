<?php

class section {
    private $sectionid;
    private $classid;
    private $name;
    private $description;
    
    public function __construct($sectionid, $classid, $name, $description) {
        $this->sectionid = $sectionid;
        $this->classid = $classid;
        $this->name = $name;
        $this->description = $description;
        }

    public function getsectionid() {
        return $this->sectionid;
    }

    public function getclassid() {
        return $this->classid;
    }

    public function getname() {
        return $this->name;
    }

    public function getdescription() {
        return $this->description;
    }

}

?>