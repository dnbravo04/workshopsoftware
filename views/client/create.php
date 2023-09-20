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
    include '../../controllers/ClientController.php';
    $clientController = new ClientController();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $clientController->create();
    }
    ?>
    <div class="container mx-auto mt-10">

        <h2 class="text-2xl font-semibold mb-4">Crear Cliente</h2>


        <form action="" method="POST">
            <div class="mb-4">
                <label for="CliDocumento" class="block text-gray-700">Documento:</label>
                <input type="text" id="CliDocumento" name="CliDocumento" class="w-full border border-gray-300 rounded p-2" required>
            </div>
            <div class="mb-4">
                <label for="CliNombre" class="block text-gray-700">Nombre:</label>
                <input type="text" id="CliNombre" name="CliNombre" class="w-full border border-gray-300 rounded p-2" required>
            </div>
            <div class="mb-4">
                <label for="CliApellido" class="block text-gray-700">Apellido:</label>
                <input type="text" id="CliApellido" name="CliApellido" class="w-full border border-gray-300 rounded p-2" required>
            </div>
            <div class="mb-4">
                <label for="CliTelefono" class="block text-gray-700">Teléfono:</label>
                <input type="text" id="CliTelefono" name="CliTelefono" class="w-full border border-gray-300 rounded p-2" required>
            </div>
            <div class="mb-4">
                <label for="CliTelefonoSecundario" class="block text-gray-700">Teléfono Secundario:</label>
                <input type="text" id="CliTelefonoSecundario" name="CliTelefonoSecundario" class="w-full border border-gray-300 rounded p-2">
            </div>
            <div class="mb-4">
                <label for="CliCorreo" class="block text-gray-700">Correo:</label>
                <input type="email" id="CliCorreo" name="CliCorreo" class="w-full border border-gray-300 rounded p-2" required>
            </div>
            <div class="mb-4">
                <label for="CliDireccion" class="block text-gray-700">Dirección:</label>
                <textarea id="CliDireccion" name="CliDireccion" class="w-full border border-gray-300 rounded p-2" required></textarea>
            </div>
            <div class="mt-4">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">
                    Crear Cliente
                </button>
            </div>
        </form>
    </div>

    <?php include '../shared/footer.php'; ?>

</body>

</html>