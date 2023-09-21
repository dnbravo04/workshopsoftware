<?php
class AdminModel
{
    private $db;

    public $idAdministrador;
    public $AdmDocumento;
    public $AdmNombre;
    public $AdmApellido;
    public $AdmTelefono;
    public $AdmCorreo;
    public $AdmUsuario;
    public $AdmContraseña;

    public function __construct()
    {
        $this->db = new PDO("mysql:host=localhost;dbname=workshopsoftware_db", "root", "");
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function getAll()
    {
        $sql = "SELECT * FROM administrador";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($idAdministrador)
    {
        $sql = "SELECT * FROM administrador WHERE idAdministrador = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$idAdministrador]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    public function save()
    {
        $sql = "INSERT INTO administrador (AdmDocumento, AdmNombre, AdmApellido, AdmTelefono, AdmCorreo, AdmUsuario, AdmContraseña) VALUES (?, ?, ?, ?, ?,?,?)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$this->AdmDocumento, $this->AdmNombre, $this->AdmApellido, $this->AdmTelefono, $this->AdmCorreo, $this->AdmUsuario, $this->AdmContraseña]);

        return $stmt->rowCount();
    }

    public function update()
    {
        $sql = "UPDATE administrador SET AdmDocumento = ?, AdmNombre = ?, AdmApellido = ?, AdmTelefono = ?, AdmCorreo = ?, AdmUsuario = ?, AdmContraseña = ? WHERE idAdministrador = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$this->AdmDocumento, $this->AdmNombre, $this->AdmApellido, $this->AdmTelefono, $this->AdmCorreo,$this->AdmUsuario,$this->AdmContraseña, $this->idAdministrador]);

        return $stmt->rowCount();
    }

    public function delete()
    {
        $sql = "DELETE FROM administrador WHERE idAdministrador = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$this->idAdministrador]);

        return $stmt->rowCount();
    }
}
