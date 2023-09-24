<!DOCTYPE html>
<html lang="es-CO">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/styles.css">
    <link rel="shortcut icon" href="../assets/favicon.ico" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/a09d03aeb8.js" crossorigin="anonymous"></script>
    <title>Ingresar Repuesto</title>
</head>

<body class="dark:text-white dark:bg-gray-800">
    <?php
    include '../shared/header.php';
    include '../../controllers/SparePartsController.php';
    $sparePartsController = new SparePartsController();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $result = $sparePartsController->create();
        if ($result !== null) {
            header('Location: index,php');
            exit();
        } else {
            echo 'Error al ingresar el repuesto';
        }
    }
    ?>
    <div class="container mx-auto px-4 mt-10">
        <h2 class="text-2xl font-semibold mb-4">Insertar Repuesto</h2>
        <form action="" method="POST">
            <div class="mb-4">
                <label for="RepuCodigo" class="block text-gray-700 dark:text-white">Codigo:</label>
                <input type="text" id="RepuCodigo" name="RepuCodigo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
            </div>
            <div class="mb-4">
                <label for="RepuNombre" class="block text-gray-700 dark:text-white">Nombre:</label>
                <input type="text" id="RepuNombre" name="RepuNombre" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
            </div>
            <div class="mb-4">
                <label for="RepuDescripcion" class="block text-gray-700 dark:text-white">Descripción:</label>
                <input type="text" id="RepuDescripcion" name="RepuDescripcion" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
            </div>
            <div class="mb-4">
                <label for="RepuTipo" class="block text-gray-700 dark:text-white">Tipo de Repuesto:</label>
                <input type="text" id="RepuTipo" name="RepuTipo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
            </div>
            <div class="mb-4">
                <label for="RepuModelo" class="block text-gray-700 dark:text-white">Modelo:</label>
                <input type="text" id="RepuModelo" name="RepuModelo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
            </div>
            <div class="mb-4">
                <label for="RepuMarca" class="block text-gray-700 dark:text-white">Marca:</label>
                <input type="text" id="RepuMarca" name="RepuMarca" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div class="flex p-1 justify-center space-x-3 mb-4">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">
                    <i class="fa-regular fa-floppy-disk" style="color: #ffffff;"></i> Ingresar repuesto
                </button>
                <a href="index.php" class="bg-cyan-700 hover:bg-cyan-800 text-white font-semibold py-2 px-4 rounded">
                    <i class="fa-solid fa-rotate-left" style="color: #ffffff;"></i> Volver a la pagina de repuestos
                </a>
            </div>
        </form>
    </div>
    <br>
    <?php include '../shared/footer.php'; ?>

</body>

</html>