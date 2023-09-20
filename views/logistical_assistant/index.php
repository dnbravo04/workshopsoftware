<!DOCTYPE html>
<html lang="es-CO">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
    <link rel="stylesheet" href="../styles/styles.css">
    <link rel="shortcut icon" href="../assets/favicon.ico" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<?php
include '../shared/header.php';
include '../../controllers/LogisticalAssistantController.php';

$logisticalAssistantController = new LogisticalAssistantController();
$logisticalAssistants = $logisticalAssistantController->getAllLogisticalAssistants();
?>

<div class="container mx-auto p-6">
    <h1 class="text-3xl font-semibold mb-6">Lista de Clientes</h1>
    <a href="create.php" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded inline-block mb-4">Añadir Cliente</a>
    <?php if (!empty($logisticalAssistants) && is_array($logisticalAssistants)) : ?>
        <table class="min-w-full bg-white rounded-lg overflow-hidden shadow-lg">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="w-1/6 text-left py-2 px-4">Documento</th>
                    <th class="w-1/6 text-left py-2 px-4">Nombre</th>
                    <th class="w-1/6 text-left py-2 px-4">Apellidos</th>
                    <th class="w-1/6 text-left py-2 px-4">Teléfono</th>
                    <th class="w-1/6 text-left py-2 px-4">Correo</th>
                    <th class="w-1/6 text-left py-2 px-4">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($logisticalAssistants as $logisticalAssistant) : ?>
                    <tr>
                        <td class="text-left py-2 px-4"><?php echo $logisticalAssistant['ALDocumento']; ?></td>
                        <td class="text-left py-2 px-4"><?php echo $logisticalAssistant['ALNombre']; ?></td>
                        <td class="text-left py-2 px-4"><?php echo $logisticalAssistant['ALApellido']; ?></td>
                        <td class="text-left py-2 px-4"><?php echo $logisticalAssistant['ALTelefono']; ?></td>
                        <td class="text-left py-2 px-4"><?php echo $logisticalAssistant['ALCorreo']; ?></td>
                        <td class="text-left py-2 px-4">
                            <a href="edit.php?id=<?php echo $client['idAsistLogistico']; ?>" class="text-blue-500 hover:underline">Editar</a>
                            <a href="delete.php?id=<?php echo $client['idAsistLogistico']; ?>" class="text-red-500 hover:underline ml-4">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else : ?>
        <p class="text-gray-700 text-lg">No se encontraron Asistentes Logisticos.</p>
    <?php endif; ?>
</div>

<?php include '../shared/footer.php'; ?>
</body>

</html>
</div>