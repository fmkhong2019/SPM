<?php
    session_start();
    require_once "common.php";
    $dao = new SectionDAO();
    $classId = $_GET['classId'];
        $section = $dao->getSection($classId);
        $result = array();
    
        foreach ($section as $s) {
            $result["section"][] = array(
                "classId" => $s->getclassid(),
                "sectionId" => $s->getsectionid(),
                "name" => $s->getname(),
                "description" => $s->getdescription()
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