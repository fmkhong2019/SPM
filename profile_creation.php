<?php
include 'server/model/UserDAO.php';

session_start();
$dao = new UserDAO();

if (!isset($_SESSION["id"]) ){
    header("Location: index.html");
    exit();
}

// If user already completed profile creation:
// A) User already has a session, main.php will allow useer to access main.php
// B) User does not have a session, main.php will redirect user to login.html
if ($dao->checkCompletion($_SESSION["id"])){
    header("Location: guugle-main/guugle/main_page/main.php");
    exit();
}

?>

<script type='text/javascript'>
const id = '<?php echo $_SESSION["id"]?>';
</script>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" shrink-to-fit="no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Profile Creation</title>
    <style>
        body {
            margin-top: 80px;
            background-image: url(" guugle-main/guugle/main_page/profile_img/pattern2.jpg");
            background-repeat: repeat;
        }
        
        .form-group {
            margin-bottom: 30px;
            width: 80%;
            margin-left: auto;
            margin-right: auto;
        }


    </style>
</head>
<body>
    <!-- 
        First Name 
        Last Name
        Industry/Field (dropdown)
        Current Job 
        Past Jobs 
    -->
    
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark nav fixed-top">
        <a href="index.html" class="navbar-brand">
        <!--Image was leaving ugly ass thingy in navbar-->
        <!--<img src="" style="width: 100px; height: auto;"> -->
        Phris Coskitt</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#hamburger">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="hamburger">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="index.html" class="nav-link">Back To Home</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container animate__animated animate__jackInTheBox box">
        <h2 class="b">Profile Creation</h2>

        <div class="circle">
            <img src="img/avatar.png" alt="avatar" class="image" id="user_img">
        </div>
        
        <h2 class="b">Hey <span id="fname"></span>, <br> just going to need a few more details from you!</h2>

        <form class="needs-validation" novalidate style="margin-top: 30px;" action="server/helper/addUser.php" method="POST" class="form" enctype="multipart/form-data">
        <!--"-->
            <!-- <div class="form-group">
                <label for="fname">First Name</label>
                <input type="text" id="fname" name="fname" class="form-control">
            </div>

            <div class="form-group">
                <label for="lname">Last Name</label>
                <input type="text" id="lname" name="lname" class="form-control">
            </div> -->
            
            <div class="form-group">
                <label for="industry">Industry</label>
                <select id="industry" name="industry" class="form-control" required>
                    <option value='' disabled selected hidden>Select an Industry</option>
                    <option>Accountancy</option>
                    <option>Business Development</option>
                    <option>Communications</option>
                    <option>Cybersecurity</option>
                    <option>Data Analytics</option>
                    <option>Data Science</option>
                    <option>Financial Services</option>
                    <option>Financial Technology</option>
                    <option>Human Resources</option>
                    <option>Information Systems</option>
                    <option>Information Technology</option>
                    <option>International Trade</option>
                    <option>Law</option>
                    <option>Marketing</option>
                    <option>Operations Management</option>
                    <option>Politics</option>
                    <option>Quantitative Economics</option>
                    <option>Real Estate</option>
                    <option>Strategic Management</option>
                </select>
                <div class="invalid-feedback">
                  Please select an Industry.
                </div>
            </div>

            <div class="form-group">
                <label for="specialization">Specialization</label>
                <input type="text" id="specialization" name="specialization" class="form-control" placeholder='What is your specialization?' required>
                <div class="invalid-feedback">
                  Specialization is required.
                </div>
            </div>

            <div class="form-group">
                <label for="job">Current Occupation</label>
                <input type="text" id="job" name="job" class="form-control" placeholder="Please specify 'Student' if you are a student" required>
                <div class="invalid-feedback">
                  Current Occupation is required.
                </div>
            </div>

            <div class="form-group">
                <label for="company">Current Company</label>
                <input type="text" id="company" name="company" class="form-control" placeholder="Please specify 'nil' if you are not with a company or your institution if you are a student." required>
                <div class="invalid-feedback">
                  Please fill in your company, 'nil' if you don't have one or your institution if you are a student.
                </div>
            </div>


            <div class="text-center">
                <button class="btn btn-dark animate__animated animate__fadeInDown" id="adult_submit" style="margin-top:20px;"type="submit">Create</button>
            </div>
            

            <!-- <div class="text-center">
                <button class="btn btn-dark" id="study" type="button">I'm a student</button>
                <button class="btn btn-dark" type="button" id="no_study">I'm not a student</button>
            </div> -->
            
            <!-- <div id="working"> -->
                <!-- Working Adults Info -->
            <!-- </div> -->
            <!-- <div id="student"> -->
                <!-- Student Info -->
            <!-- </div> -->
            <!-- <div id="internship"> -->
                <!-- Student Internship Info -->
                <!-- <button class="btn btn-primary" id="intern_before" type="button">I have interned before!</button> -->
            <!-- </div> -->
        </form>

    </div>

    <script type = "text/javascript">
    const buttonSubmit = document.getElementById('adult_submit');
    // buttonSubmit.addEventListener('click',checkSubmit);
    // function checkSubmit(){
    //     if (!(checkSpecialization() && checkJob() &&  checkCompany())) {
    //         event.preventDefault();
    //     }
    (function() {
        'use strict';

        buttonSubmit.addEventListener('click', function() {
          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.getElementsByClassName('needs-validation');

          // Loop over them and prevent submission
          var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
              if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();
    
    // function checkSpecialization(){
    //     const specialization = document.getElementById('specialization'); 
    //     if (specialization.value == ""){
    //         return false;
    //     }
    //     return true;
    // }
    // function checkJob(){
    //     const job = document.getElementById('job'); 
    //     if (job.value == ""){
    //         return false;
    //     }
    //     return true;

    // }
    // function checkCompany(){
    //     const company = document.getElementById('company'); 
    //     if (company.value == ""){
    //         return false;
    //     }
    //     return true;

    // }


    
    </script>


    <script type="text/javascript">
        $(document).ready(function(){
            $(document.getElementById('study')).click(function(){
                document.getElementById('working').innerHTML = "";
                document.getElementById('student').innerHTML = `
                    <div class="form-group animate__animated animate__fadeInDown">
                        <label for="specialization">Specialization</label>
                        <input type="text" id="specialization" name="specialization" class="form-control">
                    </div>
                    <div class="form-group animate__animated animate__fadeInDown">
                        <label for="uni">University</label>
                        <input type="text" id="uni" name="uni" class="form-control">
                    </div>
                    <div class="form-group animate__animated animate__fadeInDown">
                        <label for="intern">Most Recent Internship Title</label>
                        <input type="text" id="intern" name="intern" class="form-control">
                    </div>
                    <div class="form-group animate__animated animate__fadeInDown">
                        <label for="intern_company">Most Recent Internship Company</label>
                        <input type="text" id="intern_company" name="intern_company" class="form-control">
                    </div>
                    <div class="text-center">
                        <button class="btn btn-dark animate__animated animate__fadeInDown" id="student_submit" type="submit">Submit</button>
                    </div>
                `;
            })

            $(document.getElementById('no_study')).click(function(){
                document.getElementById('student').innerHTML = "";
                document.getElementById('working').innerHTML = `
                    <div class="form-group animate__animated animate__fadeInDown">
                        <label for="job">Most Recent Job Title</label>
                        <input type="text" id="job" name="job" class="form-control">
                    </div>
                    <div class="form-group animate__animated animate__fadeInDown">
                        <label for="company">Most Recent Company</label>
                        <input type="text" id="company" name="company" class="form-control">
                    </div>
                    <div class="text-center">
                        <button class="btn btn-dark animate__animated animate__fadeInDown" id="adult_submit" type="submit">Submit</button>
                    </div>
                `;
            })

            $(document.getElementById('intern_before')).click(function(){
                document.getElementById('internship').innerHTML = `
                    <div class="form-group">
                        <label for="intern">Most Recent Internship Title</label>
                        <input type="text" id="intern" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="intern_company">Most Recent Internship Company</label>
                        <input type="text" id="intern_company" class="form-control">
                    </div>
                `;
            })

            const request = new XMLHttpRequest;
            request.onreadystatechange = function(){
                if (this.readyState == 4 && this.status==200){
                    let data = JSON.parse(this.responseText).users;
                    let user_img = document.getElementById('user_img');
                    let fname = document.getElementById('fname');

                    if(data.photoURL != null) {
                        user_img.setAttribute("src", data.photoURL);
                    }
                    fname.innerHTML = data.fname;

                }
            }
        request.open("GET", "server/helper/getUser.php", true);
        request.send();
        })
        
    </script>
</body>
</html>
