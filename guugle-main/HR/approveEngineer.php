<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <title>WaitList</title>
</head>
<body>
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
<?php
    include 'common.php';

    $waitListDAO = new WaitlistDAO();
    $waitlists = $waitListDAO->getWaitlist();

?>
<h1 class="m-2">Waiting List (<?php echo count($waitlists);?> task(s) are currently pending)</h1>
<form action="approveProcess.php" method="post">
    <table id="waitlist-table" class="table table-dark m-2">
      <tr><th>Select</th><th>course ID</th><th>class ID</th><th>employee Id</th></tr>
      <?php
        if(!is_null($waitlists)){
          foreach($waitlists as $waitlist){
            $parameter = strval($waitlist->courseid).' '.strval($waitlist->classid).' '.strval($waitlist->employeeid);
            echo "<tr><td><input type='checkbox' name='lists[]' value='$parameter'></td><td>".$waitlist->courseid."</td><td>".$waitlist->classid."</td><td>".$waitlist->employeeid."</td></tr>";
          }
        }
        ?>
    </table>
    <button type="submit" class=" btn btn-primary m-2">Approve</button>
</form>
<?php
  
?>

</body>
</html>