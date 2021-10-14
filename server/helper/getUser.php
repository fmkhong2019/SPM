<?php
    session_start();
    require_once "common.php";
    $dao = new UserDAO();

    $user = $dao->getUser($_SESSION["id"]);
    $result = array("users" => array());

    
    $result["users"] = array(
        "id" => $user->getid(),
        "dname" => $user->getdname(),
        "fname" => $user->getfname(),
        "lname" => $user->getlname(),
        "email" => $user->getEmail(),
        "photoURL" => $user->getPhotoURL(),
        "job" => $user->getJob(),
        "company" => $user->getCompany(),
        "industry" => $user->getIndustry(),
        "specialization" => $user->getSpecialization()
    );

    echo json_encode($result);
?>

