<?php
session_start();
$_SESSION['employeeId'] = 1;
$_SESSION['Role'] = 'Learner';

header("Location: ./index.php" );
