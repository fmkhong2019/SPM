<?php
    include 'EmployeeDAO.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $empDAO = new employeeDAO();
        $empDAO->findByName("Johnathan");
        //$emp2 = new Employee(6,"Johnathan", 12345678, "2021-06-18", "Tanjong Pagar");
        //findByName("Johnathan");
    ?>
</body>
</html>