<?php
session_start();

// Si no hay usuario logueado, redirige al login
if (!isset($_SESSION['usuario']) || !is_array($_SESSION['usuario'])) {
    header("Location: ../html/login.php");
    exit;
}

$usuario = $_SESSION['usuario'];


$usuarios = [];
if ($usuario['rol'] === 'Admin') { // Solo los admins ven el listado
    require_once __DIR__ . "/../model/usuario.php"; 
    $userModel = new UsuarioModel();
    $usuarios = $userModel->listarusuarios();
}
?>
<?php
if (isset($_GET['success']) && $_GET['success'] == 1) {
    echo "<script>alert('¡Usuario registrado con éxito!');</script>";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Perfil de Usuario</title>
  <link rel="stylesheet" href="../css/usuarios.css">
</head>
<body>
    >

  <div class="dashboard">
    <!-- Perfil -->
    <div class="perfil-container">
      <img src="../img/perfil.jpg" alt="Usuario" class="avatar">
      <h2>Bienvenido, <?= htmlspecialchars($usuario['Nombre']) ?> <?= htmlspecialchars($usuario['apellido']) ?> (<?= htmlspecialchars($usuario['rol']) ?>)</h2>

      <?php if ($usuario['rol'] === 'Admin'): ?>
          <h3>Opciones de Administrador</h3>
          <a href="../html/RegistrarUsuario.php" class="btn">REGISTRAR USUARIOS</a>
      <?php endif; ?>

      <a href="indexP.php" class="btn btn-red">Volver al inicio</a>
    </div>

    <!-- Listado de usuarios -->
    <?php if ($usuario['rol'] === 'Admin'): ?>
    <div class="usuarios-container">
        <h3>Usuarios Registrados</h3>
        <table>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Rol</th>
                <th>Acciones</th>
            </tr>
            <?php if (count($usuarios) > 0): ?>
                <?php foreach ($usuarios as $u): ?>
                    <tr>
                        <td><?= htmlspecialchars($u['id_usuario']) ?></td>
                        <td><?= htmlspecialchars($u['Nombre'] . " " . $u['apellido']) ?></td>
                        <td><?= htmlspecialchars($u['Correo']) ?></td>
                        <td><?= htmlspecialchars($u['rol']) ?></td>
                        <td>
                            <a href="index.php?action=editar&id=<?= $u['id_usuario'] ?>" class="btn">Editar</a>
                            <a href="index.php?action=eliminar&id=<?= $u['id_usuario'] ?>" class="btn btn-red" onclick="return confirm('¿Seguro que deseas eliminar este usuario?');">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="5">No hay usuarios registrados</td></tr>
            <?php endif; ?>
        </table>
    </div>
    <?php endif; ?>
  </div>
</body>
</html>
