<?php

require_once __DIR__ . '/../config/config.php';
require_once APP_ROOT . '/../models/DocModels.php';

class DocControllers
{
    private $model;

    public function __construct()
    {
        $this->model = new DocModels();
    }

    public function actualizardoc($cod, $pdf, $vaucher)
    {
        // Verificar si los archivos ya existen en la base de datos
        $existingData = $this->model->obtenerDatosDoc($cod);

        if ($existingData && $existingData['voucher'] === $vaucher && $existingData['copia'] === $pdf) {
            echo "
                <script>
                    Swal.fire({
                        title: 'Información',
                        text: 'Los archivos ya están actualizados.',
                        icon: 'info',
                        confirmButtonText: 'Aceptar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = '../tramiteus';
                        }
                    });
                </script>
            ";
        } else {
            // Verificar qué atributos se actualizarán
            $updatePDF = $pdf !== '' && $pdf !== $existingData['copia'];
            $updateVaucher = $vaucher !== '' && $vaucher !== $existingData['voucher'];

            if ($updatePDF || $updateVaucher) {
                $statement = $this->model->updatedoc($cod, $pdf, $vaucher, $updatePDF, $updateVaucher);
                if ($statement) {
                    echo "
                        <script>
                            Swal.fire({
                                title: 'Ok',
                                text: 'Los datos se actualizaron correctamente',
                                icon: 'success',
                                confirmButtonText: 'Aceptar'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = '../tramiteus';
                                }
                            });
                        </script>
                    ";
                } else {
                    echo "
                        <script>
                            Swal.fire({
                                title: 'Error',
                                text: 'Ocurrió un error al actualizar los datos',
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
                echo "
                    <script>
                        Swal.fire({
                            title: 'Información',
                            text: 'No se realizaron cambios en los archivos.',
                            icon: 'info',
                            confirmButtonText: 'Aceptar'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = '../tramiteus';
                            }
                        });
                    </script>
                ";
            }
        }
    }

    public function actualizardocnuevo($cod, $pdf, $vaucher)
    {
        // Verificar si los archivos ya existen en la base de datos
        $existingData = $this->model->obtenerDatosDoc($cod);

        if ($existingData && $existingData['voucher'] === $vaucher && $existingData['copia'] === $pdf) {
/*             echo "
                <script>
                    Swal.fire({
                        title: 'Información',
                        text: 'Los archivos ya están actualizados.',
                        icon: 'info',
                        confirmButtonText: 'Aceptar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = '../tramiteus';
                        }
                    });
                </script>
            "; */
        } else {
            // Verificar qué atributos se actualizarán
            $updatePDF = $pdf !== '' && $pdf !== $existingData['copia'];
            $updateVaucher = $vaucher !== '' && $vaucher !== $existingData['voucher'];

            if ($updatePDF || $updateVaucher) {
                $statement = $this->model->updatedoc($cod, $pdf, $vaucher, $updatePDF, $updateVaucher);
                return $statement;
                /* if ($statement) {
                    echo "
                        <script>
                            Swal.fire({
                                title: 'Ok',
                                text: 'Los datos se actualizaron correctamente',
                                icon: 'success',
                                confirmButtonText: 'Aceptar'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = '../tramiteus';
                                }
                            });
                        </script>
                    ";
                } else {
                    echo "
                        <script>
                            Swal.fire({
                                title: 'Error',
                                text: 'Ocurrió un error al actualizar los datos',
                                icon: 'warning',
                                confirmButtonText: 'Aceptar'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = '../tramiteus';
                                }
                            });
                        </script>
                    ";
                } */
            } else {
/*                 echo "
                    <script>
                        Swal.fire({
                            title: 'Información',
                            text: 'No se realizaron cambios en los archivos.',
                            icon: 'info',
                            confirmButtonText: 'Aceptar'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = '../tramiteus';
                            }
                        });
                    </script>
                "; */
            }
        }
    }
}
