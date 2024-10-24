(() => {



  const telefonoABorrar = document.querySelectorAll('.delete_telefono');

  telefonoABorrar.forEach(telefono => {
    telefono.addEventListener('click', function handleClick(e){
      
      const id = e.target.dataset.id;
      // console.log(id);

      fetch(base_url+'contacto/detalles'+id+'eliminar-telefono',{method:'DELETE'})
        .then(respuesta => {
          if(respuesta.ok){
            return respuesta.json()
          }
          return Promise.reject(respuesta)
        }).then(respuesta =>{
            alert(respuesta.data)
            location.reload()

        }).catch(err => {
            err.json().then(({data}) =>{
                alert(data)
            })
        })

    });
  });

  const emailABorrar = document.querySelectorAll('.delete_email');

  emailABorrar.forEach(email => {
    email.addEventListener('click', function handleClick(e){
      
      const id = e.target.dataset.id;
      // console.log(id);

      fetch(base_url+'contacto/detalles'+id+'eliminar-email',{method:'DELETE'})
        .then(respuesta => {
          if(respuesta.ok){
            return respuesta.json()
          }
          return Promise.reject(respuesta)
        }).then(respuesta =>{
            alert(respuesta.data)
            location.reload()

        }).catch(err => {
            err.json().then(({data}) =>{
                alert(data)
            })
        })

    });
  });

});