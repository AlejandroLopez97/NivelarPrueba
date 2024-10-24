
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
    <h3 class="mt-2 center">Detalles de contactos</h3>
    <h5 class="mt-2 center">Contacto: <?= $datos['contacto'][0]['Nombre'].' '.$datos['contacto'][0]['Apellido']?></h5>

    <div class="row col-3 justify-content-center">
      <div class="d-grid gap2">
        <a href="<?= base_url() ?>contacto/agregar/" class="btn btn-primary">Agregar contacto</a>
      </div>
    </div>

    <div class="row mt-3">
      <!-- consulto los datos de contactos para mostrar en la vista principal -->
      <?php if(isset($datos) && is_array($datos)):?>
        <?php foreach($datos['telefonos'] as $telefono):?>
        <div class="col md-4 pt-3">
          <div class="card">
            <div class="card-body">
              <p class="card-text">Telefono: <?= $telefono['Telefono']?></p>
              <button class="btn btn-primary">+</button>
              <a href="<?= base_url()?>contacto/<?= $telefono['Id']?>/editar" class="btn btn-success">Editar</a>
              <button class="btn btn-danger delete_telefono" data-id="<?= $telefono['Id']?>">Eliminar</button>
            </div>
          </div>
        </div>
        <?php endforeach?>
        <?php foreach($datos['emails'] as $email):?>
          <div class="col md-4 pt-3">
          <div class="card">
            <div class="card-body">
              <p class="card-text">Email: <?= $email['Email']?></p>
              <button class="btn btn-primary">+</button>
              <a href="<?= base_url()?>contacto/<?= $email['Id']?>/editar" class="btn btn-success">Editar</a>
              <button class="btn btn-danger delete_email" data-id="<?= $email['Id']?>">Eliminar</button>
            </div>
          </div>
        </div>
        <?php endforeach?>
      <?php else:?>
        <p class="info">¡No hay contactos registrados!</p>
      <?php endif; ?>
    </div>
  </div>
  <script src="<?= base_url() ?>sources/js/home.js"></script>
</body>
</html>