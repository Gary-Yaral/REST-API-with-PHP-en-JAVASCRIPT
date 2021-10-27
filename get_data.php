<?php
  $method = $_SERVER['REQUEST_METHOD'];

  if ($method === 'GET') {
    $direccion = dirname(__DIR__)."/api/data.json";
    $contenido = json_decode(file_get_contents($direccion),true);
    echo json_encode(array('data' => $contenido));
  }
  ?>