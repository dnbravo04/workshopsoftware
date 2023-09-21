<?php
include '../../controllers/ClientController.php';
if (isset($_GET['id'])) {
    $idCliente = $_GET['id'];
    $clientController = new ClientController();
    $cliente = $clientController->getClientById($idCliente);
}

if ($cliente !== null && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $result = $clientController->deleteClient($idCliente);

    if ($result) {
        header('Location: index.php');
        exit();
    } else {
        echo "Error al borrar el cliente";
    }
}
?>
<!DOCTYPE html>
<html lang="es-CO">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrar Cliente</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="../styles/styles.css">
    <link rel="shortcut icon" href="../assets/favicon.ico" type="image/x-icon">
</head>

<body>
    <?php include '../shared/header.php'; ?>

    <div class="container mx-auto mt-10">
        <h2 class="text-2xl font-semibold mb-4">Borrar Cliente</h2>
        <?php
        if (isset($cliente)) {
        ?>
            <p class="mb-4">¿Estás seguro de que deseas Borrar al cliente <strong><?php echo $cliente['CliNombre'] . ' ' . $cliente['CliApellido']; ?></strong>?</p>
            <form action="" method="POST">
                <input type="hidden" name="idCliente" value="<?php echo $cliente['idCliente']; ?>">
                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded">
                    Borrar Cliente
                </button>
            </form>
        <?php
        } else {
            echo "Cliente no encontrado.";
        }
        ?>
        <a href="index.php" class="text-blue-500 hover:underline">Cancelar</a>
        <br>

    </div>

    <?php include '../shared/footer.php'; ?>
</body>

</html>