<?php
    include '../../controllers/AdminController.php';
if (isset($_GET['id'])) {
    $idAdmin = $_GET['id'];

    $AdminController = new AdminController();

    $admin = $AdminController->getAdminById($idAdmin);
}

if ($admin !== null && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $result = $AdminController->deleteAdmin($idAdmin);

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
        if (isset($admin)) {
        ?>
            <p class="mb-4">¿Estás seguro de que deseas eliminar al mecanico <strong><?php echo $admin['AdmNombre'] . ' ' . $admin['AdmApellido']; ?></strong>?</p>
            <form action="" method="POST">
                <input type="hidden" name="idAdministrador" value="<?php echo $admin['idAdministrador']; ?>">
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
