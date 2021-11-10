<?php
    include 'common.php';

    $courseId = $_GET['courseId'];
    $name = $_GET['name'];
    $date = $_GET['date'];
    
    $CourseDAO = new CourseDAO();
    if($CourseDAO->updateSelfEnrollPeriod($courseId, $date)){
      echo "Successfully Updated";
    }else{
      echo "Failed Process";
    }
    //$newURL = "home.php";
    //header('Location: '.$newURL);
?>