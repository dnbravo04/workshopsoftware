<!DOCTYPE html>
<html lang="es-CO">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar motocicleta</title>
    <link rel="stylesheet" href="../styles/styles.css">
    <link rel="shortcut icon" href="../assets/favicon.ico" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <?php
    include '../shared/header.php';
    include '../../controllers/MotorbikeController.php';

    $motorbikeController = new MotorbikeController();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $idMotocicleta = $_GET['id'];
        $motorbikeController->edit($idMotocicleta);
    }
    if (isset($_GET['id'])) {
        $idMotocicleta =  $_GET['id'];
        $motocicleta = $motorbikeController->getMotorbikeById($idMotocicleta);


        if ($motocicleta != null) {
            $clientNames = $motorbikeController->getAllClients();

    ?>
            <div class="container mx-auto mt-10">
                <h2 class="text-2xl font-semibold mb-4">Editar motocicleta</h2>
                <form action="" method="POST">

                    <input type="hidden" name="idMotocicleta" value="<?php echo $motocicleta['idMotocicleta']; ?>">
                    <div class="mb-4">
                        <label for="MtPlaca" class="block text-gray-700">Placa:</label>
                        <input type="text" id="MtPlaca" name="MtPlaca" class="w-full border border-gray-300 rounded p-2" value="<?php echo $motocicleta['MtPlaca']; ?>" required>
                    </div>
                    <div class="mb-4">
                        <label for="MtMarca" class="block text-gray-700">Marca:</label>
                        <input type="text" id="MtMarca" name="MtMarca" class="w-full border border-gray-300 rounded p-2" value="<?php echo $motocicleta['MtMarca']; ?>" required>
                    </div>
                    <div class="mb-4">
                        <label for="MtModelo" class="block text-gray-700">Modelo:</label>
                        <input type="text" id="MtModelo" name="MtModelo" class="w-full border border-gray-300 rounded p-2" value="<?php echo $motocicleta['MtModelo']; ?>" required>
                    </div>
                    <div class="mb-4">
                        <label for="MtCilindraje" class="block text-gray-700">Cilindraje:</label>
                        <input type="text" id="MtCilindraje" name="MtCilindraje" class="w-full border border-gray-300 rounded p-2" value="<?php echo $motocicleta['MtCilindraje']; ?>" required>
                    </div>
                    <div class="mb-4">
                        <label for="MtColor" class="block text-gray-700">Color:</label>
                        <input type="text" id="MtColor" name="MtColor" class="w-full border border-gray-300 rounded p-2" value="<?php echo $motocicleta['MtColor']; ?>" required>
                    </div>
                    <label for="MtCliente" class="block text-gray-700">Cliente:</label>
                    <select name="MtCliente" id="MtCliente" class="w-full border border-gray-300 rounded p-2">
                        <?php foreach ($clientNames as $clientData) : ?>
                            <?php $clientId = $clientData['idCliente']; ?>
                            <?php $fullName = $clientData['CliNombre'] . ' ' . $clientData['CliApellido']; ?>
                            <option value="<?php echo $clientId; ?>" <?php if ($clientId == $motocicleta['MtCliente']) echo 'selected'; ?>>
                                <?php echo $fullName . ' - ' . $clientData['CliDocumento']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>

                    <button type="submit" class=" my-3 bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">
                        Guardar Cambios
                    </button>
            </div>
            </form>
            </div>
    <?php
        } else {
            echo "motocicleta no encontrado";
        }
    } else {
        echo "ID de motocicleta no especificado";
    }
    include '../shared/footer.php';
    ?>
</body>

</html>