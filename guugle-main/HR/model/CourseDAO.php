<?php

require_once 'common.php';

class CourseDAO {

    public function getAll() {
        // STEP 1
        $connMgr = new ConnectionManager();
        $conn = $connMgr->connect();

        // STEP 2
        $sql = "SELECT
                    *
                FROM course"; // SELECT * FROM post; // This will also work
        $stmt = $conn->prepare($sql);

        // STEP 3
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        // STEP 4
        $courses = []; // Indexed Array of Post objects
        while( $row = $stmt->fetch() ) {
            $courses[] =
                new Course(
                    $row['courseId'],
                    $row['courseName'],
                    $row['courseDescription'],
                    $row['selfEnrollPeriod']
                );
        }

        // STEP 5
        $stmt = null;
        $conn = null;

        // STEP 6
        return $courses;
    }

    public function getCourse($id) {
        // STEP 1
        $connMgr = new ConnectionManager();
        $conn = $connMgr->connect();

        // STEP 2
        $sql = "SELECT
                    *
                FROM course
                WHERE 
                    courseId = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        // STEP 3
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        // STEP 4
        $course = null;
        if( $row = $stmt->fetch() ) {
            $course = 
                new Course(
                    $row['courseId'],
                    $row['courseName'],
                    $row['courseDescription'],
                    $row['selfEnrollPeriod']);
        }

        // STEP 5
        $stmt = null;
        $conn = null;

        // STEP 6
        return $course;
    }

    public function updateSelfEnrollPeriod($id, $date) {

        // STEP 1
        $connMgr = new ConnectionManager();
        $conn = $connMgr->connect();

        // STEP 2
        $sql = "UPDATE
                    course
                SET
                    selfEnrollPeriod = :selfEnrollPeriod
                WHERE 
                    courseId = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':selfEnrollPeriod', $date, PDO::PARAM_STR);

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
                    id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        //STEP 3
        $status = $stmt->execute();
        
        // STEP 4
        $stmt = null;
        $conn = null;

        // STEP 5
        return $status;
    }

    public function add($id, $startDate, $endDate, $trainerId, $classSize, $courseName) {
        // STEP 1
        $connMgr = new ConnectionManager();
        $conn = $connMgr->connect();

        // STEP 2
        $sql = "INSERT INTO class
                    (
                        classId
                        startDate, 
                        endDate, 
                        trainerId, 
                        classSize, 
                        courseName
                    )
                VALUES
                    (
                        :id
                        :startDate, 
                        :endDate, 
                        :trainerId, 
                        :classSize, 
                        :courseName
                    )";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':startDate', $startDate, PDO::PARAM_STR);
        $stmt->bindParam(':endDate', $endDate, PDO::PARAM_STR);
        $stmt->bindParam(':trainerId', $trainerId, PDO::PARAM_INT);
        $stmt->bindParam(':classSize', $classSize, PDO::PARAM_INT);
        $stmt->bindParam(':courseName', $courseName, PDO::PARAM_STR);

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
