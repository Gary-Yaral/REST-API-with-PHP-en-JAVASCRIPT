let form = document.querySelector('#form-add');
let response = document.querySelector('.json-response');
let method = document. querySelector('#method');
let data= document.querySelector('#json');
let table = document.querySelector('table');

function renderTable(data) {
  let table = document.querySelector('table');
  let tbody = table.querySelector('tbody');
  tbody.innerHTML = '';
  data.forEach(book => {
    let tr = document.createElement('tr');
    tr.innerHTML = `
      <td>${book.id}</td>
      <td>${book.name}</td>
      <td>${book.description}</td>
      <td>${book.author}</td>
      <td>${book.year}</td>
      <td>
        <button class='edit'>Editar</button>
        <button class='delete'>Eliminar</button>
      </td>
    `;
    tbody.append(tr);
  });

  table.classList.remove('hidden');
}

function get_data() {
  fetch('get_data.php')
    .then(response => response.json())
    .then(data_api =>  {
      if(data_api.data.length > 0) renderTable(data_api.data);
    })
}

get_data();

table.addEventListener('click', (e) => {
  let btn = e.target;
  if (btn.classList.contains('delete')) {
    let parent = btn.parentNode.parentNode;  
    delete_data(parent);
  }
})

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


function insert() {
  let formData = new FormData();
  let name = document.querySelector('#name');
  let description = document.querySelector('#description');
  let author = document.querySelector('#author');
  let year = document.querySelector('#year');
  formData.append('name',name.value);
  formData.append('description',description.value);
  formData.append('author',author.value);
  formData.append('year',year.value);

  fetch('insert.php',{
    method: 'POST',
    body: formData
  })
  .then(response => response.json())
  .then(response =>  {
    alert(response.message);
    get_data();
    form.reset();
  })

  get_data();
}

function delete_data(parent) {
  let id = parent.querySelectorAll('td')[0].innerHTML;  
  fetch('delete.php',{
    method: 'DELETE',
    body: JSON.stringify({"id":parseInt(id)}),
    headers:{
      "Content-type": "application/json;charset=UTF-8",
    },
  })
    .then(response => response.json())
    .then(response =>  {
      alert(response.message);
    })

    get_data();
}

form.addEventListener('submit', (e) => {
  e.preventDefault();
  insert();
})

