<?php
require_once 'Database.php';
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
        $database = new Database();
        $this->db = $database->connect();
    }

    public function save()
    {
        $sql = "INSERT INTO reporte_mantenimiento (RepFecha, RepInformeDiagnostico, RepMantenimientoRealizado, RepTiempoReparacion, RepMotocicleta, RepMecanicoEncargado, RepRepuestosUtilizados) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$this->RepFecha, $this->RepInformeDiagnostico, $this->RepMantenimientoRealizado, $this->RepTiempoReparacion, $this->RepMotocicleta, $this->RepMecanicoEncargado, $this->RepRepuestosUtilizados]);

        return $stmt->rowCount();
    }

    public function find($idReporte)
    {
        $sql = "SELECT * FROM reporte_mantenimiento WHERE idReporte = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$idReporte]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAll()
    {
        $query = $this->db->prepare("SELECT * FROM reporte_mantenimiento");
        $query->execute();
        return $query->fetchAll();
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
}
