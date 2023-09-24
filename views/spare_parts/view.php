<!DOCTYPE html>
<html lang="es-CO">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/styles.css">
    <link rel="shortcut icon" href="../assets/favicon.ico" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/a09d03aeb8.js" crossorigin="anonymous"></script>
    <title>Datos del Repuesto</title>
</head>


<body class="dark:text-white dark:bg-gray-800">
    <?php
    include '../shared/header.php';
    include '../../controllers/SparePartsController.php';
    $SparePartsController = new SparePartsController();

    // Verifica si se proporcionó un ID válido en la URL
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $SparePartId = $_GET['id'];
        $sparePart = $SparePartsController->getSparePartsById($SparePartId);

        // Verifica si se encontró el cliente
        if ($sparePart !== null) {
            // Muestra la información del cliente
    ?>
            <div class="container mx-auto mt-10">
                <div class="flex-row justify-content: center">
                    <div class="w-full max-w-6xl dark:bg-gray-700 mx-auto bg-white rounded-lg shadow-lg p-5">
                        <div class="flex-col">
                            <p class="my-2">
                                <strong class="text-4xl font-bold"><?php echo $sparePart['RepuNombre'] ?></strong>
                                <br>
                                <span class="text-xl pt-2">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $sparePart['RepuCodigo'] ?></span>
                            </p>
                        </div>
                    </div>
                    <div class="w-full max-w-6xl mx-auto my-3 dark:bg-gray-700 bg-white rounded-lg shadow-lg p-5">
                        <div class="grid grid-cols-2 gap-4">
                            <div class="col-span-1">

                                <div>
                                    <p class="my-2">
                                        <strong class="text-base font-bold">Id interno del repuesto:</strong>
                                        <br>
                                        <span class="text-xl">&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $sparePart['idRepuesto']; ?></span>
                                    </p>
                                </div>
                                <div>
                                    <p class="my-2">
                                        <strong class="text-base font-bold">Nombre:</strong>
                                        <br>
                                        <span class="text-xl">&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $sparePart['RepuNombre']; ?></span>
                                    </p>
                                </div>
                                <div>
                                    <p class="my-2">
                                        <strong class="text-base font-bold">Marca:</strong>
                                        <br>
                                        <span class="text-xl">&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $sparePart['RepuMarca']; ?></span>
                                    </p>
                                </div>
                            </div>
                            <div class="col-span-1">
                                <p class="my-2">
                                    <strong class="text-base font-bold">Codigo:</strong>
                                    <br>
                                    <span class="text-xl">&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $sparePart['RepuCodigo']; ?></span>
                                </p>
                                <p class="my-2">
                                    <strong class="text-base font-bold">Tipo:</strong>
                                    <br>
                                    <span class="text-xl">&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $sparePart['RepuTipo']; ?></span>
                                </p>
                                <p class="my-2">
                                    <strong class="text-base font-bold">Modelo:</strong>
                                    <br>
                                    <span class="text-xl">&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $sparePart['RepuModelo']; ?></span>
                                </p>
                            </div>
                        </div>
                        <p class="my-2">
                            <strong class="text-base font-bold">Descripción:</strong>
                            <br>
                            <span class="text-xl">&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $sparePart['RepuDescripcion']; ?></span>
                        </p>
                    </div>
                </div>
            </div>
            </div>

    <?php
        } else {
            echo "Repuesto no encontrado.";
        }
    } else {
        echo "ID de repuesto no válido.";
    }
    ?>
    <div class="flex p-1 justify-center space-x-3">
        <a href="index.php" class="bg-cyan-700 hover:bg-cyan-800 text-white font-semibold py-2 px-4 my-3 rounded">
            <i class="fa-solid fa-rotate-left" style="color: #ffffff;"></i> Volver a la pagina de Repuestos
        </a>
    </div>

    <?php include '../shared/footer.php'; ?>
</body>

</html>