<?php

class SparePartsModel
{
    private $db;

    public $idRepuesto;
    public $RepuCodigo;
    public $RepuNombre;
    public $RepuDescripcion;
    public $RepuTipo;
    public $RepuMarca;
    public $RepuModelo;

    public function __construct()
    {
        $this->db = new PDO("mysql:host=localhost;dbname=workshopsoftware_db", "root", "");
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function save()
    {
        $sql = "INSERT INTO repuestos_motocicleta (RepuCodigo, RepuNombre, RepuDescripcion, RepuTipo, RepuMarca, RepuModelo) VALUES (?, ?, ?, ?,?,?)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$this->RepuCodigo, $this->RepuNombre, $this->RepuDescripcion, $this->RepuTipo, $this->RepuMarca, $this->RepuModelo]);

        return $stmt->rowCount();
    }

    public function find($idRepuesto)
    {
        $sql = "SELECT * FROM repuestos_motocicleta WHERE idRepuesto = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$idRepuesto]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAll()
    {
        $query = $this->db->prepare("SELECT * FROM repuestos_motocicleta");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update()
    {
        $sql = "UPDATE repuestos_motocicleta SET RepuCodigo = ?,RepuNombre = ?, RepuDescripcion = ?, RepuTipo = ?, RepuMarca = ?, RepuModelo = ? WHERE idRepuesto = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$this->RepuCodigo, $this->RepuNombre, $this->RepuDescripcion, $this->RepuTipo, $this->RepuMarca, $this->RepuModelo, $this->idRepuesto]);

        return $stmt->rowCount();
    }

    public function delete()
    {
        $sql = "DELETE FROM repuestos_motocicleta WHERE idRepuesto = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$this->idRepuesto]);

        return $stmt->rowCount();
    }
}
