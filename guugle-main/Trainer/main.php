<?php
// Ensures that user has successfully logged in and has a full profile with us!
session_start();
if (!isset($_SESSION["id"]) || !isset($_SESSION["login"])  ){
  //redirects to home page when user is not logged in 
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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <title>guugle</title>
    <!-- <link rel="stylesheet" href="style.css"> -->
    <!-- <link rel="stylesheet" href="search.css"> -->
</head>
<style>

.nav {
    background-color: black !important;
    text-transform: uppercase;
    letter-spacing: .1rem;
  }
  body {
    background-image: url("img/bg_6.jpg");
    background-repeat: repeat;
    background-size: cover;
  }
  .box_bookings {
  width: fit-content;
  height:fit-content;
  margin: 0px auto 120px;
  background-color: black;
  padding: 0 10px 0px;
  border-radius: 6px;
  box-shadow: 0 5px 7px rgba(0,0,0,0.5);
  }
  .footer{
    position: fixed;
    left: 0;
    bottom: 0;
    width: 100%;
    background-color: black; 
    color: white; 
    font-size: small;
  } 
  hr {
    background-color: white;
  }
  .profile_pic {
  height: 160px;
  width: 160px;
  border-radius: 50%;
  border: 3px solid #272133;
  margin-top: 20px;
  box-shadow: 0 5px 7px rgba(0,0,0,0.5);
  }
  .card{
    box-shadow: 0 5px 7px rgba(0,0,0,0.5);
  }

  .alert {
    background: #ffdb9b;
    padding: 20px 40px;
    min-width: 420px;
    position: absolute;
    left: 10px;
    top: 80px;
    opacity: 0;
    border-radius: 4px;
    border-left: 4px solid #ffa502;
    z-index: 1;
  }

  .alert .fa-check-circle {
    position: absolute;
    left: 10px;
    top: 30%;
    transform: translativeY(-50%);
    color: #ce8500;
    font-size: 30px;

  }

  .alert .msg {
    padding: 0 20px;
    font-size: 18px;
    color: #ce8500;
  }

  .alert .close-btn{
  position: absolute;
  right: 0px;
  top: 50%;
  transform: translateY(-50%);
  background: #ffd080;
  padding: 20px 18px;
  cursor: pointer;
}

.alert .close-btn:hover{
  background: #ffc766;
}

.alert.show{
  animation: show_slide 1s ease forwards;
}
@keyframes show_slide {
  0%{
    transform: translateX(100%);
  }
  40%{
    transform: translateX(-10%);
  }
  80%{
    transform: translateX(0%);
  }
  100%{
    transform: translateX(-10px );
  }
}
.alert.hide{
  animation: hide_slide 1s ease forwards;
  display: none;
}
@keyframes hide_slide {
  0%{
    transform: translateX(-10px);
  }
  40%{
    transform: translateX(0%);
  }
  80%{
    transform: translateX(-10%);
  }
  100%{
    transform: translateX(100%);
  }
}
.alert.showAlert{
  opacity: 1;
  pointer-events: auto;
}
button{
  padding: 8px 16px;
  font-size: 25px;
  font-weight: 500;
  border-radius: 4px;
  border: none;
  outline: none;
  background: #e69100;
  color: white;
  letter-spacing: 1px;
  cursor: pointer;
}
.bounce1 {
    animation-delay: 0.2s;
  }
.bounce2{
  animation-delay: 0.4s;
}
.bounce3{
  animation-delay: 0.6s;
}
.fade{
  animation-duration: 1.5s;
}


.fir-clickcircle {
    height: 80px;
    width: 80px;
    border-radius: 100px;
    margin-left:30px;
}
  
.fir-image-figure {
  display: flex;
  align-items: center;
  position: relative;
  text-decoration: none;
  margin-bottom: 20px;
  margin-right:0px;
  /*padding-left:0; 
  padding-right:15px;*/
  
}

.fir-image-figure .caption, .fir-image-figure figcaption {
  padding-left: 15px;
}

.fir-image-figure .fig-author-figure-title {
  color: var(--fir-color-grey);
  font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;
  font-weight: 400;
  font-size: 15px;
  margin-top: 2px;
  width:200px;
}

@media (min-width: 320px) and (max-width: 767px) {
   /* Basically up to, but not including an iPad */
   
   .alert{
        min-width: 200px;
    }
}
@media (min-width: 768px) {
   /* iPad and bigger */
   .alert{
        min-width: 420px; 
    }
}


.nxm { 
    border: none;
    outline: none;
    background: none;
    cursor: pointer;
    color: white;
    padding: 0;
    font-family: inherit;
    font-size: inherit;
    font-weight: bold;
}

</style>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark nav fixed-top">
    <!-- Changed link to main.php --> 
    <a href="main.php" class="navbar-brand">
      <!-- <img src="" style="width: 100px; height: auto;"> -->
      Phris Coskitt</a>
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

  <div class="alert hide" style="margin-top: 80px;">
    <i class="fas fa-check-circle fa-1x"></i>
    <span class="msg">Booking removed successfully</span>
    <div class="close-btn">
        <span class="fas fa-times"></span>
    </div>
  </div>
  
  <div class="container" style="">
    <div id='booking' class="py-5 text-center animate__animated animate__fadeIn fade" style=''>
      <h1 class='mt-5' style="text-transform: uppercase; letter-spacing: .2rem;">Bookings</h1>
      <p class="lead">These are your current interview bookings.</p>
    </div>
    <!-- <div id='recommendations' class="row card-deck" style='display: none;'>
    </div> -->
    
    <div class="row">
      <div id='bookings' class=" col-sm-6 table-responsive-lg box_bookings animate__animated animate__bounceIn bounce1" style='width: fit-content; '>
        <table id='details' class = 'table table-hover table-borderless' style="margin-top: 10px; color: white;">
          <thead>
            <tr style="border-bottom: 2px solid orange;">
              <th scope="col">Interviewer</th>
              <th scope="col">Details</th>
              <th scope="col">Type</th>
              <th></th>
            </tr>
          </thead>
        </table>
        <p id="zeroBookings" style="text-align: center; color: white; margin-bottom: 12px;"></p>
      </div>
      
        


       <div id='upNext' class="col-sm-6" style='width:fit-content; justify-content:center;'>
        <div id='upNext1'class=" box_bookings animate__animated animate__bounceIn bounce2" style="color: white; padding: 20px 30px; display:none;">
          <p style="text-align: center; font-weight: bold;">Up Next</p>
          <div id="noBookings">
            <p id="nextBookingDate1"></p>
            <p id="nextBooking1">

            </p>
            <p id="nextBookingDate2"></p>
            <p id="nextBooking2">
              
            </p>
          </div>
        </div>
      
        <!-- Recommendations -->
        <div class='box_bookings text-white animate__animated animate__bounceIn bounce3' id='recommendations' style="margin-top: -60px;">
          <p style="padding: 20px; text-align: center; font-weight: bold;">Recommendations</p>
        </div>  
        </div> <!-- row-->

        </div>  
    </div>

  <div class="modal fade" id="confirm" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Confirm Deletion</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
          Are you sure you want to delete this booking?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
          <button id='confirmDelete' type="button" class="btn btn-danger">Delete</button>
        </div>
      </div>
    </div>
  </div>

  
  <!-- Footer -->
  <!-- <div class="text-center py-2 footer" style="background-color: black; color: white; font-size: small;">© 2020 Copyright: 
        <a href="https://www.linkedin.com/in/zhi-hao-lim/" target="blank">Lim Zhi Hao</a> 
  </div> -->
  
  
  <script>
    var interviewers = {};
    var bookings = {};

    //Retrieve Recommendations
    function getRandom(arr, n) {
    var result = new Array(n),
        len = arr.length,
        taken = new Array(len);
    while (n--) {
        var x = Math.floor(Math.random() * len);
        result[n] = arr[x in taken ? taken[x] : x];
        taken[x] = --len in taken ? taken[len] : len;
    }
    return result;
    }

    function getRecommendations(){
      result = getRandom(interviewers, 2)
      let count = 1;
      for (item of result){
        var name = item['fname'] + ' ' + item['lname'];
        var img = item['img'];
        var company = item['company'];
        var about = item['about'];
        var id = item['id'];
        var job = item['job'];
        var industry = item['industry'];

        recommendations.innerHTML += `
        <form action="profile.php" method="POST">
          <div class="fir-image-figure">
            <img class="fir-author-image fir-clickcircle" src="${img}">
            
            <figcaption>
            <div class="fig-author-figure-title" style="font-weight:900;"><button class="btn-link nxm" value="${id}" name="interviewer_id">${name}</button></div>
            <div class="fig-author-figure-title">${job}, ${company}</div>
            <div class="fig-author-figure-title">${industry}</div>
            </figcaption>   
          </div>
        </form>
        `;
        // <button class="btn btn-sm" style="justify-content:right; margin-left:50px;" value="${id}" name="interviewer_id"><i class="fa fa-user" style="color: white;"></i></button>

        if (count != 2){
          recommendations.innerHTML += `
            <hr style="background-color:orange; height: 2px;">
          `;
        }
        else{
          recommendations.innerHTML += `
            <div style="margin-bottom: 20px;">&nbsp</div>
          `;
        }
        count++;
      }
    }

    // Retrieve Interviewers
    function getInterviewers(){
      const request = new XMLHttpRequest();
      request.onreadystatechange = function(){
          if (this.readyState == 4 && this.status==200){
              let data = JSON.parse(this.responseText).interviewers;
              interviewers = data;

              // Retrieve Bookings
              let userBooking = [];
              function getBookings(){
              const request = new XMLHttpRequest;
              request.onreadystatechange = function(){
                  if (this.readyState == 4 && this.status == 200){
                      let data = JSON.parse(this.responseText).bookings;
                      let id1 = '<?php echo $_SESSION["id"]?>';
                      for (i of data){
                        if (i['user_id'] == id1){
                          userBooking.push(i);
                        }
                      }
                      if (userBooking.length != 0){
                        bookings = userBooking;
                        // document.getElementById('recommendation').style = 'display: none';
                        // document.getElementById('booking').style = '';
                        // document.getElementById('bookings').style = '';
                        document.getElementById('upNext1').style = 'color: white; padding: 20px 30px;';

                        for (booking of userBooking){
                          var interviewer_id = booking['interviewer_id']
                          var timeslot = booking['timeslots']
                          var interview_type = booking['interview_type']
                          for (interviewer of interviewers){
                            var id = interviewer['id']
                            if (interviewer_id == id){
                              var name = interviewer['fname'] + ' ' + interviewer['lname'];
                              var delete_id = 'delete' + booking['interviewer_id'] + booking['timeslots'];
                              var tr = document.createElement('tr');
                              var td1 = document.createElement('td');
                              var td2 = document.createElement('td');
                              var td3 = document.createElement('td');
                              var td4 = document.createElement('td');

                              td1.appendChild(document.createTextNode(name))
                              td1.setAttribute("scope", "row")
                              tr.appendChild(td1)

                              td2.appendChild(document.createTextNode(timeslot))
                              tr.appendChild(td2)
                              if (interview_type == 'Informational'){
                              td3.appendChild(document.createTextNode("Info"))
                              tr.appendChild(td3)
                              }
                              else{
                                td3.appendChild(document.createTextNode("Mock"))
                                tr.appendChild(td3)
                              }

                              td4.innerHTML = `<button value="${delete_id}" class="open-deleteBooking btn btn-sm" type='button' data-toggle="modal" data-target="#confirm"><i class="fa fa-trash" style="color: white"></i></button>`
                              tr.appendChild(td4)
                              
                              document.getElementById('details').appendChild(tr)
                         
                            }
                          }
                        }
                        let timeSlots = []
                        for (booking of bookings){
                          let date = booking.timeslots.split(", ")[0];
                          date = "20" + date.slice(-2) + "-" + date.slice(3,5) + "-" + date.slice(0,2);
                          newDate = new Date(date);
                          let time = booking.timeslots.split(", ")[1];
                          timeSlots.push({'date': date, 'newDate': newDate, 'time': time, 'id': booking.interviewer_id, 'type': booking.interview_type});
                        }
                        sortedTimeSlots = timeSlots.sort((a,b) => a.newDate - b.newDate);
                        document.getElementById('nextBookingDate1').innerHTML = sortedTimeSlots[0].newDate.toDateString();
                        document.getElementById('nextBookingDate1').setAttribute("style", "border-bottom: 2px solid orange");
                        if(sortedTimeSlots.length > 1){
                          document.getElementById('nextBookingDate2').innerHTML = sortedTimeSlots[1].newDate.toDateString();
                          document.getElementById('nextBookingDate2').setAttribute("style", "border-bottom: 2px solid orange");
                        }
                        for (interviewer of interviewers){
                          if(interviewer.id == sortedTimeSlots[0].id){
                            document.getElementById('nextBooking1').innerHTML = sortedTimeSlots[0].type + " interview w/ " + interviewer.fname + ", " + sortedTimeSlots[0].time;
                          }
                          if(sortedTimeSlots.length > 1){
                            if(interviewer.id == sortedTimeSlots[1].id){
                            document.getElementById('nextBooking2').innerHTML = sortedTimeSlots[1].type + " interview w/ " + interviewer.fname + ", " + sortedTimeSlots[0].time;
                            }
                          }
                        }
                      }
                      else{
                        document.getElementById('zeroBookings').innerHTML = "No bookings made!";
                        document.getElementById('noBookings').innerHTML = "No upcoming interviews!";
                        document.getElementById('recommendations').style = '';
                      }
                      getRecommendations();
                  }
              }
              request.open("GET", "../../../server/helper/getBookings.php", true);
              request.send();
              }
              getBookings();
              // END Retrieval of Bookings

          }
      }
      request.open("GET", "../../../server/helper/getInterviewers.php", true);
      request.send();
    }
    getInterviewers();
    // END Retrieval of Interviewers
    
    //confirmation delete
    $(document).on("click", '.open-deleteBooking', function () {
      var delete_id = this.value;
      document.getElementById('confirmDelete').value = delete_id;
    });
    document.getElementById('confirmDelete').addEventListener('click', deleteInterview)

    function deleteInterview(){
      var id = this.value;
      for (booking of bookings){
        var delete_id = 'delete' + booking['interviewer_id'] + booking['timeslots'];
        if (delete_id == id){
          var interviewer_id = booking['interviewer_id']
          var timeslots = booking['timeslots']
          var user_id = booking['user_id']
        }
      }
      const request = new XMLHttpRequest;
        request.onreadystatechange = function(){
          if (this.readyState == 4 && this.status == 200){
            // Used for booking deletion alert 
            sessionStorage.setItem("showAlert", true);
            location.reload();
          }
        }
        request.open("GET", `../../../server/helper/deleteBooking.php?interviewer_id=${interviewer_id}&timeslots=${timeslots}&user_id=${user_id}`, true);
        request.send();
      }
      //END of delete

      // The 2 functions below assist with displaying an alert upon successful deletion of booking 
      window.onload = function() {
        if(sessionStorage.getItem("showAlert")) {
          sessionStorage.removeItem("showAlert");
          showAlert();
        }
      
      }

      function showAlert() {
        var alert = document.getElementsByClassName('alert')[0];
        alert.classList.add('show');
        alert.classList.remove('hide');
        alert.classList.add('showAlert');
        setTimeout(function() {
          alert.classList.remove('show');
          alert.classList.add('hide');
        }, 3000)
        const hideAlert = document.getElementsByClassName("close-btn")[0];  
        hideAlert.addEventListener('click', function(){
        alert.classList.remove('show');
        alert.classList.add('hide');
      })
      }

      
  </script>
</body>
</html>
