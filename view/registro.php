<?php include_once __DIR__ . '/layout/headlogin.php' ?>

<h4 class="font-weight-bolder">Nuevo Tramite</h4>
<p class="mb-0">Complete los datos correspondientes</p>
</div>
<div class="card-body">
  <form role="form" action="<?= APP_URL . '/view/content/Unew' ?>" method="POST" autocomplete="off">
    <div class="mb-3">
      <select name="tprocedure" id="tprocedure" class="form-control form-control-lg" aria-label="tipo_tramite" required>
        <option value="" disabled selected>Seleccione el tipo de tramite</option>
        <option value="1">Certificado</option>
        <option value="2">Constancia</option>
        <option value="3">Examen de Suficiencia</option>
        <option value="4">Examen de Ubicacion</option>
      </select>
    </div>
    <div class="mb-3">
      <input type="number" class="form-control form-control-lg" placeholder="Cantidad" aria-label="Cantidad" name="cantidad" id="cantidadDocs" value="1" min="1" max="5" required>
    </div>
    <div class="mb-3">
      <input type="text" class="form-control form-control-lg" placeholder="Dni" aria-label="Dni" name="dni" required>
    </div>
    <div class="mb-3">
      <input type="text" class="form-control form-control-lg" placeholder="Nombre" aria-label="nombre" name="nombre" required>
    </div>
    <div class="mb-3">
      <input type="text" class="form-control form-control-lg" placeholder="Apellido Paterno" name="ap_paterno" required>
    </div>
    <div class="mb-3">
      <input type="text" class="form-control form-control-lg" placeholder="Apellido Materno" name="ap_materno" required>
    </div>
    <div class="mb-3">
      <input type="email" class="form-control form-control-lg" placeholder="Correo" aria-label="correo" name="correo" required>
    </div>
    <div class="mb-3">
      <input type="text" class="form-control form-control-lg" placeholder="Numero de celular" aria-label="celular" name="celular" required>
    </div>
    <div class="mb-3">
      <input type="hidden" class="form-control form-control-lg" placeholder="" aria-label="" name="idtipo" value="3">
    </div>
    <div class="text-center">
      <button type="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Proceder</button>
    </div>
  </form>
</div>
<div class="card-footer text-center pt-0 px-lg-2 px-1">
  <p class="mb-4 text-sm mx-auto">
    Usuarios con cuenta
    <a href="<?= APP_URL . '/view/login' ?>" class="text-primary text-gradient font-weight-bold">Ingrese aqui</a>&nbsp;&nbsp;&nbsp;
    <a href="<?= APP_URL . '/view/tramite' ?>" class="text-primary text-gradient font-weight-bold">Continuar</a>
  </p>
</div>

<script>
  const selectedOption = document.querySelector("#tprocedure");
  const testOption = document.querySelector("#cantidadDocs");
  selectedOption.addEventListener("change", () => {
    let numberOption = selectedOption.value;
    console.dir(testOption);
    if (numberOption == 3 || numberOption == 4) {
      testOption.readOnly = true;
      console.dir(testOption);
    } else if (numberOption == 1 || numberOption == 2) {
      testOption.readOnly = false;
    }
  });
</script>
<?php include_once __DIR__ . '/layout/footerlogin.php' ?>