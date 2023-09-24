<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/styles.css">
    <link rel="shortcut icon" href="../assets/favicon.ico" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/a09d03aeb8.js" crossorigin="anonymous"></script>
    <title>Detalles del Informe de mantenimiento</title>
</head>

<body class="dark:text-white dark:bg-gray-800">
    <?php

    include '../shared/header.php';
    include '../../controllers/MaintenanceReportController.php';
    $maintenanceReportController = new MaintenanceReportController();
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $idMaintenanceReport = $_GET['id'];
        $maintenanceReport = $maintenanceReportController->getMaintenanceReportById($idMaintenanceReport);
        $motorbike = $maintenanceReportController->showMotorbikeByMaintenanceReport($maintenanceReport['idReporte']);
        $client = $maintenanceReportController->showClientByMaintenanceReport($maintenanceReport['idReporte']);
        $sparePart = $maintenanceReportController->showSparePartsByMaintenanceReport($maintenanceReport['idReporte']);
        $mechanic = $maintenanceReportController->showMechanicByMaintenanceReport($maintenanceReport['idReporte']);

        $currentDate = new DateTime();
        $timezone = new DateTimeZone('America/Bogota');
        $currentDate->setTimezone($timezone);
        $currentDate = $currentDate->format('Y-m-d H:i');
        if ($maintenanceReport !== null) {
    ?>
            <div class="container mx-auto mt-10">
                <h2 class="text-center text-xl font-bold">Datos del informe de mantenimiento</h2>
                <div class="flow-root mx-auto max-w-6xl mb-4">
                    <h3 class="float-left text-xl text-right font-semibold pt-3">ID del reporte: RM-<?php echo $maintenanceReport['idReporte']; ?></h3>
                    <h3 class="float-right text-xl font-semibold pt-3">Fecha de generación del reporte: <?php echo $currentDate ?></h3>
                </div>
                <div class="w-full max-w-6xl dark:bg-gray-700 mx-auto my-3 bg-white rounded-lg shadow-lg p-5">
                    <h2 class="text-center text-xl font-bold">Reporte de mantenimiento</h2>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="col-span-1">
                            <p class="my-2">
                                <strong class="text-base font-bold">Fecha del mantenimiento:</strong>
                                <br>
                                <span class="text-xl"> &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $maintenanceReport['RepFecha']; ?></span>
                            </p>
                            <p class="my-2">
                                <strong class="text-base font-bold">Informe diagnostico preliminar:</strong>
                                <br>
                                <span class="text-xl"> &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $maintenanceReport['RepInformeDiagnostico']; ?></span>
                            </p>
                            <p class="my-2">
                                <strong class="text-base font-bold">Mecanico Encargado:</strong>
                                <br>
                                <?php
                                if ($mechanic !== null) :
                                    echo '<span class="text-xl"> &nbsp;&nbsp;&nbsp;&nbsp;' . $mechanic['MecNombre'] . ' ' . $mechanic['MecApellido'] . '</span><br>';
                                else :
                                    echo '<span class="text-xl"> &nbsp;&nbsp;&nbsp;&nbsp;Mecanico no encontrado.</span>';
                                endif; ?>
                            </p>
                        </div>

                        <div class="col-span-1">
                            <p class="my-2">
                                <strong class="text-base font-bold">Tiempo de reparación:</strong>
                                <br>
                                <span class="text-xl"> &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $maintenanceReport['RepTiempoReparacion']; ?></span>
                            </p>
                            <p class="my-2">
                                <strong class="text-base font-bold">Mantenimiento Realizado:</strong>
                                <br>
                                <span class="text-xl"> &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $maintenanceReport['RepMantenimientoRealizado']; ?></span>
                            </p>
                            <p class="my-2">
                                <strong class="text-base font-bold">Especialización del Mecanico:</strong>
                                <br>
                                <?php
                                if ($mechanic !== null) :
                                    echo '<span class="text-xl">&nbsp;&nbsp;&nbsp;&nbsp;' . $mechanic['MecEspecializacion'] . '</span>';
                                else :
                                    echo '<span class="text-xl"> &nbsp;&nbsp;&nbsp;&nbsp;Mecanico no encontrado.</span>';
                                endif; ?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="w-full max-w-6xl dark:bg-gray-700 mx-auto my-3 bg-white rounded-lg shadow-lg p-5">
                    <h2 class="text-center text-xl font-bold">Piezas Utilizadas</h2>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="col-span-1">
                            <p class="my-2">
                                <strong class="text-base font-bold">Codigo del Repuesto:</strong>
                                <br>
                                <span class="text-xl">
                                    &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $sparePart['RepuCodigo']; ?>
                                </span>
                            </p>
                            <p class="my-2">
                                <strong class="text-base font-bold">Descripción:</strong>
                                <br>
                                <span class="text-xl">
                                    &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $sparePart['RepuDescripcion']; ?>
                                </span>
                            </p>

                            <p class="my-2">
                                <strong class="text-base font-bold">Marca:</strong>
                                <br>
                                <span class="text-xl">
                                    &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $sparePart['RepuMarca']; ?>
                                </span>
                            </p>
                        </div>
                        <div class="col-span-1">
                            <p class="my-2">
                                <strong class="text-base font-bold">Nombre:</strong>
                                <br>
                                <span class="text-xl">
                                    &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $sparePart['RepuNombre']; ?>
                                </span>
                            </p>
                            <p class="my-2">
                                <strong class="text-base font-bold">Tipo de repuesto:</strong>
                                <br>
                                <span class="text-xl">
                                    &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $sparePart['RepuTipo']; ?>
                                </span>
                            </p>

                            <p class="my-2">
                                <strong class="text-base font-bold">Modelo:</strong>
                                <br>
                                <span class="text-xl">
                                    &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $sparePart['RepuModelo']; ?>
                                </span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="flex max-w-6xl mx-auto my-3 space-x-3">
                    <div class="w-2/5 max-w-6xl dark:bg-gray-700 mx-auto bg-white rounded-lg shadow-lg p-5">
                        <h2 class="text-center text-xl font-bold">Datos de la motocicleta</h2>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="col-span-1">
                                <p class="my-2">
                                    <strong class="text-base font-bold">Placa:</strong>
                                    <br>
                                    <span class="text-xl">
                                        &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $motorbike['MtPlaca']; ?>
                                    </span>
                                </p>
                                <p class="my-2">
                                    <strong class="text-base font-bold">Modelo:</strong>
                                    <br>
                                    <span class="text-xl">
                                        &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $motorbike['MtModelo']; ?>
                                    </span>
                                </p>
                                <p class="my-2">
                                    <strong class="text-base font-bold">Color:</strong>
                                    <br>
                                    <span class="text-xl">
                                        &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $motorbike['MtColor']; ?>
                                    </span>
                                </p>
                            </div>
                            <div class="col-span-1">
                                <p class="my-2">
                                    <strong class="text-base font-bold">ID interno:</strong>
                                    <br>
                                    <span class="text-xl">
                                        &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $motorbike['idMotocicleta']; ?>
                                    </span>
                                </p>
                                <p class="my-2">
                                    <strong class="text-base font-bold">Marca:</strong>
                                    <br>
                                    <span class="text-xl">
                                        &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $motorbike['MtMarca']; ?>
                                    </span>
                                </p>
                                <p class="my-2">
                                    <strong class="text-base font-bold">Cilindraje:</strong>
                                    <br>
                                    <span class="text-xl">
                                        &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $motorbike['MtCilindraje']; ?>
                                    </span>
                                </p>
                            </div>
                        </div>

                    </div>
                    <div class="w-3/5 max-w-6xl dark:bg-gray-700 mx-auto bg-white rounded-lg shadow-lg p-5">
                        <h2 class="text-center text-xl font-bold">Datos del Cliente</h2>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="col-span-1">
                                <p class="my-2">
                                    <strong class="text-base font-bold">Nombre completo:</strong>
                                    <br>
                                    <span class="text-xl">
                                        &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $client['CliNombre'] . ' ' . $client['CliApellido']; ?>
                                    </span>
                                </p>
                                <p class="my-2">
                                    <strong class="text-base font-bold">Telefono:</strong>
                                    <br>
                                    <span class="text-xl">
                                        &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $client['CliTelefono']; ?>
                                    </span>
                                </p>
                                <p class="my-2">
                                    <strong class="text-base font-bold">Dirección:</strong>
                                    <br>
                                    <span class="text-xl">
                                        &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $client['CliDireccion']; ?>
                                    </span>
                                </p>
                            </div>
                            <div class="col-span-1">
                                <p class="my-2">
                                    <strong class="text-base font-bold">Documento:</strong>
                                    <br>
                                    <span class="text-xl">
                                        &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $client['CliDocumento']; ?>
                                    </span>
                                </p>
                                <p class="my-2">
                                    <strong class="text-base font-bold">Telefono secundario:</strong>
                                    <br>
                                    <span class="text-xl">
                                        &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $client['CliTelefonoSecundario']; ?>
                                    </span>
                                </p>
                                <p class="my-2">
                                    <strong class="text-base font-bold">Correo:</strong>
                                    <br>
                                    <span class="text-xl">
                                        &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $client['CliCorreo']; ?>
                                    </span>
                                </p>
                            </div>
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
            <div class="flex p-1 justify-center space-x-3">
                <a class="bg-blue-500 hover:bg-blue-600 text-white font-semibold  py-2 px-4 my-3 rounded" href="Informe-Mantenimiento.php?id=<?php echo $idMaintenanceReport; ?>" target="_blank"><i class="fa-regular fa-file-pdf" style="color: #ffffff;"></i> Generar PDF</a>
                <a href="index.php" class="bg-cyan-700 hover:bg-cyan-800 text-white font-semibold py-2 px-4 my-3 rounded">
                    <i class="fa-solid fa-rotate-left" style="color: #ffffff;"></i> Volver a la pagina de informes
                </a>
            </div>

            <?php include '../shared/footer.php'; ?>
</body>

</html>