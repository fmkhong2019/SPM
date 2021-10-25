<?php
 require_once "common.php";

session_start();
 $dao = new QuizDAO();

 $list=$dao->getUpdatedList($_SESSION['quizsec'],$_SESSION['quizclass']);
 $result = array("quiz" => array() );

 var_dump($list);
 foreach ($list as $item) {
     $result["quiz"][] = array(
         "question"=>$item->getquestion(),
         "type"=>$item.gettype(),
         "answer"=>$item.getcorrectAnswer()


     );

 }
 echo json_encode($result);



 if(isset($_POST['question'])){




 $classId=$_POST['classId'];
 $section=$_POST['section'];
 $answer=$_POST['Ans'];
 $duration=$_POST['time'];
 $type=$_POST['type'];
 $question=$_POST['Question'];
 $option1=$_POST['Option1'];
 $option2=$_POST['Option2'];

 $option3=$_POST['Option3'];
 $option4=$_POST['Option4'];

 $status=$dao->AddQuestion($section, $classId,$question, $type, $option1, $option2, $option3, $option4,$answer,$duration);
 echo $status;
 if($status){
     header('Location: ../../../../../main_page/Createquiz.php');
 }
 else{
     echo $status;
 }
}
 

 
?>