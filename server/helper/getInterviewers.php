<?php
    require_once "common.php";

    define("POST_LIMIT", 12); 

    $dao = new InterviewDAO();

    // if (isset($_GET['higherThanID']) && $_GET['higherThanID'] > 0) {
    //     $postArray = $dao->getHigherThanID($_GET['higherThanID'], POST_LIMIT);
    // } else {
    //     $postArray = $dao->getAllPosts(POST_LIMIT);
    // }

    $interviewerArray = $dao->getInterviewers(POST_LIMIT);

    $result = array("interviewers" => array() );

    foreach ($interviewerArray as $interviewer) {
        $result["interviewers"][] = array(
            "id" => $interviewer->getID(),
            "fname" => $interviewer->getFname(),
            "lname" => $interviewer->getLname(),
            "job" => $interviewer->getJob(),
            "company" => $interviewer->getCompany(),
            "years" => $interviewer->getYears(),
            "industry" => $interviewer->getIndustry(),
            "about" => $interviewer->getAbout(),
            "email" => $interviewer->getEmail(),
            "experience" => $interviewer->getExperience(),
            "education" => $interviewer->getEducation(),
            "img" => $interviewer->getImg()
        );
    }

    echo json_encode($result); 
?>