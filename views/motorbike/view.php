<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Motocicletas</title>
    <link rel="stylesheet" href="../styles/styles.css">
    <link rel="shortcut icon" href="../assets/favicon.ico" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <?php
    include '../shared/header.php';
    include '../../controllers/MotorbikeController.php';
    $motorbikecontroller = new MotorbikeController();

    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $idMotocicleta = $_GET['id'];
        $motorbike = $motorbikecontroller->getMotorbikeById($idMotocicleta);


        if ($motorbike !== null) {

    ?>
            <h2 class="text-center text-4xl font-bold">Datos de la motocicleta</h2>
            <div class="container mx-auto mt-10">
                <div class="flex-row justify-content: center">
                    <div class="w-full max-w-6xl mx-auto bg-white rounded-lg shadow-lg p-5">
                        <div class="flex-col">
                            <p class="my-2">
                                <strong class="text-base font-bold">ID de la motocicleta:</strong>
                                <br>
                                <span class="text-xl"> &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $motorbike['idMotocicleta']; ?></span>
                            </p>
                            <p class="my-2">
                                <strong class="text-base font-bold">Placa:</strong>
                                <br>
                                <span class="text-xl"> &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $motorbike['MtPlaca']; ?></span>
                            </p>
                            <p class="my-2">
                                <strong class="text-base font-bold">Marca:</strong>
                                <br>
                                <span class="text-xl"> &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $motorbike['MtMarca']; ?></span>
                            </p>
                            <p class="my-2">
                                <strong class="text-base font-bold">Modelo:</strong>
                                <br>
                                <span class="text-xl"> &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $motorbike['MtModelo']; ?></span>
                            </p>
                            <p class="my-2">
                                <strong class="text-base font-bold">Cilindraje:</strong>
                                <br>
                                <span class="text-xl"> &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $motorbike['MtCilindraje']; ?></span>
                            </p>
                            <p class="my-2">
                                <strong class="text-base font-bold">Color:</strong>
                                <br>
                                <span class="text-xl"> &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $motorbike['MtColor']; ?></span>
                            </p>
                            <?php
                            $clientData = $motorbikecontroller->showClientByMotorbike($motorbike['idMotocicleta']);
                            if ($clientData !== null) :
                                echo '<p class="my-2">
                                    <strong class="text-base font-bold">Cliente:</strong>
                                    <br>
                                    <span class="text-xl"> &nbsp;&nbsp;&nbsp;&nbsp;' . $clientData['CliNombre'] . ' ' . $clientData['CliApellido'] . '</span>
                                </p>';
                            else :
                                echo '<p class="my-2">
                                    <strong class="text-base font-bold">Cliente:</strong>
                                    <br>
                                    <span class="text-xl"> &nbsp;&nbsp;&nbsp;&nbsp;Cliente no encontrado.</span>
                                </p>';
                            endif;
                            ?>
                        </div>
                    </div>
                </div>
                <br>
            </div>

    <?php
        } else {
            echo "Motocicleta no encontrada";
        }
    } else {
        echo "ID de motocicleta no válido";
    }
    ?>
    <?php include '../shared/footer.php'; ?>

</body>

</html>