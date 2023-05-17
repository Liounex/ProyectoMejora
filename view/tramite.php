<?php
include_once __DIR__ . '/layout/headlogin.php';
?>
<h4 class="font-weight-bolder">Continue el tramite</h4>
<p class="mb-0">Complete los datos correspondientes</p>
</div>
<!-- action="" -->
<div class="card-body">
    <form role="form" action="<?= APP_URL . '/view/content/tramite'?>" method="POST" enctype="multipart/form-data" autocapitalize="off" >
        <i class="fa fa-question-circle" aria-hidden="true" title="Use el codigo de pago que recibio"></i>
        <div class="input-group mb-3">
            <input type="text" class="form-control form-control-lg" id="codigo" name="codigo" placeholder="Codigo de Pago" aria-label="codigopago" aria-describedby="basic-addon2">
            <button class="input-group-text" type="button" id="btn-buscar"><i class="fa fa-search"></i></button>
        </div>
        <div class="mb-3">
            <input type="text" class="form-control form-control-lg" placeholder="Dni" aria-label="Dni" name="dni" id="dni">
        </div>
        <div class="mb-3">
            <input type="text" class="form-control form-control-lg" placeholder="Nombre" aria-label="nombre" name="nombre" id="nombre">
        </div>
        <div class="mb-3">
            <input type="text" class="form-control form-control-lg" placeholder="Apellido Paterno" aria-label="ap_paterno" name="ap_paterno" id="ap_paterno">
        </div>
        <div class="mb-3">
            <input type="text" class="form-control form-control-lg" placeholder="Apellido Materno" aria-label="ap_materno" name="ap_materno" id="ap_materno">
        </div>
        <div class="mb-3">
            <input type="email" class="form-control form-control-lg" placeholder="Correo" aria-label="correo" name="correo" id="correo">
        </div>
        <div class="mb-3">
            <input type="text" class="form-control form-control-lg" placeholder="Telefono" aria-label="telefono" name="telefono" id="telefono">
        </div>
        <div class="mb-3">
            <input type="text" name="tprocedure"  id="tprocedure" class="form-control form-control-lg" aria-label="tipo_tramite" placeholder="Tipo de tramite" required>
        </div>
        <div class="mb-3">
            <select name="idioma" id="idioma" class="form-control form-control-lg" aria-label="tipo_tramite" required>
                <option value="" disabled selected>Seleccione el idioma</option>
                <option value="Ingles">Ingles</option>
                <option value="Quechua">Quechua</option>
            </select>
        </div>
        <div class="mb-3">
            <input type="hidden" name="cantidad"  id="cantidad" class="form-control form-control-lg" aria-label="tipo_tramite" required>
        </div>
        <!-- <div class="mb-3">
            <select name="tprocedure" id="tprocedure" class="form-control form-control-lg" aria-label="tipo_tramite" required>
                <option value="" disabled selected>Seleccione el tipo de tramite</option>
                <option value="1" required>Certificado</option>
                <option value="2">Constancia</option>
                <option value="3">Examen de Suficiencia</option>
                <option value="4">Examen de Ubicacion</option>
            </select>
        </div> -->
        <div class="infoBox">

        </div>
        <div id="prueba"></div>
        <div class="mb-3">
            <input type="file" name="fileDni"  id="fileDni" class="form-control form-control-lg" aria-label="fileDni"  >
        </div>
        <div class="mb-3">
            <input type="file" name="fileVoucher"  id="fileVoucher" class="form-control form-control-lg" aria-label="fileVoucher" >
        </div>
        <div class="text-center">
            <button type="submit" name="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Solicitar</button>
        </div>
    </form>
</div>
<div class="card-footer text-center pt-0 px-lg-2 px-1">
    <p class="mb-4 text-sm mx-auto">
        <a href="<?= APP_URL . '/view/registro' ?>" class="text-primary text-gradient font-weight-bold">Volver</a>
    </p>
</div>
<script src="<?= APP_URL . '/assets/js/select.js' ?>"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="<?= APP_URL . '/assets/js/validate.js' ?>"></script>

<?php include_once __DIR__ . '/layout/footerlogin.php' ?>