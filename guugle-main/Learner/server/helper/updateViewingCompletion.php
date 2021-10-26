<?php
    session_start();
    require_once "common.php";
    $dao = new ViewingDAO();

    $materialId = $_GET['materialId'];
    $engineerId = $_GET['engineerId'];

    // $materialId = 2;
    // $engineerId = 4;
    
    $update = $dao->updateComplete($materialId, $engineerId);

    header("Location: ../../materials.php?" );
?>