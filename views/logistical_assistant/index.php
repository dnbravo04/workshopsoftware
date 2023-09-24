<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/styles.css">
    <link rel="shortcut icon" href="../assets/favicon.ico" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/a09d03aeb8.js" crossorigin="anonymous"></script>
    <title>Asistentes logisticos</title>
</head>

<body class="dark:text-white dark:bg-gray-800">

    <?php
    include '../shared/header.php';
    include '../../controllers/LogisticalAssistantController.php';

    $logisticalAssistantController = new LogisticalAssistantController();
    $logisticalAssistants = $logisticalAssistantController->getAllLogisticalAssistants();
    ?>

    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-semibold mb-6">Lista de Asistentes Logisticos</h1>
        <a href="create.php" class="bg-indigo-800 hover:bg-indigo-900 text-white font-bold py-2 px-4 rounded inline-block mb-4"><i class="fa-solid fa-plus" style="color: #ffffff;"></i> Añadir Asistente Logistico</a>
        <a href="../index.php" class="bg-cyan-700 hover:bg-cyan-800 text-white font-semibold  py-2 px-4 my-3 rounded">
            <i class="fa-solid fa-rotate-left" style="color: #ffffff;"></i> Volver al inicio
        </a>
        <?php if (!empty($logisticalAssistants) && is_array($logisticalAssistants)) : ?>
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white dark:bg-gray-800 rounded-lg overflow-hidden shadow-lg table-auto">
                    <thead class="bg-gray-800 text-white dark:bg-gray-700">
                        <tr>
                            <th class="w-1/6 text-left py-2 px-4 hidden md:table-cell">Documento</th>
                            <th class="w-1/6 text-left py-2 px-4">Nombre</th>
                            <th class="w-1/6 text-left py-2 px-4">Apellidos</th>
                            <th class="w-1/6 text-left py-2 px-4 hidden md:table-cell">Teléfono</th>
                            <th class="w-1/6 text-left py-2 px-4 hidden md:table-cell">Correo</th>
                            <th class="w-1/6 text-left py-2 px-4">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($logisticalAssistants as $logisticalAssistant) : ?>
                            <tr>
                                <td class="dark:bg-gray-800 dark:text-white text-left py-2 px-4 hidden md:table-cell"><?php echo $logisticalAssistant['ALDocumento']; ?></td>
                                <td class="dark:bg-gray-800 dark:text-white text-left py-2 px-4"><?php echo $logisticalAssistant['ALNombre']; ?></td>
                                <td class="dark:bg-gray-800 dark:text-white text-left py-2 px-4"><?php echo $logisticalAssistant['ALApellido']; ?></td>
                                <td class="dark:bg-gray-800 dark:text-white text-left py-2 px-4 hidden md:table-cell"><?php echo $logisticalAssistant['ALTelefono']; ?></td>
                                <td class="dark:bg-gray-800 dark:text-white text-left py-2 px-4 hidden md:table-cell"><?php echo $logisticalAssistant['ALCorreo']; ?></td>
                                <td class="dark:bg-gray-800 dark:text-white text-left py-2 px-4">
                                    <a href="view.php?id=<?php echo $logisticalAssistant['idAsistLogistico']; ?>" class="bg-green-500 hover:bg-green-600 font-semibold p-1 text-white hover:underline rounded m-2  block"><i class="fa-solid fa-magnifying-glass" style="color: #ffffff;"></i> Detalles</a>
                                    <a href="edit.php?id=<?php echo $logisticalAssistant['idAsistLogistico']; ?>" class="bg-blue-500 hover:bg-blue-600 font-semibold p-1 text-white hover:underline rounded m-2 block"> <i class="fa-solid fa-pencil" style="color: #ffffff;"></i> Editar</a>
                                    <a href="delete.php?id=<?php echo $logisticalAssistant['idAsistLogistico']; ?>" class="bg-red-500 hover:bg-red-600 font-semibold p-1 text-white hover:underline rounded m-2 block"><i class="fa-solid fa-eraser" style="color: #ffffff;"></i> Eliminar</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else : ?>
            <p class="dark:text-white text-gray-700 text-lg">No se encontraron Asistentes Logisticos.</p>
        <?php endif; ?>
    </div>
    <div class="flex p-1 justify-center">
        <a href="../index.php" class="bg-cyan-700 hover:bg-cyan-800 text-white font-semibold  py-2 px-4 my-3 rounded">
            <i class="fa-solid fa-rotate-left" style="color: #ffffff;"></i> Volver al inicio
        </a>
    </div>
    <?php include '../shared/footer.php'; ?>
</body>

</html>