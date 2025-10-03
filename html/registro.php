<?php
if (isset($_GET['success']) && $_GET['success'] == 1) {
    echo "<script>alert('¡Usuario creado con éxito!');</script>";
}
?>
<!DOCTYPE html>
<link rel="stylesheet" href="../css/registro.css">
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <title>Registro de Usuario</title>
  <link rel="stylesheet" href="../css/usuarios.css" />
</head>
<body>
 
  <div class="form-container">
    <h2>Crear Cuenta</h2>
    <form action="../Controller/usuarioControlador.php" method="POST">
      <input type="hidden" name="form_type" value="registro" />
      <input type="text" name="Nombre" placeholder="Nombre" required />
      <input type="text" name="apellido" placeholder="Apellido" required />
      <input type="email" name="Correo" placeholder="Correo electrónico" required />
      <input type="password" name="Contrasena" placeholder="Contraseña" required />
      <input type="hidden" name="origen" value="registro">

      <input type="hidden" name="rol" value="Usuario" />
      <button type="submit">Registrarse</button>
    </form>
    <p>¿Ya tienes cuenta? <a href="login.php">Inicia sesión</a></p>
  </div>
</body>
</html>
