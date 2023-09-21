<!DOCTYPE html>
<html lang="es-CO">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Asistente logistigo</title>
    <link rel="stylesheet" href="../styles/styles.css">
    <link rel="shortcut icon" href="../assets/favicon.ico" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <?php
    include '../shared/header.php';
    include '../../controllers/LogisticalAssistantController.php';
    $LogisticalAssistantController = new LogisticalAssistantController();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $idAsistenteLogistico = $_GET['id'];
        $LogisticalAssistantController->edit($idAsistenteLogistico);
        
    }
    if (isset($_GET['id'])) {
        $idAsistenteLogistico =  $_GET['id'];

        $Asistentelogistico = $LogisticalAssistantController->getLogisticalAssistantById($idAsistenteLogistico);

        if ($Asistentelogistico != null) {
    ?>
            <div class="container mx-auto mt-10">
                <h2 class="text-2xl font-semibold mb-4">Editar Asistente logistigo</h2>
                <form action="" method="POST">

                    <input type="hidden" name="idAsistenteLogistico" value="<?php echo $Asistentelogistico['idAsistLogistico']; ?>">
                    <div class="mb-4">
                        <label for="ALDocumento" class="block text-gray-700">Documento:</label>
                        <input type="text" id="ALDocumento" name="ALDocumento" class="w-full border border-gray-300 rounded p-2" value="<?php echo $Asistentelogistico['ALDocumento']; ?>" required>
                    </div>
                    <div class="mb-4">
                        <label for="ALNombre" class="block text-gray-700">Nombre:</label>
                        <input type="text" id="ALNombre" name="ALNombre" class="w-full border border-gray-300 rounded p-2" value="<?php echo $Asistentelogistico['ALNombre']; ?>" required>
                    </div>
                    <div class="mb-4">
                        <label for="ALApellido" class="block text-gray-700">Apellido:</label>
                        <input type="text" id="ALApellido" name="ALApellido" class="w-full border border-gray-300 rounded p-2" value="<?php echo $Asistentelogistico['ALApellido']; ?>" required>
                    </div>
                    <div class="mb-4">
                        <label for="ALTelefono" class="block text-gray-700">Teléfono:</label>
                        <input type="text" id="ALTelefono" name="ALTelefono" class="w-full border border-gray-300 rounded p-2" value="<?php echo $Asistentelogistico['ALTelefono']; ?>" required>
                    </div>
                    <div class="mb-4">
                        <label for="ALCorreo" class="block text-gray-700">Correo:</label>
                        <input type="email" id="ALCorreo" name="ALCorreo" class="w-full border border-gray-300 rounded p-2" value="<?php echo $Asistentelogistico['ALCorreo']; ?>" required>
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">
                            Guardar Cambios
                        </button>
                    </div>
                </form>
                <br>
            </div>
    <?php
        } else {
            echo "Asistente logistigo no encontrado";
        }
    } else {
        echo "ID de Asistente logistigo no especificado";
        echo "<br>";
    }
    include '../shared/footer.php';
    ?>
</body>

</html>
