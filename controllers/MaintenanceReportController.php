<?php

include_once 'C:/xampp/htdocs/workshopsoftware/models/MaintenanceReportModel.php';
include_once 'MechanicController.php';
include_once 'SparePartsController.php';
include_once 'MotorbikeController.php';
include_once 'ClientController.php';

class MaintenanceReportController
{
    private  $maintenanceReportModel;
    private  $mechanicController;
    private  $sparePartsController;
    private  $motorbikeController;
    private $clientController;

    public function __construct()
    {
        $this->maintenanceReportModel = new MaintenanceReportModel();
        $this->mechanicController = new MechanicController();
        $this->sparePartsController = new SparePartsController();
        $this->motorbikeController = new MotorbikeController();
        $this->clientController = new ClientController();
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'RepFecha' => $_POST['RepFecha'],
                'RepInformeDiagnostico' => $_POST['RepInformeDiagnostico'],
                'RepMantenimientoRealizado' => $_POST['RepMantenimientoRealizado'],
                'RepTiempoReparacion' => $_POST['RepTiempoReparacion'],
                'RepMotocicleta' => $_POST['RepMotocicleta'],
                'RepMecanicoEncargado' => $_POST['RepMecanicoEncargado'],
                'RepRepuestosUtilizados' => $_POST['RepRepuestosUtilizados'],
            ];
            $result = $this->createMaintenanceReport($data);
            if ($result !== null) {
                header('Location: index.php');
                exit();
            } else {
                echo "Error al crear el reporte";
            }
        }
    }

    public function createMaintenanceReport($data)
    {
        try {
            $this->maintenanceReportModel->RepFecha = $data['RepFecha'];
            $this->maintenanceReportModel->RepInformeDiagnostico = $data['RepInformeDiagnostico'];
            $this->maintenanceReportModel->RepMantenimientoRealizado = $data['RepMantenimientoRealizado'];
            $this->maintenanceReportModel->RepTiempoReparacion = $data['RepTiempoReparacion'];
            $this->maintenanceReportModel->RepMotocicleta = $data['RepMotocicleta'];
            $this->maintenanceReportModel->RepMecanicoEncargado = $data['RepMecanicoEncargado'];
            $this->maintenanceReportModel->RepRepuestosUtilizados = $data['RepRepuestosUtilizados'];
            return $this->maintenanceReportModel->save();
        } catch (Exception $e) {
            echo $e->getMessage();
            return null;
        }
    }

    public function getMaintenanceReportById($idReporte)
    {
        try {
            $maintenanceReport = $this->maintenanceReportModel->find($idReporte);
            return $maintenanceReport;
        } catch (Exception $e) {
            echo $e->getMessage();
            return null;
        }
    }

    public function getAllMaintenanceReports()
    {
        try {
            $maintenanceReports = $this->maintenanceReportModel->getAll();
            return $maintenanceReports;
        } catch (Exception $e) {
            echo $e->getMessage();
            return null;
        }
    }

    public function edit($idReporteMantenimiento)
    {
        if (empty($idReporteMantenimiento) || !is_numeric($idReporteMantenimiento)) {
            echo "ID de reporte de mantenimiento no válido";
            return;
        }
        $report = $this->getMaintenanceReportById($idReporteMantenimiento);
        if ($report === null) {
            echo "Reporte de mantenimiento no encontrado";
            return;
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'idReporte' => $_POST['idReporte'],
                'RepFecha' => $_POST['RepFecha'],
                'RepInformeDiagnostico' => $_POST['RepInformeDiagnostico'],
                'RepMantenimientoRealizado' => $_POST['RepMantenimientoRealizado'],
                'RepTiempoReparacion' => $_POST['RepTiempoReparacion'],
                'RepMotocicleta' => $_POST['RepMotocicleta'],
                'RepMecanicoEncargado' => $_POST['RepMecanicoEncargado'],
                'RepRepuestosUtilizados' => $_POST['RepRepuestosUtilizados']
            ];
            $result = $this->updateMaintenanceReport($data);
            if ($result !== null) {
                header('Location: index.php');
                exit();
            } else {
                echo "Error al actualizar el reporte";
            }
        }
    }

    public function updateMaintenanceReport($data)
    {
        echo $data;
        try {
            $this->maintenanceReportModel->idReporte = $data['idReporte'];
            $this->maintenanceReportModel->RepFecha = $data['RepFecha'];
            $this->maintenanceReportModel->RepInformeDiagnostico = $data['RepInformeDiagnostico'];
            $this->maintenanceReportModel->RepMantenimientoRealizado = $data['RepMantenimientoRealizado'];
            $this->maintenanceReportModel->RepTiempoReparacion = $data['RepTiempoReparacion'];
            $this->maintenanceReportModel->RepMotocicleta = $data['RepMotocicleta'];
            $this->maintenanceReportModel->RepMecanicoEncargado = $data['RepMecanicoEncargado'];
            $this->maintenanceReportModel->RepRepuestosUtilizados = $data['RepRepuestosUtilizados'];
            return $this->maintenanceReportModel->update();
        } catch (Exception $e) {
            echo $e->getMessage();
            return null;
        }
    }

    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $idReporteMantenimiento = $_POST['idReporte'];
            $result = $this->deleteMaintenanceReport($idReporteMantenimiento);
            if ($result) {
                header('Location: index.php');
                exit();
            } else {
                echo "Error al eliminar el reporte";
            }
        }
    }

    public function deleteMaintenanceReport($idReporte)
    {
        try {
            $this->maintenanceReportModel->idReporte = $idReporte;
            return $this->maintenanceReportModel->delete();
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function showClientByMaintenanceReport($idReporte)
    {
        try {
            $maintenanceReport = $this->maintenanceReportModel->find($idReporte);
            if ($maintenanceReport === null) {
                return null;
            }

            $motorbike = $this->motorbikeController->getMotorbikeById($maintenanceReport['RepMotocicleta']);
            if ($motorbike === null) {
                return null;
            }

            $client = $this->clientController->getClientById($motorbike['MtCliente']);

            return $client !== null ? [
                'idCliente' => $client['idCliente'],
                'CliDocumento' => $client['CliDocumento'],
                'CliNombre' => $client['CliNombre'],
                'CliApellido' => $client['CliApellido'],
                'CliTelefono' => $client['CliTelefono'],
                'CliTelefonoSecundario' => $client['CliTelefonoSecundario'],
                'CliCorreo' => $client['CliCorreo'],
                'CliDireccion' => $client['CliDireccion']
            ] : null;
        } catch (Exception $e) {
            echo $e->getMessage();
            return null;
        }
    }

    public function showMotorbikeByMaintenanceReport($idReporte)
    {
        try {
            $maintenanceReport = $this->maintenanceReportModel->find($idReporte);
            if ($maintenanceReport === null) {
                return null;
            }
            $motorbike = $this->getMotorbikeByMaintenanceReport($maintenanceReport);
            return $motorbike !== null ? [
                'idMotocicleta' => $motorbike['idMotocicleta'],
                'MtMarca' => $motorbike['MtMarca'],
                'MtModelo' => $motorbike['MtModelo'],
                'MtColor' => $motorbike['MtColor'],
                'MtPlaca' => $motorbike['MtPlaca'],
                'MtCilindraje' => $motorbike['MtCilindraje']
            ] : null;
        } catch (Exception $e) {
            echo $e->getMessage();
            return null;
        }
    }

    public function showMechanicByMaintenanceReport($idReporte)
    {
        try {
            $maintenanceReport = $this->maintenanceReportModel->find($idReporte);
            if ($maintenanceReport === null) {
                return null;
            }
            $mechanic = $this->getMechanicByMaintenanceReport($maintenanceReport);
            return $mechanic !== null ? [
                'idMecanico' => $mechanic['idMecanico'],
                'MecNombre' => $mechanic['MecNombre'],
                'MecApellido' => $mechanic['MecApellido'],
                'MecEspecializacion' => $mechanic['MecEspecializacion'],
            ] : null;
        } catch (Exception $e) {
            echo $e->getMessage();
            return null;
        }
    }

    public function showSparePartsByMaintenanceReport($idReporte)
    {
        try {
            $maintenanceReport = $this->maintenanceReportModel->find($idReporte);
            if ($maintenanceReport === null) {
                return null;
            }
            $spareParts = $this->getSparePartsByMaintenanceReport($maintenanceReport);
            return $spareParts !== null ? [
                'idRepuesto' => $spareParts['idRepuesto'],
                'RepuCodigo' => $spareParts['RepuCodigo'],
                'RepuNombre' => $spareParts['RepuNombre'],
                'RepuDescripcion' => $spareParts['RepuDescripcion'],
                'RepuTipo' => $spareParts['RepuTipo'],
                'RepuMarca' => $spareParts['RepuMarca'],
                'RepuModelo' => $spareParts['RepuModelo']
            ] : null;
        } catch (Exception $e) {
            echo $e->getMessage();
            return null;
        }
    }

    public function getSparePartsByMaintenanceReport($idReporte)
    {
        $sparePartsId = intval($idReporte['RepRepuestosUtilizados']);
        return $this->sparePartsController->getSparePartsById($sparePartsId);
    }

    public function getMotorbikeByMaintenanceReport($maintenanceReport)
    {

        $motorbikeId = intval($maintenanceReport['RepMotocicleta']);
        return $this->motorbikeController->getMotorbikeById($motorbikeId);
    }

    public function getMechanicByMaintenanceReport($idReporte)
    {
        $mechanicId = intval($idReporte['RepMecanicoEncargado']);
        return $this->mechanicController->getMechanicById($mechanicId);
    }

    public function getAllMotorbikes()
    {
        try {
            return $this->motorbikeController->getAllMotorbikes();
        } catch (Exception $e) {
            echo $e->getMessage();
            return null;
        }
    }

    public function getAllMechanics()
    {
        try {
            return $this->mechanicController->getAllMechanics();
        } catch (Exception $e) {
            echo $e->getMessage();
            return null;
        }
    }

    public function getAllSpareParts()
    {
        try {
            return $this->sparePartsController->getAllSpareParts();
        } catch (Exception $e) {
            echo $e->getMessage();
            return null;
        }
    }

    public function getAllClients()
    {
        try {
            return $this->clientController->getAllClients();
        } catch (Exception $e) {
            echo $e->getMessage();
            return null;
        }
    }
}
