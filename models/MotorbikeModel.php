<?php

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

        $this->db = new PDO("mysql:host=localhost;dbname=workshopsoftware_db", "root", "");
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function getAll()
    {
        $sql = "SELECT * FROM motocicleta";
        $stmt = $this->db->query($sql);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function save()
    {
        $sql = "INSERT INTO motocicleta (MtPlaca, MtMarca, MtModelo, MtCilindraje, MtColor, MtCliente) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$this->MtPlaca, $this->MtMarca, $this->MtModelo, $this->MtCilindraje, $this->MtColor, $this->MtCliente]);

        return $stmt->rowCount();
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

    public function find($id)
    {
        $sql = "SELECT * FROM motocicleta WHERE idMotocicleta = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
