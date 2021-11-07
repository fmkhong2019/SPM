<?php
include "common.php";
$dao=new QuizDAO();
$data= $_POST['name'];
$sid= $_POST['sid'];
$cid=$_POST['cid'];
$engineer=1;
$sid=intval($sid);
$cid=intval($cid);

$score=0;
foreach ($data as $key => $value) {
   
    $ans=$dao->ComputeGrade($sid,$cid,$key);
  
    foreach($ans as $answer){
   
      
    if($answer->getcorrectAnswer()==$value){
        $score+=1;
    }
    else{
        $score+=0;
    }
   }
}
echo $score;
$status=$dao->addGrade($sid,$cid,$engineer,$score);


?>