<!DOCTYPE html>
<html lang="es-CO">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Cliente</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="views/styles/styles.css">
</head>

<body>
    <?php
    include '../shared/header.php';
    include '../../controllers/LogisticalAssistantController.php';
    $LogisticalAssistantController = new LogisticalAssistantController();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $LogisticalAssistantController->create();
    }
    ?>
    <h2 class="text-2xl font-semibold mb-4">Ingresar Asistente Logistico</h2>
    <div class="container mx-auto mt-10">
        <form action="" method="POST">
            <div class="mb-4">
                <label for="ALDocumento" class="block text-gray-700">Documento:</label>
                <input type="text" id="ALDocumento" name="ALDocumento" class="w-full border border-gray-300 rounded p-2" required>
            </div>
            <div class="mb-4">
                <label for="ALNombre" class="block text-gray-700">Nombre:</label>
                <input type="text" id="ALNombre" name="ALNombre" class="w-full border border-gray-300 rounded p-2" required>
            </div>
            <div class="mb-4">
                <label for="ALApellido" class="block text-gray-700">Apellido:</label>
                <input type="text" id="ALApellido" name="ALApellido" class="w-full border border-gray-300 rounded p-2" required>
            </div>
            <div class="mb-4">
                <label for="ALTelefono" class="block text-gray-700">Teléfono:</label>
                <input type="text" id="ALTelefono" name="ALTelefono" class="w-full border border-gray-300 rounded p-2" required>
            </div>
            <div class="mb-4">
                <label for="ALCorreo" class="block text-gray-700">Correo:</label>
                <input type="email" id="ALCorreo" name="ALCorreo" class="w-full border border-gray-300 rounded p-2" required>
            </div>
            <div class="mt-4">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">
                    Ingresar Asistente logistico
                </button>
            </div>
        </form>
        <br />
    </div>

    <?php include '../shared/footer.php'; ?>

</body>

</html>