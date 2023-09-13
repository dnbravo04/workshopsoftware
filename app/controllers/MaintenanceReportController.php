<?php
class MaintenanceReportController
{
    public function index()
    {
        // Lógica para mostrar la lista de reportes de mantenimiento
        $maintenanceReportModel = new MaintenanceReportModel();
        $maintenanceReports = $maintenanceReportModel->getAll(); // Asegúrate de tener un método getAll en tu modelo

        // Puedes cargar la vista correspondiente y pasar los datos de los reportes a la vista
        include 'views/maintenancereport/index.php';
    }

    public function create()
    {
        // Lógica para mostrar el formulario de creación de reportes de mantenimiento
        include 'views/maintenancereport/create.php';
    }

    public function store()
    {
        // Lógica para almacenar un nuevo reporte de mantenimiento en la base de datos
        // Recuperar los datos del formulario
        $RepFecha = $_POST['RepFecha'];
        $RepInformeDiagnostico = $_POST['RepInformeDiagnostico'];
        $RepMantenimientoRealizado = $_POST['RepMantenimientoRealizado'];
        $RepTiempoReparacion = $_POST['RepTiempoReparacion'];
        $RepMotocicleta = $_POST['RepMotocicleta'];
        $RepMecanicoEncargado = $_POST['RepMecanicoEncargado'];
        $RepRepuestosUtilizados = $_POST['RepRepuestosUtilizados'];

        // Crear una instancia del modelo y guardar los datos
        $maintenanceReportModel = new MaintenanceReportModel();
        $maintenanceReportModel->RepFecha = $RepFecha;
        $maintenanceReportModel->RepInformeDiagnostico = $RepInformeDiagnostico;
        $maintenanceReportModel->RepMantenimientoRealizado = $RepMantenimientoRealizado;
        $maintenanceReportModel->RepTiempoReparacion = $RepTiempoReparacion;
        $maintenanceReportModel->RepMotocicleta = $RepMotocicleta;
        $maintenanceReportModel->RepMecanicoEncargado = $RepMecanicoEncargado;
        $maintenanceReportModel->RepRepuestosUtilizados = $RepRepuestosUtilizados;

        if ($maintenanceReportModel->save()) {
            // Redirigir o mostrar un mensaje de éxito
            header('Location: index.php');
        } else {
            // Mostrar un mensaje de error
            echo 'Error al guardar el reporte de mantenimiento.';
        }
    }

    public function edit($id)
    {
        // Lógica para mostrar el formulario de edición de un reporte de mantenimiento
        $maintenanceReportModel = new MaintenanceReportModel();
        $maintenanceReport = $maintenanceReportModel->find($id);

        // Puedes cargar la vista correspondiente y pasar los datos del reporte a la vista
        include 'views/maintenancereport/edit.php';
    }

    public function update($id)
    {
        // Lógica para actualizar los datos de un reporte de mantenimiento en la base de datos
        // Recuperar los datos del formulario
        $RepFecha = $_POST['RepFecha'];
        $RepInformeDiagnostico = $_POST['RepInformeDiagnostico'];
        $RepMantenimientoRealizado = $_POST['RepMantenimientoRealizado'];
        $RepTiempoReparacion = $_POST['RepTiempoReparacion'];
        $RepMotocicleta = $_POST['RepMotocicleta'];
        $RepMecanicoEncargado = $_POST['RepMecanicoEncargado'];
        $RepRepuestosUtilizados = $_POST['RepRepuestosUtilizados'];

        // Crear una instancia del modelo y actualizar los datos
        $maintenanceReportModel = new MaintenanceReportModel();
        $maintenanceReportModel->idReporte = $id;
        $maintenanceReportModel->RepFecha = $RepFecha;
        $maintenanceReportModel->RepInformeDiagnostico = $RepInformeDiagnostico;
        $maintenanceReportModel->RepMantenimientoRealizado = $RepMantenimientoRealizado;
        $maintenanceReportModel->RepTiempoReparacion = $RepTiempoReparacion;
        $maintenanceReportModel->RepMotocicleta = $RepMotocicleta;
        $maintenanceReportModel->RepMecanicoEncargado = $RepMecanicoEncargado;
        $maintenanceReportModel->RepRepuestosUtilizados = $RepRepuestosUtilizados;

        if ($maintenanceReportModel->update()) {
            // Redirigir o mostrar un mensaje de éxito
            header('Location: index.php');
        } else {
            // Mostrar un mensaje de error
            echo 'Error al actualizar el reporte de mantenimiento.';
        }
    }

    public function delete($id)
    {
        // Lógica para eliminar un reporte de mantenimiento de la base de datos
        $maintenanceReportModel = new MaintenanceReportModel();
        $maintenanceReportModel->idReporte = $id;

        if ($maintenanceReportModel->delete()) {
            // Redirigir o mostrar un mensaje de éxito
            header('Location: index.php');
        } else {
            // Mostrar un mensaje de error
            echo 'Error al eliminar el reporte de mantenimiento.';
        }
    }
}