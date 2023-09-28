<?php
require_once 'Database.php';
class LoginModel
{
    private $db;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->connect();
    }

    public function autenticarUsuario($username, $password)
    {
        $result = $this->authenticate($username, $password);

        switch ($result) {
            case 'username':
                return 'Nombre de usuario incorrecto';
            case 'password':
                return 'Contraseña incorrecta';
            default:
                return $result;
        }
    }
    
    public function authenticate($username, $password)
    {
        $sql = 'SELECT * FROM administrador WHERE AdmUsuario = ?';
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$username]);

        $user = $stmt->fetch();

        if ($user) {
            $storedSalt = $user['AdmSalt'];
            $storedHash = $user['AdmContraseñaHash'];

            $saltedPassword = $storedSalt . $password;

            if (password_verify($saltedPassword, $storedHash)) {
                return $user;
            } else {
                return 'password';
            }
        } else {

            return 'username';
        }
    }



}
