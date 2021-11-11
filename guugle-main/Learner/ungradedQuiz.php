<?php
session_start();
?>

<html lang="en">
    <head>
        <title>Quiz Attempt</title><meta name="viewport" content="width=device-width"/>
        <script src="https://unpkg.com/knockout@3.5.1/build/output/knockout-latest.js"></script>
        <script src="https://unpkg.com/survey-knockout@1.8.73/survey.ko.min.js"></script>
        <link href="https://unpkg.com/survey-core@1.8.73/modern.min.css" type="text/css" rel="stylesheet"/>
    
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        
        <body>
        <div id="surveyElement" style="display:inline-block;width:100%;"></div>
        <div id="surveyResult"></div>
        <div id="returnToSection"></div>
        <!-- <script type="text/javascript" src="./index.js"></script> -->
        <script>  
            var classId = <?php echo $_GET['classId'];?>;
            // var classId =
            var sectionId = <?php echo $_GET['sectionId'];?>;
            var employeeId = <?php echo $_SESSION['employeeId'];?>;
            function updateProgress(classId, employeeId) {
                request.onreadystatechange = function(){
                    if (this.readyState ==   4 && this.status==200){}
                }
                request.open("GET", `./server/helper/displayQuiz.php?classId=${classId}&employeeId=${employeeId}`, true);
                request.send();
            }
            console.log('hello');
            const request = new XMLHttpRequest();
        
            request.onreadystatechange = function(){
                if (this.readyState ==   4 && this.status==200){
                    console.log(this.responseText);
                    let questions = JSON.parse(this.responseText).questions.quiz;
                    let timeLimit = JSON.parse(this.responseText).timeLimit;
                    let courseName = JSON.parse(this.responseText).courseName;
                    let $sectionId = JSON.parse(this.responseText).$sectionId;
                    console.log('***')
                    console.log(questions);
                    console.log(timeLimit);
                    var timeInSeconds = timeLimit*60
                    var quizName = courseName + ' Section ' + sectionId;
                    var json = {
                    title: `${quizName}`,
                    showProgressBar: "bottom",
                    showTimerPanel: "top",
                    // In seconds total time to finish quiz: 10 minutes
                    maxTimeToFinish: `${timeInSeconds}`,
                    firstPageIsStarted: true,
                    startSurveyText: "Start Quiz",
                    pages: [ {
                        questions: [
                            {
                                type: "html",
                                html: `You are about to start quiz. <br/>You have ${timeLimit} minutes. <br/>Please click on <b>'Start Quiz'</b> button to begin.`
                            }
                        ]
                    }],
                    completedHtml: "<h4>You have answered correctly <b id='correct'>{correctedAnswers}</b> questions from <b id='all'>{questionCount}</b>.</h4>"
                };
                
                    for (question of questions){
                        var questionId= question["questionId"];
                        var questionStmt= question["question"];
                        var correctAnswer= question["correctAnswer"];
                        console.log(question);
                        console.log(question["type"])

                        if (question['type'] == 'MCQ') {
                            var ans1 = question["ans1"];
                            var ans2 = question["ans2"];
                            var ans3 = question["ans3"];
                            var ans4 = question["ans4"];
                            json.pages.push({
                            
                            questions: [
                                {
                                    type: "radiogroup",
                                    name: questionId,
                                    title: questionStmt,
                                    choicesOrder: "random",
                                    choices: [ans1, ans2, ans3, ans4],
                                    correctAnswer: correctAnswer
                                }
                            ]});
                        }

                        else {
                            json.pages.push({
                            
                            questions: [
                                {
                                    type: "radiogroup",
                                    name: questionId,
                                    title: questionStmt,
                                    choicesOrder: "random",
                                    choices: ['True', "False"],
                                    correctAnswer: correctAnswer
                                }
                            ]});
                        }
                        // always throw null
                    
                        // var ans1 = "this is correct";
                        // var ans2 = "this is correct";
                        // var ans3 = "this is correct";
                        // var ans4 = "this is correct";
                        // console.log(questionId);
                        // console.log(sectionId);
                        // console.log("correctAnswer");
                    

                    // json.pages.push(page);
                // console.log(pages);
                }
                Survey
                    .StylesManager
                    .applyTheme("modern");
                window.survey = new Survey.Model(json);
                survey
                    .onComplete
                    .add(function (sender) {
                        document
                            .querySelector('#surveyResult')
                            .textContent = "Result JSON:\n" + JSON.stringify(sender.data);
                        console.log(sender);

                        
                        document.querySelector('#returnToSection').innerHTML = `<a href="materials.php?sectionId=${sectionId+1}$classId=${classId}" class="btn btn-primary">Go on to the next Section</a>`
                    });
                survey.render("surveyElement");
                }
            }
            request.open("GET", `./server/helper/displayQuiz.php?classId=${classId}&sectionId=${sectionId}&employeeId=${employeeId}`, true);
            request.send();
        
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>