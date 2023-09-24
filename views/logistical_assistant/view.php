<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/styles.css">
    <link rel="shortcut icon" href="../assets/favicon.ico" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/a09d03aeb8.js" crossorigin="anonymous"></script>
    <title>Datos del Asistente logistico</title>
</head>

<body class="dark:text-white dark:bg-gray-800">
    <?php
    include '../shared/header.php';
    include '../../controllers/LogisticalAssistantController.php';
    $LogisticalAssistantController = new LogisticalAssistantController();

    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $LogisticalAssistantId = $_GET['id'];
        $asistenteLogistico = $LogisticalAssistantController->getLogisticalAssistantById($LogisticalAssistantId);

        if ($asistenteLogistico !== null) {
    ?>
            <div class="container mx-auto mt-10">
                <div class="flex-row justify-content: center">
                    <div class="w-full max-w-6xl dark:bg-gray-700 mx-auto bg-white rounded-lg shadow-lg p-5">
                        <div class="flex-col">
                            <p class="my-2">
                                <strong class="text-4xl font-bold"><?php echo $asistenteLogistico['ALNombre'] . ' ' . $asistenteLogistico['ALApellido'] ?></strong>
                                <br>
                                <span class="text-xl pt-2">&nbsp;&nbsp;&nbsp;&nbsp;Asistente Logistico</span>
                            </p>
                        </div>
                    </div>
                    <div class="w-full max-w-6xl mx-auto my-3 dark:bg-gray-700 bg-white rounded-lg shadow-lg p-5">
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <p class="my-2">
                                    <strong class="text-base font-bold">Documento:</strong>
                                    <br>
                                    <span class="text-xl">&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $asistenteLogistico['ALDocumento']; ?></span>
                                </p>
                            </div>
                            <div>
                                <p class="my-2">
                                    <strong class="text-base font-bold">ID del Asistente Logistico:</strong>
                                    <br>
                                    <span class="text-xl">&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $asistenteLogistico['idAsistLogistico']; ?></span>
                                </p>
                            </div>
                            <div>
                                <p class="my-2">
                                    <strong class="text-base font-bold">Telefono:</strong>
                                    <br>
                                    <span class="text-xl">&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $asistenteLogistico['ALTelefono']; ?></span>
                                </p>
                            </div>
                            <div>
                                <p class="my-2">
                                    <strong class="text-base font-bold">Correo:</strong>
                                    <br>
                                    <span class="text-xl">&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $asistenteLogistico['ALCorreo']; ?></span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    <?php
        } else {
            echo "No se encontró el Asistente Logistico";
        }
    } else {
        echo "ID no valido";
    }
    ?>
    <div class="flex p-1 justify-center">
        <a href="index.php" class="bg-cyan-700 hover:bg-cyan-800 text-white font-semibold  py-2 px-4 my-3 rounded">
            <i class="fa-solid fa-rotate-left" style="color: #ffffff;"></i> Volver a la pagina de asistentes logisticos
        </a>
    </div>
    <?php
    include '../shared/footer.php';

    ?>
</body>

</html>