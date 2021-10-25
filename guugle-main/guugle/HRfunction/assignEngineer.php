<?php
    include 'connection.php'
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
  <h1>Assign engineers</h1>
  <hr>
  <h4>Search by name or employee ID below: </h4>
  <label for="name">Name / Employee ID: </label>
  <input type="text" id="name">
  <a href="./createEngineer.php" class="float-right"><button type='button' class='btn btn-primary mx-2'>Add New Engineer</button></a>
    <table id="engineer-table" class="table table-dark m-2">
      <tr><th>Employee ID</th><th>Name</th><th>Category</th><th>phone No.</th><th>Date joined</th><th>Address</th></tr>
      <?php
        $sql = "SELECT employeeId, name, phoneNumber, dateJoined, address FROM employee";
        $result = $conn->query($sql);
        
        if($result->num_rows>0){
            while($row=$result->fetch_assoc()){
                echo "<tr><th>".$row["employeeId"]."</td><td>".$row["name"]."</td><td>learner</td><td>".$row["phoneNumber"]."</td><td>".$row["dateJoined"]."</td><td>".$row["address"]."</td>"."<td><button type='button' class='btn btn-danger mx-2' onclick='remove()'>Remove</button><button type='button' class='btn btn-success mx-2' onclick='edit(this)'>Edit</button><button type='button' class='btn btn-primary mx-2' onclick='assign(this)'>Assign</button></td></tr>";
            }
        }else{
            echo "0 result";
        }
        ?>
    </table>
    <!-- End of Assign Engineers -->

    <!-- Section - Hidden From - Assign -->
    <div id="hidden-form-assign">
      <form class="m-2">
      <div class="form-group">
          <label for="eId">Employee ID</label>
          <input type="text" id="assign-form-eid" class="form-control" placeholder="Employee ID">
        </div>
        <div class="form-group">
          <label for="courseName">Name</label>
          <input type="text" id="assign-form-name" class="form-control" placeholder="Employee Name">
        </div>
        <div class="form-group">
          <label for="courseID">Course Name</label>
          <select name="course" id="course" class="form-control">
            <option selected value="Fundamentals of Xerox">Fundamentals of Xerox</option>
            <option value="Programming for Xerox WorkCenter">Programming for Xerox WorkCenter</option>
            <option value="course3">...</option>
            <option value="course4">...</option>
          </select>
        </div>
        <div class="form-group">
          <label for="courseName">Class ID</label>
          <input type="text" id="classId" class="form-control" placeholder="101, 102, 103">
        </div>
        <div class="form-group">
          <label for="email">What do you assign as</label>
          <select name="category" id="category" class="form-control">
            <option value="trainer">Trainer/Senior</option>
            <option value="learner">Learner/Junior</option>
          </select>
        </div>
        <button type="button" class="btn btn-primary" id="btn-insert" onclick="insert()">Assign enginner to class</button>
      </form>
    </div>
    <!--End of Assign Form-->

    
    <br>

    <h1>View Class</h1>
    <hr>
    <h4>Search by Course name / ID: </h4>
  <label for="name">Course name / ID: </label>
  <input type="text" id="name">

    <table id="engineer-table" class="table table-striped m-2">
      <tr><th>Course Name</th><th>Class ID</th><th>Start Date</th><th>End Date</th><th>Trainer</th><th>classSize</th><th></th></tr>
      <?php
        $sql = "SELECT classId, courseName,startDate, endDate, trainerId, classSize FROM class";
        $result = $conn->query($sql);
        
        if($result->num_rows>0){
            while($row=$result->fetch_assoc()){
                echo "<tr><th>".$row["courseName"]."</td><td>".$row["classId"]."</td><td>".$row["startDate"]."</td><td>".$row["endDate"]."</td><td>".$row["trainerId"]."</td>"."</td><td>".$row["classSize"]."</td><td><button type='button' id='".$row["classId"]."'"."class='btn btn-primary' data-toggle='popover' data-placement='top' title='Registered Engineers' data-content='name1, name2, name3, name4, name5, name6, name7,name8...'>View registered engineers</button></td></tr>";
            }
        }else{
            echo "0 result";
        }
        ?>
    </table>
    
    <script>
     
    //document.getElementById("btn-insert").addEventListener("click", insert());
    document.getElementById("hidden-form-assign").style.display = "none";
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
        
        }else{
        
        }
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

    $(document).ready(function(){
      $('[data-toggle="popover"]').popover({html: true});   
    });
    </script>
      
     

   

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>