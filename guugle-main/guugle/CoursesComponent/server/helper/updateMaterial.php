<?php
    require_once "common.php";
    $dao = new MaterialDAO();

    $materialId = $_GET['materialId'];
    
    $result = $dao-> updateComplete($materialId);

    header("Location: ../../materials.php");
    
    // header("Location: ../../viewing.php");

    // return $result;
?>