<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="views/styles/styles.css">
    <title>Datos del Mecanico</title>
</head>

<body>
    <?php
    include '../shared/header.php';
    include '../../controllers/MechanicController.php';
    $mechanicController = new MechanicController();

    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $mechanicId = $_GET['id'];
        $mechanic = $mechanicController->getMechanicById($mechanicId);

        if ($mechanic !== null) {
            // Muestra la información del cliente
    ?>
            <h2 class="text-center text-4xl font-bold">Datos del Mecanico</h2>
            <div class="container mx-auto mt-10">
                <div class="flex-row justify-content: center">
                    <div class="w-full max-w-6xl mx-auto bg-white rounded-lg shadow-lg p-5">
                        <div class="flex-col">
                            <p class="my-2">
                                <strong class="text-base font-bold">ID del Mecanico:</strong>
                                <br>
                                <span class="text-xl">&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $mechanic['idMecanico'] ?></span>
                            </p>
                            <p class="my-2">
                                <strong class="text-base font-bold">Nombres:</strong>
                                <br>
                                <span class="text-xl">&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $mechanic['MecNombre'] ?></span>
                            </p>
                            <p class="my-2">
                                <strong class="text-base font-bold">Apellidos:</strong>
                                <br>
                                <span class="text-xl">&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $mechanic['MecApellido'] ?></span>
                            </p>
                            <p class="my-2">
                                <strong class="text-base font-bold">Telefono:</strong>
                                <br>
                                <span class="text-xl">&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $mechanic['MecTelefono'] ?></span>
                            </p>
                            <p class="my-2">
                                <strong class="text-base font-bold">Correo:</strong>
                                <br>
                                <span class="text-xl">&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $mechanic['MecCorreo'] ?></span>
                            </p>
                            <p class="my-2">
                                <strong class="text-base font-bold">Especialización:</strong>
                                <br>
                                <span class="text-xl">&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $mechanic['MecEspecializacion'] ?></span>
                            </p>
                        </div>
                    </div>
                </div>

            </div>
    <?php
        } else {
            echo "No se encontró el Mecanico";
        }
    } else {
        echo "ID no valido";
    }
    ?>
</body>

</html>