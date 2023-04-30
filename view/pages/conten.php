<h4 class="font-weight-bolder">Nuevo Tramite</h4>
<p class="mb-0">Complete los datos correspondientes</p>
</div>
<div class="card-body">
  <form role="form" action="../content/actions/Unew" method="POST" autocomplete="off">
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
      <input type="text" class="form-control form-control-lg" placeholder="Dni" aria-label="Dni" name="dni" required>
    </div>
    <div class="mb-3">
      <input type="text" class="form-control form-control-lg" placeholder="Nombre" aria-label="nombre" name="nombre" required>
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
  <a href="./index" class="text-primary text-gradient font-weight-bold">Ingrese aqui</a>&nbsp;&nbsp;&nbsp;
  <a href="./tramite" class="text-primary text-gradient font-weight-bold">Continuar</a>
  </p>
</div>