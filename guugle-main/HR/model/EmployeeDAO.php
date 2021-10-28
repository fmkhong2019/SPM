<?php

require_once 'common.php';

    class EmployeeDAO{

        public function getAll() {
            // STEP 1
            $connMgr = new ConnectionManager();
            $conn = $connMgr->connect();
    
            // STEP 2
            $sql = "SELECT
                        employeeId, name, phoneNumber, dateJoined, address
                    FROM employee"; 
            $stmt = $conn->prepare($sql);
    
            // STEP 3
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
    
            // STEP 4
            $employees = []; 
            while( $row = $stmt->fetch() ) {
                $employees[] =
                    new Employee(
                        $row['employeeId'],
                        $row['name'],
                        $row['phoneNumber'],
                        $row['dateJoined'],
                        $row['address']
                    );
            }
    
            // STEP 5
            $stmt = null;
            $conn = null;
    
            // STEP 6
            return $employees;
        }

        public function addEmployee($employeeId, $name, $phoneNumber, $dateJoined, $address, $pw){
            $connMgr = new ConnectionManager();
            $conn = $connMgr->connect();
            
            $sql = "INSERT INTO employee
            (
                employeeId,
                name, 
                phoneNumber, 
                dateJoined, 
                address,
                password
            )
            VALUES
            (   
                :employeeId,
                :name,
                :phoneNumber,
                :dateJoined,
                :address,
                :password
            )";

            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':employeeId', $employeeId, PDO::PARAM_INT);
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':phoneNumber', $phoneNumber, PDO::PARAM_INT);
            $stmt->bindParam(':dateJoined', $dateJoined, PDO::PARAM_STR);
            $stmt->bindParam(':address', $address, PDO::PARAM_STR);
            $stmt->bindParam(':password', $pw, PDO::PARAM_STR);

            $status = $stmt->execute();
            
            
            $stmt = null;
            $conn = null;
    
            return $status;
        }
        
        public function updateEmployee($id, $name, $phoneNumber, $dateJoined, $address){
            $connMgr = new ConnectionManager();
            $conn = $connMgr->connect();
   
            $sql = "UPDATE 
                        employee 
                    SET 
                        name=:name, 
                        phoneNumber=:phoneNumber, 
                        dateJoined=:dateJoined, 
                        address=:address
                    WHERE 
                        employeeID=:id";
            
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':phoneNumber', $phoneNumber, PDO::PARAM_INT);
            $stmt->bindParam(':dateJoined', $dateJoined, PDO::PARAM_STR);
            $stmt->bindParam(':address', $address, PDO::PARAM_STR);
    
            //STEP 3
            $status = $stmt->execute();
            
            // STEP 4
            $stmt = null;
            $conn = null;
    
            // STEP 5
            return $status;
        }
        
        public function deleteEmployee($id){
            $connMgr = new ConnectionManager();
            $conn = $connMgr->connect();
            
            $sql = "DELETE FROM employee WHERE employeeId=:id";
    
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            
            // STEP 4
            $status = $stmt->execute();
            
            
            $stmt = null;
            $conn = null;
    
            return $status;
        }
        
        public function findById($id){
            $connMgr = new ConnectionManager();
            $conn = $connMgr->connect();

            $sql = "SELECT
                    employeeId, name, phoneNumber, dateJoined, address FROM employee
                    WHERE employeeId = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);

             // STEP 3
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);

            // STEP 4
            $employee_object = null;
            if( $row = $stmt->fetch() ) {
                $employee_object = 
                    new Employee(
                        $row['employeeId'],
                        $row['name'],
                        $row['phoneNumber'],
                        $row['dateJoined'],
                        $row['address']);
            }

            // STEP 5
            $stmt = null;
            $conn = null;

            // STEP 6
            return $employee_object;
        }
    
        public function findByName($name){
            $connMgr = new ConnectionManager();
            $conn = $connMgr->connect();

            $sql = "SELECT employeeId, name, phoneNumber, dateJoined, address FROM employee WHERE name = :name";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
    
            $employee_object = null;
            if( $row = $stmt->fetch() ) {
                $employee_object = 
                    new Employee(
                        $row['employeeId'],
                        $row['name'],
                        $row['phoneNumber'],
                        $row['dateJoined'],
                        $row['address']);
            }

            // STEP 5
            $stmt = null;
            $conn = null;

            // STEP 6
            return $employee_object;
        }

        
    }

    //$dao = new EmployeeDAO();
    //var_dump($dao->updateEmployee(6, "Jonathan", 12348765, "2021-06-18", "Tanjong Pagar" ));
    //public function findByName($id);
    //public function findByAll($id);
    //$emp1 = new Employee(6,"Johnathan", 12345678, "2021-06-18", "Tanjong Pagar");
    //insertEmployee($emp1);
    //updateEmployee($emp1);
    //deleteEmployee(6)
    //findById(1);
    //findByName("Johnathan");
?>
