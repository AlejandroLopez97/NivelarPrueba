
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>NivelarPrueba</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script>
    let base_url = '<?= base_url()?>';
  </script>
</head>
<body>
  <div class="container mt-5">
    <h3 class="mt-2 center">Agenda de contactos</h3>

    <div class="row col-3 justify-content-center">
      <div class="d-grid gap2">
        <a href="<?= base_url() ?>contacto/crear" class="btn btn-primary">Crear contacto</a>
      </div>
    </div>

    <div class="row mt-3">
      <!-- consulto los datos de contactos para mostrar en la vista principal -->
      <!-- ?php if(isset($datos['contactos']) && is_array($datos['contactos'])):?> -->
        <?php foreach($datos['contactos'] as $contacto):?>
        <div class="col md-4 pt-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Nombre: <?= $contacto['nombre']?></h5>
              <p class="card-text">Apellido: <?= $contacto['apellido']?></p>
              <button class="btn btn-primary">+</button>
              <a href="<?= base_url()?>contacto/<?= $contacto['id']?>/detalles" class="btn btn-success">Detalles</a>
              <a href="<?= base_url()?>contacto/<?= $contacto['id']?>/editar" class="btn btn-success">Editar</a>
              <button class="btn btn-danger delete" data-id='<?= $contacto['id']?>'>Eliminar</button>
            </div>
          </div>
        </div>
        <?php endforeach?>
      <!-- ?php else:?>
        <p class="info">¡No hay contactos registrados!</p>
      ?php endif; ?> -->
    </div>
  </div>
  <script src="<?= base_url() ?>sources/js/index.js"></script>
</body>
</html>