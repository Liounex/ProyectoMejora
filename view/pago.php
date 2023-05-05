<?php
    require '../layout/headlogin.php';
?>
<h4 class="font-weight-bolder">Pago</h4>
<p class="mb-0">Ingrese el codigo de pago que genero</p>
</div>
<div class="card-body">
  <form role="form" action="/proyectomejora/view/content/pago" method="POST" autocomplete="off">
    <div class="mb-3">
      <input type="text" class="form-control form-control-lg" placeholder="Ingrese el codigo de pago" aria-label="Pago" name="codepage" required>
    </div>
    <div class="text-center">
      <button type="submit" name="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Proceder</button>
    </div>
    </form>
</div>
<div class="card-footer text-center pt-0 px-lg-2 px-1">
  <p class="mb-4 text-sm mx-auto">
  <a href="./tramite" class="text-primary text-gradient font-weight-bold">Volver</a>
  </p>
</div>
<?php
    require '../layout/footerlogin.php'; 