<?php
    session_start();
    require_once "common.php";
    $dao = new ViewingDAO();

    // $materialId = $_GET['materialId'];
    // $engineerId = $_GET['engineerId'];
    
    $viewing = $dao->getViewing($materialId, $engineerId);
    $result = array("viewing" => array());

    if($result['viewing'])  {
        $result["viewing"] = array(
            "completed" => 0,
        );
    }

    else {
        $result["viewing"] = array(
            "completed" => $viewing->getCompleted(),
        );
    }



    
    echo json_encode($result["viewing"][0]["completed"]);
    // echo json_encode(0)
?>