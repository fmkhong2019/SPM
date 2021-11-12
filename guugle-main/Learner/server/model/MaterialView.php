<?php

include_once 'MaterialDAO.php';
include_once 'ViewingDAO.php';

class MaterialView {
    public function getMaterials($classId, $sectionId,$employeeId){
        $dao = new MaterialDAO();
        $dao2 = new ViewingDAO();
        $materials = $dao->getMaterials($classId, $sectionId);
        $result = array("materials" => array() );
    
        foreach ($materials as $material) {
            $materialId = $material->getMaterialId();
            // var_dump($material->getMaterialId());
            $completed = array("viewing" => array());
            $view = $dao2->getViewing($materialId,$employeeId);
            if($view) {
                $completed["viewing"] = array("completed" => $view->getCompleted());
            }

            else {
                $completed["viewing"] = array("completed"=>0);
            }

            $result["materials"][] = array(
                "materialId" => $materialId,
                "classId" => $material->getClassId(),
                "sectionId" => $material->getSectionId(),
                "name" => $material->getName(),
                // "fileSize" => $material->getFileSize(),
                // "fileType" => $interviewer->getFileType(),
                "filePath" => $material->getFilePath(),
                
                // "link" => $interviewer->getLink(),
                "completed" => $completed
            );

        }

        return $result;
    }

    public function getS3($materialId, $employeeId) {
        $dao = new ViewingDAO();
        $result = $dao-> createViewing($materialId, $employeeId);
        // var_dump($result);
    
    
        if(!$result) {
            $result = $dao-> updateLatest($materialId, $employeeId);
            // echo('hello there');
        }

        return $result;
    }

}

?>