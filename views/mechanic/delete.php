<?php
    include '../../controllers/MechanicController.php';
if (isset($_GET['id'])) {
    $idMecanico = $_GET['id'];

    $mechanicController = new mechanicController();

    $mecanico = $mechanicController->getMechanicById($idMecanico);
}

if ($mecanico !== null && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $result = $mechanicController->deleteMechanic($idMecanico);

    if ($result) {
        header('Location: index.php');
        exit();
    } else {
        echo "Error al eliminar el mecanico";
    }
}
?>
<!DOCTYPE html>
<html lang="es-CO">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrar Mecanico</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="../styles/styles.css">
    <link rel="shortcut icon" href="../assets/favicon.ico" type="image/x-icon">
</head>

<body>
    <?php include '../shared/header.php'; ?>

    <div class="container mx-auto mt-10">
        <h2 class="text-2xl font-semibold mb-4">Borrar Mecanico</h2>
        <?php
        if (isset($mecanico)) {
        ?>
            <p class="mb-4">¿Estás seguro de que deseas eliminar al mecanico <strong><?php echo $mecanico['MecNombre'] . ' ' . $mecanico['MecApellido']; ?></strong>?</p>
            <form action="" method="POST">
                <input type="hidden" name="idMecanico" value="<?php echo $mecanico['idMecanico']; ?>">
                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded">
                    Borrar Mecanico
                </button>
            </form>
            <a href="index.php" class="text-blue-500 hover:underline">Cancelar</a>
        <?php
        } else {
            echo "Mecanico no encontrado.";
        }
        ?>
    </div>

    <?php include '../shared/footer.php'; ?>
</body>

</html>
