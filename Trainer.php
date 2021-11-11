<?php
session_start();
$_SESSION['employeeId'] = 2;
$_SESSION['Role'] = 'Trainer';

header('location: .index.php');
