<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administradores</title>
    <link rel="stylesheet" href="../styles/styles.css">
    <link rel="shortcut icon" href="../assets/favicon.ico" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <?php
    include '../shared/header.php';
    include '../../controllers/AdminController.php';
    $adminController = new AdminController();
    $admins = $adminController->getAllAdmins();
    ?>
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-semibold mb-6">Lista de Administradores</h1>
        <a href="create.php" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded inline-block mb-4">Añadir Administrador</a>
        <?php if (!empty($admins) && is_array($admins)) : ?>
            <table class="min-w-full bg-white rounded-lg overflow-hidden shadow-lg">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="w-1/6 text-left py-2 px-4">Documento</th>
                        <th class="w-1/6 text-left py-2 px-4">Nombre</th>
                        <th class="w-1/6 text-left py-2 px-4">Apellidos</th>
                        <th class="w-1/6 text-left py-2 px-4">Telefono</th>
                        <th class="w-1/6 text-left py-2 px-4">Correo</th>
                        <th class="w-1/6 text-left py-2 px-4">Usuario</th>
                        <th class="w-1/6 text-left py-2 px-4">Contraseña</th>
                        <th class="w-1/6 text-left py-2 px-4">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($admins as $admin): ?>
                    <tr>
                        <td class="text-left py-2 py-4"><?php echo $admin['AdmDocumento'] ?></td>
                        <td class="text-left py-2 py-4"><?php echo $admin['AdmNombre'] ?></td>
                        <td class="text-left py-2 py-4"><?php echo $admin['AdmApellido'] ?></td>
                        <td class="text-left py-2 py-4"><?php echo $admin['AdmTelefono'] ?></td>
                        <td class="text-left py-2 py-4"><?php echo $admin['AdmCorreo'] ?></td>
                        <td class="text-left py-2 py-4"><?php echo $admin['AdmUsuario'] ?></td>
                        <td class="text-left py-2 py-4"><?php echo $admin['AdmContraseña'] ?></td>
                        <td class="text-left py-2 py-4">
                            <a href="edit.php?id=<?php echo $admin['idAdministrador']; ?>" class="text-blue-500 hover:underline">Editar</a>
                            <a href="delete.php?id=<?php echo $admin['idAdministrador']; ?>" class="text-red-500 hover:underline ml-4">Eliminar</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else : ?>
            <p class="text-gray-700 text-lg">No se encontraron administradores.</p>
        <?php endif; ?>
    </div>

</body>

</html>