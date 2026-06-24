<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: ../login/login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/styles.css">
    <link rel="shortcut icon" href="../assets/favicon.ico" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/a09d03aeb8.js" crossorigin="anonymous"></script>
    <title>Detalles de la Motocicleta</title>
</head>

<body class="dark:text-white dark:bg-gray-800">
    <?php
    include '../shared/header.php';
    include '../../controllers/MotorbikeController.php';
    $motorbikecontroller = new MotorbikeController();

    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $idMotocicleta = $_GET['id'];
        $motorbike = $motorbikecontroller->getMotorbikeById($idMotocicleta);
        $client = $motorbikecontroller->showClientByMotorbike($motorbike['idMotocicleta']);


        if ($motorbike !== null) {

    ?>
            <div class="container mx-auto mt-5">
                <div class="flex-row justify-content: center">
                    <div class="w-full max-w-6xl dark:bg-gray-700 mx-auto bg-white rounded-lg shadow-lg p-5">
                        <div class="flex-col">
                            <p class="my-2">
                                <strong class="text-4xl font-bold"><?php echo htmlspecialchars($motorbike['MtPlaca'], ENT_QUOTES, 'UTF-8')  ?></strong>
                                <br>
                                <span class="text-xl pt-2">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo htmlspecialchars($motorbike['MtMarca'] . ' - ' . $motorbike['MtModelo'], ENT_QUOTES, 'UTF-8') ?></span>
                            </p>
                        </div>
                    </div>
                    <div class="w-full max-w-6xl dark:bg-gray-700 mx-auto my-3 bg-white rounded-lg shadow-lg p-5">
                        <h2 class="text-center text-xl font-bold">Información Completa de la Motocicleta</h2>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="col-span-1">
                                <p class="my-2">
                                    <strong class="text-base font-bold">ID interna de la motocicleta:</strong>
                                    <br>
                                    <span class="text-xl"> &nbsp;&nbsp;&nbsp;&nbsp;<?php echo htmlspecialchars($motorbike['idMotocicleta'], ENT_QUOTES, 'UTF-8'); ?></span>
                                </p>
                                <p class="my-2">
                                    <strong class="text-base font-bold">Marca de la motocicleta:</strong>
                                    <br>
                                    <span class="text-xl"> &nbsp;&nbsp;&nbsp;&nbsp;<?php echo htmlspecialchars($motorbike['MtMarca'], ENT_QUOTES, 'UTF-8'); ?></span>
                                </p>
                                <p class="my-2">
                                    <strong class="text-base font-bold">Color:</strong>
                                    <br>
                                    <span class="text-xl"> &nbsp;&nbsp;&nbsp;&nbsp;<?php echo htmlspecialchars($motorbike['MtColor'], ENT_QUOTES, 'UTF-8'); ?></span>
                                </p>
                            </div>
                            <div class="col-span-1">
                                <p class="my-2">
                                    <strong class="text-base font-bold">Placa:</strong>
                                    <br>
                                    <span class="text-xl"> &nbsp;&nbsp;&nbsp;&nbsp;<?php echo htmlspecialchars($motorbike['MtPlaca'], ENT_QUOTES, 'UTF-8'); ?></span>
                                </p>
                                <p class="my-2">
                                    <strong class="text-base font-bold">Modelo:</strong>
                                    <br>
                                    <span class="text-xl"> &nbsp;&nbsp;&nbsp;&nbsp;<?php echo htmlspecialchars($motorbike['MtModelo'], ENT_QUOTES, 'UTF-8'); ?></span>
                                </p>
                                <p class="my-2">
                                    <strong class="text-base font-bold">Cilindraje:</strong>
                                    <br>
                                    <span class="text-xl"> &nbsp;&nbsp;&nbsp;&nbsp;<?php echo htmlspecialchars($motorbike['MtCilindraje'], ENT_QUOTES, 'UTF-8'); ?></span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="w-full max-w-6xl dark:bg-gray-700 mx-auto my-3 bg-white rounded-lg shadow-lg p-5">
                        <h2 class="text-center text-xl font-bold">RInformación del Cliente</h2>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="col-span-1">
                                <p class="my-2">
                                    <strong class="text-base font-bold">Nombre completo:</strong>
                                    <br>
                                    <span class="text-xl"> &nbsp;&nbsp;&nbsp;&nbsp;<?php echo htmlspecialchars($client['CliNombre'] . ' ' . $client['CliApellido'], ENT_QUOTES, 'UTF-8'); ?></span>
                                </p>
                                <p class="my-2">
                                    <strong class="text-base font-bold">telefono principal:</strong>
                                    <br>
                                    <span class="text-xl"> &nbsp;&nbsp;&nbsp;&nbsp;<?php echo htmlspecialchars($client['CliTelefono'], ENT_QUOTES, 'UTF-8'); ?></span>
                                </p>
                                <p class="my-2">
                                    <strong class="text-base font-bold">Dirección:</strong>
                                    <br>
                                    <span class="text-xl"> &nbsp;&nbsp;&nbsp;&nbsp;<?php echo htmlspecialchars($client['CliDireccion'], ENT_QUOTES, 'UTF-8'); ?></span>
                                </p>
                            </div>

                            <div class="col-span-1">
                                <p class="my-2">
                                    <strong class="text-base font-bold">Documento:</strong>
                                    <br>
                                    <span class="text-xl"> &nbsp;&nbsp;&nbsp;&nbsp;<?php echo htmlspecialchars($client['CliDocumento'], ENT_QUOTES, 'UTF-8'); ?></span>
                                </p>
                                <p class="my-2">
                                    <strong class="text-base font-bold">Telefono Secundario:</strong>
                                    <br>
                                    <span class="text-xl"> &nbsp;&nbsp;&nbsp;&nbsp;<?php echo htmlspecialchars($client['CliTelefonoSecundario'], ENT_QUOTES, 'UTF-8'); ?></span>
                                </p>
                                <p class="my-2">
                                    <strong class="text-base font-bold">Correo:</strong>
                                    <br>
                                    <span class="text-xl"> &nbsp;&nbsp;&nbsp;&nbsp;<?php echo htmlspecialchars($client['CliCorreo'], ENT_QUOTES, 'UTF-8'); ?></span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    <?php
        } else {
            echo "Motocicleta no encontrada";
        }
    } else {
        echo "ID de motocicleta no válido";
    }
    ?>
    <div class="flex p-1 justify-center space-x-3">
        <a href="index.php" class="bg-cyan-700 hover:bg-cyan-800 text-white font-semibold py-2 px-4 my-3 rounded">
            <i class="fa-solid fa-rotate-left" style="color: #ffffff;"></i> Volver a la pagina de Motocicletas
        </a>
    </div>

    <?php include '../shared/footer.php'; ?>
</body>

</html>