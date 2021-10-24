<?php

require_once 'common.php';

class preRequisiteDAO {

    public function getAll() {
        // STEP 1
        $connMgr = new ConnectionManager();
        $conn = $connMgr->connect();

        // STEP 2
        $sql = "SELECT
                    *
                FROM pre_requisite"; // SELECT * FROM post; // This will also work
        $stmt = $conn->prepare($sql);

        // STEP 3
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        // STEP 4
        $preRequisites = []; // Indexed Array of Post objects
        while( $row = $stmt->fetch() ) {
            $classes[] =
                new preRequisite(
                    $row['coucourseId'],
                    $row['preRequisiteCourseId']);
        }

        // STEP 5
        $stmt = null;
        $conn = null;

        // STEP 6
        return $preRequisites;
    }

    public function getPreReqByCid($id) {
        // STEP 1
        $connMgr = new ConnectionManager();
        $conn = $connMgr->connect();

        // STEP 2
        $sql = "SELECT
                    *
                FROM pre_requisite
                WHERE 
                    courseId = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        // STEP 3
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        // STEP 4
        $preReq_object = null;
        if( $row = $stmt->fetch() ) {
            $preReq_object = 
                new preRequisite(
                    $row['courseId'],
                    $row['preRequisiteCourseId']);
        }
        // STEP 5
        $stmt = null;
        $conn = null;
        // STEP 6
        return $preReq_object;
    }

}
?>
