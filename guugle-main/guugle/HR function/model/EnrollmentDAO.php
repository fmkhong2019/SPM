<?php 
/*  SQL operations */ 

require_once 'common.php';

class EnrollmentDAO {

    //     // Pull User Info
    // Takes $id and returns info 
    #returns null if there is nothing to retrieve
    #Retrieve / get
    public function getClass($engineerid) {

        $connMgr = new ConnectionManager();
        $conn = $connMgr->connect();
        $sql = "SELECT * FROM enrollment  where `engineerId` = :engineerId ";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':engineerId', $engineerid, PDO::PARAM_STR);
        
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        
        $result = [];
        // $post_object = null;
        while( $row = $stmt->fetch() ) {
            $result[] = 
                new Enrollment(
                    $row['engineerId'],
                    $row['classId'],
                    $row['completedDate'],
                    $row['completed'],
                    $row['enrolledDate'],
                    $row['progress']
                );
        
        }
        $stmt = null;
        $pdo = null;

        return $result;
 

    }

    public function addEmployee($engineerId, $classId, $completed, $enrolledDate, $completedDate, $progress){
        $connMgr = new ConnectionManager();
        $conn = $connMgr->connect();
        
        $sql = "INSERT INTO enrollment
        (
            engineerId, 
            classId, 
            completed,
            enrolledDate,
            completedDate, 
            progress
        )
        VALUES
        (
            :engineerId,
            :classId,
            :completed,
            :enrolledDate,
            :completedDate,
            :progress
        )";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':engineerId', $engineerId, PDO::PARAM_INT);
        $stmt->bindParam(':classId', $classId, PDO::PARAM_INT);
        $stmt->bindParam(':completed', $completed, PDO::PARAM_INT);
        $stmt->bindParam(':enrolledDate', $enrolledDate, PDO::PARAM_STR);
        $stmt->bindParam(':completedDate', $completedDate, PDO::PARAM_STR);
        $stmt->bindParam(':progress', $progress, PDO::PARAM_STR);

        $status = $stmt->execute();
        
        
        $stmt = null;
        $conn = null;

        return $status;
    }

    public function getProgress($engineerid, $classid) {
        $conn = new ConnectionManager();
        $pdo = $conn->getConnection();
        $sql = "SELECT * FROM enrollment  where `engineerId` = :engineerId AND `classId` = :classId ";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':engineerId', $engineerid, PDO::PARAM_STR);
        $stmt->bindParam(':classId', $classid, PDO::PARAM_STR);
        
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        
        $result = [];
        // $post_object = null;
        if( $row = $stmt->fetch() ) {
            $result[] = 
                new Enrollment(
                    $row['engineerId'],
                    $row['classId'],
                    $row['completedDate'],
                    $row['completed'],
                    $row['enrolledDate'],
                    $row['progress']
                    
                );
        
        }
        $stmt = null;
        $pdo = null;

        return $result;
 

    }

    public function getNumberOfStudents($id) {
        // STEP 1
        $connMgr = new ConnectionManager();
        $conn = $connMgr->connect();

        // STEP 2
        $sql = "SELECT COUNT(engineerId) FROM enrollment WHERE classId = :classId";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':classId', $id, PDO::PARAM_INT);

        //STEP 3
        $status = $stmt->execute();
        $count = $stmt->fetchColumn();
        
        // STEP 4
        $stmt = null;
        $conn = null;

        // STEP 5
        return $count;
    }

    public function getEnrollments($classId) {
        // STEP 1
        $connMgr = new ConnectionManager();
        $conn = $connMgr->connect();

        // STEP 2
        $sql = "SELECT
                   *
                FROM enrollment
                WHERE classId = :cid"; 
        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':cid', $classId, PDO::PARAM_INT);

        // STEP 3
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        // STEP 4
        $enrollments = []; 
        while( $row = $stmt->fetch() ) {
            $enrollments[] =
                new Enrollment(
                    $row['engineerId'],
                    $row['classId'],
                    $row['completedDate'],
                    $row['completed'],
                    $row['enrolledDate'],
                    $row['progress']
                );
        }

        // STEP 5
        $stmt = null;
        $conn = null;

        // STEP 6
        return $enrollments;
    }
// ALL BELOW ARE FROM PAST PROJECT , USE AS REFERENCE
//     public function checkUser($id) {

//         $conn = new ConnectionManager();
//         $pdo = $conn->getConnection();
//         $sql = "
//             SELECT *
//             FROM users
//             WHERE id= :id";
        
//         $stmt = $pdo->prepare($sql);
//         $stmt->bindParam(':id', $id, PDO::PARAM_STR);
//         $stmt->execute();
//         $stmt->setFetchMode(PDO::FETCH_ASSOC);
//         if ($stmt->fetch()){
            
//             $stmt = null;
//             $pdo = null;
//             return true;
//         }

//         return false;
//     }

//     // Checks if user completes profile completion page 
//     public function checkCompletion($id) {

//         $conn = new ConnectionManager();
//         $pdo = $conn->getConnection();
//         $sql = "
//             SELECT *
//             FROM users
//             WHERE id = :id and specialization IS NOT NULL";
        
//         $stmt = $pdo->prepare($sql);
//         $stmt->bindParam(':id', $id, PDO::PARAM_STR);
//         $stmt->execute();
//         $stmt->setFetchMode(PDO::FETCH_ASSOC);
//         if ($stmt->fetch()){
            
//             $stmt = null;
//             $pdo = null;
//             return true;
//         }

//         return false;
//     }

//     public function getName($id) {

//         $conn = new ConnectionManager();
//         $pdo = $conn->getConnection();
//         $sql = "
//             SELECT fname
//             FROM users
//             WHERE id= :id";
        
//         $stmt = $pdo->prepare($sql);
//         $stmt->bindParam(':id', $id, PDO::PARAM_STR);
//         $stmt->execute();
//         $stmt->setFetchMode(PDO::FETCH_ASSOC);
//         if ($row = $stmt->fetch()){
//             $result = $row["fname"];
//             $stmt = null;
//             $pdo = null;
//             return $result;
//         }

//         return false;
//     }




//     //Add User, should use User instance to add values instead, omitted for brevity
//     public function addUser($id, $dname, $fname, $lname, $email, $photoURL) {

//         $conn = new ConnectionManager();
//         $pdo = $conn->getConnection();
        
//         $sql = "insert into users (id, dname, fName, lName, email, photoURL) values (:id, :dname, :fname, :lname, :email, :photoURL )";
//         $stmt = $pdo->prepare($sql);
//         $stmt->setFetchMode(PDO::FETCH_ASSOC);
//         $stmt->bindParam(':id', $id, PDO::PARAM_STR);
//         $stmt->bindParam(':dname', $dname, PDO::PARAM_STR);
//         $stmt->bindParam(':fname', $fname, PDO::PARAM_STR);
//         $stmt->bindParam(':lname', $lname, PDO::PARAM_STR);
//         $stmt->bindParam(':email', $email, PDO::PARAM_STR);
//         $stmt->bindParam(':photoURL', $photoURL, PDO::PARAM_STR);
        
//         if (!$stmt->execute())
//         {
//             return false;
    
//         }
//         $stmt = null;
//         $pdo = null;

//         return true;
//     }


//     public function updateUser($id, $job, $company, $industry, $specialization){ 
//         $conn = new ConnectionManager();  
//         $pdo = $conn->getConnection();

//         // $sql = "INSERT INTO `users` (`id`, `fname`, `lname`, `job`, `company`, `industry`, `specialization`) VALUES (:id, :fname, :lname, :job, :company, :industry, :specialization)";
        
//         $sql = "UPDATE `users` SET `job` = :job, `industry` = :industry, `company` = :company, `specialization` = :specialization WHERE `id` = :id";

//         $stmt = $pdo->prepare($sql);
//         $stmt->bindParam(':id', $id, PDO::PARAM_STR);
//         $stmt->bindParam(':job', $job, PDO::PARAM_STR);
//         $stmt->bindParam(':company', $company, PDO::PARAM_STR);
//         $stmt->bindParam(':industry', $industry, PDO::PARAM_STR);
//         $stmt->bindParam(':specialization', $specialization, PDO::PARAM_STR);
//         // $stmt->bindParam(':fname', $fname, PDO::PARAM_STR);
//         // $stmt->bindParam(':lname', $lname, PDO::PARAM_STR);

//         $isOk = $stmt->execute();
//         $stmt = null;
//         $pdo = null;
//         return $isOk;
//     }


}   

?>

<?php
 //$hi = new EnrollmentDAO();
 //$hi->addEmployee('3', '101', '1', '2021-10-06', '2021-10-08', '100');
?>