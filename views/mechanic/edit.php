<!DOCTYPE html>
<html lang="es-CO">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Mecánico</title>
    <link rel="stylesheet" href="../styles/styles.css">
    <link rel="shortcut icon" href="../assets/favicon.ico" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <?php
    include '../shared/header.php';
    include '../../controllers/MechanicController.php';

    $mechanicController = new MechanicController();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $idMecanico = $_GET['id'];
        $mechanicController->edit($idMecanico);
    }
    if (isset($_GET['id'])) {
        $idMecanico =  $_GET['id'];

        $mecanico = $mechanicController->getMechanicById($idMecanico);

        if ($mecanico != null) {
    ?>
            <div class="container mx-auto mt-10">
                <h2 class="text-2xl font-semibold mb-4">Editar Mecánico</h2>
                <form action="" method="POST">

                    <input type="hidden" name="idMecanico" value="<?php echo $mecanico['idMecanico']; ?>">
                    <div class="mb-4">
                        <label for="MecDocumento" class="block text-gray-700">Documento:</label>
                        <input type="text" id="MecDocumento" name="MecDocumento" class="w-full border border-gray-300 rounded p-2" value="<?php echo $mecanico['MecDocumento']; ?>" required>
                    </div>
                    <div class="mb-4">
                        <label for="MecNombre" class="block text-gray-700">Nombre:</label>
                        <input type="text" id="MecNombre" name="MecNombre" class="w-full border border-gray-300 rounded p-2" value="<?php echo $mecanico['MecNombre']; ?>" required>
                    </div>
                    <div class="mb-4">
                        <label for="MecApellido" class="block text-gray-700">Apellido:</label>
                        <input type="text" id="MecApellido" name="MecApellido" class="w-full border border-gray-300 rounded p-2" value="<?php echo $mecanico['MecApellido']; ?>" required>
                    </div>
                    <div class="mb-4">
                        <label for="MecTelefono" class="block text-gray-700">Teléfono:</label>
                        <input type="text" id="MecTelefono" name="MecTelefono" class="w-full border border-gray-300 rounded p-2" value="<?php echo $mecanico['MecTelefono']; ?>" required>
                    </div>
                    <div class="mb-4">
                        <label for="MecCorreo" class="block text-gray-700">Correo:</label>
                        <input type="email" id="MecCorreo" name="MecCorreo" class="w-full border border-gray-300 rounded p-2" value="<?php echo $mecanico['MecCorreo']; ?>" required>
                    </div>
                    <div class="mb-4">
                        <label for="MecEspecializacion" class="block text-gray-700">Especialización:</label>
                        <input type="text" id="MecEspecializacion" name="MecEspecializacion" class="w-full border border-gray-300 rounded p-2" value="<?php echo $mecanico['MecEspecializacion']; ?>" required>
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
            echo "Mecánico no encontrado";
        }
    } else {
        echo "ID de mecánico no especificado";
    }
    include '../shared/footer.php';
    ?>
</body>

</html>
