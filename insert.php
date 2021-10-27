<?php
  $method = $_SERVER['REQUEST_METHOD'];

  if ($method === 'POST' && isset($_POST['data'])) {
    
    $direccion = dirname(__DIR__)."/api/data.json";
    $contenido = json_decode(file_get_contents($direccion),true);
    $new = json_decode($_POST['data'],true);
    array_push($contenido,$new);
    $json = json_encode($contenido);
    file_put_contents($direccion,$json);
    echo json_encode(array("response" => "Added"));    
  }
?>