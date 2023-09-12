<?php
class LogisticalAsistantModel
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
        $sql = "SELECT * FROM asistentes_logisticos";
        $stmt = $this->db->query($sql);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function find($idAsistLogistico)
    {
        $sql = "SELECT * FROM asistenteslogisticos WHERE idAsistLogistico = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$idAsistLogistico]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function save()
    {
        $sql = "INSERT INTO asistenteslogisticos (ALDocumento, ALNombre, ALApellido, ALTelefono, ALCorreo) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$this->ALDocumento, $this->ALNombre, $this->ALApellido, $this->ALTelefono, $this->ALCorreo]);

        return $stmt->rowCount();
    }

    public function update()
    {
        $sql = "UPDATE asistenteslogisticos SET ALDocumento = ?, ALNombre = ?, ALApellido = ?, ALTelefono = ?, ALCorreo = ? WHERE idAsistLogistico = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$this->ALDocumento, $this->ALNombre, $this->ALApellido, $this->ALTelefono, $this->ALCorreo, $this->idAsistLogistico]);

        return $stmt->rowCount();
    }

    public function delete()
    {
        $sql = "DELETE FROM asistenteslogisticos WHERE idAsistLogistico = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$this->idAsistLogistico]);

        return $stmt->rowCount();
    }
}
