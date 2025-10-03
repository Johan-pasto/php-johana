<?php
require_once "conexion.php";

try{
    $db = Database::connect();
    echo "conexion exitosa";

}catch(PDOException $e){
    echo "Error de conexion".$e->getMessage();
                
            }

?>