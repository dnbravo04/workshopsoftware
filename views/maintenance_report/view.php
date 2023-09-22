<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/styles.css">
    <link rel="shortcut icon" href="../assets/favicon.ico" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>

<body>
    <?php

    include '../shared/header.php';
    include '../../controllers/MaintenanceReportController.php';
    $maintenanceReportController = new MaintenanceReportController();
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $idMaintenanceReport = $_GET['id'];
        $maintenanceReport = $maintenanceReportController->getMaintenanceReportById($idMaintenanceReport);
        if ($maintenanceReport !== null) {
    ?>
            <h2 class="text-center text-4xl font-bold">Datos del informes de mantenimiento</h2>
            <div class="container mx-auto mt-10">
                <div class="bg-white rounded-lg shadow-lg p-4 hover:shadow-xl transition duration-300 ease-in-out">
                    <div class="grid grid-cols-2 gap-4">
                        <div class="col-span-1">
                            <p class="my-2">
                                <strong class="text-base font-bold">ID del Reporte:</strong>
                                <br>
                                <span class="text-xl"> &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $maintenanceReport['idReporte']; ?></span>
                            </p>
                            <p class="my-2">
                                <strong class="text-base font-bold">Fecha del Reporte:</strong>
                                <br>
                                <span class="text-xl"> &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $maintenanceReport['RepFecha']; ?></span>
                            </p>
                            <p class="my-2">
                                <strong class="text-base font-bold">Informe diagnostico preliminar:</strong>
                                <br>
                                <span class="text-xl"> &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $maintenanceReport['RepInformeDiagnostico']; ?></span>
                            </p>
                            <p class="my-2">
                                <strong class="text-base font-bold">Mantenimiento Realizado:</strong>
                                <br>
                                <span class="text-xl"> &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $maintenanceReport['RepMantenimientoRealizado']; ?></span>
                            </p>
                        </div>


                        <div class="col-span-1">
                            <p class="my-2">
                                <strong class="text-base font-bold">Tiempo de reparación:</strong>
                                <br>
                                <span class="text-xl"> &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $maintenanceReport['RepTiempoReparacion']; ?></span>
                            </p>
                            <p class="my-2">
                                <strong class="text-base font-bold">Motocicleta reparada:</strong>
                                <br>
                                <?php
                                $motorbike = $maintenanceReportController->showMotorbikeByMaintenanceReport($maintenanceReport['idReporte']);
                                if ($motorbike !== null) :

                                    echo '<span class="text-xl"> &nbsp;&nbsp;&nbsp;&nbsp;' . $motorbike['MtPlaca'] . ' ' . $motorbike['MtMarca'] . ' ' . $motorbike['MtModelo'] . ' <br>&nbsp;&nbsp;&nbsp;&nbsp;Color ' . $motorbike['MtColor'] . '</span>';
                                else :

                                    echo '<span class="text-xl"> &nbsp;&nbsp;&nbsp;&nbsp;Motocicleta no encontrada.</span>';
                                endif;
                                ?>
                            </p>
                            <p class="my-2">
                                <strong class="text-base font-bold">Mecanico Encargado:</strong>
                                <br>
                                <?php $mechanicData = $maintenanceReportController->showMechanicByMaintenanceReport($maintenanceReport['idReporte']);
                                if ($mechanicData !== null) :

                                    echo '<span class="text-xl"> &nbsp;&nbsp;&nbsp;&nbsp;' . $mechanicData['MecNombre'] . ' ' . $mechanicData['MecApellido'] . '</span><br>';
                                    echo '<span class="text-xl">&nbsp;&nbsp;&nbsp;&nbsp;' . $mechanicData['MecEspecializacion'] . '</span>';
                                else :

                                    echo '<span class="text-xl"> &nbsp;&nbsp;&nbsp;&nbsp;Mecanico no encontrado.</span>';
                                endif; ?>
                            </p>
                            <p class="my-2">
                                <strong class="text-base font-bold">Repuestos Utilizados:</strong>
                                <br>
                                <?php $repuestosData = $maintenanceReportController->showSparePartsByMaintenanceReport($maintenanceReport['idReporte']);
                                if ($repuestosData !== null) :

                                    echo '<span class="text-xl"> &nbsp;&nbsp;&nbsp;&nbsp;' . $repuestosData['RepuNombre'] . '</span><br>';
                                    echo '<span class="text-xl"> &nbsp;&nbsp;&nbsp;&nbsp;' . $repuestosData['RepuMarca'] . ' ' . $repuestosData['RepuModelo'] . '</span>';
                                else :

                                    echo '<span class="text-xl"> &nbsp;&nbsp;&nbsp;&nbsp;Repuestos no encontrados.</span>';
                                endif; ?>
                            </p>
                            <p class="my-2">

                            </p>

                        </div>
                    </div>
                </div>
        <?php
        } else {
            echo "Informe no encontrado";
        }
    } else {
        echo "ID del informe no válido";
    }
        ?>
            </div>
            <div class="flex p-1 justify-center">

                <a href="index.php" class="bg-red-500 hover:bg-red-600 text-white font-semibold  py-2 px-4 my-3 rounded">
                    Volver a la pagina de reportes
                </a>
            </div>

            <?php include '../shared/footer.php'; ?>
</body>

</html>