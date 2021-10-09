<?php 
/*  SQL operations */ 

require_once 'ConnectionManager.php';
include 'Section.php';

class SectionDAO {


//     // Pull section Info
    // Takes $id and returns info 
    #returns null if there is nothing to retrieve
    #Retrieve / get
    public function getSection($classid) {
        $conn = new ConnectionManager();
        $pdo = $conn->getConnection();

        $sql = "SELECT * FROM section where `classId` = :classId ";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':classId', $classid, PDO::PARAM_STR);
        #$stmt->bindParam(':courseid', $courseid, PDO::PARAM_STR);

        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        $result = [];
        while( $row = $stmt->fetch() ) {
            $result[] = 
                new Section(
                    $row['sectionId'], #must be the field of database
                    $row['classId'],
                    $row['name'],
                    $row['description'],
                );
        
        }
        $stmt = null;
        $pdo = null;

        return $result;


    }
}   

?>