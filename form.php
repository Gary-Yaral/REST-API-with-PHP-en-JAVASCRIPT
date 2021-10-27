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
  <form>
    <h3>API Rest</h3>
    <section>
      <label for="method">Selecciona el método</label>
      <select name="method" id="method">
        <option value="POST">POST</option>
        <option value="GET">GET</option>
        <option value="PUT">PUT</option>
        <option value="DELETE">DELETE</option>
      </select>
      <textarea name="json" cols="30" rows="10" id='json'></textarea>
      <input type="submit" value="Enviar">
    </section>
    <div class="response">
      <label>Respuesta</label>
      <code class="json-response"></code>
    </div>
  </form>
  <script>
    let form = document.querySelector('form');
    let response = document.querySelector('.json-response');
    let method = document. querySelector('#method');
    let data= document.querySelector('#json');

    function update(data, response) {
      fetch('update.php',{
            method: 'PUT',
            body: data.value,
            headers:{
              "Content-type": "application/json;charset=UTF-8",
            },
          })
          .then(response => response.json())
          .then(response_message =>  {
            response.innerHTML = JSON.stringify(response_message);
          })
    }

    function insert(data, response) {
      let formData = new FormData();
      formData.append('data', data.value);
      fetch('insert.php',{
            method: 'POST',
            body: formData
          })
          .then(response => response.json())
          .then(response_message =>  {
            response.innerHTML = JSON.stringify(response_message);
          })
    }

    function delete_data(data, response) {
      fetch('delete.php',{
        method: 'DELETE',
            body: data.value,
            headers:{
              "Content-type": "application/json;charset=UTF-8",
            },
          })
          .then(response => response.json())
          .then(response_message =>  {
            response.innerHTML = JSON.stringify(response_message);
          })
    }

    function get_data(response) {
      fetch('get_data.php')
          .then(response => response.json())
          .then(response_message =>  {
            response.innerHTML = JSON.stringify(response_message);
          })
    }

    form.addEventListener('submit', (e) => {
      e.preventDefault();
      let formData;
      switch (method.value) {
        case 'GET':
          get_data(response);
          break;
        case 'POST':
          insert(data, response);
          break;
        case 'PUT':    
          update(data, response);
          break;
          case 'DELETE': 
            delete_data(data, response);
          break;
          default:  
        }
        //console.log(JSON.parse(data.value));
        //console.log(method.value);
      
      //let formData = new FormData(e.target);
      /*
      fetch('data.php',{
        method: method.value,
        body:formData
      })
      .then(response => response.json())
      .then(res =>  {
        console.log(res);
        response.innerHTML = JSON.stringify(res);
      })*/
    })


  </script>
</body>
</html>