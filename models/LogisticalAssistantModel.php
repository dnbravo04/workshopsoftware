<?php
require_once 'Database.php';
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
        $database = new Database();
        $this->db = $database->connect();
    }

    public function save()
    {
        $sql = "INSERT INTO asistentelogistico (ALDocumento, ALNombre, ALApellido, ALTelefono, ALCorreo) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$this->ALDocumento, $this->ALNombre, $this->ALApellido, $this->ALTelefono, $this->ALCorreo]);

        return $stmt->rowCount();
    }

    public function find($idAsistLogistico)
    {
        $sql = "SELECT * FROM asistentelogistico WHERE idAsistLogistico = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$idAsistLogistico]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAll()
    {
        $sql = "SELECT * FROM asistentelogistico";
        $stmt = $this->db->query($sql);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
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
