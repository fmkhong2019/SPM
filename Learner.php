<?php
session_start();
$_SESSION['employeeId'] = 1;
$_SESSION['Role'] = 'Learner';

header('location: .index.php');
