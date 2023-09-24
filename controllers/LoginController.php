<?php
include_once 'C:/xampp/htdocs/workshopsoftware/models/LoginModel.php';

class LoginController
{
    private $loginModel;

    public function __construct()
    {
        $this->loginModel = new LoginModel();
    }

    public function login($username, $password)
    {
        session_start();

        $result = $this->loginModel->authenticate($username, $password);
        if ($result === 'username') {
            return 'Nombre de usuario incorrecto';
        } elseif ($result === 'password') {
            return 'Contraseña incorrecta';
        } elseif (is_array($result)) {
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
