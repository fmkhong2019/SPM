<?php
    session_start();
    require_once "common.php";
    $dao = new UserDAO();
    $result = $dao->updateUser($_SESSION["id"], $_POST['job'], $_POST['company'], $_POST['industry'], $_POST['specialization']);
    // This ensures that only new users with full profiles will be allowed to access main.php 
    if ($result && isset($_SESSION["id"]) && $dao->checkUser($_SESSION["id"])){
        $_SESSION['login'] = true;
    }
    header("Location: ../../guugle-main/guugle/main_page/main.php");
    //error handling!
    return $result;
?>