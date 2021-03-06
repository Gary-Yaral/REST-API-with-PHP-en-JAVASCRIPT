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
  <div class="container-data">
    <h2>Books Rest API</h2>
    <section class="data-form card">
      <form id="form-add">
        <center>
          <h4>New Book</h4>
        </center>
        <br>
        <section>
          <div id="book-data" class="book-data">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name">
            <label for="description">Description:</label>
            <input type="text" id="description" name="description">
            <label for="author">Author:</label>
            <input type="text" id="author" name="author">
            <label for="year">Year:</label>
            <input type="text" id="year" name="year">
          </div>
          <input type="submit" value="Add">
        </section>
      </form>
    </section>
    <section class="data-table card">
      <table id="data-api" class="hidden">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Author</th>
            <th>Year</th>
            <th>Options</th>
          </tr>
        </thead>
        <tbody> 
        </tbody>
      </table>
    </section>
  </div>
  <footer>Powered by Gary Yaral &copy</footer>
  <section id="modal" class="modal-update hidden">
    <div id="closeModal" class="close">X</div>
    <form id="form-update" class="form-update">
      <center><h4>Update Book</h4></center>
      <br>
      <section>
        <div id="book-data" class="book-data">
          <label for="name">Name:</label>
          <input type="text" id="name" name="name">
          <label for="description">Description:</label>
          <input type="text" id="description" name="description">
          <label for="author">Author:</label>
          <input type="text" id="author" name="author">
          <label for="year">Year:</label>
          <input type="text" id="year" name="year">
        </div>
        <input type="submit" value="Save changes">
      </section>
    </form>
  </section>
  <script src="js/sweet-alert.js"></script>
  <script src="js/api.js"></script>
</body>
</html>