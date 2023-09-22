<?php
include_once '../../models/LoginModel.php';

class LoginController
{
    private $loginModel;

    public function __construct()
    {
        $this->loginModel = new LoginModel();
    }

    public function login($username, $password)
    {
        // Iniciar la sesión antes de trabajar con variables de sesión
        session_start();

        $result = $this->loginModel->authenticate($username, $password);
        if ($result === 'username') {
            // Usuario incorrecto
            return 'Nombre de usuario incorrecto';
        } elseif ($result === 'password') {
            // Contraseña incorrecta
            return 'Contraseña incorrecta';
        } elseif (is_array($result)) {
            // Autenticación exitosa
            $_SESSION['user_id'] = $result['idAdministrador'];
            header('Location: ../../views/index.php');
            exit();
        }
    }

    public function logout()
    {
        session_destroy();
        header('Location: login.php');
        exit();
    }
}
