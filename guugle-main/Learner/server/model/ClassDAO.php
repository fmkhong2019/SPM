<?php 
/*  SQL operations */ 

require_once 'ConnectionManager.php';
include 'Class.php';

class ClassDAO {

    //     // Pull User Info
    // Takes $id and returns info 
    #returns null if there is nothing to retrieve
    #Retrieve / get
    public function getClasses($classid) {
        $conn = new ConnectionManager();
        $pdo = $conn->getConnection();

        $sql = "SELECT * FROM class WHERE `classId` = :classId ";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':classId', $classid, PDO::PARAM_STR);
        
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        
        $result = [];
        // $post_object = null;
        while( $row = $stmt->fetch() ) {
            $result[] = 
                new Classes(
                    $row['courseId'],
                    $row['classId'],
                    $row['startDate'],
                    $row['endDate'],
                    $row['trainerId'],
                    $row['classSize']
                );
        
        }
        $stmt = null;
        $pdo = null;

        return $result;
 

    }
    public function getCoursesByTrainerId($trainerid) {
        // STEP 1
        $connMgr = new ConnectionManager();
        $conn = $connMgr->getConnection();

        // STEP 2
        $sql = "SELECT * FROM class WHERE `trainerId` = :id ";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $trainerid, PDO::PARAM_INT);

        // STEP 3
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        $classes = []; // Indexed Array of Post objects
        while( $row = $stmt->fetch() ) {
            $classes[] =
                new Classes(
                    $row['courseId'],
                    $row['classId'],
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

    public function getAllClasses($courseId) {
        // STEP 1
        $connMgr = new ConnectionManager();
        $conn = $connMgr->getConnection();

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
                    $row['courseId'],
                    $row['classId'],
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