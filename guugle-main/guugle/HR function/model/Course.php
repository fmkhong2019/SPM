<?php

class Course{
    public $courseId;
    public $name;

    public function __construct($courseId, $name) {
        $this->courseId = $courseId;
        $this->name = $name;
    }

    public function getCourseID() {
        return $this->courseId;
    }

    public function getCourseName() {
        return $this->name;
    }
}


class PreRequisite extends Course{
    public function __construct($courseId, $name, array $pre_reqs=array()) {
        $this->courseId = $courseId;
        $this->name = $name;
        foreach($pre_reqs as $pre_req){
            $this->pre_reqs[] = $pre_req;
        }
    }
    public function getPreReqs(){
        return $this->pre_reqs;
    }
}

?>


<?php
//$hi = new PreRequisite("M01", "Math", ["a1","a2","a3"]);
//foreach($hi->getPreReqs() as $c){
    //echo $c;
//}
    
?>
