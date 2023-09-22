<?php
include '../../controllers/MotorbikeController.php';
if (isset($_GET['id'])) {
    $idMotocicleta = $_GET['id'];
    $MotorbikeController = new MotorbikeController();
    $motocicleta = $MotorbikeController->getMotorbikeById($idMotocicleta);
}

if ($motocicleta !== null && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $result = $MotorbikeController->deleteMotorbike($idMotocicleta);

    if ($result) {
        header('Location: index.php');
        exit();
    } else {
        echo "Error al eliminar la motocicleta";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Motocicleta</title>
    <link rel="stylesheet" href="../styles/styles.css">
    <link rel="shortcut icon" href="../assets/favicon.ico" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <?php include '../shared/header.php' ?>
    <div class="container mx-auto mt-10">
        <h2 class="text-2xl font-semibold mb-4">Borrar motocicleta</h2>
        <?php
        if (isset($motocicleta)) {
        ?>
            <p class="mb-4">Estás seguro de que deseas borrar esta motocicleta?</p>
            <form action="" method="POST">
                <input type="hidden" name="idMotocicleta" value="<?php echo $motocicleta['idMotocicleta']; ?>">
                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded">
                    Borrar motocicleta
                </button>
            <?php
        } else {
            echo "Motocicleta no encontrada.";
        }
            ?>
            <a href="index.php" class="text-blue-500 hover:underline">Cancelar</a>
    </div>
    <br>

    <?php include '../shared/footer.php'; ?>
</body>

</html>