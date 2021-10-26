<!DOCTYPE html>
<?php
session_start();
$section=1;
$classId=1;

$_SESSION['quizsec']=$section;
$_SESSION['quizclass']=$classId;

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
   <style>
   .header {
  padding: 20px;
  text-align: center;
  background: #1abc9c;
  color: white;
  font-size: 25px;
}
   </style>
</head>
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
    <div class='container' style='margin-top:10%;'>
    <div class='row'>
    <div class='col-md-6'>
    <form method='post' action='../CoursesComponent/server/helper/getQuiz.php'>
    <div class='form-group'>
    <div class="form-row mb-2">
    <div class="col">
    Section  <input type="text" class="form-control" value=<?php echo $section; ?> name='section'  placeholder="Enter Section" readonly>
    </div>
    <div class="col">
     Class ID <input type="text" class="form-control" value=<?php echo $classId; ?>  name='classId'  placeholder="Enter Class Id" readonly>
    </div>
  </div>
    <div class="header">
  <h1> Quiz- SPM</h1>

</div>


<label for="Name" class="form-label"><b>Question</b></label>
            <div class="input-group">
                <input type="text" id="Question" name="Question" class="form-control" required>
            </div>
    </div>
    <label for="" class="form-label"><b>Type</b></label>
    <div class="form-check">
  <input class="form-check-input" type="radio" name="type" onclick='change()' id="mcq" value="MCQ">
  <label class="form-check-label" for="exampleRadios2">
    MCQ
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="type" onclick='change2()' id="true" value="True">
  <label class="form-check-label" for="exampleRadios2">
   True/False
  </label>
</div>
<div class='form-group' id='answers'>
</div>
<div class='form-group'>

<label for="Ans" class="form-label"><b>Correct Answer</b></label>
            <div class="input-group">
                <input type="text" id="Answer" name="Ans" class="form-control" required>
            </div>
    </div>
<div class='form-group'>
<label for="time" class="form-label"><b> Question Duration</b></label>
<input type="range" class='form-control' value='0' id="time" name="time"  oninput="this.nextElementSibling.value = this.value"
         min="0" max="120">
         <output>0</output>
  <label for="volume" class='form-label'>Minutes</label>
</div>
<div class='form-group'>
    <input type="submit"   id="submit" name="submit" class="form-control btn btn-success" >

    </div>
    <a href='#' class='form-control btn btn-primary'>Finish Quiz</a>
    </form>
    </div>
 
  
    <div class='col-md-6'>
    <div class="header">
  <h2> Quiz Overview</h2    >


</div>
<ol id='list'>

</ol>
    </div>

    </div>

    </div>
</body>

</html>
<script>
 let url = "../CoursesComponent/server/helper/getQuiz.php";
var request = new XMLHttpRequest();
request.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {

console.log(this.responseText);
        var data = JSON.parse(this.responseText);
      
        for (var node of data.quiz){
            document.getElementById("list").innerHTML+=  `
            <li><b>Question:</b>&nbsp;${node.question}&nbsp;<b>Type:</b> &nbsp;${node.type}&nbsp;<b>Answer:</b>&nbsp;${node.correctAnswer}</li>

`;
        }
    }
}
request.open('GET', url, true);
request.send();

function change(){

          
            document.getElementById('answers').innerHTML=`
            <div class="input-group">
                <input type="text" id="Option1"  name="Option1"  placeholder='Option 1' class="form-control" >
            </div>
            <div class="input-group">
                <input type="text" id="Option2"  name="Option2"  placeholder='Option 2' class="form-control" >
            </div>
            <div class="input-group">
                <input type="text" id="Option3"  name="Option3"  placeholder='Option 3' class="form-control" >
            </div>
            <div class="input-group">
                <input type="text" id="Option4"  name="Option4"  placeholder='Option 4' class="form-control" >
            </div>


            `;
       
        
    }

    function change2(){
        document.getElementById('answers').innerHTML='';
    }

 
</script>