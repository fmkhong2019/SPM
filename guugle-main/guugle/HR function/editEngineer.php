<?php
    include 'common.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Edit Engineer</title>
</head>
<body>
  <!-- add or modify code as necessary -->
  <h1>Edit Engineer account</h1>
  <form method="get" action="editProcess.php" class="m-2">
  <div class="form-group">
      <label for="employeeID">Employee ID</label>
      <input type="text" id="id" name="id" class="form-control">
    </div>
    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" id="name" name="name" class="form-control">
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
      <label for="name">Address</label>
      <input type="text" id="address" class="form-control" name="address">
    </div>
    <input type="submit" class=" btn btn-warning" value="Edit">
  </form>
     

   

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>