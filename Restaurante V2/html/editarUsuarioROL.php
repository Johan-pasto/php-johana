<?php
session_start();
require_once __DIR__ . '/../model/usuario.php';

// Verificar que el usuario esté logueado
if (!isset($_SESSION['usuario'])) {
    header('Location: ../html/login.php');
    exit;
}

$userModel = new UsuarioModel();
$usuarioLogueado = $_SESSION['usuario'];

// Usuario normal solo puede editar su propio perfil
$id = $usuarioLogueado['id_usuario'];
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
    $nuevaPass = $_POST['contrasena'] ?? '';
    
    // Usuario normal no puede cambiar su rol
    $rol = $usuarioEditar['rol']; // Mantener el rol actual

    // 🔥 NUEVO: Manejar la imagen del usuario
    $imagen = $usuarioEditar['imagen'] ?? null; // Mantener la imagen actual por defecto
    
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
        $archivoTemporal = $_FILES['imagen']['tmp_name'];
        $nombreArchivo = uniqid() . '_' . $_FILES['imagen']['name'];
        $rutaDestino = '../img/usuarios/' . $nombreArchivo;
        
        // Crear carpeta si no existe
        if (!is_dir('../img/usuarios/')) {
            mkdir('../img/usuarios/', 0777, true);
        }
        
        // Mover el archivo a la carpeta de imágenes de usuarios
        if (move_uploaded_file($archivoTemporal, $rutaDestino)) {
            // Eliminar la imagen anterior si existe
            if (!empty($usuarioEditar['imagen']) && file_exists('../img/usuarios/' . $usuarioEditar['imagen'])) {
                unlink('../img/usuarios/' . $usuarioEditar['imagen']);
            }
            $imagen = $nombreArchivo;
        }
    }

    // 🔥 ACTUALIZADO: Pasar la imagen al método de actualización
    $actualizado = $userModel->actualizarUsuario($id, $nombre, $apellido, $correo, $rol, $nuevaPass, $imagen);

    if ($actualizado) {
        // Actualizar datos en sesión
        $_SESSION['usuario'] = $userModel->obtenerUsuarioPorId($id);
        header("Location: indexP.php?msg=perfil_actualizado");
        exit;
    } else {
        $error = "No se pudo actualizar el perfil.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Mi Perfil</title>
    <link rel="stylesheet" href="../css/editarUsuario.css">
</head>
<body>
    <div class="dashboard">
        <div class="perfil-container">
            <h2>Editar Mi Perfil</h2>
            
            <?php if (isset($error)): ?>
                <div class="msg error"><?= $error ?></div>
            <?php endif; ?>
            
            <?php if (isset($_GET['msg']) && $_GET['msg'] == 'perfil_actualizado'): ?>
                <div class="msg success">Perfil actualizado correctamente</div>
            <?php endif; ?>
            
            <!-- 🔥 NUEVO: Mostrar imagen actual del usuario -->
           
<div class="avatar-section">
    <div class="avatar-container">
        <?php if (!empty($usuarioEditar['imagen'])): ?>
            <img src="../img/usuarios/<?= htmlspecialchars($usuarioEditar['imagen']) ?>" 
                 alt="<?= htmlspecialchars($usuarioEditar['Nombre']) ?>" class="avatar-image">
        <?php else: ?>
            <img src="../img/perfil.jpg" alt="Foto por defecto" class="avatar-image">
        <?php endif; ?>
    </div>
</div>

            <!-- 🔥 ACTUALIZADO: Agregar enctype para subir archivos -->
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" value="<?= htmlspecialchars($usuarioEditar['Nombre']) ?>" required>
                </div>

                <div class="form-group">
                    <label for="apellido">Apellido:</label>
                    <input type="text" name="apellido" value="<?= htmlspecialchars($usuarioEditar['apellido']) ?>" required>
                </div>

                <div class="form-group">
                    <label for="correo">Correo:</label>
                    <input type="email" name="correo" value="<?= htmlspecialchars($usuarioEditar['Correo']) ?>" readonly>
                </div>

                <div class="form-group">
                    <label>Rol:</label>
                    <input type="text" value="<?= htmlspecialchars($usuarioEditar['rol']) ?>" disabled>
                    <input type="hidden" name="rol" value="<?= htmlspecialchars($usuarioEditar['rol']) ?>">
                </div>

                <!-- 🔥 NUEVO: Campo para imagen -->
                <div class="form-group">
                    <label for="imagen">Nueva Foto (opcional):</label>
                    <input type="file" name="imagen" id="imagen" accept="image/*">
                    <small>Formatos aceptados: JPG, PNG, GIF. Tamaño máximo: 2MB</small>
                </div>

                <div class="form-group">
                    <label for="contrasena">Nueva Contraseña (deja en blanco si no deseas cambiarla):</label>
                    <input type="password" name="contrasena" placeholder="••••••••">
                </div>

                <div class="btn-container">
                    <input type="submit" value="Guardar Cambios" class="btn">
                    <a href="indexP.php" class="btn btn-red">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>