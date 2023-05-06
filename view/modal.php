<?php
require_once __DIR__ . '/../config/config.php';
require_once(APP_ROOT . '/../Controllers/ProcedureControllers.php');
include_once __DIR__ . '/layout/headlogin.php';
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="<?= APP_URL . '/assets/css/propio.css' ?>">
    <title>Proceso de Tramite</title>
</head>
<div>
    <?php if (isset($_SESSION['dni_user'])) : ?>
        <div id="myModal" class="modal">
            <div class="modal-content">
                <span class="titulo">PERFECTO</span>
                <div class="parrafo">El tramite que usted solicito esta en proceso</div>
                <div class="subtitulo">Copie su Codigo de Pago</div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" id="code" placeholder="Codigo de Pago" aria-label="codigopago" aria-describedby="basic-addon2" value="<?= $codigo ?>" readonly>
                    <button class="input-group-text" type="button" id="basic-addon2"><i class="fa fa-copy"></i></button>
                </div>
                <div id="notificacion" class="mb-3"></div>
                <!-- <a class="boton btn-success" href="" >Pagar Ahora</a> -->
                <div class="mb-3">
                    <a class="btn btn-danger" href="<?= APP_URL . '/view/tramiteus' ?>">Salir</a>
                </div>
            </div>
        </div>
</div>
    <?php else : ?>
        <div id="myModal" class="modal">
            <div class="modal-content">
                <span class="titulo">PERFECTO</span>
                <div class="parrafo">El tramite que usted solicito esta en proceso</div>
                <div class="subtitulo">Copie su Codigo de Pago</div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" id="code" placeholder="Codigo de Pago" aria-label="codigopago" aria-describedby="basic-addon2" value="<?= $codigo ?>" readonly>
                    <button class="input-group-text" type="button" id="basic-addon2"><i class="fa fa-copy"></i></button>
                </div>
                <div id="notificacion" class="mb-3"></div>
                <!-- <a class="boton btn-success" href="" >Pagar Ahora</a> -->
                <div class="mb-3">
                    <a class="btn btn-success" href="<?= APP_URL . '/view/pago' ?>">Pagar Ahora</a>
                    <a class="btn btn-danger" href="<?= APP_URL . '/view/registro' ?>">Salir</a>
                </div>
            </div>
        </div>
</div>
<?php endif; ?>
<script src="<?= APP_URL . '/assets/js/propio.js' ?>"></script>
<?php include_once __DIR__ . '/layout/footerlogin.php'; ?>
</body>
</html>