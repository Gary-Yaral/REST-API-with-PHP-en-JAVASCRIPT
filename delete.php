<?php
$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'DELETE') {
  $data = json_decode(file_get_contents('php://input'));  
  $direccion = dirname(__DIR__)."/api/data.json";
  $contenido = json_decode(file_get_contents($direccion),true);
  $newArray = array();
  $exists = false;
  for($i = 0; $i < count($contenido); $i++) {
    if($contenido[$i]["id"] !== $data->id){
      array_push($newArray, $contenido[$i]);
    }else{
      $exists = true;
    }
  }
  
  $json = json_encode($newArray);
  file_put_contents($direccion,$json);
  
  if($exists === true) {
    echo json_encode(array("Response" => "Deleted"));
  } else {
    echo json_encode(array("Error" => "Not exists"));
  }
  
}
