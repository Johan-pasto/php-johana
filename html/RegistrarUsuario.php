<?php


session_start();

// Si no hay usuario logueado, redirige al login
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php"); // Ajusta según la ubicación real de login.php
    exit;
}

$usuario = $_SESSION['usuario'];  

$usuarios = [];
if ($usuario['rol'] === 'Admin' || $usuario['rol'] === 'Administrador') {
    require_once __DIR__ . "/../model/usuario.php"; 
    $userModel = new UsuarioModel();
    $usuarios = $userModel->listarusuarios();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Registro de Usuario</title>
  <link rel="stylesheet" href="../css/usuarios.css">
  <link rel="stylesheet" href="../css/registroadmin.css">
</head>
<body>

  <?php if (isset($_GET['success']) && $_GET['success'] == 1): ?>
  <script>
    alert('¡Usuario creado con éxito!');
  </script>

<?php endif; ?>

  <div class="dashboard">
    <!-- Perfil -->
    <div class="perfil-container">
      <!-- <img src="../imagenes/perfil.jpg" alt="Usuario" class="avatar"> -->
      <h2>Bienvenido, <?= htmlspecialchars($usuario['Nombre']) ?> (<?= htmlspecialchars($usuario['rol']) ?>)</h2>

      <?php if ($usuario['rol'] === 'Admin' || $usuario['rol'] === 'Administrador'): ?>
          <h3>Opciones de Administrador</h3>
          <a href="perfil.php?action=crear" class="btn">REGISTRAR USUARIOS</a>
      <?php endif; ?>

      <a href="../Controller/logout.php" class="btn btn-red">Cerrar Sesión</a>
    </div>

    <div class="form-container">
      <h2>Crear Cuenta</h2>
 <form action="../Controller/usuarioControlador.php" method="POST">
    <input type="hidden" name="origen" value="admin">
    <input type="hidden" name="form_type" value="registro">
    <input type="text" name="Nombre" placeholder="Nombre" required>
    <input type="text" name="apellido" placeholder="Apellido" required>
    <input type="email" name="Correo" placeholder="Correo electrónico" required>
    <input type="password" name="Contrasena" placeholder="Contraseña" required>
    
    <select name="rol" required>
      <option value="Usuario">Usuario</option>
      <option value="Administrador">Administrador</option>
    </select>
    <button type="submit">Registrar</button>
    
</form>

    </div>
  </div>
</body>
</html>
