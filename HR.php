<?php
session_start();
$_SESSION['employeeId'] = 3;
$_SESSION['Role'] = 'HR';

header('location: .index.php');
