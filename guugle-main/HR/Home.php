<?php
    include 'common.php';
    session_start();
    if($_SESSION['Role'] != 'HR'){
      header("location: ../../index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Welcome to LMS Admin</title>
</head>
<body>
  <!-- Section - Assign Engineers -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark nav fixed-top">
        <a href="../../index.html" class="navbar-brand"><img src="" style="width: 100px; height: auto;">LMS</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#hamburger">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="hamburger">
            <ul class="navbar-nav ml-auto">
                <!-- <li class="nav-item">
                    <a href="home.html" class="nav-link">Home</a>
                    
                </li> -->
             
               
                
                <li class="nav-item">
                  <a href= "./guugle-main/HR/Home.php"  class="nav-link">HR Portal</a>
                </li>
                
                <li class="nav-item">
                  <!-- LinkedIn Hidden Inputs -->
                  <form method='get' action='https://www.linkedin.com/oauth/v2/authorization' class="form-inline">
                    <input type='hidden' name='response_type' value = 'code'>
                    <input type='hidden' name='client_id' value = '868ixxuf9za2rx'>
                    <input type='hidden' name='redirect_uri' value = 'http://localhost/dataspm/server/helper/callback.php'>
                    <!-- <input type='hidden' name='state' value = 'DCEeFWf45A53sdfKef424'>  -->
                    <input type='hidden' name='scope' value = 'r_liteprofile,r_emailaddress'>

                    <button href="#" type='submit' class="nav-link" style="background-color: transparent; border: none; text-transform: uppercase; letter-spacing: .1rem;">Logged In</button>
                  </form>  
                </li>
            </ul>
        </div>
    </nav>
    <br>
    <br>
    <br>
  <h1 class="float-left">Assign engineers</h1>
  <?php
    $waitListDAO = new WaitlistDAO();
    $waitlists = $waitListDAO->getWaitlist();
  ?>
  <a href="./approveEngineer.php" class="float-right"><button type='button' class='btn btn-warning m-3'>Pending Task(<?php echo count($waitlists);?>)</button></a><br><br>
  <hr>
  <h4>Search by name or employee ID below: </h4>
  <label for="name">Name / Employee ID: </label>
  <input type="text" id="name">
  <a href="./createEngineer.php" class="float-right"><button type='button' class='btn btn-primary mx-2'>Add New Engineer</button></a>
    <table id="engineer-table" class="table table-dark m-2">
      <tr><th>Employee ID</th><th>Name</th><th>Category</th><th>phone No.</th><th>Date joined</th><th>Address</th></tr>
      <?php
        $EmpDAO = new EmployeeDAO();
        $employees = $EmpDAO->getAll();
        
        foreach($employees as $employee){
          echo "<tr><th>".$employee->_employeeId."</td><td>".$employee->_name."</td><td>learner</td><td>".$employee->_phoneNumber."</td><td>".$employee->_dateJoined."</td><td>".$employee->_address."</td>"."<td><button type='button' class='btn btn-danger mx-2' onclick='remove()'>Remove</button><button type='button' class='btn btn-success mx-2' onclick='edit(this)'>Edit</button><button type='button' class='btn btn-primary mx-2' onclick='assign(this)'>Assign</button></td></tr>";
        }
        
        ?>
    </table>
    <!-- End of Assign Engineers -->

    <!-- Section - Hidden From - Assign -->
    <div id="hidden-form-assign">
      <form action="assignProcess.php"  method="post" class="m-2">
        <div class="form-group">
          <label for="eId">Employee ID</label>
          <input type="text" id="assign-form-eid" name="employeeId" class="form-control" placeholder="Employee ID">
        </div>
        <div class="form-group">
          <label for="courseName">Name</label>
          <input type="text" id="assign-form-name" name="name" class="form-control" placeholder="Employee Name">
        </div>
        <div class="form-group">
          <label for="courseName">Course ID</label>
          <select name="courseId" id="courseId" class="form-control">
          <?php
            $courseDAO = new CourseDAO();
            $courses = $courseDAO->getAll();
        
            foreach($courses as $course){
              echo "<option value=$course->getCourseID()>".$course->courseId."</option>";
            }
        
          ?>
          </select>
        </div>
        <div class="form-group">
          <label for="courseID">Course Name</label>
          <select name="courseName" id="courseName" class="form-control">
          <?php
        
            foreach($courses as $course){
              echo "<option value=$course->getCourseName()>".$course->name."</option>";
            }
        
          ?>
          </select>
        </div>
        <div class="form-group">
          <label for="email">What do you assign as</label>
          <select name="category" id="category" class="form-control">
            <option value="trainer">Trainer/Senior</option>
            <option value="learner">Learner/Junior</option>
          </select>
        </div>
        <div class="form-group">
          <label for="classIdAssign">Which class are you assigning to</label>
          <select name="classIdAssign" class="form-control">
          <?php
            $classDAO = new ClassDAO();
            $classes = $classDAO->getAll();
        
            foreach($classes as $class){
              echo "<option value=$class->classId>".$class->classId."</option>";
            }
        
          ?>
            
          </select>
        </div>

        <button type="submit" class=" btn btn-primary">Assign Engineer to Course</button>
        <!--button type="button" class="btn btn-primary" id="btn-insert" onclick="insert()">Assign enginner to class</button-->
        
      </form>
      </div>
    <!--End of Assign Form-->

    
    <br>

    <h1>View Courses</h1>
    <hr>
    <h4>Search by Course name / ID: </h4>
    <label for="name">Course name / ID: </label>
    <input type="text" id="name">

    <table id="course-table" class="table table-striped m-2">
      <tr><th>Course ID</th><th>Course Name</th><th></th></tr>
      <?php
         $courseDAO2 = new CourseDAO();
         $courses2 = $courseDAO2->getAll();
       
        foreach($courses2 as $course){
          echo "<tr><th>".$course->courseId."</td><td>".$course->name."</td><td><button type='button' id='".$course->courseId."'"."class='btn btn-primary' onclick='viewCourse(this)'>View Details</button></td></tr>";
        }
        
      ?>
    </table>
    
    <form action="classDetails.php"  method="post">
    <table id="class-table" class="table table-striped m-2">
      <tr><th>Course ID</th><th>Class ID</th><th>Start Date</th><th>End Date</th><th>Trainer ID</th><th>Availability</th><th></th></tr>
      <?php
         $classDAO = new ClassDAO();
         $classes = $classDAO->getAll();
        $enrolDAO = new EnrollmentDAO();

        for($x=0; $x<count($classes);$x++){
          $currentSize = $enrolDAO->getNumberOfStudents($classes[$x]->classId);
          echo "<tr class=row".$classes[$x]->courseId."><th>".$classes[$x]->courseId."</td><td>".$classes[$x]->classId."</td><td>".$classes[$x]->startDate."</td><td>".$classes[$x]->endDate."</td><td>".$classes[$x]->trainerId."</td>"."</td><td>".$currentSize."/".$classes[$x]->classSize."</td><td><button type='submit' name='classId' value='".$classes[$x]->classId."'"."class='btn btn-primary'>View Details</button></td></tr>";
        }
        
        
        ?>
    </table>
    </form>
    <script>
     
    //document.getElementById("btn-insert").addEventListener("click", insert());
    document.getElementById("hidden-form-assign").style.display = "none";
    document.getElementById("class-table").style.display = "none";
    var Id_container="";
    var name_container="";
    var learnerList =[];
    var trainerList =[];
    var popMsg="";

    function assign(e){
        if(confirm("Are you sure assiging this engieer?")){
          Id_container=e.parentNode.parentNode.children.item(0).innerText;
          name_container=e.parentNode.parentNode.children.item(1).innerText;
          const id = document.getElementById("assign-form-eid");
          const name = document.getElementById("assign-form-name");
          id.value = Id_container;
          name.value = name_container;
          document.getElementById("hidden-form-assign").style.display = "block";
        }else{
          document.getElementById("hidden-form-assign").style.display = "none";
        }
    }

    function remove(){
      if(confirm("Are you sure removing this engieer? This will remove the engineer from the LMS permanently")){
        window.location.replace("removeEngineer.php");
        }else{
        
        }
    }

    function edit(e){
      if(confirm("Are you sure editing this engieer?")){
        window.location.replace("editEngineer.php");
        }else{
        
        }
    }

    function viewCourse(e){
      //jQuery("tr.row1").show();
      const table = document.getElementById("class-table");
      table.style.display="block";
      const crsId = e.parentNode.parentNode.children.item(0).innerText;
      const query = "row"+crsId;
      if(crsId=="1"){
        jQuery("tr.row1").show();
        jQuery("tr.row2").hide();
      }else{
        jQuery("tr.row1").hide();
        jQuery("tr.row2").show();
      }
      window.scrollBy(0, 300);
    }

    function insert(){
      const name = document.getElementById("assign-form-name").value;
      const classId = document.getElementById("classId").value;
      const cat = document.getElementById("category").value;
      const course = document.getElementById("course").value;
      const pop_button = document.getElementById(classId);
      if(cat=="trainer"){
        trainerList.push(name);
      }else{
        learnerList.push(name);
      }
      //const pop_button = document.getElementById();
      popMsg="";
      if(confirm("Are you sure assigning "+ name+" to "+course+" "+classId+"?")){
          popMsg += "Trainer: "+trainerList.join(" , ");
          popMsg += "<br>Learner: "+learnerList.join(" , ");
          pop_button.setAttribute("data-content", popMsg);
        }
     
    }

    </script>
      
     

   

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>