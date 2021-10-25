<?php
    class QuizDAO{

        public function AddQuestion($sectionId,$classId ,$question ,$types ,$Answer1 ,$Answer2,$Answer3,$Answer4,$correctAnswer,$duration) {
            $conn = new ConnectionManager();
            $pdo = $conn->getConnection();
            $sql = "INSERT INTO quiz VALUES(:sec,:class,:question,:types,:ans1,:ans2,:ans3,:ans4,:correct,:duration)";
    
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':sec', $sectionId, PDO::PARAM_INT);
            $stmt->bindParam(':class', $classId, PDO::PARAM_INT);
            $stmt->bindParam(':question', $question, PDO::PARAM_STR);
            $stmt->bindParam(':types', $types, PDO::PARAM_STR);
            $stmt->bindParam(':ans1', $Answer1, PDO::PARAM_STR);
            $stmt->bindParam(':ans2', $Answer2, PDO::PARAM_STR);
            $stmt->bindParam(':ans3', $Answer3, PDO::PARAM_STR);
            $stmt->bindParam(':ans4', $Answer4, PDO::PARAM_STR);
            $stmt->bindParam(':correct', $correctAnswer, PDO::PARAM_STR);
            $stmt->bindParam(':duration', $duration, PDO::PARAM_INT);
            
            $isOk = $stmt->execute();

          
        
            $stmt = null;
            $pdo = null;
        
            return $isOk;

    }

    public function getUpdatedList($section,$classId){
        $conn = new ConnectionManager();
        $pdo = $conn->getConnection();
        $sql='SELECT * FROM quiz where sectionId=:sec and classId=:class';
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':sec', $sectionId, PDO::PARAM_INT);
        $stmt->bindParam(':class', $classId, PDO::PARAM_INT);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        $result = [];
        while($row = $stmt->fetch()){
            $result[] = new Quiz($row['sectionId'],$row['classId'],$row['question'],$row['type'],$row['Answer1'],$row['Answer2'],$row['Answer3'],$row['Answer4'],$row['correctAnswer'],$row['duration']);
        }
        $stmt = null;
        $pdo = null;

            return $result;

    }
}


    ?>