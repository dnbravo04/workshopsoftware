<!DOCTYPE html>
<html lang="es-CO">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/styles.css">
    <link rel="shortcut icon" href="../assets/favicon.ico" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/a09d03aeb8.js" crossorigin="anonymous"></script>
    <title>Ingresar Motocicleta</title>
</head>

<body class="dark:text-white dark:bg-gray-800">
    <?php
    include '../shared/header.php';
    include '../../controllers/MotorbikeController.php';

    $motorbikeController = new MotorbikeController();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $result = $motorbikeController->create();
        if ($result !== null) {
            header('Location: index.php');
            exit();
        } else {
            echo "Error al ingresar la motocicleta";
        }
    }

    $clientNames = $motorbikeController->getAllClients();
    ?>

    <div class="container mx-auto px-4 mt-10">
        <h2 class="text-2xl font-semibold mb-4">Ingresar Motocicleta</h2>
        <form action="" method="POST">
            <div class="mb-4">
                <label for="MtPlaca" class="block text-gray-700 dark:text-white">Placa:</label>
                <input type="text" id="MtPlaca" name="MtPlaca" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
            </div>
            <div class="mb-4">
                <label for="MtMarca" class="block text-gray-700 dark:text-white">Marca:</label>
                <input type="text" id="MtMarca" name="MtMarca" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
            </div>
            <div class="mb-4">
                <label for="MtModelo" class="block text-gray-700 dark:text-white">Modelo:</label>
                <input type="text" id="MtModelo" name="MtModelo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
            </div>
            <div class="mb-4">
                <label for="MtCilindraje" class="block text-gray-700 dark:text-white">Cilindraje:</label>
                <input type="text" id="MtCilindraje" name="MtCilindraje" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
            </div>
            <div class="mb-4">
                <label for="MtColor" class="block text-gray-700 dark:text-white">Color:</label>
                <input type="text" id="MtColor" name="MtColor" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
            </div>
            <div class="mb-4">

                <label for="MtCliente" class="block text-gray-700 dark:text-white">Cliente:</label>
                <select name="MtCliente" id="MtCliente" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    <?php foreach ($clientNames as $clientData) : ?>
                        <?php $clientId = $clientData['idCliente']; ?>
                        <?php $fullName = $clientData['CliNombre'] . ' ' . $clientData['CliApellido']; ?>
                        <option value="<?php echo $clientId; ?>">
                            <?php echo $fullName; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="flex p-1 justify-center space-x-3 mb-4">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">
                    <i class="fa-regular fa-floppy-disk" style="color: #ffffff;"></i> Ingresar mecanico
                </button>
                <a href="index.php" class="bg-cyan-700 hover:bg-cyan-800 text-white font-semibold py-2 px-4 rounded">
                    <i class="fa-solid fa-rotate-left" style="color: #ffffff;"></i> Volver a la pagina de mecanicos
                </a>
            </div>
        </form>
    </div>

    <?php include '../shared/footer.php'; ?>
</body>

</html>