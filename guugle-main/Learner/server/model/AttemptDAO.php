<?php

require_once 'ConnectionManager.php';
include 'Attempt.php';

class AttemptDAO {
    public function addAttempt($classId,$sectionId,$engineerId,$score){
        $conn = new ConnectionManager();
        $pdo = $conn->getConnection();

        $sql = "INSERT INTO `attempt` (`classId`, `sectionId`, `engineerId`, `dateTime`,`score`) VALUES (:classId, :sectionId, :engineerId, now(), :score)";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':engineerId', $engineerId, PDO::PARAM_INT);
        $stmt->bindParam(':classId', $classId, PDO::PARAM_INT);
        $stmt->bindParam(':sectionId', $sectionId, PDO::PARAM_INT);
        $stmt->bindParam(':score', $score, PDO::PARAM_INT);

        $isOk = $stmt->execute();
        $stmt = null;
        $pdo = null;
        return $isOk;
    }

    public function getAttempt($classId, $sectionId, $engineerId) {
        $conn = new ConnectionManager();
        $pdo = $conn->getConnection();

        $sql = "SELECT * FROM `attempt` WHERE `sectionId`= :sectionId AND `classId` = :classId AND `engineerId` = :engineerId";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':engineerId', $engineerId, PDO::PARAM_INT);
        $stmt->bindParam(':classId', $classId, PDO::PARAM_INT);
        $stmt->bindParam(':sectionId', $sectionId, PDO::PARAM_INT);

        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        
        $result = null;
        // $post_object = null;
        if( $row = $stmt->fetch() ) {
            $result = 
                new Attempt(
                    $row['attemptId'],
                    $row['classId'],
                    $row['sectionId'],
                    $row['engineerId'],
                    $row['datetime'],
                    $row['score']
                );
        
        }

        else {
            return False;
        }
        $stmt = null;
        $pdo = null;

        return $result;
    }

}

?>