<?php

class Quiz{
    public $questionId ;
    public $sectionId ;
    public $classId ;
    public $question  ;
    public $type  ;
    public $Answer1  ;
    public $Answer2  ;
    public $Answer3  ;
    public $Answer4  ;
    public $correctAnswer   ;
    public $duration   ;

    public function __construct($questionId, $sectionId,$classId,$question,$type,$Answer1,$Answer2,$Answer3,$Answer4,$correctAnswer,$duration) {
        $this->questionId = $questionId;
        $this->sectionId = $sectionId;
        $this->classId = $classId;
        $this->question = $question;
        $this->type = $type;
        $this->Answer1=$Answer1;  
        $this->Answer2=$Answer2;  
        $this->Answer3=$Answer3;  
        $this->Answer4=$Answer4;  
        $this->correctAnswer=$correctAnswer;  
        $this->duration=$duration;  


    }
    public function getquestionId() {
        return $this->questionId;
    }
    public function getsectionId() {
        return $this->sectionId;
    }
    public function getclassId() {
        return $this->classId;
    }
    public function getquestion() {
        return $this->question;
    }
    public function getQuestionType() {
        return $this->type;
    }
    public function getAnswer1() {
        return $this->Answer1;
    }
    public function getAnswer2() {
        return $this->Answer2;
    }
    public function getAnswer3() {
        return $this->Answer3;
    }
    public function getAnswer4() {
        return $this->Answer4;
    }
    public function getcorrectAnswer() {
        return $this->correctAnswer;
    }
    public function getduration() {
        return $this->duration;
    }
}

?>