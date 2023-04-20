<?php
    require '../../../Controllers/UserControllers.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../../../assets/css/propio.css">
        <title>Proceso de Tramite</title>
    </head>
<body>
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="titulo">PERFECTO</span>
            <div class="parrafo">El tramite que usted solicito esta en proceso</div>
            <div class="subtitulo">Copie su Codigo de Pago</div>
            <div class="codigo"><?= $codigo ?></div>
            <a class="boton btn-success" href="../../pages/registro" >Pagar Ahora</a>
            <a class="boton btn-danger" href="../../pages/registro" >Salir</a>
        </div>
    </div>
    <script src="../../../assets/js/propio.js"></script>
</body>
</html>
