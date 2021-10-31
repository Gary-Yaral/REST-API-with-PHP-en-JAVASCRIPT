<?php
  include 'config.php';
  header('Content-type: application/json');
  $file_route = dirname(__DIR__)."/api/data.json";
  $data = json_decode(file_get_contents($file_route),true);

  echo json_encode(array("books" => $data),JSON_PRETTY_PRINT);
  
?>