<!DOCTYPE html>
<html lang="en">
<?php
//session_start();
//$courseId=$_GET["id"];
//$employeeId = $_SESSION["id"];
$employeeId = 1;
$_SESSION['employeeid'] = $employeeId;

//$_SESSION['courseId']=$courseId;
?>
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
<h2 style="margin-top:12%;">Available Courses</h2>
<hr>
    <div class="row" style="margin-top:10%;margin-left:10%;" id='main' >


</div>
</div>
</div>

       
     
                
</body>
<script>
    var url = "../Learner/server/helper/getCourse.php";
var request = new XMLHttpRequest();
request.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
 
        var result = JSON.parse(this.responseText);
        var prereqid = 0;
       
        for (var node of result.course){
            if (node.prereqid != undefined){
              prereqid = node.prereqid; 
            }
            else{
              prereqid = 0;
            }
            document.getElementById("main").innerHTML+=  `
            <div class="col-sm-4">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">${node.coursename} </h5></h5>
        <p class="card-text " >Course Code: ${node.courseid} <br>
      <i> ${node.coursedesc}</i> <br><b>Pre Requisites:</b> ${node.prereq}</p>
        <a href="./View_Classes.php?id=${node.courseid}&prereqid=${prereqid}" class="btn btn-primary">View Classes</a>
      </div>
    </div>

`;
        }
    }
}
request.open('GET', url, true);
request.send();

      
</script>
</html>