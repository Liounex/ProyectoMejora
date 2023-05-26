<?php

//include
include_once __DIR__ . '/../layout/headlogin.php';
require_once __DIR__ . '/../../config/config.php';
require_once APP_ROOT . '/../Controllers/UserControllers.php';
require_once APP_ROOT . '/../Controllers/DocControllers.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //llama a la clase
    $update = new UserControllers();
    $actualizar = new DocControllers();

    $cod = $_POST['codigo'];
    $dni = $_POST['dni'];
    $nombre = $_POST['nombre'];
    $ap = $_POST['ap_paterno'];
    $am = $_POST['ap_materno'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    $idioma = $_POST['idioma'];
    $filedni = $_FILES['copydni'];
    $fileVoucher = $_FILES['vaucher'];

    $rutadni = './uploads/' . $filedni['name'];
    $rutapago = './uploads/' . $fileVoucher['name'];

    $ruta = 'C:/xampp/htdocs/proyectomejora/view/uploads';
    $sub = $ruta . '/' . $filedni['name'];
    $sb2 = $ruta . '/' . $fileVoucher['name'];

    $update->actualizarDatos($dni, $nombre, $ap, $am, $correo, $telefono, $idioma);

    if (!empty($filedni['name']) && move_uploaded_file($filedni['tmp_name'], $sub)) {
        // El archivo copydni se ha movido correctamente a la ubicación deseada
        $rutadni = './uploads/' . $filedni['name'];
    } else {
        $rutadni = ''; // Establece una cadena vacía si no se seleccionó un archivo copydni
    }

    if (!empty($fileVoucher['name']) && move_uploaded_file($fileVoucher['tmp_name'], $sb2)) {
        // El archivo vaucher se ha movido correctamente a la ubicación deseada
        $rutapago = './uploads/' . $fileVoucher['name'];
    } else {
        $rutapago = ''; // Establece una cadena vacía si no se seleccionó un archivo vaucher
    }
    // Verificar si se seleccionó al menos un archivo para subir
    if (!empty($rutadni) || !empty($rutapago)) {
        // Al menos un archivo se ha movido correctamente
        $actualizar->actualizardocnuevo($cod, $rutadni, $rutapago);
        // Resto del código...
    } else {
        echo "
        <script>
            Swal.fire({
                title: 'Error',
                text: 'Debes seleccionar al menos un archivo para subir',
                icon: 'warning',
                confirmButtonText: 'Aceptar'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '../tramiteus';
                }
            });
        </script>
        ";
    }
} else {
    header('Location: ../tramite');
}
