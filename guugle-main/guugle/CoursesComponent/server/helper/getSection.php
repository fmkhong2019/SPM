<?php
    session_start();
    require_once "common.php";
    $dao = new SectionDAO();
    $dao1 = new EnrollmentDAO();
    

    $classId = $_GET['classId'];
    //$engineerId = $_GET['engineerId'];
    
    $engineerid = 1;
    $enroll = $dao1->getProgress($engineerid,$classId);
        $result1 = array();
        $section = $dao->getSection($classId);
        $result = array();
        $progress = 0;
        foreach ($enroll as $e){
            $progress= $e->getprogress(); 
            // $result1 = array(
            //     "progress" => $e->getprogress()
            // );
        }
        foreach ($section as $s) {
            $result1["section"][] = array(
                "classId" => $s->getclassid(),
                "sectionId" => $s->getsectionid(),
                "name" => $s->getname(),
                "description" => $s->getdescription()
            );
        }
        for ($i = 0; $i<$progress; $i++){
            $result["section"][] = array(
                "classId" => $result1["section"][$i]["classId"],
                "sectionId" => $result1["section"][$i]["sectionId"],
                "name" => $result1["section"][$i]["name"],
                "description" => $result1["section"][$i]["description"]
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