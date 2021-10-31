<?php
$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'DELETE') {
  $data = json_decode(file_get_contents('php://input'));
  $file_route = dirname(__DIR__)."/api/data.json";
  $json_file = json_decode(file_get_contents($file_route),true);
  $newArray = array();
  $exists = false;
  
  for($i = 0; $i < count($json_file); $i++) {
    if($json_file[$i]["id"] !== $data->id){
      array_push($newArray, $json_file[$i]);
    }else{
      $exists = true;
    }
  }
  
  $json = json_encode($newArray);
  file_put_contents($file_route,$json);
  
  if($exists === true) {
    echo json_encode(array("message" => "Deleted"));
  } else {
    echo json_encode(array("message" => "Not exists"));
  }
  
}
