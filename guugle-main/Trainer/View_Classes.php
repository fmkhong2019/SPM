<!DOCTYPE html>
<?php
session_start();
$courseId=$_GET["id"];
$prereqId = $_GET["prereqid"];
//$employeeId = $_SESSION["id"];
$employeeId = 1;
$_SESSION['employeeid'] = $employeeId;
$_SESSION['prereqid'] = $prereqId;
$_SESSION['courseId']=$courseId;
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" shrink-to-fit="no">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <title>User</title>
    <link rel="stylesheet" href="style.css">
   
</head>
<style>
   
    .card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
}

.title {
  color: grey;
  font-size: 18px;
}

#enroll {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}



button:hover, a:hover {
  opacity: 0.7;
}
</style>
<body>
 <nav class="navbar navbar-expand-lg navbar-dark bg-dark nav fixed-top">
        <a href="index.html" class="navbar-brand"><img src="" style="width: 100px; height: auto;">LMS</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#hamburger">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="hamburger">
            <ul class="navbar-nav ml-auto">
                <!-- <li class="nav-item">
                    <a href="home.html" class="nav-link">Home</a>
                    
                </li> -->
             
                <li class="nav-item">
                    <a href="#interviewers" class="nav-link">Assign Engineer</a>
                </li>
                <li class="nav-item">
                    <a href="./guugle-main/guugle/main_page/View_Courses.php" class="nav-link" style="color:yellow;">View Courses</a>
                </li>
                <li class="nav-item">
                  <a href="" class="nav-link">View Enrollment</a>
                </li>
                <li class="nav-item">
                  <a href="#reviews" class="nav-link">Reviews</a>
                </li>
                <li class="nav-item">
                  <a href="#faq" class="nav-link">FAQ</a>
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
<div class="container">
<h2 style="margin-top:12%;">Available Classes</h2> 
    <div class="row" style="margin-top:10%;margin-left:10%;" id='main' >
    
</div>
</div>

<div class="container" id='prereq'>
</div>
<input type="hidden" id="classId" name="postId" value="">
<input type='hidden' id="completed">
<input type='hidden' id="enrolled">
<div class="modal fade" id="enrolModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Request for Enrollment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Click on Confirm and your request will be sent to the HR Administrator for approval.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <a id="confirm" href=""><button type="button" class="btn btn-primary">Confirm</button></a>
      </div>
    </div>
  </div>
</div>
     
                
</body>
<script>
    function passval(value){
        document.getElementById("confirm").setAttribute('href', "../Learner/server/helper/requestEnroll.php?courseId=<?php echo $courseId;?>&classId=" +value+ "&employeeId=<?php echo $employeeId;?>");
    }
    var url = "../Learner/server/helper/getPrereqCompletion.php";
    var request = new XMLHttpRequest();
    request.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.warn(this.responseText)
            var result = JSON.parse(this.responseText);
        
          if(result.status.length == 0){
            console.log(result.status);
            document.getElementById("completed").value = "false";
          }
          else{
            for (var node of result.status){
                if(node.completed == 1){
                    console.log(node.completed);
                    document.getElementById("completed").value = "true";
                }
                else{
                    console.log(node.completed);
                    document.getElementById("completed").value = "false";
                }
            }
          }
        }
    }
    request.open('GET', url, true);
    request.send();

    var url = "../Learner/server/helper/getEnrolled.php";
    var request = new XMLHttpRequest();
    request.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.warn(this.responseText)
            var result = JSON.parse(this.responseText);
        
          if(result.status.length > 0){
            console.log(result.status);
            document.getElementById("enrolled").value = "false";
          }
          else{
            document.getElementById("enrolled").value = "true";
          }
        }
    }
    request.open('GET', url, true);
    request.send();

    var url = "../Learner/server/helper/getClass.php";
    var request = new XMLHttpRequest();
    request.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.warn(this.responseText)
            var result = JSON.parse(this.responseText);
        
            for (var node of result.class){
                var classsize = 0;
                if(node.classsize != null){
                    classsize = node.classsize;
                }
                document.getElementById("main").innerHTML+=  `
                <div class="col-sm-6">
                    <div class="card">
                    <div class="card-body">
                    <h5 class="card-title">Class #${node.classid} </h5></h5>
                    <p class="card-text " >Start Date: ${node.startdate} <br>
                    End Date: ${node.enddate}</p>
                    Class Size: ${classsize}
                    <button type="button" id=enrolbtn value=${node.classid} onclick=passval(this.value) class="btn btn-primary" data-toggle="modal" data-target="#enrolModal"> Request Enrol </button>
                    </div>
                </div>`;
            }
            var complete = document.getElementById("completed").value;
            var enrolled = document.getElementById("enrolled").value;
            console.log(complete);
            if (complete == "false" || enrolled == "false"){
                  var btns = document.getElementsByClassName("btn");
                  document.getElementById("prereq").innerHTML +=  `Pre-requisite modules not completed for enrollment OR Module has already been completed/in progress`;
                  for(var btn of btns){
                    btn.style.display = "none";
                  }
                }
        }
    }
request.open('GET', url, true);
request.send();



      
</script>
</html>