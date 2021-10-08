<?php
    require_once "common.php";
    $dao = new MaterialDAO();
    
    $dao2 = new ViewingDAO();

    // if ((isset($_GET['classId'])) && (isset($_GET['sectionId']))){
        $classId = $_GET['classId'];
        $sectionId = $_GET['sectionId'];
        // $engineerId = $_GET['engine'];

        // var_dump($_GET);
        

        // $classId = 1;
        // $sectionId = 1;
        $engineerId = 4;
        // $materialId =1;
        // ?classId=1&sectionId=1&engineerId=4



        
        $materials = $dao->getMaterials($classId, $sectionId);
        $result = array("materials" => array() );
    
        foreach ($materials as $material) {
            $materialId = $material->getMaterialId();
            // var_dump($material->getMaterialId());


            $completed = array("viewing" => array());
            $view = $dao2->getViewing($materialId,$engineerId);
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
    
        echo json_encode($result); 
    // }