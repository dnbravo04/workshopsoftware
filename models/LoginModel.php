<?php
class LoginModel {

private $db;

public function __construct() {
    $this->db = new PDO("mysql:host=localhost;dbname=workshopsoftware_db", "root", "");
}

public function authenticate($username, $password) {
    $sql = 'SELECT * FROM administrador WHERE AdmUsuario = ? AND AdmContraseña = ?';
    $stmt = $this->db->prepare($sql);
    $stmt->execute([$username, $password]);

    if ($user = $stmt->fetch()) {
        return $user;
    } else {
        return null;
    }
}
}