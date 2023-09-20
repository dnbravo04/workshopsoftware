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
                <div class="container mx-auto mt-10">
                    <h2 class="text-2xl font-semibold mb-4">Datos del Cliente</h2>
                    <p><strong>ID del Cliente:</strong> <?php echo $client['idCliente']; ?></p>
                    <p><strong>Documento:</strong> <?php echo $client['CliDocumento']; ?></p>
                    <p><strong>Nombre:</strong> <?php echo $client['CliNombre']; ?></p>
                    <p><strong>Apellido:</strong> <?php echo $client['CliApellido']; ?></p>
                    <p><strong>Teléfono:</strong> <?php echo $client['CliTelefono']; ?></p>
                    <p><strong>Teléfono Secundario:</strong> <?php echo $client['CliTelefonoSecundario']; ?></p>
                    <p><strong>Correo:</strong> <?php echo $client['CliCorreo']; ?></p>
                    <p><strong>Dirección:</strong> <?php echo $client['CliDireccion']; ?></p>
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