<?php
    include 'common.php';

    $id = $_GET['id'];
    $name = $_GET['name'];
    $adminPw = $_GET['pw'];
    
    $EmpDAO = new EmployeeDAO();
    $RoleDAO = new RoleDAO();

    if($adminPw=="123"){
      $EmpDAO->deleteEmployee($id);
      $RoleDAO->deleteRole($id);
      $newURL = "home.php";
      header('Location: '.$newURL);
    }else{
        echo "Access denied";
    }
    
?>