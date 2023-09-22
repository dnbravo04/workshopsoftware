<!DOCTYPE html>
<html lang="es-CO">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Motocicletas</title>
    <link rel="stylesheet" href="../styles/styles.css">
    <link rel="shortcut icon" href="../assets/favicon.ico" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <?php
    include '../shared/header.php';
    include '../../controllers/MaintenanceReportController.php';

    $maintenanceReportController = new MaintenanceReportController();
    $reports = $maintenanceReportController->getAllMaintenanceReports();
    ?>

    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-semibold mb-6">Listado de informes generados</h1>
        <a href="create.php" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded inline-block mb-4">Añadir Motocicleta</a>
        <?php if (!empty($reports) && is_array($reports)) : ?>
            <table class="min-w-full bg-white rounded-lg overflow-hidden shadow-lg">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="w-1/6 text-left py-2 px-4">Fecha</th>
                        <th class="w-1/6 text-left py-2 px-4">Motocicleta</th>
                        <th class="w-1/6 text-left py-2 px-4">Diagnostico</th>
                        <th class="w-1/6 text-left py-2 px-4">Mantenimiento Realizado</th>
                        <th class="w-1/6 text-left py-2 px-4">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($reports as $report) : ?>
                        <tr>
                            <td class="text-left py-2 px-4"><?php echo $report['RepFecha']; ?></td>
                            <?php
                            $motorbikeData = $maintenanceReportController->showMotorbikeByMaintenanceReport($report['idReporte']);
                            if ($motorbikeData !== null) :
                                echo '<td class="text-left py-2 px-4">' . $motorbikeData['MtPlaca'] . '</td>';
                            else :
                                echo '<td class="text-left py-2 px-4"></td>';
                            endif;
                            ?>
                            <td class="text-left py-2 px-4"><?php echo $report['RepInformeDiagnostico']; ?></td>
                            <td class="text-left py-2 px-4"><?php echo $report['RepMantenimientoRealizado']; ?></td>
                            <td class="text-left py-2 px-4">
                                <a href="edit.php?id=<?php echo $report['idReporte']; ?>" class="text-blue-500 hover:underline">Editar</a>
                                <a href="delete.php?id=<?php echo $report['idReporte']; ?>" class="text-red-500 hover:underline ml-4">Eliminar</a>
                                <a href="view.php?id=<?php echo $report['idReporte']; ?>" class="text-green-500 hover:underline ml-4">Detalles</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>
        <?php else : ?>
            <p class="text-gray-700 text-lg">No se encontraron reportes de mantenimiento.</p>
        <?php endif; ?>
    </div>

    <?php include '../shared/footer.php'; ?>
</body>

</html>