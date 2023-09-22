<!DOCTYPE html>
<html lang="es-CO">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Mecánico</title>
    <link rel="stylesheet" href="../styles/styles.css">
    <link rel="shortcut icon" href="../assets/favicon.ico" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <?php
    include '../shared/header.php';
    include '../../controllers/AdminController.php';

    $adminController = new AdminController();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $idAdmin = $_GET['id'];
        $adminController->edit($idAdmin);
    }
    if (isset($_GET['id'])) {
        $idAdmin =  $_GET['id'];

        $admin = $adminController->getAdminById($idAdmin);

        if ($admin != null) {
    ?>
            <div class="container mx-auto mt-10">
                <h2 class="text-2xl font-semibold mb-4">Editar Administrador</h2>
                <form action="" method="POST">

                    <input type="hidden" name="idAdministrador" value="<?php echo $admin['idAdministrador']; ?>">
                    <div class="mb-4">
                        <label for="AdmDocumento" class="block text-gray-700">Documento:</label>
                        <input type="text" id="AdmDocumento" name="AdmDocumento" class="w-full border border-gray-300 rounded p-2" value="<?php echo $admin['AdmDocumento']; ?>" required>
                    </div>
                    <div class="mb-4">
                        <label for="AdmNombre" class="block text-gray-700">Nombre:</label>
                        <input type="text" id="AdmNombre" name="AdmNombre" class="w-full border border-gray-300 rounded p-2" value="<?php echo $admin['AdmNombre']; ?>" required>
                    </div>
                    <div class="mb-4">
                        <label for="AdmApellido" class="block text-gray-700">Apellido:</label>
                        <input type="text" id="AdmApellido" name="AdmApellido" class="w-full border border-gray-300 rounded p-2" value="<?php echo $admin['AdmApellido']; ?>" required>
                    </div>
                    <div class="mb-4">
                        <label for="AdmTelefono" class="block text-gray-700">Teléfono:</label>
                        <input type="text" id="AdmTelefono" name="AdmTelefono" class="w-full border border-gray-300 rounded p-2" value="<?php echo $admin['AdmTelefono']; ?>" required>
                    </div>
                    <div class="mb-4">
                        <label for="AdmCorreo" class="block text-gray-700">Correo:</label>
                        <input type="email" id="AdmCorreo" name="AdmCorreo" class="w-full border border-gray-300 rounded p-2" value="<?php echo $admin['AdmCorreo']; ?>" required>
                    </div>
                    <div class="mb-4">
                        <label for="AdmUsuario" class="block text-gray-700">Nombre de Usuario:</label>
                        <input type="text" id="AdmUsuario" name="AdmUsuario" class="w-full border border-gray-300 rounded p-2" value="<?php echo $admin['AdmUsuario']; ?>" required>
                    </div>
                    <div class="mb-4">
                        <label for="AdmContraseña" class="block text-gray-700">Nueva Contraseña:</label>
                        <input type="password" id="AdmContraseña" name="AdmContraseña" class="w-full border border-gray-300 rounded p-2" placeholder="Ingrese nueva contraseña si desea cambiarla">
                    </div>
                    <div class="mt-4">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">
                            Guardar Cambios
                        </button>
                    </div>
                </form>
            </div>
    <?php
        } else {
            echo "Administrador no encontrado";
        }
    } else {
        echo "ID de administrador no especificado";
    }
    include '../shared/footer.php';
    ?>
</body>

</html>