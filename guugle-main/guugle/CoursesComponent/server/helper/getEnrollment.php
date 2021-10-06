<?php
    session_start();
    require_once "common.php";
    $dao = new EnrollmentDAO();
        $classes = $dao->getClass();
        $result = array();
    
        foreach ($classes as $c) {
            $result["classes"][] = array(
                "classId" => $c->getclassid(),
                "engineerId" => $c->getengineerid()
            );
        }
    

    #$_SESSION["cid"
    // $class = $dao->getClass(1);
    // $result = array("enrollment" => array());

    
    // $result["enrollment"] = array(
    //     "engineerId" => $enrollment->getengineerid(),
    //     "classId" => $enrollment->getclassid(),
    //     "completed" => $enrollment-> getcompleted(),
    //     "completionDate" => $enrollment->getcompletiondate(),
    //     "enrolledDate" => $enrollment->getenrolleddate(),
    //     "progress" => $enrollment->getprogress(),
    // );

    echo json_encode($result);
?>