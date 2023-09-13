<!DOCTYPE html>
<html lang="es-CO">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Workshop Software</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="views/styles/styles.css">
    <link rel="shortcut icon" href="views/assets/favicon.ico" type="image/x-icon">
</head>

<body>
    <?php include 'views/shared/header.php'; ?>

    <div class="bg-gray-100 min-h-screen">
        <div class="container mx-auto p-6">
            <h1 class="text-3xl font-semibold mb-6">Bienvenido a Workshop Software</h1>
            <p class="text-gray-700 text-lg">Aquí puedes administrar tu taller de motocicletas y generar informes de mantenimiento de manera eficiente.</p>
            <div class="mt-8">
                <h2 class="text-xl font-semibold mb-4">Navegación Rápida</h2>
                <ul class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    <a href="controllers/AdminController.php" class="text-gray-800 hover:underline">
                        <li class="bg-white rounded-lg shadow-lg p-4 hover:shadow-xl transition duration-300 ease-in-out">
                            Administradores
                        </li>
                    </a>
                    <a href="controllers/ClientController.php" class="text-gray-800 hover:underline">
                        <li class="bg-white rounded-lg shadow-lg p-4 hover:shadow-xl transition duration-300 ease-in-out">
                            Clientes
                        </li>
                    </a>
                    <a href="controllers/LogisticalAsistantController.php" class="text-gray-800 hover:underline">
                    <li class="bg-white rounded-lg shadow-lg p-4 hover:shadow-xl transition duration-300 ease-in-out">
                            Asistentes Logísticos
                        </li>
                    </a>
                    <a href="controllers/MaintenanceReportController.php" class="text-gray-800 hover:underline">
                    <li class="bg-white rounded-lg shadow-lg p-4 hover:shadow-xl transition duration-300 ease-in-out">
                            Informes de Mantenimiento
                        </li>
                    </a>
                    <a href="controllers/MechanicController.php" class="text-gray-800 hover:underline">
                    <li class="bg-white rounded-lg shadow-lg p-4 hover:shadow-xl transition duration-300 ease-in-out">
                            Mecánicos
                        </li>
                    </a>
                    <a href="controllers/MotorbikeController.php" class="text-gray-800 hover:underline">
                    <li class="bg-white rounded-lg shadow-lg p-4 hover:shadow-xl transition duration-300 ease-in-out">
                            Motocicletas
                        </li>
                    </a>
                    <a href="controllers/SparePartController.php" class="text-gray-800 hover:underline">
                    <li class="bg-white rounded-lg shadow-lg p-4 hover:shadow-xl transition duration-300 ease-in-out">
                            Repuestos
                        </li>
                    </a>
                </ul>
            </div>
        </div>
    </div>

    <?php include 'views/shared/footer.php'; ?>
</body>

</html>