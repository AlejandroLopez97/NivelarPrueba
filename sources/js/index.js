(()=>{

  //funcion para guardar la información del formulario en la base de datos
  const enviar = document.querySelector('#crear_contacto');

  if(enviar){

    enviar.addEventListener('click', e => {
      e.preventDefault();
      const formId = document.querySelector('#form_contacto');
      const form = new FormData(formId);

      fetch(base_url+'contacto',{method:'POST',body:form})
        .then(respuesta =>{
          if (respuesta.ok) {
            return respuesta.json();
          }
          return Promise.reject(respuesta)
        })
        .then(respuesta => {
          alert(respuesta.data)
          location.href = base_url
        })
        .catch(err => {
          err.json().the(({data}) =>{
            alert(data)
          })
        })
    });
  }


  //funcion para borrar un contacto seleccionado
  const contactoABorrar = document.querySelectorAll('.delete');

  contactoABorrar.forEach(contacto => {
    contacto.addEventListener('click', function handleClick(e){
      
      const id = e.target.dataset.id;
      console.log(id);

      fetch(base_url+'contacto/'+id,{method:'DELETE'})
        .then(respuesta => {
          if(respuesta.ok){
            return respuesta.json()
          }
          return Promise.reject(respuesta)
        }).then(respuesta =>{
            alert(respuesta.data)
            location.reload()

        }).catch(e => {
          if (err.json()) {
            err.json().then(({data}) => {
                alert(data);
            });
          } else {
            alert('Ocurrió un error inesperado.');
          }
        })

    });
  });

  const contactoAEditar = document.querySelector('#editar_contacto');

  if(contactoAEditar){
    contactoAEditar.addEventListener('click', e =>{
      e.preventDefault();

      const headers = new Headers();
      headers.append("Content-Type", "application/x-www-form-urlencoded");

      const formId = document.querySelector('#form_contacto');
      const form = new FormData(formId);
      const urlencoded = new URLSearchParams(form);
      const requestOptions = {
        method:'PUT',
        headers:headers,
        body:urlencoded,
        redirect:'follow'
      };

      fetch(base_url+'contacto/'+contactoId,requestOptions)
        .then(respuesta => {
          if(respuesta.ok){
            return respuesta.json();
          }
          return Promise.reject(respuesta);
        })
        .then(respuesta => {
          alert(respuesta.data)
          location.href = base_url
        }).catch( err => {
          err.json().then(({data}) => {
            alert(data)
          })
        })
    });

  }

})();