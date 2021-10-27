<?php
  echo json_encode($_SERVER['METHOD_REQUEST']);/*

  $direccion = dirname(__DIR__)."/api/data.json";
  $contenido = json_decode(file_get_contents($direccion),true);
  $array = array("name"=>"Julio");
  array_push($contenido, $array);
  $json = json_encode($contenido);
  file_put_contents($direccion,$json);
  print_r($contenido);*/
?>