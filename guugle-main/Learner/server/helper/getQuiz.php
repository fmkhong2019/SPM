<?php 
    require_once "./common.php";
    $quizController = new QuizController();

    $sectionId = $GET['sectionId'];
    $classId = $GET['classId'];

    $result = $quizController->getQuiz($sectionId,$classId);
    echo json_encode($result);

    $status = True;

    if(isset($_POST['Question'])){
        if(isset($_POST['Option1'])) {
    
            $option1=$_POST['Option1'];
            $option2=$_POST['Option2'];
            $option3=$_POST['Option3'];
            $option4=$_POST['Option4'];
        }
    
        else {
            $option1=null;
            $option2=null;
            $option3=null;
            $option4=null;
        }
        $classId=$_POST['classId'];
        $section=$_POST['section'];
        $answer=$_POST['Ans'];
        $duration=$_POST['time'];
        $type=$_POST['type'];
        $question=$_POST['Question'];

        $quizController->addQuiz($section, $classId,$question, $type, $option1, $option2, $option3, $option4,$answer,$duration);
    }

    if($status){
        header("Location: ../../Trainer/Createquiz.php");
    }
?>