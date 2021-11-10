<?php 
/*  SQL operations */ 

require_once 'common.php';

class RoleDAO {

    //     // Pull User Info
    // Takes $id and returns info 
    #returns null if there is nothing to retrieve
    #Retrieve / get
    public function getRole() {
        $connMgr = new ConnectionManager();
        $conn = $connMgr->connect();

        $sql = "SELECT * FROM role";

        $stmt = $conn->prepare($sql);
        
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        
        $result = [];
        // $post_object = null;
        while( $row = $stmt->fetch() ) {
            $result[] = 
                new Role(
                    $row['employeeId'],
                    $row['role']
                );
        
        }
        $stmt = null;
        $pdo = null;

        return $result;

    }

    public function addRole($employeeId, $role) {
        // STEP 1
        $connMgr = new ConnectionManager();
        $conn = $connMgr->connect();

        // STEP 2
        $sql = "INSERT into role (employeeId, role) values (:employeeId, :role)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':employeeId', $employeeId, PDO::PARAM_INT);
        $stmt->bindParam(':role', $role, PDO::PARAM_STR);

        // STEP 3
        
        $status = $stmt->execute();
            
            
        $stmt = null;
        $conn = null;
    
        return $status;
        // STEP 5
    }
        
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
    

    public function updateRole($employeeId, $role){
        $connMgr = new ConnectionManager();
        $conn = $connMgr->connect();
        
        $sql = "UPDATE 
            role 
        SET 
            role = :role
        WHERE 
            employeeID=:id";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $employeeId, PDO::PARAM_INT);
        $stmt->bindParam(':role', $role, PDO::PARAM_STR);

        //STEP 3
        $status = $stmt->execute();

        // STEP 4
        $stmt = null;
        $conn = null;

        // STEP 5
        return $status;
        }
    public function deleteRole($id){
            $connMgr = new ConnectionManager();
            $conn = $connMgr->connect();
            
            $sql = "DELETE FROM role WHERE employeeId=:id";
    
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            
            // STEP 4
            $status = $stmt->execute();
            
            
            $stmt = null;
            $conn = null;
    
            return $status;
    }
}

    
?>