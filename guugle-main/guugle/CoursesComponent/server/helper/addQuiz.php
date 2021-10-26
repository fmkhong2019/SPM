<?php
 require_once "common.php";



session_start();
var_dump($_POST);
 $dao = new QuizDAO();


 $classId=$_POST['classId'];
 $section=$_POST['section'];
 $answer=$_POST['Ans'];
 $duration=$_POST['time'];
 $type=$_POST['type'];
 $question=$_POST['Question'];

 if(isset($_POST['Option1'])) {

    $option1=$_POST['Option1'];
    $option2=$_POST['Option2'];
    $option3=$_POST['Option3'];
    $option4=$_POST['Option4'];
 }

 else {
    $option1="True";
    $option2="False";
    $option3=null;
    $option4=null;
 }


 $status=$dao->AddQuestion($section, $classId,$question, $type, $option1, $option2, $option3, $option4,$answer,$duration);

// var_dump($status);

 $list=$dao->getUpdatedList($_SESSION['quizsec'],$_SESSION['quizclass']);
 $result = array("quiz" => array() );

 var_dump($list);
 foreach ($list as $item) {
     $result["quiz"][] = array(
         "question"=>$item->getquestion(),
         "type"=>$item->getquestionId(),
         "correctAnswer"=>$item->getcorrectAnswer(),

     );
 }
 
('Location: ../../../main_page/Createquiz.php'); 
echo json_encode($result);

?>