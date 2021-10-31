<?php
  $method = $_SERVER['REQUEST_METHOD'];

  if ($method === 'GET') {
    $file_route = dirname(__DIR__)."/api/data.json";
    $json_file = json_decode(file_get_contents($file_route),true);
    echo json_encode(array('data' => $json_file));
  }
  ?>