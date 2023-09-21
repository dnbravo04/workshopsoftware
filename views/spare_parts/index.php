<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/styles.css">
    <link rel="shortcut icon" href="../assets/favicon.ico" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Repuestos</title>
</head>

<body>
    <?php
    include '../shared/header.php';
    include '../../controllers/SparePartsController.php';
    $sparePartsController = new SparePartsController();
    $spareParts = $sparePartsController->getAllSpareParts();
    if (!empty($spareParts) && is_array($spareParts)) : ?>
        <div class="container mx-auto p-6">
            <h1 class="text-3xl font-semibold mb-6">Lista de Mecanicos</h1>
            <a href="create.php" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded inline-block mb-4">Añadir Mecanico</a>
            <table class="min-w-full bg-white rounded-lg overflow-hidden shadow-lg">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="w-1/6 text-left py-2 px-4">Codigo</th>
                        <th class="w-1/6 text-left py-2 px-4">Nombre</th>
                        <th class="w-1/6 text-left py-2 px-4">Tipo</th>
                        <th class="w-1/6 text-left py-2 px-4">Marca</th>
                        <th class="w-1/6 text-left py-2 px-4">Modelo</th>
                        <th class="w-1/6 text-left py-2 px-4">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($spareParts as $sparePart) : ?>
                        <tr>
                            <td class="text-left py-2 px-4"><?php echo $sparePart['RepuCodigo'] ?></td>
                            <td class="text-left py-2 px-4"><?php echo $sparePart['RepuNombre'] ?></td>
                            <td class="text-left py-2 px-4"><?php echo $sparePart['RepuTipo'] ?></td>
                            <td class="text-left py-2 px-4"><?php echo $sparePart['RepuMarca'] ?></td>
                            <td class="text-left py-2 px-4"><?php echo $sparePart['RepuModelo'] ?></td>
                            <td class="text-left py-2 px-4">
                                <a href="edit.php?id=<?php echo $sparePart['idRepuesto'] ?>" class="text-blue-500 hover:underline">Editar</a>
                                <a href="delete.php?id=<?php echo $sparePart['idRepuesto'] ?>" class="text-red-500 hover:underline ml-4">Eliminar</a>
                                <a href="view.php?id=<?php echo $sparePart['idRepuesto'] ?>" class="text-green-500 hover:underline ml-4">Detalles</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else : ?>
            <p class="text-gray-700 text-lg">No se encontraron repuestos mecanicos.</p>
        <?php endif; ?>
        </div>
        <?php include '../shared/footer.php'; ?>
</body>

</html>