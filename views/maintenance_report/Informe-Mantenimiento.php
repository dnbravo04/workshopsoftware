<?php
require('../../fpdf/fpdf.php');
include '../../controllers/MaintenanceReportController.php';

$maintenanceReportController = new MaintenanceReportController();

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $idMaintenanceReport = $_GET['id'];
    $maintenanceReport = $maintenanceReportController->getMaintenanceReportById($idMaintenanceReport);
    $mechanic = $maintenanceReportController->showMechanicByMaintenanceReport($idMaintenanceReport);
    $spareParts = $maintenanceReportController->showSparePartsByMaintenanceReport($idMaintenanceReport);
    $motorbike = $maintenanceReportController->showMotorbikeByMaintenanceReport($idMaintenanceReport);
    $clientData = $maintenanceReportController->showClientByMaintenanceReport($idMaintenanceReport);
    $currentDate = new DateTime();
    $timezone = new DateTimeZone('America/Bogota');
    $currentDate->setTimezone($timezone);
    $currentDate = $currentDate->format('Y-m-d H:i');

    if ($maintenanceReport !== null) {
        // Crear una instancia de FPDF con tamaño de página personalizado (Letter)
        $pdf = new FPDF();
        $pdf->AddPage('P', array(216, 279)); // Tamaño carta (Letter) en milímetros

        // Configurar márgenes típicos (10 mm en todas las direcciones)
        $pdf->SetMargins(10, 10, 10);

        // Logo
        $pdf->Image('../assets/logo-dark.jpg', 140, 15, 60);

        // Encabezado (Fecha de generación e ID del Informe)
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(0, 10, mb_convert_encoding('Fecha de generación: ' . $currentDate, 'ISO-8859-1', 'UTF-8'), 0, 1);
        $pdf->Cell(0, 10, mb_convert_encoding('ID del Informe: ' . $maintenanceReport['idReporte'], 'ISO-8859-1', 'UTF-8'), 0, 1);

        // Título centrado y más grande
        $pdf->SetFont('Arial', 'B', 18);
        $pdf->Cell(0, 20, mb_convert_encoding('Informe de Mantenimiento', 'ISO-8859-1', 'UTF-8'), 0, 1, 'C');

        // Datos de la motocicleta (en tabla)
        $pdf->SetFont('Arial', 'B', 14);
        $pdf->Cell(0, 10, mb_convert_encoding('Datos de la motocicleta', 'ISO-8859-1', 'UTF-8'), 0, 1);

        // Crear tabla para los datos de la motocicleta
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(100, 10, mb_convert_encoding('Placa: ' . $motorbike['MtPlaca'], 'ISO-8859-1', 'UTF-8'), 1);
        $pdf->Cell(100, 10, mb_convert_encoding('Marca: ' . $motorbike['MtMarca'], 'ISO-8859-1', 'UTF-8'), 1);
        $pdf->Ln();
        $pdf->Cell(100, 10, mb_convert_encoding('Modelo: ' . $motorbike['MtModelo'], 'ISO-8859-1', 'UTF-8'), 1);
        $pdf->Cell(100, 10, mb_convert_encoding('Cilindraje: ' . $motorbike['MtCilindraje'], 'ISO-8859-1', 'UTF-8'), 1);
        $pdf->Ln();
        $pdf->Cell(200, 10, mb_convert_encoding('Color: ' . $motorbike['MtColor'], 'ISO-8859-1', 'UTF-8'), 1);
        $pdf->Ln();
        $pdf->Ln();

        // Datos del Cliente 
        $pdf->SetFont('Arial', 'B', 14);
        $pdf->Cell(0, 10, mb_convert_encoding('Datos del Cliente', 'ISO-8859-1', 'UTF-8'), 0, 1);

        // Crear tabla para los datos del cliente
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(100, 10, mb_convert_encoding('Documento: ' . $clientData['CliDocumento'], 'ISO-8859-1', 'UTF-8'), 1);
        $pdf->Cell(100, 10, mb_convert_encoding('Nombres: ' . $clientData['CliNombre'], 'ISO-8859-1', 'UTF-8'), 1);
        $pdf->Ln();
        $pdf->Cell(100, 10, mb_convert_encoding('Apellidos: ' . $clientData['CliApellido'], 'ISO-8859-1', 'UTF-8'), 1);
        $pdf->Cell(100, 10, mb_convert_encoding('Teléfono: ' . $clientData['CliTelefono'], 'ISO-8859-1', 'UTF-8'), 1);
        $pdf->Ln();
        $pdf->Cell(100, 10, mb_convert_encoding('Teléfono secundario: ' . $clientData['CliTelefonoSecundario'], 'ISO-8859-1', 'UTF-8'), 1);
        $pdf->Cell(100, 10, mb_convert_encoding('Correo: ' . $clientData['CliCorreo'], 'ISO-8859-1', 'UTF-8'), 1);
        $pdf->Ln();
        $pdf->Cell(200, 10, mb_convert_encoding('Dirección: ' . $clientData['CliDireccion'], 'ISO-8859-1', 'UTF-8'), 1);
        $pdf->Ln();
        $pdf->Ln();

        // Reporte de Mantenimiento
        $pdf->SetFont('Arial', 'B', 14);
        $pdf->Cell(0, 10, mb_convert_encoding('Reporte de Mantenimiento', 'ISO-8859-1', 'UTF-8'), 0, 1);

        // Crear tabla para los datos del reporte de mantenimiento
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(100, 10, mb_convert_encoding('Fecha del mantenimiento: ' . $maintenanceReport['RepFecha'], 'ISO-8859-1', 'UTF-8'), 1);
        $pdf->Cell(100, 10, mb_convert_encoding('Tiempo de reparación: ' . $maintenanceReport['RepTiempoReparacion'], 'ISO-8859-1', 'UTF-8'), 1);
        $pdf->Ln();
        $pdf->Cell(200, 10, mb_convert_encoding('Diagnóstico preliminar: ' . $maintenanceReport['RepInformeDiagnostico'], 'ISO-8859-1', 'UTF-8'), 1);
        $pdf->Ln();
        $pdf->Cell(200, 10, mb_convert_encoding('Mantenimiento realizado: ' . $maintenanceReport['RepMantenimientoRealizado'], 'ISO-8859-1', 'UTF-8'), 1);
        $pdf->Ln();

        // Mecánico Encargado 
        $pdf->SetFont('Arial', 'B', 14);
        $pdf->Cell(0, 10, mb_convert_encoding('Mecánico Encargado', 'ISO-8859-1', 'UTF-8'), 0, 1);

        // Crear tabla para los datos del mecánico encargado
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(100, 10, mb_convert_encoding('Nombre: ' . $mechanic['MecNombre'] . ' ' . $mechanic['MecApellido'], 'ISO-8859-1', 'UTF-8'), 1);
        $pdf->Cell(100, 10, mb_convert_encoding('Especialización: ' . $mechanic['MecEspecializacion'], 'ISO-8859-1', 'UTF-8'), 1);
        $pdf->Ln();

        // Piezas Utilizadas 
        $pdf->SetFont('Arial', 'B', 14);
        $pdf->Cell(0, 10, mb_convert_encoding('Piezas Utilizadas', 'ISO-8859-1', 'UTF-8'), 0, 1);

        // Crear tabla para los datos de las piezas utilizadas
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(100, 10, mb_convert_encoding('Nombre', 'ISO-8859-1', 'UTF-8'), 1);
        $pdf->Cell(50, 10, mb_convert_encoding('Marca', 'ISO-8859-1', 'UTF-8'), 1);
        $pdf->Cell(50, 10, mb_convert_encoding('Modelo', 'ISO-8859-1', 'UTF-8'), 1);
        $pdf->Ln();

        // Llenar la tabla con los datos de las piezas utilizadas
        if ($spareParts !== null) {
            $pdf->Cell(100, 10, mb_convert_encoding($spareParts['RepuNombre'], 'ISO-8859-1', 'UTF-8'), 1);
            $pdf->Cell(50, 10, mb_convert_encoding($spareParts['RepuMarca'], 'ISO-8859-1', 'UTF-8'), 1);
            $pdf->Cell(50, 10, mb_convert_encoding($spareParts['RepuModelo'], 'ISO-8859-1', 'UTF-8'), 1);
        } else {
            $pdf->Cell(200, 10, mb_convert_encoding('Piezas no encontradas.', 'ISO-8859-1', 'UTF-8'), 1);
        }

        // Generar el archivo PDF
        $placa = $motorbike['MtPlaca'];
        $fechaMantenimiento = $maintenanceReport['RepFecha'];
        $nombreArchivo = 'Mantenimiento_' . $placa . '_' . $fechaMantenimiento . '.pdf';

        // Usar la función Output con el nombre personalizado del archivo
        $pdf->Output($nombreArchivo, "I");
    } else {
        echo "Informe no encontrado";
    }
} else {
    echo "ID del informe no válido";
}
