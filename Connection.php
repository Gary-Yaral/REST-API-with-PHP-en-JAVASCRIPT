<?php

class Connection {
  private $host;
  private $user;
  private $pass;
  private $db;

  public function __construct() {
    $accessData = $this->get_data_connection()["connection"];
    $this->host = $accessData['host'];
    $this->user = $accessData['user'];
    $this->pass = $accessData['password'];
    $this->db = $accessData['database'];
    
  }

  private function get_data_connection() {
    $connectionData = dirname(__FILE__);
    $jsonData = file_get_contents($connectionData.'/'.'config');
    return json_decode($jsonData,true);
  }

  public function connect() {
    try {
      $connection = 'mysql:host='.$this->host.';dbname='.$this->db.';charset=utf8';
      $attributes = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
      $pdo = new PDO($connection, $this->user, $this->pass, $attributes);
      echo 'Connection successfully';
      return $pdo;

    } catch(PDOException $error) {
      die('Error: '.$error->getMessage());

    }
  }
}

?>