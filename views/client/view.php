<!DOCTYPE html>
<html lang="es-CO">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos del Cliente</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="views/styles/styles.css">
</head>

<body>

    <body>
        <?php
        include '../shared/header.php';
        include '../../controllers/ClientController.php';
        $clientController = new ClientController();

        // Verifica si se proporcionó un ID válido en la URL
        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $clientId = $_GET['id'];
            $client = $clientController->getClientById($clientId);

            // Verifica si se encontró el cliente
            if ($client !== null) {
                // Muestra la información del cliente
        ?>
                <h2 class="text-center text-4xl font-bold">Datos del Cliente</h2>
                <div class="container mx-auto mt-10">
                    <div class="flex-row justify-content: center">
                        <div class="w-full max-w-6xl mx-auto bg-white rounded-lg shadow-lg p-5">
                            <div class="flex-col">
                                <p class="my-2">
                                    <strong class="text-base font-bold">ID del Cliente:</strong>
                                    <br>
                                    <span class="text-xl"> &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $client['idCliente']; ?></span>
                                </p>
                                <p class="my-2">
                                    <strong class="text-base font-bold">Documento:</strong>
                                    <br>
                                    <span class="text-xl"> &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $client['CliDocumento']; ?></span>
                                </p>
                                <p class="my-2">
                                    <strong class="text-base font-bold">Nombre:</strong>
                                    <br>
                                    <span class="text-xl"> &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $client['CliNombre']; ?></span>
                                </p>
                                <p class="my-2">
                                    <strong class="text-base font-bold">Apellido:</strong>
                                    <br>
                                    <span class="text-xl"> &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $client['CliApellido']; ?></span>
                                </p>
                                <p class="my-2">
                                    <strong class="text-base font-bold">Teléfono:</strong>
                                    <br>
                                    <span class="text-xl"> &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $client['CliTelefono']; ?></span>
                                </p>
                                <p class="my-2">
                                    <strong class="text-base font-bold">Teléfono Secundario:</strong>
                                    <br>
                                    <span class="text-xl"> &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $client['CliTelefonoSecundario']; ?></span>
                                </p>
                                <p class="my-2">
                                    <strong class="text-base font-bold">Correo:</strong>
                                    <br>
                                    <span class="text-xl"> &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $client['CliCorreo']; ?></span>
                                </p>
                                <p class="my-2">
                                    <strong class="text-base font-bold">Dirección:</strong>
                                    <br>
                                    <span class="text-xl"> &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $client['CliDireccion']; ?></span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

        <?php
            } else {
                // Si el cliente no se encontró, muestra un mensaje de error
                echo "Cliente no encontrado.";
            }
        } else {
            // Si no se proporcionó un ID válido en la URL, muestra un mensaje de error
            echo "ID de cliente no válido.";
        }
        ?>
    </body>

</body>