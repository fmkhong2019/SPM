<?php
    include 'connection.php'
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
  <h1>Create Engineer account</h1>
  <form method="get" action="process.php" class="m-2">
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
      <label for="email">Category</label>
      <select name="category" id="category" class="form-control" name="category">
        <option value="trainer">Trainer/Senior</option>
        <option value="engineer">Engineer/Junior</option>
      </select>
    </div>
    <div class="form-group">
      <label for="name">Address</label>
      <input type="text" id="address" class="form-control" name="address">
    </div>
    <button type="button" class="btn btn-warning" onclick="test()">Test</button>
    <input type="submit" class=" btn btn-primary" value="Create">
  </form>

    <table id="engineer-table" class="table table-dark m-2">
      <tr><th>Employee ID</th><th>Name</th><th>Category</th><th>phone No.</th><th>Date joined</th><th>Address</th></tr>
    </table>
    

    <script>
      
      var table = document.getElementById("engineer-table");
      var success = document.getElementById("showSuccess");

      table.style.display = "none";

      function test() {
          table.style.display = "block";
          var id = document.getElementById("id").value;     
          var name = document.getElementById("name").value;
          var phone = document.getElementById("phone").value;
          var category = document.getElementById("category").value;
          var date = document.getElementById("date").value;
          var address = document.getElementById("address").value;
        
          var row = table.insertRow(-1);
          var cell1 = row.insertCell(0);
          var cell2 = row.insertCell(1);
          var cell3 = row.insertCell(2);
          var cell4 = row.insertCell(3);
          var cell5 = row.insertCell(4);
          var cell6 = row.insertCell(5);
          cell1.innerHTML = id;
          cell2.innerHTML = name;
          cell3.innerHTML = category;
          cell4.innerHTML = phone;
          cell5.innerHTML = date;
          cell6.innerHTML = address;
        // Add Code here
       
      }
    
    </script>
    
     

   

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>