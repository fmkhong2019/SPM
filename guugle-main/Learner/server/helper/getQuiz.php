<?php
    require_once "common.php";
    $quizController = new QuizController();



 


    $status = False;

    if(isset($_POST['Question'])){
        $sectionId = $_POST['sectionId'];
        $classId = $_POST['classId'];
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
        $sectionId=$_POST['sectionId'];
        $answer=$_POST['Ans'];
        $duration=$_POST['time'];
        $type=$_POST['type'];
        $question=$_POST['Question'];

        $status = $quizController->addQuiz($sectionId, $classId,$question, $type, $option1, $option2, $option3, $option4,$answer,$duration);

    }

    else {
        $sectionId = $_GET['sectionId'];
        $classId = $_GET['classId'];
    }



    $result = $quizController->getQuiz($sectionId,$classId);
    echo json_encode($result);

    if($status){
        header("Location: ../../Createquiz.php?sectionId=" . strval($sectionId) . "&" . "classId=" . strval($classId));
    }
?>