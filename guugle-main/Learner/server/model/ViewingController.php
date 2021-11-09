<?php

include 'ViewingDAO.php';

class ViewingController {
    function updateViewingCompletion($materialId, $employeeId) {
        $dao = new ViewingDAO();
        $update = $dao->updateComplete($materialId, $employeeId);
        return $update;
    }
    

}
?>