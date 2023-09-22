<!DOCTYPE html>
<html lang="es-CO">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Workshop Software</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="shortcut icon" href="../views/assets/favicon.ico" type="image/x-icon">
</head>

<body>
    <?php include 'shared/header.php'; ?>

    <div class="bg-gray-100 min-h-screen">
        <div class="container mx-auto p-6">
            <div class="mt-8">
                <h2 class="text-xl font-semibold mb-4">Navegación Rápida</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
                    <a href="../views/admin/index.php" class="text-gray-800 hover:underline">
                        <div class="bg-white rounded-lg shadow-lg p-4 hover:shadow-xl transition duration-300 ease-in-out">
                            <h3 class="text-lg font-semibold">Administradores</h3>
                        </div>
                    </a>
                    <a href="../views/client/index.php" class="text-gray-800 hover:underline">
                        <div class="bg-white rounded-lg shadow-lg p-4 hover:shadow-xl transition duration-300 ease-in-out">
                            <h3 class="text-lg font-semibold">Clientes</h3>
                        </div>
                    </a>
                    <a href="../views/logistical_assistant/index.php" class="text-gray-800 hover:underline">
                        <div class="bg-white rounded-lg shadow-lg p-4 hover:shadow-xl transition duration-300 ease-in-out">
                            <h3 class="text-lg font-semibold">Asistentes Logísticos</h3>
                        </div>
                    </a>
                    <a href="../views/maintenance_report/index.php" class="text-gray-800 hover:underline">
                        <div class="bg-white rounded-lg shadow-lg p-4 hover:shadow-xl transition duration-300 ease-in-out">
                            <h3 class="text-lg font-semibold">Informes de Mantenimiento</h3>
                        </div>
                    </a>
                    <a href="../views/mechanic/index.php" class="text-gray-800 hover:underline">
                        <div class="bg-white rounded-lg shadow-lg p-4 hover:shadow-xl transition duration-300 ease-in-out">
                            <h3 class="text-lg font-semibold">Mecánicos</h3>
                        </div>
                    </a>
                    <a href="../views/motorbike/index.php" class="text-gray-800 hover:underline">
                        <div class="bg-white rounded-lg shadow-lg p-4 hover:shadow-xl transition duration-300 ease-in-out">
                            <h3 class="text-lg font-semibold">Motocicletas</h3>
                        </div>
                    </a>
                    <a href="../views/spare_parts/index.php" class="text-gray-800 hover:underline">
                        <div class="bg-white rounded-lg shadow-lg p-4 hover:shadow-xl transition duration-300 ease-in-out">
                            <h3 class="text-lg font-semibold">Repuestos</h3>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <?php include 'shared/footer.php'; ?>
</body>

</html>