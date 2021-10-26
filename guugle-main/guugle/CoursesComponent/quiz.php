<html lang="en">
    <head>
        <title>Quiz Attempt</title><meta name="viewport" content="width=device-width"/>
        <script src="https://unpkg.com/knockout@3.5.1/build/output/knockout-latest.js"></script>
        <script src="https://unpkg.com/survey-knockout@1.8.73/survey.ko.min.js"></script>
        <link href="https://unpkg.com/survey-core@1.8.73/modern.min.css" type="text/css" rel="stylesheet"/>
    <body>
        <div id="surveyElement" style="display:inline-block;width:100%;"></div>
        <div id="surveyResult"></div>
        <!-- <script type="text/javascript" src="./index.js"></script> -->
        <script>  
            Survey
                .StylesManager
                .applyTheme("modern");

            var json = {
                title: "Software Project Management Section 1",
                showProgressBar: "bottom",
                showTimerPanel: "top",
                // In seconds total time to finish quiz: 10 minutes
                maxTimeToFinish: 600,
                firstPageIsStarted: true,
                startSurveyText: "Start Quiz",
                pages: [
                    {
                        questions: [
                            {
                                type: "html",
                                html: "You are about to start quiz. <br/>You have 10 minutes. <br/>Please click on <b>'Start Quiz'</b> button to begin."
                            }
                        ]
                    }, {
                        questions: [
                            {
                                type: "radiogroup",
                                name: "SPM-1",
                                title: "Who created Linux?",
                                choicesOrder: "random",
                                choices: [
                                    "Steve Jobs", "Subhajit Datta", "Zhou Kan Kan", "Linus Torvalds"
                                ],
                                correctAnswer: "Linus Torvalds"
                            }
                        ]
                    }, {
                        questions: [
                            {
                                type: "radiogroup",
                                name: "SPM-2",
                                title: "Not everyone should participate in sprint planning",
                                choices: [
                                    "True", "False"
                                ],
                                correctAnswer: "False"
                            }
                        ]
                    }, {
                        // maxTimeToFinish: 15,
                        questions: [
                            {
                                type: "radiogroup",
                                name: "SPM-3",
                                title: "Who is the best Prof?",
                                choicesOrder: "random",
                                choices: [
                                    "Chris Poskitt", "Subhajit Datta"
                                ],
                                correctAnswer: "Subhajit Datta"
                            }
                        ]
                    }
                ],
                completedHtml: "<h4>You have answered correctly <b>{correctedAnswers}</b> questions from <b>{questionCount}</b>.</h4>"
            };

            window.survey = new Survey.Model(json);

            survey
                .onComplete
                .add(function (sender) {
                    document
                        .querySelector('#surveyResult')
                        .textContent = "Result JSON:\n" + JSON.stringify(sender.data, null, 3);
                    console.log(sender);
                });

            survey.render("surveyElement");
        </script>
    </body>
</html>