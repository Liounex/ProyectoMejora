<?php

class ProcedureControllers 
{
    private $model;

    public function __construct()
    {
        require 'C:/xampp/htdocs/proyectomejora/models/ProcedureModels.php';
        $this->model = new ProcedureModels();
    }

    public function newprocedure($dni, $nombre, $correo, $celular, $idtipo)
    {
        $stament = $this->model->newprocedure($dni, $nombre, $correo, $celular, $idtipo);
        return ($stament != false) ? true: false;

    }
    public function code($codigo) 
    {
        $stament = $this->model->code($codigo);
        if ($stament){
            /*header('Location: ../../pages/registro.php');*/
            echo '
            <!DOCTYPE html>
            <html>
            <head>
                <title>Ejemplo de Alerta Modal en PHP</title>
                <style>
                    .modal {
                    display: none;
                    position: fixed;
                    z-index: 1;
                    left: 0;
                    top: 0;
                    width: 100%;
                    height: 100%;
                    overflow: auto;
                    background-color: rgba(0, 0, 0, 0.5);
                    }

                    .modal-content {
                    background-color: #fefefe;
                    margin: 10% auto;
                    padding: 20px;
                    border: 1px solid #888;
                    width: 80%;
                    }

                    .close {
                    color: #aaa;
                    float: right;
                    font-size: 28px;
                    font-weight: bold;
                    }

                    .close:hover,
                    .close:focus {
                    color: black;
                    text-decoration: none;
                    cursor: pointer;
                    }
                </style>
            </head>
            <body>

                <div id="myModal" class="modal">
                    <div class="modal-content">
                        <span class="close">&times;</span>
                        <p>¡Hola! Esta es una alerta modal.</p>
                        <p>'.$codigo.'</p>
                    </div>
                </div>

                <script>
                    // Get the modal
                    var modal = document.getElementById("myModal");

                    // Get the <span> element that closes the modal
                    var span = document.getElementsByClassName("close")[0];

                    // When the user clicks on <span> (x), close the modal
                    span.onclick = function() {
                        modal.style.display = "none";
                    }

                    // When the user clicks anywhere outside of the modal, close it
                    window.onclick = function(event) {
                        if (event.target == modal) {
                            modal.style.display = "none";
                        }
                    }
                    
                    // Show the modal
                    modal.style.display = "block";
                </script>

            </body>
            </html>

            
            ';
        }
    }


}