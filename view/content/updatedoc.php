<?php
include_once __DIR__ . '/../layout/headlogin.php';
require_once __DIR__ . '/../../config/config.php';
require_once APP_ROOT . '/../Controllers/DocControllers.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $doc = new DocControllers();
    $cod = $_POST['cod'];
    $vaucher = $_FILES['vaucher'];
    $copia = $_FILES['copydni'];

    $rutadni = './uploads/' . $copia['name'];
    $rutapago = './uploads/' . $vaucher['name'];

    $ruta = 'C:/xampp/htdocs/proyectomejora/view/uploads';
    $sub = $ruta . '/' . $copia['name'];
    $sb2 = $ruta . '/' . $vaucher['name'];

    if (!empty($copia['name']) && move_uploaded_file($copia['tmp_name'], $sub)) {
        // El archivo copydni se ha movido correctamente a la ubicación deseada
        $rutadni = './uploads/' . $copia['name'];
    } else {
        $rutadni = ''; // Establece una cadena vacía si no se seleccionó un archivo copydni
    }

    if (!empty($vaucher['name']) && move_uploaded_file($vaucher['tmp_name'], $sb2)) {
        // El archivo vaucher se ha movido correctamente a la ubicación deseada
        $rutapago = './uploads/' . $vaucher['name'];
    } else {
        $rutapago = ''; // Establece una cadena vacía si no se seleccionó un archivo vaucher
    }
    // Verificar si se seleccionó al menos un archivo para subir
    if (!empty($rutadni) || !empty($rutapago)) {
        // Al menos un archivo se ha movido correctamente
        $result = $doc->actualizardoc($cod, $rutadni, $rutapago);
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
    header('Location: ../tramiteus');
}
