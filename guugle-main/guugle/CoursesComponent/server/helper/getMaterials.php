<?php
    require_once "common.php";
    $dao = new MaterialDAO();

    if ((isset($_GET['classId'])) && (isset($_GET['sectionId']))){
        $classId = $_GET['classId'];
        $sectionId = $_GET['sectionId'];

        // $classId = 1;
        // $sectionId = 1;
        $materials = $dao->getMaterials($classId, $sectionId);
        $result = array("materials" => array() );
    
        foreach ($materials as $material) {
            $result["materials"][] = array(
                "materialId" => $material->getMaterialId(),
                "classId" => $material->getClassId(),
                "sectionId" => $material->getSectionId(),
                "name" => $material->getName(),
                // "fileSize" => $material->getFileSize(),
                // "fileType" => $interviewer->getFileType(),
                "filePath" => $material->getFilePath(),
                // "link" => $interviewer->getLink(),
                "completed" => $material->getCompleted()
            );
        }
    
        echo json_encode($result); 
    }
?>