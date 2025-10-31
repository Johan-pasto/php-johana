<?php
session_start();
require_once __DIR__ . '/../model/usuario.php';

if (!isset($_SESSION['usuario']) || $_SESSION['usuario']['rol'] !== 'Admin') {
    header('Location: ../html/login.php');
    exit;
}

$userModel = new UsuarioModel();

// Validar ID del usuario a editar
if (!isset($_GET['id'])) {
    echo "ID de usuario no proporcionado.";
    exit;
}

$id = intval($_GET['id']);
$usuarioEditar = $userModel->obtenerUsuarioPorId($id);

if (!$usuarioEditar) {
    echo "Usuario no encontrado.";
    exit;
}

// Procesar el formulario si se envió
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'] ?? '';
    $apellido = $_POST['apellido'] ?? '';
    $correo = $_POST['correo'] ?? '';
    $rol = $_POST['rol'] ?? '';
    $nuevaPass = $_POST['contrasena'] ?? '';

    $actualizado = $userModel->actualizarUsuario($id, $nombre, $apellido, $correo, $rol, $nuevaPass);

    if ($actualizado) {
        header("Location: index.php?msg=editado");
        exit;
    } else {
        $error = "No se pudo actualizar el usuario.";
    }
}
?>

<!DOCTYPE html>
<link rel="stylesheet" href="../css/editar.css">
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Usuario</title>
    <link rel="stylesheet" href="../css/usuarios.css">
</head>
<body>
    <div class="dashboard">
        <div class="perfil-container">
            <h2>Editar Usuario: <?= htmlspecialchars($usuarioEditar['Nombre']) ?></h2>
            <?php if (isset($error)): ?>
                <p class="msg error"><?= $error ?></p>
            <?php endif; ?>
            <form method="POST">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" value="<?= htmlspecialchars($usuarioEditar['Nombre']) ?>" required>

                <label for="apellido">Apellido:</label>
                <input type="text" name="apellido" value="<?= htmlspecialchars($usuarioEditar['apellido']) ?>" required>

                <label for="correo">Correo:</label>
                <input type="email" name="correo" value="<?= htmlspecialchars($usuarioEditar['Correo']) ?>" required>

                <label for="rol">Rol:</label>
                <select name="rol" required>
                    <option value="Admin" <?= $usuarioEditar['rol'] === 'Admin' ? 'selected' : '' ?>>Admin</option>
                    <option value="Usuario" <?= $usuarioEditar['rol'] === 'Usuario' ? 'selected' : '' ?>>Usuario</option>
                </select>

                <label for="contrasena">Nueva Contraseña (deja en blanco si no deseas cambiarla):</label>
                <input type="password" name="contrasena">

                <input type="submit" value="Guardar Cambios" class="btn">
                <a href="index.php" class="btn btn-red">Cancelar</a>
            </form>
        </div>
    </div>
</body>
</html>
