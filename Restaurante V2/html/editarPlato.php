<?php
session_start();
require_once __DIR__ . '/../model/platos.php';

if (!isset($_SESSION['usuario']) || $_SESSION['usuario']['rol'] !== 'Admin') {
    header('Location: ../html/login.php');
    exit;
}

$platoModel = new Plato();

// Validar ID del plato a editar
if (!isset($_GET['id'])) {
    echo "ID de plato no proporcionado.";
    exit;
}

$id = intval($_GET['id']);
$platoEditar = $platoModel->obtenerPlatoPorId($id);

if (!$platoEditar) {
    echo "Plato no encontrado.";
    exit;
}

// Procesar el formulario si se envió
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre_plato = $_POST['nombre_plato'] ?? '';
    $descripcion = $_POST['descripcion'] ?? '';
    $precio = $_POST['precio'] ?? '';
    $disponible = isset($_POST['disponible']) ? 1 : 0;
    
    // Manejar la imagen
    $imagen = $platoEditar['imagen']; // Mantener la imagen actual por defecto
    
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
        $archivoTemporal = $_FILES['imagen']['tmp_name'];
        $nombreArchivo = uniqid() . '_' . $_FILES['imagen']['name'];
        $rutaDestino = '../img/platos/' . $nombreArchivo;
        
        // Mover el archivo a la carpeta de imágenes
        if (move_uploaded_file($archivoTemporal, $rutaDestino)) {
            // Eliminar la imagen anterior si existe
            if (!empty($platoEditar['imagen']) && file_exists('../img/platos/' . $platoEditar['imagen'])) {
                unlink('../img/platos/' . $platoEditar['imagen']);
            }
            $imagen = $nombreArchivo;
        }
    }

    // Modificar el método actualizarPlato para aceptar imagen
    $actualizado = $platoModel->actualizarPlato($id, $nombre_plato, $descripcion, $precio, $disponible, $imagen);

    if ($actualizado) {
        header("Location: index.php?msg=plato_editado");
        exit;
    } else {
        $error = "No se pudo actualizar el plato.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Plato</title>
    <link rel="stylesheet" href="../css/editarplato.css">
</head>
<body>
    <div class="dashboard">
        <div class="form-container">
            <h2>Editar Plato: <?= htmlspecialchars($platoEditar['nombre_plato']) ?></h2>
            
            <?php if (isset($error)): ?>
                <div class="msg error"><?= $error ?></div>
            <?php endif; ?>
            
            <?php if (isset($_GET['msg']) && $_GET['msg'] == 'plato_editado'): ?>
                <div class="msg success">Plato actualizado correctamente</div>
            <?php endif; ?>
            
            <!-- Mostrar imagen actual -->
            <div class="imagen-actual">
                <label>Imagen Actual:</label>
                <?php if (!empty($platoEditar['imagen'])): ?>
                    <img src="../img/platos/<?= htmlspecialchars($platoEditar['imagen']) ?>" 
                         alt="<?= htmlspecialchars($platoEditar['nombre_plato']) ?>">
                <?php else: ?>
                    <p>Sin imagen</p>
                <?php endif; ?>
            </div>

            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nombre_plato">Nombre del Plato:</label>
                    <input type="text" name="nombre_plato" value="<?= htmlspecialchars($platoEditar['nombre_plato']) ?>" required>
                </div>

                <div class="form-group">
                    <label for="descripcion">Descripción:</label>
                    <textarea name="descripcion" required><?= htmlspecialchars($platoEditar['descripcion']) ?></textarea>
                </div>

                <div class="form-group">
                    <label for="precio">Precio:</label>
                    <input type="number" name="precio" step="0.01" value="<?= htmlspecialchars($platoEditar['precio']) ?>" required>
                </div>

                <div class="checkbox-container">
                    <input type="checkbox" name="disponible" id="disponible" <?= $platoEditar['disponible'] ? 'checked' : '' ?>>
                    <label for="disponible">Disponible</label>
                </div>

                <div class="form-group">
                    <label for="imagen">Nueva Imagen (opcional):</label>
                    <input type="file" name="imagen" id="imagen" accept="image/*">
                    <small>Selecciona una nueva imagen solo si quieres cambiar la actual</small>
                </div>

                <div class="btn-container">
                    <input type="submit" value="Guardar Cambios" class="btn">
                    <a href="index.php" class="btn btn-red">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>