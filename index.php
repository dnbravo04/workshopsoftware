<?php

include_once 'controllers/IndexController.php';

$indexData = new IndexController();

$totalClients = $indexData->getAllClientsOnIndex();
$totalMaintenanceReports = $indexData->getAllMaintenanceReportsOnIndex();
$totalMotorbikes = $indexData->getAllMotorbikesOnIndex();
$totalMechanics = $indexData->getAllMechanicsOnIndex();
?>

<!DOCTYPE html>
<html lang="es-CO">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/styles.css">
    <link rel="shortcut icon" href="../assets/favicon.ico" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/a09d03aeb8.js" crossorigin="anonymous"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css" rel="stylesheet" />

    <title>Workshop Software</title>
</head>

<body class="dark:text-white dark:bg-gray-800">
    <?php include 'views/shared/header.php'; ?>

    <div id="default-carousel" class="relative w-full" data-carousel="static">
        <div class="relative h-56 overflow-hidden md:h-96">
            <!-- Item 1 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="views/assets/imagen1.jpg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 object-fill" alt="...">
                <div class="absolute inset-0 bg-black opacity-50 flex items-center justify-center text-white object-none">
                    <img src="views/assets/logo.png" class="opacity-100 object-none" alt="...">
                </div>
            </div>
            <!-- Item 2 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="views/assets/imagen2.jpg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 object-fil" alt="...">
                <div class="absolute inset-0 bg-black opacity-50 flex items-center justify-center text-white object-none">
                    <h2 class="text-4xl">Un sitio donde gestionar <strong>Informes de mantenimiento</strong></h2>
                </div>
            </div>
            <!-- Item 3 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="views/assets/imagen3.webp" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 object-fil" alt="...">
                <div class="absolute inset-0 bg-black opacity-50 flex items-center justify-center text-white object-none">
                    <h2 class="text-4xl">Genere Informes <strong>del trabajo realizado en su taller</strong></h2>
                </div>
            </div>
            <!-- Item 4 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="views/assets/imagen4.jpg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 object-fil" alt="...">
                <div class="absolute inset-0 bg-black opacity-50 flex items-center justify-center text-white object-none">
                    <h2 class="text-4xl"><strong>Gestione</strong> Motocicletas, clientes, personal, etc.</h2>
                </div>
            </div>
            <!-- Item 5 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="views/assets/imagen5.jpg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 object-fil" alt="...">
                <div class="absolute inset-0 bg-black opacity-50 flex items-center justify-center text-white object-none">
                    <h2 class="text-4xl"><strong>Disfrute</strong> de una gestion de taller optimizada</h2>
                </div>
            </div>
        </div>
        <!-- Slider indicators -->
        <div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2">
            <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5" data-carousel-slide-to="4"></button>
        </div>
        <!-- Slider controls -->
        <button type="button" class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4" />
                </svg>
                <span class="sr-only">Previous</span>
            </span>
        </button>
        <button type="button" class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                </svg>
                <span class="sr-only">Next</span>
            </span>
        </button>
    </div>


    <div class="bg-gray-100 min-h-full dark:bg-gray-800">
        <div class="container mx-auto p-6">
            <div class="mt-8">
                <h2 class="text-xl font-semibold mb-4">Navegación Rápida</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
                    <a href="views/admin/index.php" class="text-gray-800 hover:underline">
                        <div class="bg-white rounded-lg shadow-lg p-4 hover:shadow-xl transition duration-300 ease-in-out dark:bg-gray-700 dark:text-gray-50">
                            <h3 class="text-lg font-semibold">Administradores</h3>
                        </div>
                    </a>
                    <a href="views/client/index.php" class="text-gray-800 hover:underline">
                        <div class="bg-white rounded-lg shadow-lg p-4 hover:shadow-xl transition duration-300 ease-in-out dark:bg-gray-700 dark:text-gray-50">
                            <h3 class="text-lg font-semibold">Clientes</h3>
                        </div>
                    </a>
                    <a href="views/logistical_assistant/index.php" class="text-gray-800 hover:underline">
                        <div class="bg-white rounded-lg shadow-lg p-4 hover:shadow-xl transition duration-300 ease-in-out dark:bg-gray-700 dark:text-gray-50">
                            <h3 class="text-lg font-semibold">Asistentes Logísticos</h3>
                        </div>
                    </a>
                    <a href="views/maintenance_report/index.php" class="text-gray-800 hover:underline">
                        <div class="bg-white rounded-lg shadow-lg p-4 hover:shadow-xl transition duration-300 ease-in-out dark:bg-gray-700 dark:text-gray-50">
                            <h3 class="text-lg font-semibold">Informes de Mantenimiento</h3>
                        </div>
                    </a>
                    <a href="views/mechanic/index.php" class="text-gray-800 hover:underline">
                        <div class="bg-white rounded-lg shadow-lg p-4 hover:shadow-xl transition duration-300 ease-in-out dark:bg-gray-700 dark:text-gray-50">
                            <h3 class="text-lg font-semibold">Mecánicos</h3>
                        </div>
                    </a>
                    <a href="views/motorbike/index.php" class="text-gray-800 hover:underline">
                        <div class="bg-white rounded-lg shadow-lg p-4 hover:shadow-xl transition duration-300 ease-in-out dark:bg-gray-700 dark:text-gray-50">
                            <h3 class="text-lg font-semibold">Motocicletas</h3>
                        </div>
                    </a>
                    <a href="views/spare_parts/index.php" class="text-gray-800 hover:underline">
                        <div class="bg-white rounded-lg shadow-lg p-4 hover:shadow-xl transition duration-300 ease-in-out dark:bg-gray-700 dark:text-gray-50">
                            <h3 class="text-lg font-semibold">Repuestos</h3>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-gray-100 min-h-full dark:bg-gray-800">
        <div class="container mx-auto p-6">
            <div class="mt-3">
                <h2 class="text-xl font-semibold mb-4">Información general</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
                    <div class="text-gray-800">
                        <div class="bg-white rounded-lg shadow-lg p-4 hover:shadow-xl transition duration-300 ease-in-out dark:bg-gray-700 dark:text-gray-50">
                            <h3 class="text-lg font-semibold">Actualmente se encuentran</h3>
                            <p class="text-center text-4xl font-bold font-mono"><?php echo $totalClients ?></p>
                            <h3 class="text-center text-lg font-semibold">Clientes registrados</h3>
                        </div>
                    </div>
                    <div class="text-gray-800">
                        <div class="bg-white rounded-lg shadow-lg p-4 hover:shadow-xl transition duration-300 ease-in-out dark:bg-gray-700 dark:text-gray-50">
                            <h3 class="text-lg font-semibold"> Tenemos</h3>
                            <p class="text-center text-4xl font-bold font-mono"><?php echo $totalMotorbikes ?></p>
                            <h3 class="text-center text-lg font-semibold">Motocicletas en el sistema</h3>
                        </div>
                    </div>
                    <div class="text-gray-800">
                        <div class="bg-white rounded-lg shadow-lg p-4 hover:shadow-xl transition duration-300 ease-in-out dark:bg-gray-700 dark:text-gray-50">
                            <h3 class="text-lg font-semibold">Registrados</h3>
                            <p class="text-center text-4xl font-bold font-mono"><?php echo $totalMechanics ?></p>
                            <h3 class="text-center text-lg font-semibold">Mecanicos</h3>
                        </div>
                    </div>
                    <div class="text-gray-800">
                        <div class="bg-white rounded-lg shadow-lg p-4 hover:shadow-xl transition duration-300 ease-in-out dark:bg-gray-700 dark:text-gray-50">
                            <h3 class="text-lg font-semibold">Han sido generados</h3>
                            <p class="text-center text-4xl font-bold font-mono"><?php echo $totalMaintenanceReports ?></p>
                            <h3 class="text-center text-lg font-semibold">Informes de mantenimiento</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include 'views/shared/footer.php'; ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
</body>

</html>