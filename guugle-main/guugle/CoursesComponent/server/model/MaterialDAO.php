<?php
    class MaterialDAO{

        public function getMaterials($classId, $sectionId) {
            $conn = new ConnectionManager();
            $pdo = $conn->getConnection();
            
            $sql = "SELECT * FROM `material` WHERE `classId` = :classId AND `sectionId` = :sectionId ORDER BY `materialId`";

            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':classId', $classId, PDO::PARAM_INT);
            $stmt->bindParam(':sectionId', $sectionId, PDO::PARAM_INT);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();

            $result = [];
            while($row = $stmt->fetch()){
                $result[] = new material($row["materialId"], $row["classId"], $row["sectionId"], $row["name"], $row["fileSize"], $row["fileType"], $row["filePath"], $row["link"], $row["completed"] );
            }

            $stmt = null;
            $pdo = null;

            return $result;
        }
    }
?>