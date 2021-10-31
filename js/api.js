let form = document.querySelector('#form-add');
let response = document.querySelector('.json-response');
let method = document. querySelector('#method');
let data= document.querySelector('#json');
let table = document.querySelector('table');
let closeModal = document.querySelector('#closeModal');
let updateModal = document.querySelector('#modal');
let updateForm = document.querySelector('#form-update');

function renderTable(data) {
  let table = document.querySelector('table');
  let tbody = table.querySelector('tbody');
  tbody.innerHTML = '';
  data.forEach(book => {
    let tr = document.createElement('tr');
    tr.innerHTML = `
      <td class='table-id'>${book.id}</td>
      <td>${book.name}</td>
      <td>${book.description}</td>
      <td>${book.author}</td>
      <td>${book.year}</td>
      <td>
        <div>
          <button class='edit'>Editar</button>
          <button class='delete'>Eliminar</button>
        </div>
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
    let parent = btn.parentNode.parentNode.parentNode;  
    delete_data(parent);
  }

  if (btn.classList.contains('edit')) { 
    updateModal.classList.remove('hidden'); 
    let parent = btn.parentNode.parentNode.parentNode;
    let id = parent.querySelectorAll('td')[0].innerHTML;
    updateForm.querySelector('#name').value = parent.querySelectorAll('td')[1].innerHTML;
    updateForm.querySelector('#description').value = parent.querySelectorAll('td')[2].innerHTML;
    updateForm.querySelector('#author').value = parent.querySelectorAll('td')[3].innerHTML;
    updateForm.querySelector('#year').value = parent.querySelectorAll('td')[4].innerHTML;
    updateModal.setAttribute('update',id);
    console.log('here')

  }
})

function update(idUpdate, form) {
  let formData = new FormData(form);
  let id = parseInt(idUpdate);
  let name = formData.get('name');
  let description = formData.get('description');
  let author = formData.get('author');
  let year = formData.get('year');
  let data = {
    "id":id,
    "name": name,
    "description": description,
    "author": author,
    "year": year
  }
  
  fetch('update.php',{
    method: 'PUT',
    body: JSON.stringify(data),
    headers:{
      "Content-type": "application/json;charset=UTF-8",
    },
  })
  .then(response => response.json())
  .then(response =>  {
    console.log(response);
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

function delete_data(parentNode) {
  let id = parentNode.querySelectorAll('td')[0].innerHTML;

  fetch('delete.php',{
    method: 'DELETE',
    body: JSON.stringify({"id":parseInt(id)}),
    headers:{
      "Content-type": "application/json;charset=UTF-8",
    },
  })
    .then(response => response.json())
    .then(response =>  {
      get_data();
      alert(response.message);
    })
}

function verifyEmpty(form) {
  let data =new FormData(form);
  let name = data.get('name');
  let description = data.get('description');
  let author = data.get('author');
  let year = data.get('year');

  if(name === '') {
    form.querySelector('#name').focus();
    return false;
  }
  if(description === '') {
    form.querySelector('#description').focus();
    return false;
  }
  if(author === '') {
    form.querySelector('#author').focus();
    return false;
  }
  if(year === '') {
    form.querySelector('#year').focus();
    return false;
  }
  return true;
}

closeModal.addEventListener('click', () => {
  updateModal.classList.add('hidden');
  console.log(updateModal)
})

form.addEventListener('submit', (event) => {
  event.preventDefault();

  if (verifyEmpty(event.currentTarget) === false) {
    alert('Debe llenar todos los campos');
  }

  if (verifyEmpty(event.currentTarget) === true) {
    insert();
  }
})

updateForm.addEventListener('submit', (event) => {
  event.preventDefault();

  if (verifyEmpty(event.currentTarget) === false) {
    alert('Debe llenar todos los campos');
  }

  if (verifyEmpty(event.currentTarget) === true) {
    let id = updateModal.getAttribute('update');
    update(id, event.currentTarget);
  }
})
