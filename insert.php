<?php
  $method = $_SERVER['REQUEST_METHOD'];

  if ($method === 'POST') { 
    $file_route = dirname(__DIR__)."/api/data.json";
    $json_file = json_decode(file_get_contents($file_route),true);
    $name = strval($_POST['name']);
    $description = strval($_POST['description']);
    $author = strval($_POST['author']);
    $year = strval($_POST['year']);
    $nextID;

    if (count($json_file) > 0){
      $nextID = $json_file[count($json_file) -1]['id'] + 1;
      $newBook = array(
        "id" => $nextID,
        "name" => $name,
        "description" => $description,
        "author" => $author,
        "year" => $year
      );
    } else {
      $newBook = array(
        "id" => 0,
        "name" => $name,
        "description" => $description,
        "author" => $author,
        "year" => $year
      );
    }
    
    array_push($json_file,$newBook);
    $json = json_encode($json_file);
    file_put_contents($file_route,$json);
    echo json_encode(array("message" => 'Added'));    
  }
?>