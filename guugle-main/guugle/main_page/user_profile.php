<?php
// Ensures that user has successfully logged in and has a full profile with us!
session_start();
if (!isset($_SESSION["id"]) || !isset($_SESSION["login"])  ){
  header("Location: ../../../index.html");
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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="../parallax.js-1.5.0/parallax.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <title>User</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="profile.css">
</head>
<style>
    body {
        background-image: url("img/bg_6.jpg");
        background-repeat: repeat;
        background-size: cover;
    }
</style>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark nav fixed-top">
        <a href="main.php" class="navbar-brand">Phris Coskitt</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#hamburger">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="hamburger">
            <!-- Search -->
            <form class="form-inline my-2 my-lg-0 ml-auto" action="result.php" method="POST">
                <input class="form-control form-control-sm" type="text" placeholder="Search" aria-label="Search" name="searchItem">
                <button class="btn btn-link" name="doSearch" type="submit"><i class="fas fa-search text-white" aria-hidden="true"></i></button>
            </form>
            
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="main.php" class="nav-link">Bookings</a>
                </li>
                <li class="nav-item">
                    <a href="user_profile.php" class="nav-link">Profile</a>
                </li>
                <li class="nav-item">
                    <a href="../../../server/helper/logout.php" class="nav-link" onclick="window.open('https://www.linkedin.com/m/logout/')">Log Out</a>  
                </li>
            </ul>
        </div>
    </nav>

    <div class="box container-fluid animate__animated animate__fadeIn">
        <div class="profile">
            <img src="../../../img/avatar.png" style="height: 150px; width: 150px;" id="user_img">
        </div>
        <!-- <h2 style="margin-top: -20px;" id="name"><span id="fname">Phris</span> <span id="lname">Coskitt</span></h2>
        <h4><span id="job">Assistant Professor of Information Systems</span>, <span id="company">SMU</span></h4> -->
        <h2 style="margin-top: -20px;" id="name"><span id="fname"></span> <span id="lname"></span></h2>
        <h4><span id="job"></span>, <span id="company"></span></h4>
        <button class="btn btn-sm" onClick="javascript:window.location.href='edit_profile.php'" style="border: none; background: none; color: #0066CC;">Edit Profile <i class="far fa-edit"></i></button>

        <!-- Interviewer's Info -->
        <div style="width: 80%;" class="mx-auto">
            <div class="row" style="margin-top: 80px;">
                <div class="col-sm-6">
                    <span class="fas fa-envelope"></span> Email:
                </div>
                <div class="col-sm-6 text-left">
                    <a href="#" id="email"></a>
                </div>
            </div>
            <hr class="my-4">
            
            <div class="row">
                <div class="col-sm-6">
                    <span class="fas fa-warehouse"></span>  Industry:
                </div>
                <div class="col-sm-6 text-left" id="industry">
                </div>
            </div>
            <hr class="my-4">

            <div class="row">
                <div class="col-sm-6">
                    <span class="fas fa-graduation-cap"></span>  Specialization:
                </div>
                <div class="col-sm-6 text-left" id="specialization">
                </div>
            </div>
        </div>
        

    </div>

    <script type="text/javascript">
        const request = new XMLHttpRequest;
            request.onreadystatechange = function(){
                if (this.readyState == 4 && this.status==200){
                    //console.log(JSON.parse(this.responseText).users);
                    let data = JSON.parse(this.responseText).users;
                    
                    let user_img = document.getElementById('user_img');
                    let fname = document.getElementById('fname');
                    let lname = document.getElementById('lname');
                    let job = document.getElementById('job');
                    let company = document.getElementById('company');
                    let email = document.getElementById('email');
                    let industry = document.getElementById('industry');
                    let specialization = document.getElementById('specialization');

                    if(data.photoURL != null) {
                        user_img.setAttribute("src", data.photoURL);
                    }
                    fname.innerHTML = data.fname;
                    lname.innerHTML = data.lname;
                    job.innerHTML = data.job;
                    company.innerHTML = data.company;
                    email.innerHTML = data.email;
                    industry.innerHTML = data.industry;
                    specialization.innerHTML = data.specialization;

                }
            }
        request.open("GET", "../../../server/helper/getUser.php", true);
        request.send();
    </script>

</body>
</html>


