<?php
  $method = $_SERVER['REQUEST_METHOD'];

  if ($method === 'PUT') {
    /*header("Access-Controll-Allow-Origin: *");
    header("Content-Type:application/json");
    header("Access-Controll-Allow-Methods: PUT");*/

    $data = json_decode(file_get_contents('php://input'));
    $direccion = dirname(__DIR__)."/api/data.json";
    $contenido = json_decode(file_get_contents($direccion),true);
   
    if($data !== null ) {
      $exists = false;
      for($i = 0; $i < count($contenido); $i++) {
        if($contenido[$i]["id"] === $data->id){
          $contenido[$i]["name"] = $data->name;
          $json = json_encode($contenido);
          $exists = true;
          file_put_contents($direccion,$json);
          echo json_encode(array("response" => "Updated"));
        }
      }

      if($exists === false) {
        echo json_encode(array("Error" => "Not exists"));
      }

    } else {
      echo json_encode(array("Error" => "Not exists"));
    }
    
  }
?>