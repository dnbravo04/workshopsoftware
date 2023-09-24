<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/styles.css">
    <link rel="shortcut icon" href="../assets/favicon.ico" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/a09d03aeb8.js" crossorigin="anonymous"></script>
    <title>Datos del Administrador</title>
</head>

<body class="dark:text-white dark:bg-gray-800">
    <?php
    include '../shared/header.php';
    include '../../controllers/AdminController.php';
    $AdminController = new AdminController();

    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $adminId = $_GET['id'];
        $admin = $AdminController->getAdminById($adminId);

        if ($admin !== null) {
    ?>
            <div class="container mx-auto mt-10">
                <div class="flex-row justify-content: center">
                    <div class="flex max-w-6xl mx-auto space-x-2.5">
                        <div class="w-3/5 mx-auto dark:bg-gray-700 bg-white rounded-lg shadow-lg p-5 flex">
                            <div class="flex-col">
                                <p class="my-2">
                                    <strong class="text-4xl font-bold"><?php echo $admin['AdmNombre'] . ' ' . $admin['AdmApellido'] ?></strong>
                                    <br>
                                    <span class="text-xl pt-2">&nbsp;&nbsp;&nbsp;&nbsp;Administrador</span>
                                </p>
                            </div>
                        </div>
                        <div class="w-2/5 mx-auto dark:bg-gray-700 bg-white rounded-lg shadow-lg p-5 flex">
                            <div class="flex-col">
                                <p class="my-2">
                                    <strong class="text-base font-bold">Usuario:</strong>
                                    <br>
                                    <span class="text-xl">&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $admin['AdmUsuario'] ?></span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="w-full max-w-6xl mx-auto my-3 dark:bg-gray-700 bg-white rounded-lg shadow-lg p-5">
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <p class="my-2">
                                    <strong class="text-base font-bold">ID del Administrador: </strong>
                                    <br>
                                    <span class="text-xl">&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $admin['idAdministrador'] ?></span>
                                </p>
                            </div>
                            <div>
                                <p class="my-2">
                                    <strong class="text-base font-bold">Documento:</strong>
                                    <br>
                                    <span class="text-xl">&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $admin['AdmDocumento'] ?></span>
                                </p>
                            </div>
                            <div>
                                <p class="my-2">
                                    <strong class="text-base font-bold">Telefono:</strong>
                                    <br>
                                    <span class="text-xl">&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $admin['AdmTelefono'] ?></span>
                                </p>
                            </div>
                            <div>
                                <p class="my-2">
                                    <strong class="text-base font-bold">Correo:</strong>
                                    <br>
                                    <span class="text-xl">&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $admin['AdmCorreo'] ?></span>
                                </p>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
    <?php
        } else {
            echo "No se encontró el Mecanico";
        }
    } else {
        echo "ID no valido";
    }
    ?>
    <div class="flex p-1 justify-center">
        <a href="index.php" class="bg-cyan-700 hover:bg-cyan-800 text-white font-semibold  py-2 px-4 my-3 rounded">
            <i class="fa-solid fa-rotate-left" style="color: #ffffff;"></i> Volver a la pagina de administradores
        </a>
    </div>
    <?php
    include '../shared/footer.php';

    ?>
</body>

</html>