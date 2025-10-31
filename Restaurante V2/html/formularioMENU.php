<?php
session_start();

// Si no hay usuario logueado, redirige al login
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}

$usuario = $_SESSION['usuario'];  
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Plato</title>
    <link rel="stylesheet" href="../css/formularioMENU.css">
    <link rel="stylesheet" href="../css/registroadmin.css">
</head>
<body>

  <?php if (isset($_GET['success']) && $_GET['success'] == 1): ?>
  <script>
    alert('¡Plato creado con éxito!');
  </script>
  <?php endif; ?>

  <div class="dashboard">
    <!-- Perfil -->
    <div class="perfil-container">
      <h2>Bienvenido, <?= htmlspecialchars($usuario['Nombre']) ?> (<?= htmlspecialchars($usuario['rol']) ?>)</h2>

      <?php if ($usuario['rol'] === 'Admin' || $usuario['rol'] === 'Administrador'): ?>
          <h3>Opciones de Administrador</h3>
          <a href="index.php?action=crear" class="btn">REGISTRAR USUARIOS</a>
          <a href="FormularioMenu.php?action=crear" class="btn">REGISTRAR PLATOS</a>
      <?php endif; ?>

      <a href="../Controller/logout.php" class="btn btn-red">Cerrar Sesión</a>
    </div>

    <div class="form-container">
      <h2>Registrar Plato</h2>
      <form action="../Controller/platoControlador.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="form_type" value="registro_plato">
        
        <input type="text" name="nombre_plato" placeholder="Nombre del plato" required>
        <input type="text" name="descripcion" placeholder="Descripción" required>
        <input type="number" name="precio" placeholder="Precio" step="0.01" required>
        
        <div class="checkbox-container">
            <label for="disponible">Disponible</label>
            <input type="checkbox" name="disponible" id="disponible" value="1">
        </div>
        
        <input type="file" name="imagen" id="imagen" accept="image/*" required>
        
        <button type="submit">Registrar Plato</button>
      </form>
    </div>
  </div>
</body>
</html>