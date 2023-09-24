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
        echo "Error al eliminar el Administrador";
    }
}
?>
<!DOCTYPE html>
<html lang="es-CO">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/styles.css">
    <link rel="shortcut icon" href="../assets/favicon.ico" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/a09d03aeb8.js" crossorigin="anonymous"></script>
    <title>Borrar Administrador</title>
</head>

<body class="dark:text-white dark:bg-gray-800">
    <?php include '../shared/header.php'; ?>
    <div class="container mx-auto mt-10 px-5">
        <h2 class="text-2xl font-semibold mb-4">Borrar Administrador</h2>
        <?php
        if (isset($admin)) {
        ?>
            <p class="mb-4">¿Estás seguro de que deseas eliminar al Administrador <strong><?php echo $admin['AdmNombre'] . ' ' . $admin['AdmApellido']; ?></strong>?</p>
            <form action="" method="POST">
                <input type="hidden" name="idAdministrador" value="<?php echo $admin['idAdministrador']; ?>">
                <div class="flex p-1 justify-center space-x-3 mb-4">
                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded">
                        <i class="fa-solid fa-eraser" style="color: #ffffff;"></i> Borrar Administrador
                    </button>
                    <a href="index.php" class="bg-cyan-700 hover:bg-cyan-800 text-white font-semibold py-2 px-4 rounded">
                        <i class="fa-solid fa-rotate-left" style="color: #ffffff;"></i> Volver a la pagina de administradores
                    </a>
                </div>
            </form>
        <?php
        } else {
            echo 'Administrador no encontrado.
            <a href="index.php" class="bg-cyan-700 hover:bg-cyan-800 text-white font-semibold py-2 px-4 rounded">
                        <i class="fa-solid fa-rotate-left" style="color: #ffffff;"></i> Volver a la pagina de administradores
                    </a>
            ';
        }
        ?>
    </div>

    <?php include '../shared/footer.php'; ?>
</body>

</html>