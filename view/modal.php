<?php
require_once __DIR__ . '/../config/config.php';
require_once(APP_ROOT . '/../Controllers/ProcedureControllers.php');
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="<?= APP_URL . '/assets/css/propio.css' ?>">
    <title>Proceso de Tramite</title>
</head>
<body>
    <?php if (isset($_SESSION['dni_user'])) { ?>
        <div id="myModal" class="modal">
            <div class="modal-content">
                <span class="titulo">PERFECTO</span>
                <div class="parrafo">El tramite que usted solicito esta en proceso</div>
                <div class="subtitulo">Copie su Codigo de Pago</div>
                <div class="codigo"><?= $codigo ?></div>
                <!-- <a class="boton btn-success" href="" >Pagar Ahora</a> -->
                <a class="boton btn-danger" href="<?= APP_URL . '/view/tramiteus' ?>">Salir</a>
            </div>
        </div>
    <?php } else { ?>
        <div id="myModal" class="modal">
            <div class="modal-content">
                <span class="titulo">PERFECTO</span>
                <div class="parrafo">El tramite que usted solicito esta en proceso</div>
                <div class="subtitulo">Copie su Codigo de Pago</div>
                <div class="codigo"><?= $codigo ?></div>
                <a class="boton btn-success" href="<?= APP_URL . '/view/pago' ?>">Pagar Ahora</a>
                <a class="boton btn-danger" href="<?= APP_URL . '/view/registro' ?>">Salir</a>
            </div>
        </div>
    <?php } ?>
    <script src="<?= APP_URL . '/assets/js/propio.js' ?>"></script>
</body>
</html>