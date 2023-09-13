<?php
class MechanicModel
{
    private $db;

    public $idMecanico;
    public $MecDocumento;
    public $MecNombre;
    public $MecApellido;
    public $MecTelefono;
    public $MecCorreo;
    public $MecEspecializacion;

    public function __construct()
    {
        $this->db = new PDO("mysql:host=localhost;dbname=workshopsoftware_db", "root", "");
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function getAll(){
        $query = $this->db->prepare("SELECT * FROM mecanico");
        $query->execute();
        return $query->fetchAll();
    }

    public function find($idMecanico)
    {
        $sql = "SELECT * FROM mecanico WHERE idMecanico = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$idMecanico]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function save()
    {
        $sql = "INSERT INTO mecanico (MecDocumento, MecNombre, MecApellido, MecTelefono, MecCorreo, MecEspecializacion) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$this->MecDocumento, $this->MecNombre, $this->MecApellido, $this->MecTelefono, $this->MecCorreo, $this->MecEspecializacion]);

        return $stmt->rowCount();
    }

    public function update()
    {
        $sql = "UPDATE mecanico SET MecDocumento = ?, MecNombre = ?, MecApellido = ?, MecTelefono = ?, MecCorreo = ?, MecEspecializacion = ? WHERE idMecanico = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$this->MecDocumento, $this->MecNombre, $this->MecApellido, $this->MecTelefono, $this->MecCorreo, $this->MecEspecializacion, $this->idMecanico]);

        return $stmt->rowCount();
    }

    public function delete()
    {
        $sql = "DELETE FROM mecanico WHERE idMecanico = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$this->idMecanico]);

        return $stmt->rowCount();
    }
}
