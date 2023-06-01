<?php

require_once __DIR__ . '/../config/config.php';
require_once(APP_ROOT . '/../models/UserModels.php');
class UserControllers
{
    private $model;

    public function __construct()
    {
        $this->model = new UserModels();
    }

    public function login($username, $password)
    {
        if (isset($_POST['submit'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            if (empty($username) || empty($password)) {
                echo "
                <script>
                Swal.fire({
                    title: 'Algo salio mal',
                    text: 'Los campos estan vacios',
                    icon: 'error',
                    confirmButtonText: 'Aceptar'
                })
                </script>
                ";
                /* echo '<link rel="icon" type="image/png" href="./assets/img/favicon.png">';
                echo '<div class="alert alert-danger text-white">Nombre de Usuario o contraseña vacio</div>'; */
            } else {
                $stament = $this->model->login($username, $password);

                if ($stament) {
                    header('Location: ' . APP_URL . '/view/dashboard');
                    exit();
                } else {
                    echo "
                    <script>
                    Swal.fire({
                        title: 'Algo salio mal',
                        text: 'El usuario no se encuentra registrado',
                        icon: 'warning',
                        confirmButtonText: 'Aceptar'
                    })
                    </script>
                    ";

                    /* echo '<link rel="icon" type="image/png" href="./assets/img/favicon.png">';
                    echo '<div class="alert alert-warning text-white">Usuario No Existe</div>'; */
                }
            }
        }
    }
    public function show($code)
    {
        $statement = $this->model->show($code);
        return $statement;
    }

    public function showadmin()
    {
        $statement = $this->model->showadmin();
        return $statement;
    }

    public function showdata($data)
    {
        $statement = $this->model->showdocs($data);
        return $statement;
    }

    public function accept($code, $status)
    {
        $statement = $this->model->accept($code, $status);
        if ($_GET['cod'] == 'all') {
            header('Location: ' . APP_URL . '/view/tramiteus?id=' . $_GET['cod']);
        }
        if ($_GET['cod'] == 'certificado') {
            header('Location: ' . APP_URL . '/view/certificados?id=' . $_GET['cod']);
        }
        if ($_GET['cod'] == 'constancia') {
            header('Location: ' . APP_URL . '/view/constancias?id=' . $_GET['cod']);
        }
        if ($_GET['cod'] == 'examen') {
            header('Location: ' . APP_URL . '/view/examenes?id=' . $_GET['cod']);
        }
        return $statement;
    }
    public function direcacept($code, $status)
    {
        $statement = $this->model->accept($code, $status);
        if ($statement) {
            echo "
            <script>
            Swal.fire({
                title: 'OK',
                text: 'Se genrero el certificado',
                icon: 'success',
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

    public function decline($code, $status)
    {
        $statement = $this->model->decline($code, $status);
        if ($_GET['cod'] == 'all') {
            header('Location: ' . APP_URL . '/view/tramiteus?id=' . $_GET['cod']);
        }
        if ($_GET['cod'] == 'certificado') {
            header('Location: ' . APP_URL . '/view/certificados?id=' . $_GET['cod']);
        }
        if ($_GET['cod'] == 'constancia') {
            header('Location: ' . APP_URL . '/view/constancias?id=' . $_GET['cod']);
        }
        if ($_GET['cod'] == 'examen') {
            header('Location: ' . APP_URL . '/view/examenes?id=' . $_GET['cod']);
        }
        return $statement;
    }

    public function updateObservations($id, $obs, $status)
    {
        $statement = $this->model->updateObservations($id, $obs, $status);
        if ($_GET['cod'] == 'all') {
            header('Location: ' . APP_URL . '/view/tramiteus?id=' . $_GET['cod']);
        }
        if ($_GET['cod'] == 'certificado') {
            header('Location: ' . APP_URL . '/view/certificados?id=' . $_GET['cod']);
        }
        if ($_GET['cod'] == 'constancia') {
            header('Location: ' . APP_URL . '/view/constancias?id=' . $_GET['cod']);
        }
        if ($_GET['cod'] == 'examen') {
            header('Location: ' . APP_URL . '/view/examenes?id=' . $_GET['cod']);
        }
        return $statement;
    }

    public function description($code)
    {
        $statement = $this->model->description($code);
        return $statement;
        
    }

    public function actualizarDatos($dni, $nombres, $ap, $am, $correo, $telefono, $idioma)
    {
        $stament = $this->model->updateregister($dni, $nombres, $ap, $am, $correo, $telefono, $idioma);
        if ($stament) {
            echo "
                <script>
                    Swal.fire({
                        title: 'Ok',
                        text: 'Los Datos se actualizaron correctamente',
                        icon: 'success',
                        confirmButtonText: 'Aceptar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = '../tramite';
                        }
                    });
                </script>
                ";
        }
    }

    public function showDetail($code)
    {
        $statement = $this->model->showDetail($code);
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    
}
