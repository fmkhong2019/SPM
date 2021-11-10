<?php

//require_once 'common.php';

class ClassDAO {

    public function getAll() {
        // STEP 1
        $connMgr = new ConnectionManager();
        $conn = $connMgr->connect();

        // STEP 2
        $sql = "SELECT
                    classId,
                    courseId,
                    startDate,
                    endDate,
                    trainerId,
                    classSize
                FROM class"; // SELECT * FROM post; // This will also work
        $stmt = $conn->prepare($sql);

        // STEP 3
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        // STEP 4
        $classes = []; // Indexed Array of Post objects
        while( $row = $stmt->fetch() ) {
            $classes[] =
                new Classes(
                    $row['classId'],
                    $row['courseId'],
                    $row['startDate'],
                    $row['endDate'],
                    $row['trainerId'],
                    $row['classSize']);
        }

        // STEP 5
        $stmt = null;
        $conn = null;

        // STEP 6
        return $classes;
    }

    public function getClassbyClassId($id) {
        // STEP 1
        $connMgr = new ConnectionManager();
        $conn = $connMgr->connect();

        // STEP 2
        $sql = "SELECT
                    *
                FROM class
                WHERE 
                    classId = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        // STEP 3
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        // STEP 4
        $class_object = null;
        if( $row = $stmt->fetch() ) {
            $class_object = 
                new Classes(
                    $row['classId'],
                    $row['courseId'],
                    $row['startDate'],
                    $row['endDate'],
                    $row['trainerId'],
                    $row['classSize']);
        }
        // STEP 5
        $stmt = null;
        $conn = null;
        // STEP 6
        return $class_object;
    }

    public function getAllClasses($courseId) {
        // STEP 1
        $connMgr = new ConnectionManager();
        $conn = $connMgr->connect();

        // STEP 2
        $sql = "SELECT
                    *
                FROM class
                WHERE 
                    courseId = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $courseId, PDO::PARAM_INT);

        // STEP 3
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        $classes = []; // Indexed Array of Post objects
        while( $row = $stmt->fetch() ) {
            $classes[] =
                new Classes(
                    $row['classId'],
                    $row['courseId'],
                    $row['startDate'],
                    $row['endDate'],
                    $row['trainerId'],
                    $row['classSize']);
        }

        // STEP 5
        $stmt = null;
        $conn = null;

        // STEP 6
        return $classes;
    }

    public function update($courseId, $classId, $startDate, $endDate, $trainerId, $classSize) {

        // STEP 1
        $connMgr = new ConnectionManager();
        $conn = $connMgr->connect();

        // STEP 2
        $sql = "UPDATE
                    class
                SET
                    courseId = :courseId,
                    startDate = :startDate,
                    endDate = :endDate,
                    trainerId = :trainerId,
                    classSize = :classSize
                WHERE 
                    classId = :classId";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':courseId', $courseId, PDO::PARAM_INT);
        $stmt->bindParam(':classId', $classId, PDO::PARAM_INT);
        $stmt->bindParam(':startDate', $startDate, PDO::PARAM_STR);
        $stmt->bindParam(':endDate', $endDate, PDO::PARAM_STR);
        $stmt->bindParam(':trainerId', $trainerId, PDO::PARAM_INT);
        $stmt->bindParam(':classSize', $classSize, PDO::PARAM_INT);
        

        //STEP 3
        $status = $stmt->execute();
        
        // STEP 4
        $stmt = null;
        $conn = null;

        // STEP 5
        return $status;
    }

    public function delete($id) {
        // STEP 1
        $connMgr = new ConnectionManager();
        $conn = $connMgr->connect();

        // STEP 2
        $sql = "DELETE FROM
                    class
                WHERE 
                    classId = :classId";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':classId', $id, PDO::PARAM_INT);

        //STEP 3
        $status = $stmt->execute();
        
        // STEP 4
        $stmt = null;
        $conn = null;

        // STEP 5
        return $status;
    }

    public function add($courseId, $classId, $startDate, $endDate, $trainerId, $classSize) {
        // STEP 1
        $connMgr = new ConnectionManager();
        $conn = $connMgr->connect();

        // STEP 2
        $sql = "INSERT INTO class
                    (
                        courseId,
                        classId,
                        startDate, 
                        endDate, 
                        trainerId, 
                        classSize
                        
                    )
                VALUES
                    (
                        :courseId,
                        :classId,
                        :startDate, 
                        :endDate, 
                        :trainerId, 
                        :classSize    
                    )";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':courseId', $courseId, PDO::PARAM_INT);
        $stmt->bindParam(':classId', $classId, PDO::PARAM_INT);
        $stmt->bindParam(':startDate', $startDate, PDO::PARAM_STR);
        $stmt->bindParam(':endDate', $endDate, PDO::PARAM_STR);
        $stmt->bindParam(':trainerId', $trainerId, PDO::PARAM_INT);
        $stmt->bindParam(':classSize', $classSize, PDO::PARAM_INT);

        //STEP 3
        $status = $stmt->execute();
        
        // STEP 4
        $stmt = null;
        $conn = null;

        // STEP 5
        return $status;
    }

    public function updateTrainer($classId, $trainerId) {

        // STEP 1
        $connMgr = new ConnectionManager();
        $conn = $connMgr->connect();

        // STEP 2
        $sql = "UPDATE
                        class
                    SET
                        trainerId=:tid
                    WHERE 
                        classId=:cid";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':tid', $trainerId, PDO::PARAM_INT);
        $stmt->bindParam(':cid', $classId, PDO::PARAM_INT);
        

        //STEP 3
        $status = $stmt->execute();
        
        // STEP 4
        $stmt = null;
        $conn = null;

        // STEP 5
        return $status;

       
    }
}
?>