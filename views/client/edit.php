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
    include '../../controllers/ClientController.php';

    $clientController = new ClientController();

    // Verificar si se recibió el parámetro 'id' en la URL
    if (isset( $_GET['id'])) {
        $idCliente =  $_GET['id'];

        // Llama a la función para obtener la información del cliente por su ID
        $cliente = $clientController->getClientById($idCliente);

        // Verifica si se encontró el cliente
        if ($cliente != null) {
    ?>
            <div class="container mx-auto mt-10">
                <h2 class="text-2xl font-semibold mb-4">Editar Cliente</h2>
                <form action="index.php?controller=client&action=edit" method="POST">
                    <!-- Campo oculto para almacenar el idCliente -->
                    <input type="hidden" name="idCliente" value="<?php echo $cliente['idCliente']; ?>">
                    <div class="mb-4">
                        <label for="CliDocumento" class="block text-gray-700">Documento:</label>
                        <input type="text" id="CliDocumento" name="CliDocumento" class="w-full border border-gray-300 rounded p-2" value="<?php echo $cliente['CliDocumento']; ?>" required>
                    </div>
                    <div class="mb-4">
                        <label for="CliNombre" class="block text-gray-700">Nombre:</label>
                        <input type="text" id="CliNombre" name="CliNombre" class="w-full border border-gray-300 rounded p-2" value="<?php echo $cliente['CliNombre']; ?>" required>
                    </div>
                    <div class="mb-4">
                        <label for="CliApellido" class="block text-gray-700">Apellido:</label>
                        <input type="text" id="CliApellido" name="CliApellido" class="w-full border border-gray-300 rounded p-2" value="<?php echo $cliente['CliApellido']; ?>" required>
                    </div>
                    <div class="mb-4">
                        <label for="CliTelefono" class="block text-gray-700">Teléfono:</label>
                        <input type="text" id="CliTelefono" name="CliTelefono" class="w-full border border-gray-300 rounded p-2" value="<?php echo $cliente['CliTelefono']; ?>" required>
                    </div>
                    <div class="mb-4">
                        <label for="CliTelefonoSecundario" class="block text-gray-700">Teléfono Secundario:</label>
                        <input type="text" id="CliTelefonoSecundario" name="CliTelefonoSecundario" class="w-full border border-gray-300 rounded p-2" value="<?php echo $cliente['CliTelefonoSecundario']; ?>">
                    </div>
                    <div class="mb-4">
                        <label for="CliCorreo" class="block text-gray-700">Correo:</label>
                        <input type="email" id="CliCorreo" name="CliCorreo" class="w-full border border-gray-300 rounded p-2" value="<?php echo $cliente['CliCorreo']; ?>" required>
                    </div>
                    <div class="mb-4">
                        <label for="CliDireccion" class="block text-gray-700">Dirección:</label>
                        <textarea id="CliDireccion" name="CliDireccion" class="w-full border border-gray-300 rounded p-2" required><?php echo $cliente['CliDireccion']; ?></textarea>
                    </div>
                    <div class="mt-4">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">
                            Guardar Cambios
                        </button>
                    </div>
                </form>
            </div>
    <?php
        } else {
            echo "Cliente no encontrado";
        }
    } else {
        echo "ID de cliente no especificado";
    }
    include '../shared/footer.php';
    ?>
</body>

</html>