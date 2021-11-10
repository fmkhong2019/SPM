<?php

require_once "server/model/EmployeeDAO.php";
require_once "server/model/ConnectionManager.php";
require_once "server/model/Employee.php";



class EmployeeView {
    public function getEmployees() {
        $dao = new EmployeeDAO();
        $employees = $dao->getAll();
        $result = array("employees" => array() );
    
        foreach ($employees as $employee) {
            $employeeId = $employee->getId();
            

            $result["employees"][] = array(
                "employeeId" => $employeeId,
                "employeeName" => $employee->getName(),
                "designation" => $employee->getDesignation(),
                "dept" => $employee->getDept(),
                "username" => $employee->getUsername(),
                "phoneNumber" => $employee->getPhoneNumber(),
                "dateJoined" => $employee->getDateJoined(),
                "address" => $employee->getAddress()
                
            );

        }

        return $result;
    }

    public function getEmployee($employeeId) {
        $dao = new EmployeeDAO();
        $employee = $dao->findById($employeeId);
    
        

        return $employee;
    }

    public function deleteEmployee($employeeId){
        $dao = new EmployeeDAO();
        $status = $dao->deleteEmployee($employeeId);

        return $status;
    }

    public function updateEmployee($employeeId, $name, $designation, $dept, $username, $phoneNumber, $dateJoined, $address) {
        $dao = new EmployeeDAO();
        $status = $dao->updateEmployee($employeeId, $name, $designation, $dept, $username, $phoneNumber, $dateJoined, $address);
        return $status;
        
    }

    public function addEmployee($employeeId, $name, $designation, $dept, $username, $phoneNumber, $dateJoined, $address, $pw){
        $dao = new EmployeeDAO();
        $status = $dao->addEmployee($employeeId, $name, $designation, $dept, $username, $phoneNumber, $dateJoined, $address, $pw);
        return $status;
    }
}

//$test = new EmployeeView();
//$test->getEmployees();
?>