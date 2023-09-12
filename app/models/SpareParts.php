<?php

class SpareParts
{
    private $db;

    public $idRepuesto;
    public $RepNombre;
    public $RepCantidad;
    public $RepCosto;
    public $RepMotocicleta;

    public function __construct()
    {
        $this->db = new PDO("mysql:host=localhost;dbname=workshopsoftware_db", "root", "");
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function find($idRepuesto)
    {
        $sql = "SELECT * FROM repuestos_motocicleta WHERE idRepuesto = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$idRepuesto]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function save()
    {
        $sql = "INSERT INTO repuestos_motocicleta (RepNombre, RepCantidad, RepCosto, RepMotocicleta) VALUES (?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$this->RepNombre, $this->RepCantidad, $this->RepCosto, $this->RepMotocicleta]);

        return $stmt->rowCount();
    }

    public function update()
    {
        $sql = "UPDATE repuestos_motocicleta SET RepNombre = ?, RepCantidad = ?, RepCosto = ?, RepMotocicleta = ? WHERE idRepuesto = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$this->RepNombre, $this->RepCantidad, $this->RepCosto, $this->RepMotocicleta, $this->idRepuesto]);

        return $stmt->rowCount();
    }

    public function delete()
    {
        $sql = "DELETE FROM repuestos_motocicleta WHERE idRepuesto = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$this->idRepuesto]);

        return $stmt->rowCount();
    }

    public function getMotocicleta()
    {
        $motocicleta = MotorbikeModel::find($this->RepMotocicleta);
        return $motocicleta;
    }
}

?>
