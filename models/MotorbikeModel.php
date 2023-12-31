<?php
require_once 'Database.php';
class MotorbikeModel
{
    private $db;

    public $idMotocicleta;
    public $MtPlaca;
    public $MtMarca;
    public $MtModelo;
    public $MtCilindraje;
    public $MtColor;
    public $MtCliente;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->connect();
    }
    public function save()
    {
        $sql = "INSERT INTO motocicleta (MtPlaca, MtMarca, MtModelo, MtCilindraje, MtColor, MtCliente) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$this->MtPlaca, $this->MtMarca, $this->MtModelo, $this->MtCilindraje, $this->MtColor, $this->MtCliente]);

        return $stmt->rowCount();
    }

    public function find($idMotocicleta)
    {
        $sql = "SELECT * FROM motocicleta WHERE idMotocicleta = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$idMotocicleta]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAll()
    {
        $sql = "SELECT * FROM motocicleta";
        $stmt = $this->db->query($sql);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update()
    {
        $sql = "UPDATE motocicleta SET MtPlaca = ?, MtMarca = ?, MtModelo = ?, MtCilindraje = ?, MtColor = ?, MtCliente = ? WHERE idMotocicleta = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$this->MtPlaca, $this->MtMarca, $this->MtModelo, $this->MtCilindraje, $this->MtColor, $this->MtCliente, $this->idMotocicleta]);

        return $stmt->rowCount();
    }

    public function delete()
    {
        $sql = "DELETE FROM motocicleta WHERE idMotocicleta = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$this->idMotocicleta]);

        return $stmt->rowCount();
    }
}
