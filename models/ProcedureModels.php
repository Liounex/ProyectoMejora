<?php 

class ProcedureModels
{
    private $PRO;

    public function __construct()
    {
        require 'C:/xampp/htdocs/Practicas/config/Database.php';
        $con = new Conexion();
        $this->PRO = $con->conectar();
    }

    public function newprocedure($usuario_id ,$dni, $nombre, $correo, $celular, $idtipo)
    {
        try
        {
            $stament = $this->PRO->prepare('INSERT INTO usuario (usuario_id, dni, nombres, correo, telefono, tipo_usuario_id)
                                            VALUES(:usuario_id, :dni, :nombres, :correo, :telefono, :tipo_usuario_id)');
            $stament->bindParam(':usuario_id', $usuario_id);
            $stament->bindParam(':dni', $dni);
            $stament->bindParam(':nombres', $nombre);
            $stament->bindParam(':correo', $correo);
            $stament->bindParam('telefono', $celular);
            $stament->bindParam(':tipo_usuario_id', $idtipo);
            return ($stament->execute()) ? $this->PRO->lastInsertId() : false;
            $this->PRO = null;
        } 
        catch (PDOException $e)
        {
			echo "Error al conectar a la base de datos: " . $e->getMessage();
		}
    }

    public function code($codigo, $usuario_id)
    {
        try
        {
            $stament = $this->PRO->prepare('INSERT INTO tramite (pago_id, usuario_id) VALUE(:pago, :usuario_id)');
            $stament->bindParam(':pago', $codigo);
            $stament->bindParam(':usuario_id', $usuario_id);
            return ($stament->execute()) ? $this->PRO->lastInsertId() : false;
            $this->PRO = null;
        } 
        catch (PDOException $e)
        {
			echo "Error al conectar a la base de datos: " . $e->getMessage();
		}
    }

}