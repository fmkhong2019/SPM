<?php
include 'connection.php';
include 'Employee.php';
    class employeeDAO{
        function insertEmployee(Employee $employee){
            global $conn;
            $id = $employee->_employeeId;
            $name = $employee->_name;
            $phoneNumber = $employee->_phoneNumber;
            $dateJoined = $employee->_dateJoined;
            $address = $employee->_address;
    
            
            $sql = "INSERT INTO employee (employeeId, name, phoneNumber, dateJoined, address) 
            VALUES ('$id', '$name', '$phoneNumber', '$dateJoined', '$address')";
            
            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
    
        }
        
        function updateEmployee(Employee $employee){
            global $conn;
            $id = $employee->_employeeId;
            $name = $employee->_name;
            $phoneNumber = $employee->_phoneNumber;
            $dateJoined = $employee->_dateJoined;
            $address = $employee->_address;
    
            
            $sql = "UPDATE employee SET name='$name', phoneNumber='$phoneNumber', dateJoined='$dateJoined', address='$address'
            WHERE employeeID='$id'";
            
            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
    
        }
        
        function deleteEmployee($id){
            global $conn;
            $sql = "DELETE FROM employee WHERE employeeId='$id'";
    
            if ($conn->query($sql) === TRUE) {
                echo "Record deleted successfully";
            } else {
                echo "Error deleting record: " . $conn->error;
            }
        }
        
        function findById($id){
            global $conn;
            $sql = "SELECT employeeId, name, phoneNumber, dateJoined, address FROM employee WHERE employeeId='$id'";
            $result = $conn->query($sql);
    
            if ($result->num_rows > 0) {
                // output data of each row
                $row = $result->fetch_assoc();
                $eid = $row["employeeId"];
                $name = $row["name"];
                $phoneNumber = $row["phoneNumber"];
                $dateJoined = $row["dateJoined"];
                $address = $row["address"];
                $emp_return = new Employee($eid, $name, $phoneNumber, $dateJoined, $address);
                var_dump($emp_return);
                return $emp_return;
            }else {
                echo "0 results";
            }
        }
    
        function findByName($name){
            global $conn;
            $sql = "SELECT employeeId, name, phoneNumber, dateJoined, address FROM employee WHERE name='$name'";
            $result = $conn->query($sql);
    
            if ($result->num_rows > 0) {
                // output data of each row
                $row = $result->fetch_assoc();
                $eid = $row["employeeId"];
                $name = $row["name"];
                $phoneNumber = $row["phoneNumber"];
                $dateJoined = $row["dateJoined"];
                $address = $row["address"];
                $emp_return = new Employee($eid, $name, $phoneNumber, $dateJoined, $address);
                var_dump($emp_return);
                return $emp_return;
            }else {
                echo "0 results";
            }
        }
    }
    
    //public function findByName($id);
    //public function findByAll($id);
    //$emp1 = new Employee(6,"Johnathan", 12345678, "2021-06-18", "Tanjong Pagar");
    //insertEmployee($emp1);
    //updateEmployee($emp1);
    //deleteEmployee(6)
    //findById(1);
    //findByName("Johnathan");
?>
