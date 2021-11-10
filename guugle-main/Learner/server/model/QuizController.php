<?php

require_once "common.php";

class QuizController {
    // Rohan's create Quiz 
    // Need to split into 2 functions
    function getQuiz($sectionId, $classId) {
        $dao = new QuizDAO();

        $list=$dao->getUpdatedList($sectionId, $classId);
        $result = array("quiz" => array() );
    
        foreach ($list as $item) {
            $result["quiz"][] = array(
                "question" => $item->getquestion(),
                "type" => $item->getQuestionType(),
                "correctAnswer" => $item->getcorrectAnswer(),
                // 'ans1'=>$item->getAnswer1(),
                // 'ans2'=>$item->getAnswer2(),
                // 'ans3'=>$item->getAnswer3(),
                // 'ans4'=>$item->getAnswer4()
            );
        }
        return $result;
    }

    function addQuiz($section, $classId,$question, $type, $option1, $option2, $option3, $option4,$answer,$duration){
        $dao = new QuizDAO();
        $status=$dao->AddQuestion($section, $classId,$question, $type, $option1, $option2, $option3, $option4,$answer,$duration);
        return $status;
    }

    function displayQuiz($sectionId,$classId) {
    // session_start();

    $dao = new QuizDAO();
    $dao2 = new ClassDAO();
    $dao3 = new CourseDAO();
    // $sectionId = $_SESSION['quizsec'];
    // $classId = $_SESSION['quizclass'];
    $sectionId = 1;
    $classId = 1;


    // $list=$dao->getUpdatedList($_SESSION['quizsec'],$_SESSION['quizclass']);
    $list=$dao->getUpdatedList($sectionId,$classId);
    $result = array("quiz" => array() );

    foreach ($list as $item) {
        $result["quiz"][] = array(
            "questionId" => $item->getquestionId(),
            "sectionId" => $item->getsectionId(),
            "classId" => $item->getclassId(),
            "question" => $item->getquestion(),
            "type" => $item->getQuestionType(),
            "correctAnswer" => $item->getcorrectAnswer(),
            "ans1"=>$item->getAnswer1(),
            "ans2"=>$item->getAnswer2(),
            "ans3"=>$item->getAnswer3(),
            "ans4"=>$item->getAnswer4()
        );
    }

    // Get className
    $classId = $result["quiz"][0]["classId"];
    // echo($classId);

    $courseId = $dao2->getClasses($classId)[0]->getcourseid();
    // var_dump($courseId);

    $courseName = $dao3->getCourse($courseId)[0]->getcoursename();
    // var_dump($courseName);

    // echo($courseId);
    



    $time=$dao->quiztotaltime($sectionId,$classId);
    
    $response = array("questions" =>$result, "timeLimit" => $time, "courseName"=>$courseName, "sectionId"=>$sectionId);

    return $response;

    } 
}
?>