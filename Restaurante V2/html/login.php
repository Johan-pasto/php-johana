
<!DOCTYPE html>
<link rel="stylesheet" href="../css/style.css">
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="../Controller/usuarioControlador.php" method="POST">
        <h2>Login</h2>
        <label for="correo">Correo</label>
        <input type="email" id="correo" name="Correo" required>
        <br>
        <label for="Contrasena">Contraseña</label>
        <input type="password" id="Contrasena" name="Contrasena" required>
        <br>
        <input type="submit" value="Inicia Sesion">
          <a href="../html/registro.php">no tiene cuenta !REGISTRATE!</a>
    </form>
   
</body>
</html>
  