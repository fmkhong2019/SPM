<?php
    include 'connection.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Remove Engineer</title>
</head>
<body>
  <!-- add or modify code as necessary -->
  <h1>Remove Engineer account</h1>
  <form method="get" action="remove.php" class="m-2">
    <div class="form-group">
      <label for="employeeID">Employee ID</label>
      <input type="text" id="id" name="id" class="form-control">
    </div>
    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" id="name" name="name" class="form-control">
    </div>
    <div class="form-group">
      <label for="email">Admin password</label>
      <input type="password" id="pw" name="pw" class="form-control">
    </div>
    <input type="submit" class=" btn btn-danger" value="Remove">
  </form>
     

   

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>