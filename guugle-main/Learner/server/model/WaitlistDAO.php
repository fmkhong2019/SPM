<?php 
/*  SQL operations */ 

require_once 'ConnectionManager.php';
include 'Waitlist.php';

class WaitlistDAO {

    //     // Pull User Info
    // Takes $id and returns info 
    #returns null if there is nothing to retrieve
    #Retrieve / get
    public function getWaitlist() {
        $conn = new ConnectionManager();
        $pdo = $conn->getConnection();

        $sql = "SELECT * FROM waitlist";

        $stmt = $pdo->prepare($sql);
        
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        
        $result = [];
        // $post_object = null;
        while( $row = $stmt->fetch() ) {
            $result[] = 
                new Classes(
                    $row['courseId'],
                    $row['classId'],
                    $row['employeeId'],
                );
        
        }
        $stmt = null;
        $pdo = null;

        return $result;

    }

    public function addWaitlist($courseId, $classId, $employeeId) {
        // STEP 1
        $connMgr = new ConnectionManager();
        $conn = $connMgr->getConnection();

        // STEP 2
        $sql = "INSERT into waitlist (courseId, classId, employeeId) values (:courseId, :classId, :employeeId)";
        $stmt = $conn->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->bindParam(':courseId', $courseId, PDO::PARAM_INT);
        $stmt->bindParam(':classId', $classId, PDO::PARAM_INT);
        $stmt->bindParam(':employeeId', $employeeId, PDO::PARAM_INT);

        // STEP 3
        $stmt->execute();

        // STEP 5
        $stmt = null;
        $conn = null;

        // STEP 6
        return true;

        $conn = new ConnectionManager();
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
    }
}
?>