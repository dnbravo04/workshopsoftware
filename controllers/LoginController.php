<?php
include 'c:\xampp\htdocs\workshopsoftware\models\LoginModel.php';

class LoginController
{

    private $loginModel;

    public function __construct()
    {
        $this->loginModel = new LoginModel();
    }

    public function login($username, $password)
    {
        $user = $this->loginModel->authenticate($username, $password);

        if ($user) {
            $_SESSION['user_id'] = $user['id'];
            header('Location: ../../views/index.php');
        } else {
            $warning = "Invalid username or password.";
        }

        if (isset($warning)) {
            echo '<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">' . $warning . '</div>';
        }
    }

    public function logout()
    {
        session_destroy();
        header('Location: login.php');
    }
}
