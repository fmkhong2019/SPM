<?php

    class ViewingDAO {
        public function createViewing($materialId, $engineerId){
            $conn = new ConnectionManager();
            $pdo = $conn->getConnection();

            $sql = "INSERT INTO `viewing` (`engineerId`, `materialId`, `completed`, `latest`) VALUES (:engineerId, :materialId, 0, now())";

            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':engineerId', $engineerId, PDO::PARAM_INT);
            $stmt->bindParam(':materialId', $materialId, PDO::PARAM_INT);

            $isOk = $stmt->execute();
            $stmt = null;
            $pdo = null;
            return $isOk;
        }

        public function getViewing($materialId, $engineerId) {
            $conn = new ConnectionManager();
            $pdo = $conn->getConnection();
    
            $sql = "SELECT * FROM `viewing` WHERE `materialId` = :materialId AND `engineerId` = :engineerId";
    
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':materialId', $materialId, PDO::PARAM_INT);
            $stmt->bindParam(':engineerId', $engineerId, PDO::PARAM_INT);

            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            
            $result = null;
            // $post_object = null;
            if( $row = $stmt->fetch() ) {
                $result = 
                    new Viewing(
                        $row['engineerId'],
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

        public function updateLatest($materialId, $engineerId) {
            $conn = new ConnectionManager();
            $pdo = $conn->getConnection();
            
            $sql = "UPDATE `viewing`
            SET `latest` = now()
            WHERE `materialId` = :materialId AND `engineerId` = :engineerId;";

            $stmt = $pdo->prepare($sql);
            // $stmt->bindParam(':class', $classId, PDO::PARAM_INT);
            $stmt->bindParam(':materialId', $materialId, PDO::PARAM_INT);
            $stmt->bindParam(':engineerId', $engineerId, PDO::PARAM_INT);
            

            $isOk = $stmt->execute();
            // $count = $stmt->rowCount();
            $stmt = null;
            $pdo = null;

            // return $count;
            return $isOk;
        }

        public function updateComplete($materialId, $engineerId) {
            $conn = new ConnectionManager();
            $pdo = $conn->getConnection();
            
            $sql = "UPDATE `viewing`
            SET `completed` = 1
            WHERE `materialId` = :materialId AND `engineerId` = :engineerId;";

            $stmt = $pdo->prepare($sql);
            // $stmt->bindParam(':class', $classId, PDO::PARAM_INT);
            $stmt->bindParam(':materialId', $materialId, PDO::PARAM_INT);
            $stmt->bindParam(':engineerId', $engineerId, PDO::PARAM_INT);

            $isOk = $stmt->execute();
            $stmt = null;
            $pdo = null;
            return $isOk;
        }
    }
?>