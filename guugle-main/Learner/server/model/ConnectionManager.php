<?php
class ConnectionManager {

  public function getAWSConnection() {
    $servername = "spm.cpaxvjaqps8a.ap-southeast-1.rds.amazonaws.com";
    $portnumber = "3306";
    $charset = 'utf8';
    $username = "admin";
    $password = "ilovespm";  //mamp pls change
    $dbname = "LMS";
    
    return new PDO("mysql:host=$servername;port=$portnumber;dbname=$dbname;charset=$charset", $username, $password);     
  }

  public function getTestConnection() {
    $servername = "";
    $portnumber = "3306";
    $charset = 'utf8';
    $username = "admin";
    $password = "ilovespm";  //mamp pls change
    $dbname = "LMS";
    
    return new PDO("mysql:host=$servername;port=$portnumber;dbname=$dbname;charset=$charset", $username, $password);     
  }

  public function getConnection() {
    $servername = "localhost";
    $username = "root";
    $password = "";  //mamp pls change
    $dbname = "lms";
    
    return new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);     
  }
  
 
}
?>