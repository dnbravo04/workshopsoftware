<!DOCTYPE html>
<html lang="es-CO">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingresar Repuesto</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="views/styles/styles.css">
</head>

<body>
    <?php
    include '../shared/header.php';
    include '../../controllers/SparePartsController.php';
    $sparePartsController = new SparePartsController();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $sparePartsController->create();
    }
    ?>
    <div class="container mx-auto mt-10">

        <h2 class="text-2xl font-semibold mb-4">Insertar Repuesto</h2>


        <form action="" method="POST">
            <div class="mb-4">
                <label for="RepuCodigo" class="block text-gray-700">Codigo:</label>
                <input type="text" id="RepuCodigo" name="RepuCodigo" class="w-full border border-gray-300 rounded p-2" required>
            </div>
            <div class="mb-4">
                <label for="RepuNombre" class="block text-gray-700">Nombre:</label>
                <input type="text" id="RepuNombre" name="RepuNombre" class="w-full border border-gray-300 rounded p-2" required>
            </div>
            <div class="mb-4">
                <label for="RepuDescripcion" class="block text-gray-700">Descripción:</label>
                <input type="text" id="RepuDescripcion" name="RepuDescripcion" class="w-full border border-gray-300 rounded p-2" required>
            </div>
            <div class="mb-4">
                <label for="RepuTipo" class="block text-gray-700">Tipo de Repuesto:</label>
                <input type="text" id="RepuTipo" name="RepuTipo" class="w-full border border-gray-300 rounded p-2" required>
            </div>
            <div class="mb-4">
                <label for="RepuModelo" class="block text-gray-700">Modelo:</label>
                <input type="text" id="RepuModelo" name="RepuModelo" class="w-full border border-gray-300 rounded p-2" required>
            </div>
            <div class="mb-4">
                <label for="RepuMarca" class="block text-gray-700">Marca:</label>
                <input type="text" id="RepuMarca" name="RepuMarca" class="w-full border border-gray-300 rounded p-2">
            </div>

            <div class="mt-4">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">
                    Insertar Repuesto
                </button>
            </div>
        </form>
    </div>
    <br>
    <?php include '../shared/footer.php'; ?>

</body>

</html>