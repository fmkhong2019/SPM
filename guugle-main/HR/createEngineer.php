<?php
    include 'common.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Create new Engineer</title>
</head>
<body>
  <!-- add or modify code as necessary -->
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
  <h1>Create Engineer account</h1>
  <form method="get" action="createProcess.php" class="m-2">
    <div class="form-group">
      <label for="employeeID">Employee ID</label>
      <input type="text" id="id" name="id" class="form-control">
    </div>
    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" id="name" name="name" class="form-control">
    </div>
    <div class="form-group">
      <label for="employeeID">Designation</label>
      <input type="text" id="designation" name="designation" class="form-control">
    </div>
    <div class="form-group">
      <label for="employeeID">Department</label>
      <input type="text" id="dept" name="dept" class="form-control">
    </div>
    <div class="form-group">
      <label for="employeeID">Username</label>
      <input type="text" id="username" name="username" class="form-control">
    </div>
    <div class="form-group">
      <label for="email">Phone Number</label>
      <input type="text" id="phone" name="phone" class="form-control">
    </div>
    <div class="form-group">
      <label for="date">Date joined</label>
      <input type="date" class="form-control" name="date" 
        placeholder="yyyy-mm-dd" value=""
        min="1997-01-01" max="2030-12-31" id="date" name="date">
    </div>
    <div class="form-group">
      <label for="email">Category</label>
      <select name="category" id="category" class="form-control" name="category">
        <option value="trainer">Trainer/Senior</option>
        <option value="learner">Engineer/Junior</option>
        <option value="HR">HR</option>
      </select>
    </div>
    <div class="form-group">
      <label for="name">Address</label>
      <input type="text" id="address" class="form-control" name="address">
    </div>
    <input type="submit" class=" btn btn-primary" value="Create">
  </form>

   
    

    
    
     

   

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>