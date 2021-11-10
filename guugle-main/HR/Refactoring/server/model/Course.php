<?php

class Course{
    public $courseId;
    public $name;
    public $courseDesc;
    public $selfEnrollPeriod;

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

    public function getDescription() {
        return $this->courseDesc;
    }

    public function getSelfEnrollPeriod(){
        if($this->selfEnrollPeriod==null){
            return "Have Not Been Set";
        }else{
            return $this->selfEnrollPeriod;
        }
        
    }

    public function setSelfEnrollPeriod($date){
        if(empty($date))
        throw new InvalidArgumentException('Date can not be empty');

    $this->selfEnrollPeriod = $date;
        
    }
}



?>


<?php
//$hi = new PreRequisite("M01", "Math", ["a1","a2","a3"]);
//foreach($hi->getPreReqs() as $c){
    //echo $c;
//}
    
?>
