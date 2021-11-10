<?php
    include 'common.php';

    $enrolDAO = new EnrollmentDAO();
    $waitlistDAO = new WaitlistDAO();

    $lists = $_POST['lists'];
    

    if ($_POST['action'] == 'approve') {
        //action for update here
        foreach($lists as $list){
            $arr = explode(" ",$list);
            $courseId = $arr[0];
            $classId = $arr[1];
            $empId = $arr[2];
            $timestamp = date("Y/m/d");
            if($enrolDAO->addEmployee($empId, $classId, '0', $timestamp, null, '0')){
                echo "Successfully approved";
            };
        }
    } else if ($_POST['action'] == 'reject') {
        //action for delete
        foreach($lists as $list){
            $arr = explode(" ",$list);
            $courseId = $arr[0];
            $classId = $arr[1];
            $empId = $arr[2];
            if($waitlistDAO->deleteWaitlist($courseId, $empId)){
                echo "Successfully rejected";
            };
        }
    }
    

    //$EmpDAO = new EmployeeDAO();
    //$EmpDAO->updateEmployee($id, $name, $phone, $date, $address);
    //$newURL = "home.php";
    //header('Location: '.$newURL);
?>