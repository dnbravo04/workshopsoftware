<!DOCTYPE html>
<html lang="es-CO">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/styles.css">
    <link rel="shortcut icon" href="../assets/favicon.ico" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/a09d03aeb8.js" crossorigin="anonymous"></script>
    <title>Ingresar Administrador</title>
</head>

<body class="dark:text-white dark:bg-gray-800">
    <?php
    include '../shared/header.php';
    include '../../controllers/AdminController.php';
    $AdminController = new AdminController();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $AdminController->create();
    }
    ?>
    <div class="container mx-auto px-4 mt-10">
        <h2 class="text-2xl font-semibold mb-4">Ingresar Administrador</h2>

        <form action="" method="POST">
            <div class="mb-4">
                <label for="AdmDocumento" class="block text-gray-700 dark:text-white">Documento:</label>
                <input type="text" id="AdmDocumento" name="AdmDocumento" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
            </div>
            <div class="mb-4">
                <label for="AdmNombre" class="block text-gray-700 dark:text-white">Nombre:</label>
                <input type="text" id="AdmNombre" name="AdmNombre" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
            </div>
            <div class="mb-4">
                <label for="AdmApellido" class="block text-gray-700 dark:text-white">Apellido:</label>
                <input type="text" id="AdmApellido" name="AdmApellido" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
            </div>
            <div class="mb-4">
                <label for="AdmTelefono" class="block text-gray-700 dark:text-white">Teléfono:</label>
                <input type="text" id="AdmTelefono" name="AdmTelefono" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
            </div>
            <div class="mb-4">
                <label for="AdmCorreo" class="block text-gray-700 dark:text-white">Correo:</label>
                <input type="email" id="AdmCorreo" name="AdmCorreo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
            </div>
            <div class="mb-4">
                <label for="AdmUsuario" class="block text-gray-700 dark:text-white">Nombre de usuario:</label>
                <input type="text" id="AdmUsuario" name="AdmUsuario" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
            </div>
            <div class="flex p-1 justify-center space-x-3 mb-4">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">
                    <i class="fa-regular fa-floppy-disk" style="color: #ffffff;"></i> Ingresar Administrador
                </button>
                <a href="index.php" class="bg-cyan-700 hover:bg-cyan-800 text-white font-semibold py-2 px-4 rounded">
                    <i class="fa-solid fa-rotate-left" style="color: #ffffff;"></i> Volver a la pagina de administradores
                </a>
            </div>
        </form>
    </div>

    <?php include '../shared/footer.php'; ?>

</body>

</html>