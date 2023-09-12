<?php

class MaintenanceReportModel
{
    private $db;

    public $idReporte;
    public $RepFecha;
    public $RepInformeDiagnostico;
    public $RepMantenimientoRealizado;
    public $RepTiempoReparacion;
    public $RepMotocicleta;
    public $RepMecanicoEncargado;
    public $RepRepuestosUtilizados;

    public function __construct()
    {
        $this->db = new PDO("mysql:host=localhost;dbname=workshopsoftware_db", "root", "");
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function find($idReporte)
    {
        $sql = "SELECT * FROM reporte_mantenimiento WHERE idReporte = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$idReporte]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function save()
    {
        $sql = "INSERT INTO reporte_mantenimiento (RepFecha, RepInformeDiagnostico, RepMantenimientoRealizado, RepTiempoReparacion, RepMotocicleta, RepMecanicoEncargado, RepRepuestosUtilizados) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$this->RepFecha, $this->RepInformeDiagnostico, $this->RepMantenimientoRealizado, $this->RepTiempoReparacion, $this->RepMotocicleta, $this->RepMecanicoEncargado, $this->RepRepuestosUtilizados]);

        return $stmt->rowCount();
    }

    public function update()
    {
        $sql = "UPDATE reporte_mantenimiento SET RepFecha = ?, RepInformeDiagnostico = ?, RepMantenimientoRealizado = ?, RepTiempoReparacion = ?, RepMotocicleta = ?, RepMecanicoEncargado = ?, RepRepuestosUtilizados = ? WHERE idReporte = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$this->RepFecha, $this->RepInformeDiagnostico, $this->RepMantenimientoRealizado, $this->RepTiempoReparacion, $this->RepMotocicleta, $this->RepMecanicoEncargado, $this->RepRepuestosUtilizados, $this->idReporte]);

        return $stmt->rowCount();
    }

    public function delete()
    {
        $sql = "DELETE FROM reporte_mantenimiento WHERE idReporte = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$this->idReporte]);

        return $stmt->rowCount();
    }

    public function getMotocicleta()
    {
        $motocicleta = MotorbikeModel::find($this->RepMotocicleta);
        return $motocicleta;
    }

    public function getMecanicoEncargado()
    {
        $mecanico = MechanicModel::find($this->RepMecanicoEncargado);
        return $mecanico;
    }

    public function getRepuestosUtilizados()
    {
        $repuestos = [];
        $repuestosUtilizados = explode(",", $this->RepRepuestosUtilizados);
        foreach ($repuestosUtilizados as $idRepuesto) {
            $repuesto = SpareParts::find($idRepuesto);
            $repuestos[] = $repuesto;
        }
        return $repuestos;
    }
}
