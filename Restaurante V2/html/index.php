<?php
session_start();
require_once __DIR__ . '/../model/usuario.php';
require_once '../model/platos.php';

$modelPlatos = new Plato();
$platos = $modelPlatos->obtenerTodosLosPlatos(); 

// Verifica que el usuario esté logueado
if (!isset($_SESSION['usuario'])) {
    header("Location: ../html/login.php");
    exit;
}

$usuario = $_SESSION['usuario'];
$userModel = new UsuarioModel();

// Solo admins pueden ver y gestionar usuarios
if ($usuario['rol'] !== 'Admin') {
    die("Acceso denegado. Esta sección es solo para administradores.");
}

// Procesar acciones
if (isset($_GET['action'])) {
    $action = $_GET['action'];

    // 🗑️ Eliminar usuario
    if ($action === 'eliminar' && isset($_GET['id'])) {
        $id = intval($_GET['id']);

        if ($id === intval($usuario['id_usuario'])) {
            echo "❌ No puedes eliminar tu propia cuenta.";
            exit;
        }

        if ($userModel->eliminarUsuario($id)) {
            header("Location: index.php?msg=eliminado");
            exit;
        } else {
            echo "❌ Error al eliminar el usuario.";
        }
    }
        // 🗑️ ELIMINAR PLATO
    if ($action === 'eliminarPlato' && isset($_GET['id'])) {
        $id_plato = intval($_GET['id']);
        
        if ($modelPlatos->eliminarPlato($id_plato)) {
            header("Location: index.php?msg=plato_eliminado");
            exit;
        } else {
            echo "❌ Error al eliminar el plato.";
        }
    }

    // ✏️ Redireccionar a editar
    if ($action === 'editar' && isset($_GET['id'])) {
        $id = intval($_GET['id']);
        header("Location: editarUsuario.php?id=$id");
        exit;
    }
    if ($action === 'editarPlato' && isset($_GET['id'])) {
    $id_plato = intval($_GET['id']);
    header("Location: editarPlato.php?id=$id_plato");
    exit;
}
}




// Obtener lista de usuarios para mostrar
$usuarios = $userModel->listarusuarios();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Administrador</title>
    <link rel="stylesheet" href="../css/usuarios.css">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    
    <div class="dashboard">
        <div class="perfil-container">
            <h2>Bienvenido, <?= htmlspecialchars($usuario['Nombre']) ?> (<?= $usuario['rol'] ?>)</h2>
            <a href="../html/RegistrarUsuario.php" class="btn">Registrar Usuario</a>
            <a href="../Controller/logout.php" class="btn btn-red">Cerrar Sesión</a>
        </div>

        <div class="usuarios-container">
            <h3>Usuarios Registrados</h3>

            <?php if (isset($_GET['msg']) && $_GET['msg'] === 'eliminado'): ?>
                <p class="msg success">✅ Usuario eliminado correctamente.</p>
            <?php endif; ?>

            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Rol</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($usuarios as $u): ?>
                        <tr>
                            <td><?= $u['id_usuario'] ?></td>
                            <td><?= htmlspecialchars($u['Nombre'] . ' ' . $u['apellido']) ?></td>
                            <td><?= htmlspecialchars($u['Correo']) ?></td>
                            <td><?= htmlspecialchars($u['rol']) ?></td>
                            <td>
                                <a href="index.php?action=editar&id=<?= $u['id_usuario'] ?>" class="btn">Editar</a>
                                <a href="index.php?action=eliminar&id=<?= $u['id_usuario'] ?>" class="btn btn-red" onclick="return confirm('¿Estás seguro de que deseas eliminar este usuario?');">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <?php if (empty($usuarios)): ?>
                        <tr><td colspan="5">No hay usuarios registrados.</td></tr>
                    <?php endif; ?>
                   
                </tbody>
                
            </table>
             <?php if ($usuario['rol'] === 'Admin'): ?>
    <div class="platos-container">
        <h3>Platos Registrados</h3>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre del Plato</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Disponible</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($platos)): ?>
                    <?php foreach ($platos as $p): ?>
                        <tr>
                            <td><?= htmlspecialchars($p['id_menu']) ?></td>
                            <td><?= htmlspecialchars($p['nombre_plato']) ?></td>
                            <td><?= htmlspecialchars($p['descripcion']) ?></td>
                            <td>$<?= number_format($p['precio'], 2) ?></td>
                            <td><?= $p['disponible'] ? 'Sí' : 'No' ?></td>
                            <td>
                                <?php if (!empty($p['imagen'])): ?>
                                    <img src="../img/platos/<?= htmlspecialchars($p['imagen']) ?>" alt="<?= htmlspecialchars($p['nombre_plato']) ?>" style="max-width:100px; max-height:80px;">
                                <?php else: ?>
                                    Sin imagen
                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="index.php?action=editarPlato&id=<?= $p['id_menu'] ?>" class="btn">Editar</a>
                                <a href="index.php?action=eliminarPlato&id=<?= $p['id_menu'] ?>" class="btn btn-red" onclick="return confirm('¿Seguro que deseas eliminar este plato?');">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="7">No hay platos registrados.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
<?php endif; ?>
        </div>
    </div>
</body>
</html>
