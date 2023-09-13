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

    public function __construct()
    {
        $this->db = new PDO("mysql:host=localhost;dbname=workshopsoftware_db", "root", "");
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function getAll()
    {
        $sql = "SELECT * FROM administradores";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($idAdministrador)
    {
        $sql = "SELECT * FROM administradores WHERE idAdministrador = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$idAdministrador]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    public function save()
    {
        $sql = "INSERT INTO administradores (AdmDocumento, AdmNombre, AdmApellido, AdmTelefono, AdmCorreo) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$this->AdmDocumento, $this->AdmNombre, $this->AdmApellido, $this->AdmTelefono, $this->AdmCorreo]);

        return $stmt->rowCount();
    }

    public function update()
    {
        $sql = "UPDATE administradores SET AdmDocumento = ?, AdmNombre = ?, AdmApellido = ?, AdmTelefono = ?, AdmCorreo = ? WHERE idAdministrador = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$this->AdmDocumento, $this->AdmNombre, $this->AdmApellido, $this->AdmTelefono, $this->AdmCorreo, $this->idAdministrador]);

        return $stmt->rowCount();
    }

    public function delete()
    {
        $sql = "DELETE FROM administradores WHERE idAdministrador = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$this->idAdministrador]);

        return $stmt->rowCount();
    }
}
