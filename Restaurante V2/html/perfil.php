<?php
session_start();

// Si no hay usuario logueado, redirige al login
if (!isset($_SESSION['usuario']) || !is_array($_SESSION['usuario'])) {
    header("Location: ../html/login.php");
    exit;
}

$usuario = $_SESSION['usuario'];
if (isset($_GET['action'])) {
    $action = $_GET['action'];

  
 
    // ✏️ Redireccionar a editar
    if ($action === 'editar' && isset($_GET['id'])) {
        $id = intval($_GET['id']);
        header("Location: editarUsuario.php?id=$id");
        exit;

}
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Perfil de Usuario</title>
  <link rel="stylesheet" href="../css/editarUsuario.css">
</head>
<body>

  <div class="dashboard">
    <!-- Perfil -->
    <div class="perfil-container">
       <div class="avatar-section">
        <div class="avatar-container">
          <?php if (!empty($usuario['imagen'])): ?>
            <img src="../img/usuarios/<?= htmlspecialchars($usuario['imagen']) ?>" 
                 alt="<?= htmlspecialchars($usuario['Nombre']) ?>" class="avatar-image">
          <?php else: ?>
            <img src="../img/perfil.jpg" alt="Foto por defecto" class="avatar-image">
          <?php endif; ?>
        </div>
      </div>
      <h2>Bienvenido, <?= htmlspecialchars($usuario['Nombre']) ?> <?= htmlspecialchars($usuario['apellido']) ?></h2>


      <a href="indexP.php" class="btn btn-red">Volver al inicio</a>
      <a href="editarUsuarioROL.php?id=<?= $usuario['id_usuario'] ?>" class="btn">Editar Mi Perfil</a>
    </div>
  </div>
  
</body>
</html>