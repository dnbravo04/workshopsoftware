<!DOCTYPE html>
<html lang="es-CO">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cliente</title>
    <link rel="stylesheet" href="../styles/styles.css">
    <link rel="shortcut icon" href="../assets/favicon.ico" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <?php
    include '../shared/header.php';
    include '../../controllers/SparePartsController.php';
    $sparePartsController = new SparePartsController();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $idRepuesto = $_GET['id'];
        $sparePartsController->edit($idRepuesto);
    }

    if (isset($_GET['id'])) {
        $idRepuesto =  $_GET['id'];
        $repuesto = $sparePartsController->getSparePartsById($idRepuesto);

        if ($repuesto != null) {
    ?>
            <div class="container mx-auto mt-10">
                <h2 class="text-2xl font-semibold mb-4">Editar Información del Repuesto</h2>
                <form action="" method="POST">

                    <input type="hidden" name="idRepuesto" value="<?php echo $repuesto['idRepuesto']; ?>">
                    <div class="mb-4">
                        <label for="RepuCodigo" class="block text-gray-700">Codigo:</label>
                        <input type="text" id="RepuCodigo" name="RepuCodigo" class="w-full border border-gray-300 rounded p-2" value="<?php echo $repuesto['RepuCodigo']; ?>" required>
                    </div>
                    <div class="mb-4">
                        <label for="RepuNombre" class="block text-gray-700">Nombre:</label>
                        <input type="text" id="RepuNombre" name="RepuNombre" class="w-full border border-gray-300 rounded p-2" value="<?php echo $repuesto['RepuNombre']; ?>" required>
                    </div>
                    <div class="mb-4">
                        <label for="RepuDescripcion" class="block text-gray-700">Descripción:</label>
                        <input type="text" id="RepuDescripcion" name="RepuDescripcion" class="w-full border border-gray-300 rounded p-2" value="<?php echo $repuesto['RepuDescripcion']; ?>" required>
                    </div>
                    <div class="mb-4">
                        <label for="RepuTipo" class="block text-gray-700">Tipo de Repuesto:</label>
                        <input type="text" id="RepuTipo" name="RepuTipo" class="w-full border border-gray-300 rounded p-2" value="<?php echo $repuesto['RepuTipo']; ?>" required>
                    </div>
                    <div class="mb-4">
                        <label for="RepuMarca" class="block text-gray-700">Marca:</label>
                        <input type="text" id="RepuMarca" name="RepuMarca" class="w-full border border-gray-300 rounded p-2" value="<?php echo $repuesto['RepuMarca']; ?>" required>
                    </div>
                    <div class="mb-4">
                        <label for="RepuModelo" class="block text-gray-700">Modelo:</label>
                        <input type="text" id="RepuModelo" name="RepuModelo" class="w-full border border-gray-300 rounded p-2" value="<?php echo $repuesto['RepuModelo']; ?>" required>
                    </div>
                    <div class="mt-4">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">
                            Guardar Cambios
                        </button>
                    </div>
                </form>
            </div>
            <br>
    <?php
        } else {
            echo "Repuesto no encontrado";
        }
    } else {
        echo "ID de repuesto no especificado";
    }
    include '../shared/footer.php';
    ?>
</body>

</html>