<?php
    require_once 'ConnectionManager.php';
    
    include_once 'Viewing.php';
    class ViewingDAO {
        public function createViewing($materialId, $employeeId){
            $conn = new ConnectionManager();
            $pdo = $conn->getConnection();

            $sql = "INSERT INTO `viewing` (`employeeId`, `materialId`, `completed`, `latest`) VALUES (:employeeId, :materialId, 0, now())";

            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':employeeId', $employeeId, PDO::PARAM_INT);
            $stmt->bindParam(':materialId', $materialId, PDO::PARAM_INT);

            $isOk = $stmt->execute();
            $stmt = null;
            $pdo = null;
            return $isOk;
        }

        public function getViewing($materialId, $employeeId) {
            $conn = new ConnectionManager();
            $pdo = $conn->getConnection();
    
            $sql = "SELECT * FROM `viewing` WHERE `materialId` = :materialId AND `employeeId` = :employeeId";
    
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':materialId', $materialId, PDO::PARAM_INT);
            $stmt->bindParam(':employeeId', $employeeId, PDO::PARAM_INT);

            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            
            $result = null;
            // $post_object = null;
            if( $row = $stmt->fetch() ) {
                $result = 
                    new Viewing(
                        $row['employeeId'],
                        $row['materialId'],
                        $row['completed'],
                        $row['latest']
                    );
            
            }

            else {
                return False;
            }
            $stmt = null;
            $pdo = null;
    
            return $result;
        }

        public function updateLatest($materialId, $employeeId) {
            $conn = new ConnectionManager();
            $pdo = $conn->getConnection();
            
            $sql = "UPDATE `viewing`
            SET `latest` = now()
            WHERE `materialId` = :materialId AND `employeeId` = :employeeId;";

            $stmt = $pdo->prepare($sql);
            // $stmt->bindParam(':class', $classId, PDO::PARAM_INT);
            $stmt->bindParam(':materialId', $materialId, PDO::PARAM_INT);
            $stmt->bindParam(':employeeId', $employeeId, PDO::PARAM_INT);
            

            $isOk = $stmt->execute();
            // $count = $stmt->rowCount();
            $stmt = null;
            $pdo = null;

            // return $count;
            return $isOk;
        }

        public function updateComplete($materialId, $employeeId) {
            $conn = new ConnectionManager();
            $pdo = $conn->getConnection();
            
            $sql = "UPDATE `viewing`
            SET `completed` = 1
            WHERE `materialId` = :materialId AND `employeeId` = :employeeId;";

            $stmt = $pdo->prepare($sql);
            // $stmt->bindParam(':class', $classId, PDO::PARAM_INT);
            $stmt->bindParam(':materialId', $materialId, PDO::PARAM_INT);
            $stmt->bindParam(':employeeId', $employeeId, PDO::PARAM_INT);

            $isOk = $stmt->execute();
            $stmt = null;
            $pdo = null;
            return $isOk;
        }
    }
?>