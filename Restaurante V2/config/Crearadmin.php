<?php
require_once "conexion.php";

try{
    //Instanciar clase para la conexion
    $db = Database::connect();
    $email ="pepe@gmail.com";

    //Consultar si ese usuario se encuentra registrado
    $consul = $db->prepare("SELECT * FROM usuario WHERE Correo = :Correo");
    $consul->execute([":Correo"=>$email]);

    //registrar los datos de usuario y contraseña
    if(!$consul->fetch()){
        $pass = password_hash("fisfirisnais",PASSWORD_BCRYPT);
        //crear el insert
       $sql = "INSERT INTO usuario(Nombre,apellido,Correo,Contrasena,rol)
        VALUES('Jorge','Muñoz',:Correo,:clave,'Admin')";
        $consult=$db->prepare($sql);
        $consult->execute([
            ":Correo"=>$email,
            ":clave"=>$pass
        ]);
        echo "Admin creado";
    }else{
        echo "El admin ya fue creado";
    }

}
catch(PDOException $e){
          die("No sirvio".$e->getMessage());
}


?>