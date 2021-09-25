<?php
    session_start();
    require_once "common.php";
    $dao = new InterviewDAO();
    

    if (isset($_POST['mock'])){
        $result = $dao->createBooking($_SESSION["id"], $_POST['interviewer_id'], $_POST['radio_timeslot'], "Mock");
        $dao->deleteTimeslot($_POST['interviewer_id'], $_POST['radio_timeslot']);
    }
    else if (isset($_POST['info'])){
        $result = $dao->createBooking($_SESSION["id"], $_POST['interviewer_id'], $_POST['radio_timeslot'], "Informational");
        $dao->deleteTimeslot($_POST['interviewer_id'], $_POST['radio_timeslot']);
    }


    $fName = $dao->getfName($_POST['interviewer_id']);
    
    
    if($result && $fName) { 

        if (isset($_POST['mock'])) {

            $_SESSION["interview_type"] = "mock";
        }

        else {
            $_SESSION["interview_type"] = "informational";
        }
        $_SESSION['radio_timeslot'] = $_POST['radio_timeslot'];
        $_SESSION['interviewerFName'] = $fName;


        header("Location: ../../guugle-main/guugle/main_page/load.php");
    }

    // Add error message here if booking already exists
    else {
        //Placeholder
        //Will work on this!
        
    }
?>