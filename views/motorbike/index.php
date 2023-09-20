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

<body>
    <?php
    include '../shared/header.php';
    include '../../controllers/MotorbikeController.php';

    $motorbikeController = new MotorbikeController();
    $motorbikes = $motorbikeController->getAllMotorbikes();
    $client = null;
    ?>

    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-semibold mb-6">Lista de Motocicletas</h1>
        <a href="create.php" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded inline-block mb-4">Añadir Motocicleta</a>
        <?php if (!empty($motorbikes) && is_array($motorbikes)) : ?>
            <table class="min-w-full bg-white rounded-lg overflow-hidden shadow-lg">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="w-1/6 text-left py-2 px-4">Placa</th>
                        <th class="w-1/6 text-left py-2 px-4">Marca</th>
                        <th class="w-1/6 text-left py-2 px-4">Modelo</th>
                        <th class="w-1/6 text-left py-2 px-4">Cilindraje</th>
                        <th class="w-1/6 text-left py-2 px-4">Color</th>
                        <th class="w-1/6 text-left py-2 px-4">Cliente</th>
                        <th class="w-1/6 text-left py-2 px-4">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($motorbikes as $motorbike) : ?>
                        <tr>
                            <td class="text-left py-2 px-4"><?php echo $motorbike['MtPlaca']; ?></td>
                            <td class="text-left py-2 px-4"><?php echo $motorbike['MtMarca']; ?></td>
                            <td class="text-left py-2 px-4"><?php echo $motorbike['MtModelo']; ?></td>
                            <td class="text-left py-2 px-4"><?php echo $motorbike['MtCilindraje']; ?></td>
                            <td class="text-left py-2 px-4"><?php echo $motorbike['MtColor']; ?></td>

                            <?php
                            $clientData = $motorbikeController->showClientByMotorbike($motorbike['idMotocicleta']);

                            if ($clientData !== null) :
                                echo '<td class="text-left py-2 px-4">' . $clientData['CliNombre'] . ' ' . $clientData['CliApellido'] . '</td>';
                            else :
                                echo '<td class="text-left py-2 px-4">Cliente no encontrado.</td>';
                            endif;
                            ?>

                            <td class="text-left py-2 px-4">
                                <a href="edit.php?id=<?php echo $motorbike['idMotocicleta']; ?>" class="text-blue-500 hover:underline">Editar</a>
                                <a href="delete.php?id=<?php echo $motorbike['idMotocicleta']; ?>" class="text-red-500 hover:underline ml-4">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>
        <?php else : ?>
            <p class="text-gray-700 text-lg">No se encontraron motocicletas.</p>
        <?php endif; ?>
    </div>

    <?php include '../shared/footer.php'; ?>
</body>

</html>