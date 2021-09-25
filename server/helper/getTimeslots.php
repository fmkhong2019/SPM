<?php
    require_once "common.php";
    $dao = new InterviewDAO();

    if (isset($_GET['interviewer_id'])){
        $interviewer_id = $_GET['interviewer_id'];
        $timeslots = $dao->getTimeslotsById($interviewer_id);
        $result = array();
    
        foreach ($timeslots as $t) {
            $result["timeslots"][] = array(
                "interviewer_id" => $t->getID(),
                "timeslots" => $t->getTimeslot()
            );
        }
    
        echo json_encode($result); 
    }

    
?>