<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/../config/conexion.php';

class UsuarioModel {

    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }
    

    // Buscar usuario por correo
    public function obtenerUsuario($email) {
        $sql = "SELECT * FROM usuario WHERE Correo = :Correo LIMIT 1";
        $consul = $this->db->prepare($sql);
        $consul->execute([":Correo" => $email]);
        return $consul->fetch(PDO::FETCH_ASSOC);
    }

    // Validar login
    public function login($email, $pass) {
        $usuario = $this->obtenerUsuario($email);
        if ($usuario && password_verify($pass, $usuario['Contrasena'])) {
            return $usuario;
        }
        return false;
    }

    // Listar todos los usuarios
    public function listarusuarios() {
        $stmt = $this->db->query("SELECT * FROM usuario");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Registrar nuevo usuario
    public function crearusuarios($nombre, $apellido, $email, $pass, $rol) {
        $hash = password_hash($pass, PASSWORD_BCRYPT);
        $sql = "INSERT INTO usuario (Nombre, apellido, Correo, Contrasena, rol) 
                VALUES (:Nombre, :Apellido, :Correo, :Contrasena, :Rol)";
        $consul = $this->db->prepare($sql);
        return $consul->execute([
            ':Nombre' => $nombre,
            ':Apellido' => $apellido,
            ':Correo' => $email,
            ':Contrasena' => $hash,
            ':Rol' => $rol
        ]);
    }
        public function obtenerUsuarioPorId($id) {
        $sql = "SELECT * FROM usuario WHERE id_usuario = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
public function actualizarUsuario($id, $nombre, $apellido, $correo, $rol, $nuevaPass = '', $imagen = null) {
    if (!empty($nuevaPass)) {
        $hash = password_hash($nuevaPass, PASSWORD_BCRYPT);
        if ($imagen) {
            $sql = "UPDATE usuario 
                    SET Nombre = :nombre, apellido = :apellido, Correo = :correo, rol = :rol, Contrasena = :contrasena, imagen = :imagen 
                    WHERE id_usuario = :id";
            $params = [
                ':nombre' => $nombre,
                ':apellido' => $apellido,
                ':correo' => $correo,
                ':rol' => $rol,
                ':contrasena' => $hash,
                ':imagen' => $imagen,
                ':id' => $id
            ];
        } else {
            $sql = "UPDATE usuario 
                    SET Nombre = :nombre, apellido = :apellido, Correo = :correo, rol = :rol, Contrasena = :contrasena 
                    WHERE id_usuario = :id";
            $params = [
                ':nombre' => $nombre,
                ':apellido' => $apellido,
                ':correo' => $correo,
                ':rol' => $rol,
                ':contrasena' => $hash,
                ':id' => $id
            ];
        }
    } else {
        if ($imagen) {
            $sql = "UPDATE usuario 
                    SET Nombre = :nombre, apellido = :apellido, Correo = :correo, rol = :rol, imagen = :imagen 
                    WHERE id_usuario = :id";
            $params = [
                ':nombre' => $nombre,
                ':apellido' => $apellido,
                ':correo' => $correo,
                ':rol' => $rol,
                ':imagen' => $imagen,
                ':id' => $id
            ];
        } else {
            $sql = "UPDATE usuario 
                    SET Nombre = :nombre, apellido = :apellido, Correo = :correo, rol = :rol 
                    WHERE id_usuario = :id";
            $params = [
                ':nombre' => $nombre,
                ':apellido' => $apellido,
                ':correo' => $correo,
                ':rol' => $rol,
                ':id' => $id
            ];
        }
    }

    $stmt = $this->db->prepare($sql);
    return $stmt->execute($params);
}

    
      public function eliminarUsuario($id) {
        $sql = "DELETE FROM usuario WHERE id_usuario = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }
}
?>
