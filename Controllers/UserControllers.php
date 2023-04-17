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
                    session_start();
                    $_SESSION['correo'] = $username;
                    header('Location: ../content/index.php');
                }
                else {
                    echo '<link rel="icon" type="image/png" href="./assets/img/favicon.png">';
                    echo '<div class="alert alert-warning text-white">Usuario No Existe</div>';
                }
            }
        }
    }
}