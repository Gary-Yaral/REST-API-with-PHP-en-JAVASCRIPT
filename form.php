<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <title>API</title>
</head>
<body>
  <h2>API Rest</h2>
  <form id="form-add">
    <section>
      <div id="book-data" class="book-data">
        <label for="name">Nombre:</label>
        <input type="text" id="name" name="name">
        <label for="description">Descripción:</label>
        <input type="text" id="description" name="description">
        <label for="author">Autor:</label>
        <input type="text" id="author" name="author">
        <label for="year">Año:</label>
        <input type="text" id="year" name="year">
      </div>
      <input type="submit" value="Agregar">
    </section>
  </form>
  <table id="data-api" class="hidden">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Descripción</th>
        <th>Autor</th>
        <th>Año</th>
        <th>Opciones</th>
      </tr>
    </thead>
    <tbody> 
    </tbody>
  </table>
  <script src="js/api.js"></script>
</body>
</html>