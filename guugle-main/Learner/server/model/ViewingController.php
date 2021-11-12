<?php

include_once 'ViewingDAO.php';

class ViewingController {
    function updateViewingCompletion($materialId, $employeeId) {
        $dao = new ViewingDAO();
        $update = $dao->updateComplete($materialId, $employeeId);
        return $update;
    }
    

}

// $test = new ViewingController();
// $result= $test->updateViewingCompletion(1,1)

?>