<!DOCTYPE html>
<html lang="es-CO">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos del Repuesto</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="views/styles/styles.css">
</head>

<body>

    <body>
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
                <h2 class="text-center text-4xl font-bold">Datos del Cliente</h2>
                <div class="container mx-auto mt-10">
                    <div class="flex-row justify-content: center">
                        <div class="w-full max-w-6xl mx-auto bg-white rounded-lg shadow-lg p-5">
                            <div class="flex-col">
                                <p class="my-2">
                                    <strong class="text-base font-bold">ID del Repuesto:</strong>
                                    <br>
                                    <span class="text-xl"> &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $sparePart['idRepuesto']; ?></span>
                                </p>
                                <p class="my-2">
                                    <strong class="text-base font-bold">Codigo:</strong>
                                    <br>
                                    <span class="text-xl"> &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $sparePart['RepuCodigo']; ?></span>
                                </p>
                                <p class="my-2">
                                    <strong class="text-base font-bold">Nombre:</strong>
                                    <br>
                                    <span class="text-xl"> &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $sparePart['RepuNombre']; ?></span>
                                </p>
                                <p class="my-2">
                                    <strong class="text-base font-bold">Descripción:</strong>
                                    <br>
                                    <span class="text-xl"> &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $sparePart['RepuDescripcion']; ?></span>
                                </p>
                                <p class="my-2">
                                    <strong class="text-base font-bold">Tipo de Repuesto:</strong>
                                    <br>
                                    <span class="text-xl"> &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $sparePart['RepuTipo']; ?></span>
                                </p>
                                <p class="my-2">
                                    <strong class="text-base font-bold">Marca:</strong>
                                    <br>
                                    <span class="text-xl"> &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $sparePart['RepuMarca']; ?></span>
                                </p>
                                <p class="my-2">
                                    <strong class="text-base font-bold">Correo:</strong>
                                    <br>
                                    <span class="text-xl"> &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $sparePart['RepuModelo']; ?></span>
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
    </body>

</body>