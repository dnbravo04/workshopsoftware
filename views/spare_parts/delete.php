<?php
include '../../controllers/SparePartsController.php';
if (isset($_GET['id'])) {
    $idRepuesto = $_GET['id'];
    $sparePartsController = new SparePartsController();
    $repuesto = $sparePartsController->getSparePartsById($idRepuesto);
}

if ($repuesto !== null && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $result = $sparePartsController->deleteSpareParts($idRepuesto);

    if ($result) {
        header('Location: index.php');
        exit();
    } else {
        echo "Error al eliminar el repuesto";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrar Repuesto</title>
    <link rel="stylesheet" href="../styles/styles.css">
    <link rel="shortcut icon" href="../assets/favicon.ico" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <?php include '../shared/header.php' ?>
    <div class="container mx-auto mt-10">
        <h2 class="text-2xl font-semibold mb-4">Borrar Repuesto</h2>
        <?php
        if (isset($repuesto)) {
        ?>
            <p class="mb-4">Estás seguro de que deseas borrar el repuesto<strong> <?php echo $repuesto['RepuCodigo'] . ' - ' . $repuesto['RepuNombre']; ?></strong>?</p>
            <form action="" method="POST">
                <input type="hidden" name="idRepuesto" value="<?php echo $repuesto['idRepuesto']; ?>">
                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded">
                    Borrar Repuesto
                </button>
            <?php
        } else {
            echo "Cliente no encontrado.";
        }
            ?>
            <a href="index.php" class="text-blue-500 hover:underline">Cancelar</a>
    </div>
    <br>

    <?php include '../shared/footer.php'; ?>
</body>

</html>