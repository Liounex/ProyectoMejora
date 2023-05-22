<?php
include_once __DIR__ . '/layout/headlogin.php';
require_once APP_ROOT . '/../Controllers/PayControllers.php';

$data = '';
$dolar = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $id = $_POST['codigo'];

  $show = new PayControllers();
  $data = $show->mostrar($id);
  if (is_array($data) && isset($data['total'])) {
    $dolar = number_format(floatval($data['total']) / 3.70, 2);
  }
}
?>
<h4 class="font-weight-bolder">Pago</h4>
<p class="mb-0">Ingrese el codigo de pago que genero</p>
</div>
<div class="card-body">
  <form role="form" action="" method="POST" autocomplete="off" class="mb-2">
    <div class="mb-3">
      <input type="text" class="form-control form-control-lg" placeholder="Ingrese el codigo de pago" aria-label="Pago" placeholder="Codigo de Pago" name="codigo" id="codigo" required>
    </div>
    <div class="text-center">
      <button type="submit" name="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Proceder</button>
    </div>
  </form>
  <div class="card-footer text-center pt-0 px-lg-2 px-1">
    <p class="mb-4 text-sm mx-auto">
      <a href="./tramiteus  " class="text-primary text-gradient font-weight-bold">Volver</a>
    </p>
  </div>
  <?php if (is_array($data) && $data['status'] == 1) : ?>
    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST') : ?>
      <div class="alert alert-success col-md-12 text-center" role="alert">
        Este Codigo ya esta Pagado
      </div>
    <?php endif; ?>
  <?php else : ?>
    <?php if (!empty($data)) : ?>
      <div class="paypal-buttons">
        <ul class="list-group">
          <li class="list-group-item">
            Tramite : <?= $data['nombre'] ?>
          </li>
          <li class="list-group-item">
            Descripcion : <?= $data['descripciont'] ?>
          </li>
          <li class="list-group-item">
            Dni : <?= $data['dni_user'] ?>
          </li>
          <li class="list-group-item">
            Nombre : <?= $data['nombre'] ?>
          </li>
          <li class="list-group-item">
            Precio : <?= number_format($data['total'], 2) . ' Soles Peruanos' ?>
          </li>
          <li class="list-group-item">
            Precio en Dolares: <?= $dolar . ' Dolares Americanos' ?>
          </li>
        </ul>
        <div id="paypal-button-container"></div>
      </div>
    <?php else : ?>
      <?php if ($_SERVER['REQUEST_METHOD'] === 'POST') : ?>
        <div class="alert alert-danger col-md-12 text-center text-white" role="alert">
          No existe el codigo de pago
        </div>
      <?php endif; ?>
    <?php endif; ?>
  <?php endif; ?>
</div>
<?php include_once __DIR__ . '/content/script.php' ?>
<?php include_once __DIR__ . '/layout/footerlogin.php'; ?>