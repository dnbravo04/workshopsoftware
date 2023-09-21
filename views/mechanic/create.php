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
    include '../../controllers/MechanicController.php';
    $MechanicController = new MechanicController();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $MechanicController->create();
    }
    ?>
    <div class="container mx-auto mt-10">
anicController
        <h2 class="text-2xl font-semibold mb-4">Ingresar Mecanico</h2>


        <form action="" method="POST">
            <div class="mb-4">
                <label for="MecDocumento" class="block text-gray-700">Documento:</label>
                <input type="text" id="MecDocumento" name="MecDocumento" class="w-full border border-gray-300 rounded p-2" required>
            </div>
            <div class="mb-4">
                <label for="MecNombre" class="block text-gray-700">Nombre:</label>
                <input type="text" id="MecNombre" name="MecNombre" class="w-full border border-gray-300 rounded p-2" required>
            </div>
            <div class="mb-4">
                <label for="MecApellido" class="block text-gray-700">Apellido:</label>
                <input type="text" id="MecApellido" name="MecApellido" class="w-full border border-gray-300 rounded p-2" required>
            </div>
            <div class="mb-4">
                <label for="MecTelefono" class="block text-gray-700">Teléfono:</label>
                <input type="text" id="MecTelefono" name="MecTelefono" class="w-full border border-gray-300 rounded p-2" required>
            </div>
            <div class="mb-4">
                <label for="MecCorreo" class="block text-gray-700">Correo:</label>
                <input type="email" id="MecCorreo" name="MecCorreo" class="w-full border border-gray-300 rounded p-2" required>
            </div>
            <div class="mb-4">
                <label for="MecEspecializacion" class="block text-gray-700">Dirección:</label>
                <textarea id="MecEspecializacion" name="MecEspecializacion" class="w-full border border-gray-300 rounded p-2" required></textarea>
            </div>
            <div class="mt-4">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">
                    Ingresar Mecanico
                </button>
            </div>
        </form>
    </div>

    <?php include '../shared/footer.php'; ?>

</body>

</html>