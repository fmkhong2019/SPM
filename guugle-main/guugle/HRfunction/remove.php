<?php
    include 'connection.php';

    $id = $_GET['id'];
    $name = $_GET['name'];
    $adminPw = $_GET['pw'];

    if($adminPw=="123"){
        $sql = "DELETE FROM employee WHERE employeeId=$id";
        if ($conn->query($sql) === TRUE) {
            echo "Record deleted successfully";
          } else {
            echo "Error deleting record: " . $conn->error;
          }
          
    }else{
        echo "Access denied";
    }
    
?>