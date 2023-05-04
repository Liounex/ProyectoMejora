<?php
class UserControllers {    
    private $model;
        
    public function __construct()
    {
		require 'C:/xampp/htdocs/proyectomejora/models/UserModels.php';
        $this->model = new UserModels();
    }

    public function login($username, $password) {
        if (isset($_POST['submit'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            if (empty($username) || empty($password)){
                echo '<link rel="icon" type="image/png" href="./assets/img/favicon.png">';
                echo '<div class="alert alert-danger text-white">Nombre de Usuario o contraseña vacio</div>';
            }
            else {
                $stament= $this->model->login($username, $password);
                
                if ($stament) {
                    header('Location: ../content/index');
                    exit();
                }
                else {
                    echo '<link rel="icon" type="image/png" href="./assets/img/favicon.png">';
                    echo '<div class="alert alert-warning text-white">Usuario No Existe</div>';
                }
            }
        }
    }
    public function show($code)
    {
        $statement = $this->model->show($code);
        return $statement;
    }

    public function showadmin() {
        $statement = $this->model->showadmin();
        return $statement;
    }

    public function showdata($data) {
        $statement = $this->model->showdocs($data);
        return $statement;

    }

    public function accept($code, $status) {
        $statement = $this->model->accept($code, $status);
        if ($_GET['cod'] == 'all'){
            header('Location: ../tramite?id='. $_GET['cod']);
        }
        if ($_GET['cod'] == 'certificado'){
            header('Location: ../certificados?id='. $_GET['cod']);
        }
        if ($_GET['cod'] == 'constancia'){
            header('Location: ../constancias?id='. $_GET['cod']);
        }
        if ($_GET['cod'] == 'examen'){
            header('Location: ../examenes?id='. $_GET['cod']);
        }
        return $statement;
    }

    public function decline($code, $status) {
        $statement = $this->model->decline($code, $status);
        if ($_GET['cod'] == 'all'){
            header('Location: ../tramite?id='. $_GET['cod']);
        }
        if ($_GET['cod'] == 'certificado'){
            header('Location: ../certificados?id='. $_GET['cod']);
        }
        if ($_GET['cod'] == 'constancia'){
            header('Location: ../constancias?id='. $_GET['cod']);
        }
        if ($_GET['cod'] == 'examen'){
            header('Location: ../examenes?id='. $_GET['cod']);
        }
        return $statement;
    }

    public function observation($code, $status, $obser) {
        $statement = $this->model->observation($code, $status, $obser);
        if ($_GET['cod'] == 'all'){
            header('Location: ../tramite?id='. $_GET['cod']);
        }
        if ($_GET['cod'] == 'certificado'){
            header('Location: ../certificados?id='. $_GET['cod']);
        }
        if ($_GET['cod'] == 'constancia'){
            header('Location: ../constancias?id='. $_GET['cod']);
        }
        if ($_GET['cod'] == 'examen'){
            header('Location: ../examenes?id='. $_GET['cod']);
        }
        return $statement;
    }
}