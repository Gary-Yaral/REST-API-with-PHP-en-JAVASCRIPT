<?php
  $method = $_SERVER['REQUEST_METHOD'];

  if ($method === 'PUT') {
    /*header("Access-Controll-Allow-Origin: *");
    header("Content-Type:application/json");
    header("Access-Controll-Allow-Methods: PUT");*/

    $data = json_decode(file_get_contents('php://input'));
    $direccion = dirname(__DIR__)."/api/data.json";
    $json_file = json_decode(file_get_contents($direccion),true);
    
    if($data !== null ) {
      $exists = false;

      for ($i = 0; $i < count($json_file); $i++) {
        if ($json_file[$i]["id"] === $data->id){
          $json_file[$i]["name"] = $data->name;
          $json_file[$i]["description"] = $data->description;
          $json_file[$i]["author"] = $data->author;
          $json_file[$i]["year"] = $data->year;

          $json = json_encode($json_file);
          $exists = true;

          file_put_contents($direccion,$json);
          echo json_encode(array("message" => "Updated"));
        }
      }

      if ($exists === false) {
        echo json_encode(array("message" => "Not exists this book"));
      }

    } else {
      echo json_encode(array("message" => "Empty values"));
    }
    
  }
?>