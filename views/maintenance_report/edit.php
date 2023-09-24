<!DOCTYPE html>
<html lang="es-CO">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/styles.css">
    <link rel="shortcut icon" href="../assets/favicon.ico" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/a09d03aeb8.js" crossorigin="anonymous"></script>
    <title>Editar Reporte de Mantenimiento</title>
</head>

<body class="dark:text-white dark:bg-gray-800">
    <?php
    include '../shared/header.php';
    include '../../controllers/MaintenanceReportController.php';

    $maintenanceReportController = new MaintenanceReportController();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $idReporte = $_GET['id'];
        $maintenanceReportController->edit($idReporte);
    }

    if (isset($_GET['id'])) {
        $idReporte =  $_GET['id'];
        $maintenanceReport = $maintenanceReportController->getMaintenanceReportById($idReporte);

        if ($maintenanceReport !== null) {
            $mechanic = $maintenanceReportController->getAllMechanics($idReporte);
            $spareParts = $maintenanceReportController->getAllSpareParts($idReporte);
            $motorbike = $maintenanceReportController->getAllMotorbikes($idReporte);
    ?>
            <div class="container mx-auto mt-10">
                <h2 class="text-2xl font-semibold mb-4">Editar reporte de mantenimiento</h2>
                <form action="" method="POST" class="max-w-screen-md mx-auto p-6">
                    <input type="hidden" name="idReporte" value="<?php echo $maintenanceReport['idReporte']; ?>">
                    <div class="lg:grid lg:grid-cols-2 gap-4 md:grid md:grid-cols-1">
                        <div class="col-span-1 md:block">
                            <div class="mb-4">
                                <label for="RepFecha" class="block text-gray-700 dark:text-white">Fecha:</label>
                                <input type="date" id="RepFecha" name="RepFecha" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?php echo $maintenanceReport['RepFecha'] ?>" required>
                            </div>
                            <div class="mb-4">
                                <label for="RepInformeDiagnostico" class="block text-gray-700 dark:text-white">Informe diagnostico preliminar</label>
                                <textarea id="RepInformeDiagnostico" name="RepInformeDiagnostico" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"><?php echo $maintenanceReport['RepInformeDiagnostico'] ?></textarea>
                            </div>
                            <div class="mb-4">
                                <label for="RepMecanicoEncargado" class="block text-gray-700 dark:text-white">Mecanico Encargado</label>
                                <select id="RepMecanicoEncargado" name="RepMecanicoEncargado" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <?php
                                    foreach ($mechanic as $mechanicData) :
                                        $mechanicId = $mechanicData['idMecanico'];
                                        $mechanicInfo = $mechanicData['MecNombre'] . ' ' . $mechanicData['MecApellido'] . ' - ' . $mechanicData['MecEspecializacion'];
                                    ?>
                                        <option value="<?php echo $mechanicId; ?>" <?php if ($mechanicId == $maintenanceReport['RepMecanicoEncargado']) echo 'selected'; ?>>
                                            <?php echo $mechanicInfo; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="RepTiempoReparacion" class="block text-gray-700 dark:text-white"> Tiempo de reparación</label>
                                <input type="text" id="RepTiempoReparacion" name="RepTiempoReparacion" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?php echo $maintenanceReport['RepTiempoReparacion'] ?>">
                            </div>
                        </div>
                        <div class="col-span-1 md:block">
                            <div class="mb-4">
                                <label for="RepMotocicleta" class="block text-gray-700 dark:text-white">Motocicleta a mantenimiento</label>
                                <select name="RepMotocicleta" id="RepMotocicleta" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <?php foreach ($motorbike as $motorbike) :
                                        $motorbikeId = $motorbike['idMotocicleta'];
                                        $motorbikeInfo = $motorbike['MtPlaca'] . ' - ' . $motorbike['MtMarca'] . ' - ' . $motorbike['MtModelo'] . ' - ' . $motorbike['MtColor'];
                                    ?>
                                        <option value="<?php echo $motorbikeId; ?>" <?php if ($motorbikeId == $maintenanceReport['RepMotocicleta']) echo 'selected'; ?>>
                                            <?php echo $motorbikeInfo; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="RepMantenimientoRealizado" class="block text-gray-700 dark:text-white">Informe mantenimiento realizado</label>
                                <textarea id="RepMantenimientoRealizado" name="RepMantenimientoRealizado" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"><?php echo $maintenanceReport['RepMantenimientoRealizado'] ?></textarea>
                            </div>
                            <div class="mb-4">
                                <label for="RepRepuestosUtilizados" class="block text-gray-700 dark:text-white">Repuestos Utilizados</label>
                                <select name="RepRepuestosUtilizados" id="RepRepuestosUtilizados" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <?php foreach ($spareParts as $sparePart) :
                                        $sparePartId = $sparePart['idRepuesto'];
                                        $sparePartInfo = $sparePart['RepuCodigo'] . ' - ' . $sparePart['RepuNombre'] . ' - ' . $sparePart['RepuTipo'];
                                    ?>
                                        <option value="<?php echo $sparePartId; ?>" <?php if ($sparePartId == $maintenanceReport['RepRepuestosUtilizados']) echo 'selected'; ?>>
                                            <?php echo $sparePartInfo; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold mb-3 py-2 px-4 rounded" id="btnActualizar">
                                <i class="fa-regular fa-floppy-disk" style="color: #ffffff;"></i> Actualizar informe de mantenimiento
                            </button>
                            <br>
                            <a href="index.php" class="bg-red-500 hover:bg-red-600 text-white font-semibold  py-2 px-4 rounded">
                                Volver a la pagina de reportes
                            </a>
                        </div>
                    </div>
                </form>
            </div>
    <?php
        } else {
            echo "Reporte de mantenimiento no encontrado";
        }
    } else {
        echo "ID de reporte de mantenimiento no especificado";
    }
    include '../shared/footer.php'; ?>

</body>

</html>