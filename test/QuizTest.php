<?php
// Rohan Manoj Kuruvilla
// require "../vendor/autoload.php";
require_once './guugle-main/Learner/server/model/QuizController.php';
require_once './guugle-main/Learner/server/model/Quiz.php';
use PHPUnit\Framework\TestCase;
use function PHPUnit\Framework\assertEquals;
class QuizTest extends TestCase
{
    public function testGetQuestionAnswer()
    {
        
        $quiz = new QuizController();
        $answer=$quiz->getQuiz(1,1);
        $this->assertEquals(2,$answer['quiz'][0]['correctAnswer']);

        // return 

    }

    public function testComputeTotalTime()
    {

        $quiz = new QuizController();
        $time=intval($quiz->computeTotalTime(1,1));
        $this->assertEquals(130,$time);
    }

    public function testComputeScore(){
        $quiz = new QuizController();
        $arr=array("What is 1+1"=>"2","Which is the best module"=>"SPM","Where is Singapore"=>"Asia");
        $score=intval($quiz->computeGrades(1,1,$arr));
        $this->assertEquals(3,$score);

    }

}

