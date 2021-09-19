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
    <title>Profile</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="profile.css">
</head>
<body>
    <style>
        body {
            background-image: url("img/bg_6.jpg");
            background-repeat: repeat;
            background-size: cover;
        }
        .text {
        animation-duration: 2s;
        animation-name: fadein;
        }

        @keyframes fadein {
        from {
            opacity:0;
        }
        to {
            opacity:1;
        }
        }
    </style>
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
    <div class='text'>
    <div class="box container-fluid">
        <div class="profile">
            <img src="" style="height: 150px; width: 150px;" id="user_img">
        </div>
        <!-- <h2 style="margin-top: -20px;" id="name"><span id="fname">Phris</span> <span id="lname">Coskitt</span></h2>
        <h4><span id="job">Assistant Professor of Information Systems</span>, <span id="company">SMU</span></h4> -->
        <h2 style="margin-top: -20px;" id="name"><span id="fname"></span> <span id="lname"></span></h2>
        <h4><span id="job"></span>, <span id="company"></span></h4>
        
        <!-- Booking -->
        <button class="btn btn-dark" type="button" style="margin-top: 40px;" id="book" data-toggle="modal" data-target="#booking_menu">
            Book an interview!
        </button>
        
        <div class="modal fade" id="booking_menu" tabindex="-1" role="dialog" aria-labelledby="booking_menu" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <!-- Toggled in accordance to availability --> 
                  <h5 class="modal-title" id="availTimeslotHeader">Book an interview with <span id="interviewer_fname1"></span>!</h5>
                  <h5 class="modal-title" id = "noTimeslotHeader" style="display:none">Oops! <span id="interviewer_fname2"> </span> is not available!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form action="../../../server/helper/addBooking.php" method="POST" class="form">
                    <div class="modal-body">
                        <div id="booking_form" style="margin-top: 10px;">
                        <div id='noTimeslots' class = 'mx-auto' style="display:none">
                            <span>Sorry, <span id="interviewer_fname3"></span> has no available slots in the next 2 months</span>
                        </div>
                          <!-- Replace with actual timeslots from database later -->
                        <!-- <div class="form-check">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                            <label class="form-check-label" for="exampleRadios1">
                              30/10/20, 4:00pm
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                            <label class="form-check-label" for="exampleRadios2">
                                08/11/20, 9:00am
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3" value="option3">
                            <label class="form-check-label" for="exampleRadios3">
                                11/11/20, 12:00pm
                            </label>
                        </div> -->
                        </div>
                    </div>
                    <input type="hidden" name="interviewer_id" id="interviewer_id">
                    <div class="modal-footer" >
                        <!-- Toggled in accordance to availability --> 
                        <div class="mx-auto" id='makeBooking'>
                            <button type="submit" class="btn btn-dark" id="info_submit" name="info">Informational Interview</button>
                            <button type="submit" class="btn btn-dark" id="mock_submit" name="mock">Mock Interview</button>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
        


        <!-- Interviewer's Info -->
        <div style="width: 80%;" class="mx-auto">
            <div class="row" style="margin-top: 80px;">
                <div class="col-sm-6">
                    <span class="fas fa-info-circle"></span>  About:
                </div>
                <div class="col-sm-6 text-left" id="about">
                    <!-- I am a faculty member in the School of Information Systems at Singapore Management University, where I am part of the Research Lab for Intelligent Software Engineering (RISE). -->
                </div>
            </div>
            <hr class="my-4">

            <div class="row">
                <div class="col-sm-6">
                    <span class="fas fa-envelope"></span> Email:
                </div>
                <div class="col-sm-6 text-left">
                    <!-- <a href="#" id="email">cposkitt@smu.edu.sg</a> -->
                    <a href="#" id="email"></a>
                </div>
            </div>
            <hr class="my-4">
            
            <div class="row">
                <div class="col-sm-6">
                    <span class="fas fa-briefcase"></span>  Experience:
                </div>
                <div class="col-sm-6 text-left">
                    <ul style="padding-left: 10px;" id="experience">
                        <!-- <li>Assistant Professor of Information Systems (Education), School of Information Systems, SMU, Jan 2020 -
                            Present</li>    
                        <li>Lecturer & Research Fellow, Singapore University of Technology and Design, Singapore, Jan 2018 - Jan
                            2020</li>
                        <li>Research Fellow, Singapore University of Technology and Design, Singapore, Mar 2016 - Jan 2018</li>
                        <li>Postdoctoral Research Scientist, ETH Zurich, Switzerland, Jan 2013 - Jan 2016</li> -->
                    </ul>
                </div>
            </div>
            <hr class="my-4">

            <div class="row">
                <div class="col-sm-6">
                    <span class="fas fa-graduation-cap"></span>  Education:
                </div>
                <div class="col-sm-6 text-left">
                    <ul style="padding-left: 10px;" id="education">
                        <!-- <li>PhD, University of York, 2014</li>
                        <li>Bachelors of Science, University of York, 2009</li> -->
                    </ul>
                </div>
            </div>
        </div>

        <!-- <form action="../../../server/helper/getBookings.php" method="POST" class="form">
            <button type="button" id="retrievebookings">Retrieve Bookings</button>
        </form> -->
        

    </div>
    </div>
    
    <script type="text/javascript">
        var interviewer_id = "<?php echo $_POST['interviewer_id'] ?>"
        var interviewers = {}

        function getInterviewers(){
            const request = new XMLHttpRequest;
            request.onreadystatechange = function(){
                if (this.readyState == 4 && this.status==200){
                    let data = JSON.parse(this.responseText).interviewers;
                    interviewers = data;

                    // Interviewer's Info
                    for (interviewer of interviewers){
                        if (interviewer['id'] == interviewer_id){
                            let user_img = document.getElementById('user_img');
                            let fname = document.getElementById('fname');
                            let lname = document.getElementById('lname');
                            let job = document.getElementById('job');
                            let company = document.getElementById('company');
                            let about = document.getElementById('about');
                            let email = document.getElementById('email');
                            let experience = document.getElementById('experience');
                            let education = document.getElementById('education');
                            let interviewer_id = document.getElementById('interviewer_id');
                            let interviewer_fname1 = document.getElementById('interviewer_fname1');
                            let interviewer_fname2 = document.getElementById('interviewer_fname2');
                            let interviewer_fname3 = document.getElementById('interviewer_fname3');
                            
                            interviewer_id.value = interviewer.id;
                            user_img.setAttribute("src", interviewer.img);
                            fname.innerHTML = interviewer.fname;
                            lname.innerHTML = interviewer.lname;
                            job.innerHTML = interviewer.job;
                            company.innerHTML = interviewer.company;
                            about.innerHTML = interviewer.about;
                            email.innerHTML = interviewer.email;
                            interviewer_fname1.innerHTML = interviewer.fname;
                            interviewer_fname2.innerHTML = interviewer.fname;
                            interviewer_fname3.innerHTML = interviewer.fname;
                            

                            let expArray = JSON.parse(interviewer.experience).experience;
                            for (exp of expArray){
                                experience.innerHTML += `
                                <li>
                                    ${exp}
                                </li> 
                            `;
                            }

                            let eduArray = JSON.parse(interviewer.education).education;
                            for (edu of eduArray){
                                education.innerHTML += `
                                <li>
                                    ${edu}
                                </li> 
                            `;
                            }
                        }
                    }
                }
            }
            request.open("GET", "../../../server/helper/getInterviewers.php", true);
            request.send();
        }
        getInterviewers();

        function getTimeslots(){
            const request = new XMLHttpRequest;
            request.onreadystatechange = function(){
                if (this.readyState == 4 && this.status == 200){

                    // Booking
                    let bookings = document.getElementById('booking_form');
                    let timeslots = JSON.parse(this.responseText).timeslots;
                    // Need to add unique name & id for these, preferably using interviewer's id
                    // Hid Interview Button when there aren't any timeslots available 
                    try {for(timeslot of timeslots){
                        var timeSlotAvail = true;
                        bookings.innerHTML += `
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="radio_timeslot" id="${timeslot.interviewer_id}" value="${timeslot.timeslots}">
                            ${timeslot.timeslots}
                        </div>
                        `;
                    }
                    }

                    catch {

                        //Popup Header
                        var availTimeslot = document.getElementById("availTimeslotHeader");
                        availTimeslot.style.display = "none";

                        var noTimeslot = document.getElementById("noTimeslotHeader");
                        noTimeslot.style.display = "block";


                        // Popup Contents
                        var noTimeslots = document.getElementById("noTimeslots");
                        noTimeslots.style.display = "block";

                        var makeBooking = document.getElementById("makeBooking");
                        makeBooking.style.display = "none";
                        }    


                       
                    }
                
            }
            request.open("GET", `../../../server/helper/getTimeslots.php?interviewer_id=${interviewer_id}`, true);
            request.send();
        }

        
        getTimeslots();
        

        // Test code to get bookings

        function getBookings(){
            const request = new XMLHttpRequest;
            request.onreadystatechange = function(){
                if (this.readyState == 4 && this.status == 200){
                    //console.log(JSON.parse(this.responseText));
                }
            }
            request.open("GET", "../../../server/helper/getBookings.php", true);
            request.send();
        }

        // TO NOTE: Prevents 'No Selection' to be passed to server side
        const infoButton = document.getElementById('info_submit');
        const mockButton = document.getElementById('mock_submit');
        var timeslotSelection = document.getElementsByClassName('form-check-input');
        
        infoButton.addEventListener('click', function (event) {
            flag = false;
            for(timeslot of timeslotSelection) { 
                if (timeslot.checked === true) {
                    // If the user makes a selection, flag!
                    flag = true;
                }
            }
            if(!flag) { 
                // If the user does not make a selection
                event.preventDefault();
                alert('Please select a timeslot to proceed')

            }
        });

        mockButton.addEventListener('click', function (event) {
                flag = false;
                for(timeslot of timeslotSelection) { 
                    if (timeslot.checked === true) {
                        // If the user makes a selection, flag!
                        flag = true;
                    }
                }
                if(!flag) { 
                    // If the user does not make a selection
                    event.preventDefault();
                    alert('Please select a timeslot to proceed')
            }
        });

        // Wanted to parse the onClick events through, this isn't possible for some reason? 
        // Had to so as I had above, indiv 

        // function submissionButton (event) {
                
        //         console.log(timeslotSelection); // gives me HTML Collection of the radio options

        //         if (length.timeslotSelection == 0){ // If there are no radio options
        //             console.log('error');
        //             event.preventDefault();
        //         } 
        //         else  {
        //             flag = false;
        //             for(timeslot of timeslotSelection) { 
        //                 if (timeslot.checked === true) {// If the user makes a selection, flag!
        //                     flag = true;
        //                 }
        //             }
        //             if(!flag) { // If the user does not make a selection
        //                 event.preventDefault();
        //             }
        //         }
        // }



   

    </script>

</body>
</html>





