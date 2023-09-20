<?php
class LogisticalAssistantModel
{
    private $db;

    public $idAsistLogistico;
    public $ALDocumento;
    public $ALNombre;
    public $ALApellido;
    public $ALTelefono;
    public $ALCorreo;

    public function __construct()
    {
        $this->db = new PDO("mysql:host=localhost;dbname=workshopsoftware_db", "root", "");
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    public function getAll()
    {
        $sql = "SELECT * FROM asistentelogistico";
        $stmt = $this->db->query($sql);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function find($idAsistLogistico)
    {
        $sql = "SELECT * FROM asistentelogistico WHERE idAsistLogistico = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$idAsistLogistico]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function save()
    {
        $sql = "INSERT INTO asistentelogistico (ALDocumento, ALNombre, ALApellido, ALTelefono, ALCorreo) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$this->ALDocumento, $this->ALNombre, $this->ALApellido, $this->ALTelefono, $this->ALCorreo]);

        return $stmt->rowCount();
    }

    public function update()
    {
        $sql = "UPDATE asistentelogistico SET ALDocumento = ?, ALNombre = ?, ALApellido = ?, ALTelefono = ?, ALCorreo = ? WHERE idAsistLogistico = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$this->ALDocumento, $this->ALNombre, $this->ALApellido, $this->ALTelefono, $this->ALCorreo, $this->idAsistLogistico]);

        return $stmt->rowCount();
    }

    public function delete()
    {
        $sql = "DELETE FROM asistentelogistico WHERE idAsistLogistico = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$this->idAsistLogistico]);

        return $stmt->rowCount();
    }
}
