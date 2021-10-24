<?php
    include 'common.php';

    $classId = $_POST['classId'];
    $classDAO = new classDAO();
    $courseDAO = new courseDAO();
    $employeeDAO = new employeeDAO();
    $enrolDAO = new EnrollmentDAO();
    $class_obj = $classDAO->getClassbyClassId($classId);
    $course = $courseDAO->getCourse($class_obj->courseId);
    $courseName = $course->getCourseName();
    $trainer = $employeeDAO->findById($class_obj->trainerId);
    $enrollments = $enrolDAO->getEnrollments($classId);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Class Details</title>
</head>
<body>
  <!-- add or modify code as necessary -->
  <h1 class=mx-2>Class Details for <?php echo $classId?></h1>
  <h3 class=mx-2>Under the Course: <?php echo $courseName?> (Course Id:<?php echo $class_obj->courseId?>)</h3>
  <br>
  <label for="trainer" class=mx-2><b>Trainer Details:</b></label>
  <table class="table table-striped m-2">
      <tr><th>Trainer ID</th><th>Trainer Name</th><th>Trainer Phone</th><th>Trainer Address</th></tr>
      <tr><td><?php echo $class_obj->trainerId?></td><td><?php echo $trainer->_name?></td><td><?php echo $trainer->_phoneNumber?></td><td><?php echo $trainer->_address?></td></tr>
  </table>
  <br>
  <label for="leaners" class=mx-2><b>Learner Deatils:</b></label>
  <?php
    //echo "<button type='button' class='btn btn-primary mx-2 float-right' onclick='assign(this)'>Add New Learners</button>";
  ?>
  <table class="table table-striped m-2">
      <tr><th>Learner ID</th><th>Learner Name</th><th>Learner Phone</th><th>Learner Address</th></tr>
      <?php
        foreach($enrollments as $enrollment){
          $eid = $enrollment->getengineerid();
          $emp = $employeeDAO->findById($eid);
          echo "<tr><td>$emp->_employeeId</td><td>$emp->_name</td><td>$emp->_phoneNumber</td><td>$emp->_address</td></tr>";
        }
      ?> 
  </table>
  

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>