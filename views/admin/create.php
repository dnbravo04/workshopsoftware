<!DOCTYPE html>
<html lang="es-CO">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingresar Administrador</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="views/styles/styles.css">
</head>

<body>
    <?php
    include '../shared/header.php';
    include '../../controllers/AdminController.php';
    $AdminController = new AdminController();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $AdminController->create();
    }
    ?>
    <div class="container mx-auto mt-10">
        <h2 class="text-2xl font-semibold mb-4">Ingresar Administrador</h2>

        <form action="" method="POST">
            <div class="mb-4">
                <label for="AdmDocumento" class="block text-gray-700">Documento:</label>
                <input type="text" id="AdmDocumento" name="AdmDocumento" class="w-full border border-gray-300 rounded p-2" required>
            </div>
            <div class="mb-4">
                <label for="AdmNombre" class="block text-gray-700">Nombre:</label>
                <input type="text" id="AdmNombre" name="AdmNombre" class="w-full border border-gray-300 rounded p-2" required>
            </div>
            <div class="mb-4">
                <label for="AdmApellido" class="block text-gray-700">Apellido:</label>
                <input type="text" id="AdmApellido" name="AdmApellido" class="w-full border border-gray-300 rounded p-2" required>
            </div>
            <div class="mb-4">
                <label for="AdmTelefono" class="block text-gray-700">Teléfono:</label>
                <input type="text" id="AdmTelefono" name="AdmTelefono" class="w-full border border-gray-300 rounded p-2" required>
            </div>
            <div class="mb-4">
                <label for="AdmCorreo" class="block text-gray-700">Correo:</label>
                <input type="email" id="AdmCorreo" name="AdmCorreo" class="w-full border border-gray-300 rounded p-2" required>
            </div>
            <div class="mb-4">
                <label for="AdmUsuario" class="block text-gray-700">Nombre de usuario:</label>
                <input type="text" id="AdmUsuario" name="AdmUsuario" class="w-full border border-gray-300 rounded p-2" required>
            </div>
            <div class="mb-4">
                <label for="AdmContraseña" class="block text-gray-700">Contraseña:</label>
                <input type="password" id="AdmContraseña" name="AdmContraseña" class="w-full border border-gray-300 rounded p-2" required>
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