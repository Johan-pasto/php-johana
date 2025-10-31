<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/../config/conexion.php';
require_once __DIR__ . '/../model/usuario.php';

class UsuarioController {

    private $model;

    public function __construct() {
        $this->model = new UsuarioModel();
    }

    // Login
    public function validarusu() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['Correo'] ?? '';
            $pass  = $_POST['Contrasena'] ?? '';

            $usuario = $this->model->login($email, $pass);

            if ($usuario) {
                session_start();
                $_SESSION['usuario'] = $usuario;

                        if ($usuario['rol'] === 'Admin') {
                header("Location: ../html/index.php");
            } else {
                header("Location: ../html/indexP.php");
            }
            exit;
        } else {
            header("Location: ../html/login.php?error=1");
            exit;
        }
    }
}

    // Registro
 public function registrar() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nombre   = $_POST['Nombre'] ?? '';
        $apellido = $_POST['apellido'] ?? '';
        $email    = $_POST['Correo'] ?? '';
        $password = $_POST['Contrasena'] ?? '';
        $rol      = $_POST['rol'] ?? 'Usuario';
        $origen   = $_POST['origen'] ?? 'registro';

        $creado = $this->model->crearusuarios($nombre, $apellido, $email, $password, $rol);

        if ($creado) {
            if ($origen === 'admin') {
                // Redirigir de vuelta al panel del admin con mensaje
                header("Location: ../html/index.php?success=1");
            } else {
                // Redirigir al formulario de registro general con alerta
                header("Location: ../html/registro.php?success=1");
            }
            exit;
        } else {
            echo "Error al registrar usuario.";
        }
    }
}

}

$obj = new UsuarioController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['form_type']) && $_POST['form_type'] === 'registro') {
        $obj->registrar();
    } else {
        $obj->validarusu();
    }
}
