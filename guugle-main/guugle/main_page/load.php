<?php
// Ensures that user has successfully logged in and has a full profile with us!
session_start();
if (!isset($_SESSION["id"]) || !isset($_SESSION["login"]) ){
  header("Location: ../../../index.html");
  exit();
}

// User did not get a booking
if(!isset($_SESSION["interview_type"]) || !isset($_SESSION['interviewerFName']) || !isset($_SESSION['radio_timeslot'])) {
    header("Location: main.php");
    exit();
}

?>

<script type='text/javascript'>
    const id = '<?php echo $_SESSION["id"]?>';
    var interviewerFName = '<?php echo $_SESSION["interviewerFName"]?>';
    var radio_timeslot = '<?php echo $_SESSION["radio_timeslot"]?>';
    var interview_type = '<?php echo $_SESSION["interview_type"]?>';
    var dateTime = radio_timeslot.split(',');
    var date = dateTime[0];
    var time = dateTime[1];

</script>

<?php
    // Unset the variables
    unset($_SESSION["interviewerFName"]);
    unset($_SESSION["radio_timeslot"]);
    unset($_SESSION["interview_type"]);
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

    <title>Interview Confirmation</title>

    <style>
      
        container-fluid {
            display: flex;
            justify-content: center;
        }

        .fa-check-circle{
            color: green;
            z-index: 1;
        }

        body {
            background-image: url("img/bg_6.jpg");
            background-repeat: repeat;
            background-size: cover;
        }

        .box {
            width: 50%;
            margin: 200px auto 120px;
            background-color: #fff;
            padding: 0 20px 80px;
            border-radius: 6px;
            box-shadow: 0 3px 7px rgba(0,0,0,0.3);
            text-align: center;
        }

        .confirmation {
            border-radius: 100px;
            overflow: hidden;
            height: 150px;
            width: 150px;
            position: relative;
            margin: auto;
            top: -60px;
            box-shadow: 0 0 0 8px #f0f0f0;
        }

        .bounce {
            animation-duration: 5s;
        }

        h3 {
            font-size: 3.0vh;
        }


    </style>

    <link rel="stylesheet" href="style.css">
    <!-- <link rel="stylesheet" href="profile.css"> -->
  </head>

  <body>
    <div class="box container-fluid animate__animated animate__bounceIn bounce">
        <div class="confirmation">
            <i class="fas fa-check-circle fa-9x"></i>
        </div>

        <div>
            <h3 class="text-center">Your <span id='interview_type'></span> <span> interview at </span> <span id="time"></span><span> on </span><span id="date"></span><span> with </span><span id="interviewerFName"></span> <span>has been confirmed</span></h3>
        </div>
            <br>
            <br>
        <h3>Redirecting you to the bookings page</h3>

    </div>
    
    <script>
        document.getElementById('interviewerFName').innerText = interviewerFName;
        document.getElementById('date').innerText = date;
        document.getElementById('time').innerText = time;
        document.getElementById('interview_type').innerText = interview_type;

        window.onload = redirect;
        
        function redirect() {
            setTimeout(function () {
                window.location.href = "main.php"; 
            }, 5000);
        } 
     
    </script>
    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
  </body>
</html>