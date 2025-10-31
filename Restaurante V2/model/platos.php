<?php
require_once __DIR__ . '/../config/conexion.php';

class Plato{
    private $db;
    public function eliminarPlato($id) {
    $sql = "DELETE FROM plato WHERE id_menu = ?";  
    $stmt = $this->db->prepare($sql);             
    return $stmt->execute([$id]);   
}


    public function __construct(){
        $this->db = Database::connect();
    }
        //crear la funcion para el registro de los platos en la db
public function RegistroPlato($nombre_plato, $descripcion, $precio, $imagen, $disponible) {
    
        $sql = "INSERT INTO plato (nombre_plato, descripcion, precio, imagen, disponible) 
                VALUES (:nombre_plato, :descripcion, :precio, :imagen, :disponible)";
        $res = $this->db->prepare($sql);
        $res->bindParam(':nombre_plato', $nombre_plato);
        $res->bindParam(':descripcion', $descripcion);
        $res->bindParam(':precio', $precio);
        $res->bindParam(':imagen', $imagen);
        $res->bindParam(':disponible', $disponible);
        $res->execute();
        return true;
   
}
public function obtenerTodosLosPlatos(){
    $sql = "SELECT * FROM plato";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
public function obtenerPlatoPorId($id) {
    $sql = "SELECT * FROM plato WHERE id_menu = ?";
    $stmt = $this->db->prepare($sql);
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

public function actualizarPlato($id, $nombre_plato, $descripcion, $precio, $disponible, $imagen = null) {
    if ($imagen) {
        // Si hay nueva imagen, actualizar con imagen
        $sql = "UPDATE plato SET nombre_plato = ?, descripcion = ?, precio = ?, disponible = ?, imagen = ? WHERE id_menu = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$nombre_plato, $descripcion, $precio, $disponible, $imagen, $id]);
    } else {
        // Si no hay nueva imagen, mantener la imagen actual (no actualizar el campo imagen)
        $sql = "UPDATE plato SET nombre_plato = ?, descripcion = ?, precio = ?, disponible = ? WHERE id_menu = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$nombre_plato, $descripcion, $precio, $disponible, $id]);
    }
}
}
?>