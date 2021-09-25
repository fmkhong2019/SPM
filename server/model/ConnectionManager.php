<?php
class ConnectionManager {

  public function getConnection() {
    $servername = "localhost";
    $username = "root";
    $password = "";  //mamp pls change
    $dbname = "phriscoskitt";
    
    return new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);     
  }
 
}
?>