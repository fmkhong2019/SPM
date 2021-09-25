<?php
    session_start();
    require_once "common.php";
    $dao = new InterviewDAO();

    $interviewer_id = $_GET['interviewer_id'];
    $timeslot = $_GET['timeslots'];
    $user_id = $_GET['user_id'];

    if (isset($interviewer_id) && isset($timeslot) && isset($user_id)){
        $result = $dao->addBooking($interviewer_id, $timeslot);
        $dao->deleteBooking($user_id, $interviewer_id, $timeslot);
    };

    header("Location: ../../guugle-main/guugle/main_page/main.php");

    // Add error message here if booking already exists
    return $result;
?>