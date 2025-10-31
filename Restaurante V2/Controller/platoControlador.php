<?php
require_once __DIR__ . '/../config/conexion.php';
require_once __DIR__ . '/../model/platos.php';

class PlatoControlador{
private $modelplato;

public function __construct(){
    $this->modelplato = new Plato();
}
public function registrarPlato(){
 
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $nombre_plato = $_POST['nombre_plato'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];
        
        

        

        $imagen=($_FILES['imagen']['name']);     
        $ruta = __DIR__ ."/../img/platos/". basename($imagen);
        move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta);
        $disponible = isset($_POST['disponible']) ? 1 : 0;


        
        $plato = $this ->modelplato->RegistroPlato($nombre_plato, $descripcion, $precio, $imagen, $disponible);
        header("Location: ../html/formularioMenu.php");
    }
    }
}
$objeto = new PlatoControlador();
$objeto->registrarPlato();
?>