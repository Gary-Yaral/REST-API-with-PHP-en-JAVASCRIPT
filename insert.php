<?php
  $method = $_SERVER['REQUEST_METHOD'];

  if ($method === 'POST') { 
    $direccion = dirname(__DIR__)."/api/data.json";
    $contenido = json_decode(file_get_contents($direccion),true);
    $name = strval($_POST['name']);
    $description = strval($_POST['description']);
    $author = strval($_POST['author']);
    $year = strval($_POST['year']);
    $nextID;
    if (count($contenido) > 0){
      $nextID = $contenido[count($contenido) -1]['id'] + 1;
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
    array_push($contenido,$newBook);
    $json = json_encode($contenido);
    file_put_contents($direccion,$json);
    echo json_encode(array("message" => 'Product added successfully'));    
  }
?>