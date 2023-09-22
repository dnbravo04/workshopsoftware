<?php
class LoginModel
{
    private $db;

    public function __construct()
    {
        $this->db = new PDO("mysql:host=localhost;dbname=workshopsoftware_db", "root", "");
    }

    public function authenticate($username, $password)
    {
        $sql = 'SELECT * FROM administrador WHERE AdmUsuario = ?';
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$username]);

        $user = $stmt->fetch();

        if ($user) {
            // Obtener la sal y el hash almacenados en la base de datos
            $storedSalt = $user['AdmSalt'];
            $storedHash = $user['AdmContraseñaHash'];

            // Combinar la sal y la contraseña proporcionada
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
}
