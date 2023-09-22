<?php
include '../../controllers/MaintenanceReportController.php';
if (isset($_GET['id'])) {
    $idReporte = $_GET['id'];
    $MaintenanceReportController = new MaintenanceReportController();
    $reporte = $MaintenanceReportController->getMaintenanceReportById($idReporte);
}

if ($reporte !== null && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $result = $MaintenanceReportController->deleteMaintenanceReport($idReporte);

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
        <h2 class="text-2xl font-semibold mb-4">Borrar Reporte</h2>
        <?php
        if (isset($reporte)) {
        ?>
            <p class="mb-4">Estás seguro de que deseas borrar este Reporte?</p>
            <form action="" method="POST">
                <input type="hidden" name="idMotocicleta" value="<?php echo $reporte['idReporte']; ?>">
                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded">
                    Eliminar Reporte
                </button>
            <?php
        } else {
            echo "Reporte no encontrada.";
        }
            ?>
            <a href="index.php" class="text-blue-500 hover:underline">Cancelar</a>
    </div>
    <br>

    <?php include '../shared/footer.php'; ?>
</body>

</html>