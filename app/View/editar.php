
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>NivelarPrueba</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script>
    const base_url = '<?= base_url()?>';
    const contactoId = '<?= $datos['contactoId']?>';
  </script>
</head>
<body>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <h5 class="card-title m-3">Edición de contactos</h5>
          <div class="card-body">
            <form id="form_contacto">

              <div class="mb-3">
                <label for="nombre">Nombre</label>
                <input type="text" 
                       name="nombre" 
                       id="nombre" 
                       class="form-control"
                       value="<?= $datos['contacto'][0]['Nombre']?>">
              </div>

              <div class="mb-3">
                <label for="apellido">Apellido</label>
                <input type="text" 
                       name="apellido" 
                       id="apellido" 
                       class="form-control"
                       value="<?= $datos['contacto'][0]['Apellido']?>">
              </div>
              <div class="mb-3">
                <div class="d-grid gap-2">
                  <button class="btn btn-success" id="editar_contacto">Editar</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>

    </div>
  </div>
  <script src="<?= base_url()?>sources/js/index.js"></script>
</body>
</html>