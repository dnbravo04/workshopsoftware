<?php
include '../../controllers/LogisticalAssistantController.php';
if (isset($_GET['id'])) {
    $idAsistLogistico = $_GET['id'];

    $LogisticalAssistantController = new LogisticalAssistantController();

    $asistLogistico = $LogisticalAssistantController->getLogisticalAssistantById($idAsistLogistico);
}

if ($asistLogistico !== null && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $result = $LogisticalAssistantController->deleteLogisticalAssistant($idAsistLogistico);

    if ($result) {
        header('Location: index.php');
        exit();
    } else {
        echo "Error al eliminar el Asistente Logístico";
    }
}
?>
<!DOCTYPE html>
<html lang="es-CO">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrar Asistente logistico</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="../styles/styles.css">
    <link rel="shortcut icon" href="../assets/favicon.ico" type="image/x-icon">
</head>

<body>
    <?php include '../shared/header.php'; ?>

    <div class="container mx-auto mt-10">
        <h2 class="text-2xl font-semibold mb-4">Borrar Asistente logistico</h2>
        <?php
        if (isset($asistLogistico)) {
        ?>
            <p class="mb-4">¿Estás seguro de que deseas eliminar al Asistente logistico <strong><?php echo $asistLogistico['ALNombre'] . ' ' . $asistLogistico['ALApellido']; ?></strong>?</p>
            <form action="" method="POST">
                <input type="hidden" name="idAsistLogistico" value="<?php echo $asistLogistico['idAsistLogistico']; ?>">
                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded">
                    Borrar Asistente logistico
                </button>
                <a href="index.php" class="text-blue-500 hover:underline">Cancelar</a>
            </form>
        <?php
        } else {
            echo "Asistente logistico no encontrado.";
        }
        ?>
        <br>
    </div>

    <?php include '../shared/footer.php'; ?>
</body>

</html>